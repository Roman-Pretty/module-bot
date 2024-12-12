from rest_framework.decorators import api_view
from rest_framework.response import Response

from api.models import Module
from api.serializers import ModuleSerializer

@api_view(['GET'])
def get_bots(request):
    return Response(ModuleSerializer(Module.objects.all(), many=True).data)