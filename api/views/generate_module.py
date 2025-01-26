from io import BytesIO

from django.http import JsonResponse, HttpResponseBadRequest
from langchain_openai import OpenAIEmbeddings
from rest_framework.decorators import api_view
from langchain_community.document_loaders import WebBaseLoader
from api.llm.loader import RomanLoader
from api.models import Module, ModuleEmbedding, ModuleMember
from api.llm.selenium import get_qmplus_cookies
from backend import settings


@api_view(['POST'])
def generate_module(request):
    print(request.user)

    name = request.POST.get('name')
    module_id = request.POST.get('course_id')
    email = request.POST.get('email')
    password = request.POST.get('password')
    url = request.POST.get('url')
    files = request.FILES.getlist('files')

    if not name or not module_id or not email or not password or not url:
        return HttpResponseBadRequest("Missing required parameters")

    # Create or get the module instance
    module_instance, _ = Module.objects.get_or_create(
        id=module_id,
        name=name,
        url=url,
    )
    module_instance.save()

    module_organizer = ModuleMember.objects.create(
        module=module_instance,
        user=request.user,
        role='Organizer',
    )

    # Authenticate with QMPlus and retrieve content
    raw_cookies = get_qmplus_cookies(email=email, password=password)
    cookies = {cookie['name']: cookie['value'] for cookie in raw_cookies if
               cookie['name'] in ['MDL_SSP_AuthToken', 'MDL_SSP_SessID', 'MoodleSession']}
    loader = WebBaseLoader(url)
    loader.requests_kwargs = {"cookies": cookies}
    documents = loader.load()

    for file in files:
        file_bytes = file.read()

        loader = RomanLoader(file_bytes=file_bytes)
        file_documents = loader.load()

        for document in file_documents:
            documents.append(document)

    embeddings_function = OpenAIEmbeddings(api_key=settings.OPENAI_API_KEY)
    documents_content = [document.page_content for document in documents]
    embeddings = embeddings_function.embed_documents(documents_content)

    for embedding, document in zip(embeddings, documents):
        ModuleEmbedding.objects.create(
            module=module_instance,
            embedding_data=embedding,
            content=document.page_content,
        )

    return JsonResponse({'status': 'success', 'message': 'Module generated successfully'}, status=200)


@api_view(['POST'])
def regenerate_module(request):
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

    raw_cookies = get_qmplus_cookies(email=email, password=password)
    cookies = {cookie['name']: cookie['value'] for cookie in raw_cookies if
               cookie['name'] in ['MDL_SSP_AuthToken', 'MDL_SSP_SessID', 'MoodleSession']}
    loader = WebBaseLoader(module_instance.url)
    loader.requests_kwargs = {"cookies": cookies}
    documents = loader.load()

    for file in files:
        file_bytes = file.read()

        loader = RomanLoader(file_bytes=file_bytes)
        file_documents = loader.load()

        for document in file_documents:
            documents.append(document)

    embeddings_function = OpenAIEmbeddings(api_key=settings.OPENAI_API_KEY)
    documents_content = [document.page_content for document in documents]
    embeddings = embeddings_function.embed_documents(documents_content)

    for embedding, document in zip(embeddings, documents):
        ModuleEmbedding.objects.create(
            module=module_instance,
            embedding_data=embedding,
            content=document.page_content,
        )

    return JsonResponse({'status': 'success', 'message': 'Module regenerated successfully'}, status=200)

