import os
import pickle
from dotenv import load_dotenv
from llama_index.core import SimpleDirectoryReader, VectorStoreIndex, Settings, StorageContext
from llama_index.core.chat_engine.types import ChatMode
import faiss
from llama_index.llms.openai import OpenAI
from llama_index.embeddings.openai import OpenAIEmbedding
from llama_index.vector_stores.faiss import FaissVectorStore
from .models import Module, ChatLog
from django.contrib.auth.models import User
from django.core.exceptions import ObjectDoesNotExist
import logging

logger = logging.getLogger(__name__)
chat_engine = None
index = None

def initialize_embeddings(module_id=None):
    global chat_engine
    global index

    TOP_K = 6
    print(f"Initializing embeddings... for {module_id}")
    index = None
    chat_engine = None

    load_dotenv()
    OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")

    try:
        user = User.objects.get(username='roman')
    except User.DoesNotExist:
        logger.error("User with username 'roman' does not exist.")
        return

    # If module_id is provided, fetch the specific module, otherwise use the most recent accessed module
    if module_id is not None:
        try:
            module_instance = Module.objects.get(course_id=module_id)
        except Module.DoesNotExist:
            logger.error(f"Module with course_id {module_id} does not exist.")
            return
    else:
        # Get the most recent accessed module from the chat logs
        try:
            recent_chat_log = ChatLog.objects.filter(user=user).order_by('-timestamp').first()
            if recent_chat_log:
                module_instance = recent_chat_log.module
            else:
                logger.info("No chat logs found for the user.")

                #TODO: Add a default module
                module_instance = Module.objects.first()
        except ObjectDoesNotExist:
            logger.error("Module associated with chat log does not exist.")
            return

    if not module_instance:
        logger.error("Module instance not found.")
        return

    # Load the existing VectorStoreIndex or create a new one
    if module_instance.index_data:
        logger.info("Loading existing index...")
        index = pickle.loads(module_instance.index_data)
    else:
        index = None

    if index is None:
        d = 1536  # dimensions of text-ada-embedding-002
        faiss_index = faiss.IndexFlatL2(d)

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

        # These lines are new
        index = pickle.loads(module_instance.index_data)
        chat_engine = index.as_chat_engine(similarity_top_k=TOP_K, chat_mode=ChatMode.CONTEXT)
    else:
        # Use the loaded index for the chat engine
        logger.info("Using existing index...")
        chat_engine = index.as_chat_engine(similarity_top_k=TOP_K, chat_mode=ChatMode.CONTEXT)

    # Initialize chat engine if it's not already done
    if chat_engine is None:
        chat_engine = index.as_chat_engine(similarity_top_k=TOP_K, chat_mode=ChatMode.CONTEXT)

