from django.db.models import Q
from rest_framework.decorators import api_view
from rest_framework.response import Response
from api.models import Module
from api.serializers import ModuleSerializer


@api_view(['GET'])
def modules(request):
    if not request.user:
        return Response({'message': 'Not logged in'}, status=401)

    registered_modules = Module.objects.filter(
        Q(organizers=request.user) | Q(students=request.user)
    ).distinct().order_by('name')

    return Response(ModuleSerializer(registered_modules, many=True).data)
