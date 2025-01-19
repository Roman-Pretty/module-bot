import io
from django.http import JsonResponse, HttpResponseBadRequest
from langchain_openai import OpenAIEmbeddings
from rest_framework.decorators import api_view
from langchain_community.document_loaders import WebBaseLoader
from langchain_unstructured import UnstructuredLoader
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

    #Authenticate with QMPlus and retrieve content
    raw_cookies = get_qmplus_cookies(email=email, password=password)
    cookies = {cookie['name']: cookie['value'] for cookie in raw_cookies if
               cookie['name'] in ['MDL_SSP_AuthToken', 'MDL_SSP_SessID', 'MoodleSession']}
    loader = WebBaseLoader(url)
    loader.requests_kwargs = {"cookies": cookies}
    documents = loader.load()

    for file in files:
        file_stream = io.BytesIO()
        file_stream.write(file.read())
        file_stream.seek(0)  # Reset the stream's position to the beginning

        # Provide a metadata_filename to indicate the file type
        loader = UnstructuredLoader(file=file_stream, metadata_filename=file.name)
        file_documents = loader.load()

        # Append loaded documents to the main list
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

