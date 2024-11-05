from llama_index.core import SimpleDirectoryReader
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time

from django.http import JsonResponse
from datetime import datetime
from django.shortcuts import get_object_or_404
from .models import ChatLog, Module
from django.contrib.auth.models import User
import json


def embedding_response(request):
    from .signals import chat_engine

    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            user_input = data.get('message', '')
            username = data.get('username')
            course_id = data.get('module_id')

            if not user_input or not username or not course_id:
                return JsonResponse({'error': 'Missing message, username, or module ID'}, status=400)

            user = get_object_or_404(User, username=username)
            module = get_object_or_404(Module, course_id=course_id)

            if not chat_engine:
                return JsonResponse({'response': 'Chat engine not initialized'}, status=500)

            response = chat_engine.chat(
                "You are only allowed to answer questions based on the provided embeddings. Do not mention you are providing a response based on the embeddings or information provided."
                f" today's date is {datetime.now().strftime('%d/%m/%Y %H:%M:%S')}, but don't repeat it unless asked to. Use this information when answering questions based on what to do now or in the future."
                f" if you do not know the answer, please direct the user to the appropriate contact. Please ensure your responses are lengthy if needed and accurate."
                f" Please ensure your responses are structured clearly and nicely. Here is your message: {user_input}"
            )

            # Save both user message and bot response in chat log
            ChatLog.objects.create(
                user=user,
                module=module,
                message=user_input,
                bot_message=False
            )
            ChatLog.objects.create(
                user=user,
                module=module,
                message=response,
                bot_message=True
            )

            return JsonResponse({'response': str(response)})

        except Exception as e:
            print(f"Server error: {e}")
            return JsonResponse({'error': 'Internal Server Error'}, status=500)

    return JsonResponse({'error': 'Invalid request method'}, status=400)


def set_current_module(request):
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            course_id = data.get('course_id')

            module = Module.objects.get(course_id=course_id)
            from .signals import initialize_embeddings
            initialize_embeddings(module_id=course_id)

            return JsonResponse({'status': 'success', 'message': f'Module switched to {module.name}'})
        except Module.DoesNotExist:
            return JsonResponse({'status': 'error', 'message': 'Module not found'}, status=404)
        except json.JSONDecodeError:
            return JsonResponse({'status': 'error', 'message': 'Invalid JSON'}, status=400)

    return JsonResponse({'status': 'error', 'message': 'Invalid request method'}, status=405)


def get_chatlogs(request):
    username = request.GET.get('username', 'roman')  # Get the username, TODO: remove default value
    course_id = request.GET.get('course_id', 'ECS417U')  # Get the course_id TODO: remove default value

    user = get_object_or_404(User, username=username)
    module = get_object_or_404(Module, course_id=course_id)

    # Fetch the chat logs for the specified user and module
    chatlogs = ChatLog.objects.filter(user=user, module=module).order_by('timestamp')

    # Prepare data to send to the frontend
    data = [
        {
            'message': log.message,
            'bot': log.bot_message
        }
        for log in chatlogs
    ]
    return JsonResponse(data, safe=False)


def clear_chatlogs(request):
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            username = data['username']
            module_id = data['module_id']

            # Get the user and module
            user = User.objects.get(username=username)
            module = Module.objects.get(course_id=module_id)

            # Delete all chat logs for this user and module
            ChatLog.objects.filter(user=user, module=module).delete()

            return JsonResponse({'status': 'success', 'message': 'Chat logs cleared successfully'}, status=200)
        except Exception as e:
            return JsonResponse({'status': 'error', 'message': str(e)}, status=400)

    return JsonResponse({'status': 'error', 'message': 'Invalid request method'}, status=405)


def get_bots(request):
    if request.method == 'GET':
        # Fetch all modules/bots
        modules = Module.objects.all()

        # Prepare data to send to the frontend
        data = [
            {
                'course_id': module.course_id,
                'name': module.name
            }
            for module in modules
        ]

        # Return data as JSON response
        return JsonResponse(data, safe=False)
    else:
        return JsonResponse({'error': 'Invalid request method'}, status=400)


def generate_module(request):
    import pickle
    from llama_index.core import VectorStoreIndex, Settings, StorageContext, Document
    import faiss
    from llama_index.llms.openai import OpenAI
    from llama_index.embeddings.openai import OpenAIEmbedding
    from llama_index.vector_stores.faiss import FaissVectorStore
    from .models import Module
    import os
    from dotenv import load_dotenv

    if request.method == 'POST':
        try:
            # TODO: Encrypt the password
            data = json.loads(request.body)
            name = data.get('name')
            course_id = data.get('course_id')
            email = data.get('email')
            password = data.get('password')
            url = data.get('url')

            driver = webdriver.Chrome()

            saml_login_url = "https://qmplus.qmul.ac.uk/auth/saml2/login.php?wants&idp=4eb950c6f0e1110dc8e14b5cf41532d7&passive=off"
            driver.get(saml_login_url)

            try:
                time.sleep(5)
                username_field = driver.find_element(By.NAME, "loginfmt")
                username_field.send_keys(email)
                username_field.send_keys(Keys.RETURN)
                time.sleep(5)

                password_field = driver.find_element(By.NAME, "passwd")
                password_field.send_keys(password)
                password_field.send_keys(Keys.RETURN)
                time.sleep(5)

                driver.get(url)
                time.sleep(5)

                page_content = driver.page_source

                with open("../data/module_instance.html", "w") as file:
                    file.write(page_content)
            except Exception as e:
                print(e)

            module_instance = Module(
                course_id=course_id,
                name=name,
                url=url,
                html=page_content if page_content else ""
            )
            driver.quit()

            load_dotenv()
            OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")
            d = 1536  # dimensions of text-ada-embedding-002
            faiss_index = faiss.IndexFlatL2(d)

            # TODO: Find more efficient way to load the data
            reader = SimpleDirectoryReader(input_dir="../data")
            documents = reader.load_data()

            Settings.llm = OpenAI(model="gpt-4o-mini", api_key=OPENAI_API_KEY, max_tokens=18)
            Settings.embed_model = OpenAIEmbedding(model="text-embedding-ada-002")

            vector_store = FaissVectorStore(faiss_index=faiss_index)
            storage_context = StorageContext.from_defaults(vector_store=vector_store)
            index = VectorStoreIndex.from_documents(documents, storage_context=storage_context, show_progress=True)

            # Serialize and save the VectorStoreIndex to the database
            module_instance.index_data = pickle.dumps(index)
            module_instance.save()
            os.remove("../data/module_instance.html")
            return JsonResponse({'status': 'success', 'message': 'Module generated successfully'}, status=200)
        except Exception as e:
            return JsonResponse({'status': 'error', 'message': str(e)}, status=400)
