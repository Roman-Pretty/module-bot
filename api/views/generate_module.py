import bs4
import requests
from bs4 import SoupStrainer
from django.http import JsonResponse, HttpResponseBadRequest
from langchain_openai import OpenAIEmbeddings
from rest_framework.decorators import api_view
from api.llm.loader import InMemoryLoader
from api.models import Module, ModuleEmbedding, ModuleMember
from api.llm.selenium import get_qmplus_cookies
from backend import settings
from langchain_experimental.text_splitter import SemanticChunker


@api_view(['POST'])
def generate_module(request):
    """
    Generates a module based on the given link,
    name, and course ID.
    """

    # Get the required fields from the request
    fields = ['name', 'course_id', 'email', 'password', 'url']
    name, module_id, email, password, url = (request.POST.get(field) for field in fields)
    files = request.FILES.getlist('files')

    # Check if any of the required fields are missing
    if not name or not module_id or not email or not password or not url:
        return HttpResponseBadRequest("Missing required parameters")

    # Create or get the module instance
    module_instance, _ = Module.objects.get_or_create(
        id=module_id,
        name=name,
        url=url,
    )
    module_instance.save()

    # Create a module organizer membership for the user creating the module
    module_organizer = ModuleMember.objects.create(
        module=module_instance,
        user=request.user,
        role='Organizer',
    )

    # Authenticate with QMPlus and retrieve content
    raw_cookies = get_qmplus_cookies(email=email, password=password)
    cookies = {cookie['name']: cookie['value'] for cookie in raw_cookies if
               cookie['name'] in ['MDL_SSP_AuthToken', 'MDL_SSP_SessID', 'MoodleSession']}

    # Fetch the page content
    response = requests.get(url, cookies=cookies)
    if response.status_code != 200:
        return HttpResponseBadRequest("Failed to fetch module page")

    # Parse only relevant sections
    soup = bs4.BeautifulSoup(response.text, "html.parser",
                             parse_only=SoupStrainer(class_=["course-content", "drawercontent drag-container"]))

    page_content = soup.get_text(separator=" | ", strip=True)
    embeddings_function = OpenAIEmbeddings(api_key=settings.OPENAI_API_KEY)
    documents = SemanticChunker(embeddings_function).create_documents([page_content])

    # Load the content of the uploaded files
    for file in files:
        file_bytes = file.read()

        loader = InMemoryLoader(file_bytes=file_bytes)
        file_documents = loader.load()

        for document in file_documents:
            documents.append(document)

    documents_content = [document.page_content for document in documents]
    embeddings = embeddings_function.embed_documents(documents_content)

    # Iterate through each embedding and document pair
    for embedding, document in zip(embeddings, documents):
        ModuleEmbedding.objects.create(
            module=module_instance,
            embedding_data=embedding,
            content=document.page_content,
        )

    return JsonResponse({'status': 'success', 'message': 'Module generated successfully'}, status=200)


@api_view(['POST'])
def regenerate_module(request):
    """
    Similar to generate_module, but
    simply generates the information over the current embeddings,
    and deletes the old ones.
    """
    module_id = request.POST.get('module_id')
    email = request.POST.get('email')
    password = request.POST.get('password')
    files = request.FILES.getlist('files')

    if not module_id or not email or not password:
        return HttpResponseBadRequest("Missing required parameters")

    if not ModuleMember.objects.filter(module=module_id, user=request.user, role='Organizer').exists():
        return JsonResponse({'status': 'error', 'message': 'You do not have permission to regenerate this module'},
                            status=403)

    module_instance = Module.objects.get(id=module_id)
    module_embeddings = ModuleEmbedding.objects.filter(module=module_instance)
    module_embeddings.delete()

    # Authenticate with QMPlus and retrieve content
    raw_cookies = get_qmplus_cookies(email=email, password=password)
    cookies = {cookie['name']: cookie['value'] for cookie in raw_cookies if
               cookie['name'] in ['MDL_SSP_AuthToken', 'MDL_SSP_SessID', 'MoodleSession']}

    # Fetch the page content
    response = requests.get(module_instance.url, cookies=cookies)
    if response.status_code != 200:
        return HttpResponseBadRequest("Failed to fetch module page")

    # Parse only relevant sections
    soup = bs4.BeautifulSoup(response.text, "html.parser",
                             parse_only=SoupStrainer(class_=["course-content", "drawercontent drag-container"]))

    page_content = soup.get_text(separator=" | ", strip=True)
    embeddings_function = OpenAIEmbeddings(api_key=settings.OPENAI_API_KEY)
    documents = SemanticChunker(embeddings_function).create_documents([page_content])

    # Load the content of the uploaded files
    for file in files:
        file_bytes = file.read()

        loader = InMemoryLoader(file_bytes=file_bytes)
        file_documents = loader.load()

        for document in file_documents:
            documents.append(document)

    documents_content = [document.page_content for document in documents]
    embeddings = embeddings_function.embed_documents(documents_content)

    for embedding, document in zip(embeddings, documents):
        ModuleEmbedding.objects.create(
            module=module_instance,
            embedding_data=embedding,
            content=document.page_content,
        )

    return JsonResponse({'status': 'success', 'message': 'Module regenerated successfully'}, status=200)
