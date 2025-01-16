import json
import os

from django.http import JsonResponse, HttpResponseBadRequest
from dotenv import load_dotenv
from langchain_openai import OpenAIEmbeddings
from langchain_text_splitters import RecursiveCharacterTextSplitter
from rest_framework.decorators import api_view
from langchain_community.document_loaders import WebBaseLoader

from api.models import Module, ModuleEmbedding
from api.selenium import get_qmplus_cookies
from backend import settings


@api_view(['POST'])
def generate_module(request):
    data = json.loads(request.body)
    name = data.get('name')
    module_id = data.get('course_id')
    email = data.get('email')
    password = data.get('password')
    url = data.get('url')

    if not name or not module_id or not email or not password or not url:
        return HttpResponseBadRequest()

    Module.objects.get_or_create(
        id=module_id,
        name=name,
        url=url,
    )

    raw_cookies = get_qmplus_cookies(email=email, password=password)
    cookies = {cookie['name']: cookie['value'] for cookie in raw_cookies if
               cookie['name'] in ['MDL_SSP_AuthToken', 'MDL_SSP_SessID', 'MoodleSession']}

    # This is where I need to pull from QMPlus
    loader = WebBaseLoader(url)
    loader.requests_kwargs = {"cookies": cookies}
    documents = loader.load()

    # Split documents into smaller chunks
    text_splitter = RecursiveCharacterTextSplitter(chunk_size=1000, chunk_overlap=200)
    split_documents = text_splitter.split_documents(documents)

    embeddings_function = OpenAIEmbeddings(api_key=settings.OPENAI_API_KEY)
    documents_content = [document.page_content for document in split_documents]
    embeddings = embeddings_function.embed_documents(documents_content)

    for embedding, document in zip(embeddings, documents):
        module_instance = Module.objects.get(id=module_id)
        ModuleEmbedding.objects.create(
            module=module_instance,
            embedding_data=embedding,
            content=document.page_content,
        )
    return JsonResponse({'status': 'success', 'message': 'Module generated successfully'}, status=200)
