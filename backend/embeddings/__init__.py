import faiss
from llama_index.core import SimpleDirectoryReader, VectorStoreIndex, Settings, StorageContext
from llama_index.llms.openai import OpenAI
from llama_index.embeddings.openai import OpenAIEmbedding
from llama_index.vector_stores.faiss import FaissVectorStore
from dotenv import load_dotenv
import os
import pickle

# TODO: Change 'chat' so it memorizes the context of the conversation for each user
load_dotenv()
OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")
INDEX_FILE_PATH = "index.pkl"

# TODO: Save index to the database
# Check if the VectorStoreIndex file already exists
if os.path.exists(INDEX_FILE_PATH):
    # Load the existing VectorStoreIndex
    with open(INDEX_FILE_PATH, 'rb') as f:
        index = pickle.load(f)
else:
    # dimensions of text-ada-embedding-002
    d = 1536
    # Create a new FAISS index
    faiss_index = faiss.IndexFlatL2(d)

    reader = SimpleDirectoryReader(input_dir="../data")
    documents = reader.load_data()

    Settings.llm = OpenAI(model="gpt-4o-mini", api_key=OPENAI_API_KEY, max_tokens=50) # I have set this to 50 for now (from 16!), need to set this later
    Settings.embed_model = OpenAIEmbedding(model="text-embedding-ada-002")

    vector_store = FaissVectorStore(faiss_index=faiss_index)
    storage_context = StorageContext.from_defaults(vector_store=vector_store)
    index = VectorStoreIndex.from_documents(documents, storage_context=storage_context, show_progress=True)

    # Save the VectorStoreIndex to a file
    with open(INDEX_FILE_PATH, 'wb') as f:
        pickle.dump(index, f)

chat_engine = index.as_chat_engine(similarity_top_k=20, chat_mode='context')
