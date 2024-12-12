from django.http import StreamingHttpResponse
from rest_framework.decorators import api_view
from rest_framework.response import Response
from django.shortcuts import get_object_or_404
import json
from api.models import ChatLog, Module
import datetime as dt
import os
import pickle
from dotenv import load_dotenv
from llama_index.core import Settings
from llama_index.core.chat_engine.types import ChatMode
from llama_index.llms.openai import OpenAI
from llama_index.embeddings.openai import OpenAIEmbedding
from django.contrib.auth.models import User
import logging

# TODO: reimplement chat_old memory
def get_chatbot(module_id):
    """
    Initialize and return a chat_old engine for the specified module.

    Args:
        module_id (str): The ID of the module for which to initialize the chat_old engine.

    Returns:
        ChatEngine: An instance of the chat_old engine initialized with the module's embeddings.
        None: If the user or module does not exist, or if no module ID is provided.
    """
    logger = logging.getLogger(__name__)

    TOP_K = 36
    print(f"Initializing embeddings for {module_id}...")

    load_dotenv()
    OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")
    Settings.llm = OpenAI(model="gpt-4o-mini", api_key=OPENAI_API_KEY, max_tokens=1000)
    Settings.embed_model = OpenAIEmbedding(model="text-embedding-ada-002")

    try:
        user = User.objects.get(username='roman')
    except User.DoesNotExist:
        logger.error("User with username 'roman' does not exist.")
        return None

    if module_id is not None:
        try:
            module_instance = Module.objects.get(course_id=module_id)
        except Module.DoesNotExist:
            logger.error(f"Module with course_id {module_id} does not exist.")
            return None
    else:
        logger.error("No module provided.")
        return None

    # Load the existing VectorStoreIndex
    if module_instance.index_data:
        logger.info("Loading existing index...")
        index = pickle.loads(module_instance.index_data)
    else:
        index = None

    logger.info("Using existing index...")
    return index.as_chat_engine(similarity_top_k=TOP_K, chat_mode=ChatMode.CONTEXT)

@api_view(['POST'])
def embedding_response(request):
    """
    Handle a POST request to generate a chatbot response based on user input.

    This view processes the user input, retrieves the relevant module and user,
    logs the chat_old, initializes the chat_old engine, and streams the chatbot's response.

    Args:
        request (HttpRequest): The HTTP request object containing the user input, username, and module ID.

    Returns:
        StreamingHttpResponse: A streaming HTTP response with the chatbot's response.
        Response: A JSON response indicating an error if the input is invalid or if the chat_old engine fails to initialize.
    """
    try:
        # Parse the JSON body of the request to get user input, username, and module ID
        data = json.loads(request.body)
        user_input = data.get('message', '')
        username = data.get('username')
        course_id = data.get('module_id')

        # Validate the input
        if not user_input or not username or not course_id:
            return Response({'error': 'Missing message, username, or module ID'}, status=400)

        # Retrieve the user and module objects
        user = get_object_or_404(User, username=username)
        module = get_object_or_404(Module, course_id=course_id)

        # Log the user input
        ChatLog.objects.create(user=user, module=module, message=user_input, bot_message=False)

        # Initialize the chat_old engine
        chat_engine = get_chatbot(module_id=course_id)
        if not chat_engine:
            return Response({'response': 'Chat engine not initialized'}, status=500)

        # Create the prompt for the chat_old engine
        prompt = (
            f"I am a student for {module.name} ({course_id}) and today's date is {dt.date.today()}. Using the provided information, answer the question if it is relevant: '{user_input}'."
        )

        # Stream the chat_old engine's response
        streaming_response = chat_engine.stream_chat(prompt)

        def generate_response():
            """
            Generate the chatbot's response by streaming tokens from the chat_old engine.

            Yields:
                str: The next token in the chatbot's response.
            """
            response_text = ''
            for token in streaming_response.response_gen:
                response_text += token
                yield token

            # Log the chatbot's response
            ChatLog.objects.create(user=user, module=module, message=response_text, bot_message=True)

        return StreamingHttpResponse(generate_response(), content_type='application/json')

    except Exception as e:
        print(f"Server error: {e}")
        return Response({'error': 'Internal Server Error'}, status=500)