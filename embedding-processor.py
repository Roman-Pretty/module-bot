import faiss
from llama_index.core import SimpleDirectoryReader, VectorStoreIndex, Settings, StorageContext
from llama_index.llms.openai import OpenAI
from llama_index.embeddings.openai import OpenAIEmbedding
from llama_index.vector_stores.faiss import FaissVectorStore
from dotenv import load_dotenv
import os
from datetime import datetime

load_dotenv()
OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")

d = 1536 # dimensions of text-ada-embedding-002
faiss_index = faiss.IndexFlatL2(d)

reader = SimpleDirectoryReader(input_dir="data")
documents = reader.load_data()

Settings.llm = OpenAI(model="gpt-4o-mini", api_key=OPENAI_API_KEY)
Settings.embed_model = OpenAIEmbedding(model="text-embedding-ada-002")

vector_store = FaissVectorStore(faiss_index=faiss_index)
storage_context = StorageContext.from_defaults(vector_store=vector_store)
index = VectorStoreIndex.from_documents(documents, storage_context=storage_context, show_progress=True)

chat_engine = index.as_chat_engine(similarity_top_k=15, chat_mode='context')

msg = ""
while msg != "exit":
    msg = input("You: ")
    response = chat_engine.chat("You are only allowed to answer questions based on the provided embeddings."
                                f"today's date is {datetime.now().strftime("%d/%m/%Y %H:%M:%S")}. " + msg)
    print("Chatbot: ", response)