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

    if module_id is not None:
        try:
            module_instance = Module.objects.get(course_id=module_id)
        except Module.DoesNotExist:
            logger.error(f"Module with course_id {module_id} does not exist.")
            return
    else:
        logger.error("No module provided.")
        return

    # Load the existing VectorStoreIndex or create a new one
    if module_instance.index_data:
        logger.info("Loading existing index...")
        index = pickle.loads(module_instance.index_data)
    else:
        index = None

    logger.info("Using existing index...")
    chat_engine = index.as_chat_engine(similarity_top_k=TOP_K, chat_mode=ChatMode.CONTEXT)