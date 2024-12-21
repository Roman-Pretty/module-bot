from llama_index.core import SimpleDirectoryReader
from rest_framework.decorators import api_view
from rest_framework.response import Response
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time
import json
import shutil
import os

from api.models import Module


@api_view(['POST'])
def generate_module(request):
    import pickle
    from llama_index.core import VectorStoreIndex, Settings, StorageContext
    import faiss
    from llama_index.llms.openai import OpenAI
    from llama_index.embeddings.openai import OpenAIEmbedding
    from llama_index.vector_stores.faiss import FaissVectorStore
    from dotenv import load_dotenv

    try:
        # TODO: Encrypt the password
        data = json.loads(request.body)
        name = data.get('name')
        course_id = data.get('course_id')
        email = data.get('email')
        password = data.get('password')
        url = data.get('url')

        from selenium.webdriver.chrome.options import Options
        chrome_options = Options()
        chrome_options.add_argument("--headless")
        chrome_options.add_argument("--disable-gpu")
        chrome_options.add_argument("--window-size=1920x1080")
        # Initialize the WebDriver with the specified options
        driver = webdriver.Chrome(options=chrome_options)

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

            # TODO: write an algorithm that also downloads pdfs and other resources
            page_content = driver.page_source

            data_dir = "./data"
            if not os.path.exists(data_dir):
                os.makedirs(data_dir)
            with open("./data/module_instance.html", "w") as file:
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
        reader = SimpleDirectoryReader(input_dir="./data")
        documents = reader.load_data()

        Settings.llm = OpenAI(model="gpt-4o-mini", api_key=OPENAI_API_KEY, max_tokens=1000)
        Settings.embed_model = OpenAIEmbedding(model="text-embedding-ada-002")

        vector_store = FaissVectorStore(faiss_index=faiss_index)
        storage_context = StorageContext.from_defaults(vector_store=vector_store)
        index = VectorStoreIndex.from_documents(documents, storage_context=storage_context, show_progress=True)

        # Serialize and save the VectorStoreIndex to the database
        module_instance.index_data = pickle.dumps(index)
        module_instance.save()

        # Path to the data folder
        data_folder_path = "./data"

        # Delete all files and subdirectories in the data folder
        for filename in os.listdir(data_folder_path):
            file_path = os.path.join(data_folder_path, filename)
            try:
                if os.path.isfile(file_path) or os.path.islink(file_path):
                    os.remove(file_path)
                elif os.path.isdir(file_path):
                    shutil.rmtree(file_path)
            except Exception as e:
                print(f"Failed to delete {file_path}. Reason: {e}")

        return Response({'status': 'success', 'message': 'Module generated successfully'}, status=200)

    except Exception as e:
        return Response({'status': 'error', 'message': str(e)}, status=400)
