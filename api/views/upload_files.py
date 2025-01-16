from rest_framework.decorators import api_view
from rest_framework.response import Response
from django.conf import settings
import os


@api_view(['POST'])
def upload_files(request):
    data_folder = os.path.join(settings.BASE_DIR, '../data')
    os.makedirs(data_folder, exist_ok=True)

    files = request.FILES.getlist('files')
    for file in files:
        file_path = os.path.join(data_folder, file.name)
        with open(file_path, 'wb+') as destination:
            for chunk in file.chunks():
                destination.write(chunk)

        return Response({'status': 'success', 'message': 'Files uploaded successfully'})
    return Response({'status': 'error', 'message': 'Invalid request method'}, status=400)
