from rest_framework.decorators import api_view
from rest_framework.response import Response
from api.models import ModuleMember
from api.serializers import ModuleSerializer


@api_view(['GET'])
def modules(request):
    if not request.user:
        return Response({'message': 'Not logged in'}, status=401)

    memberships = ModuleMember.objects.filter(user=request.user)
    registered_modules = [m.module for m in memberships]

    return Response(ModuleSerializer(registered_modules, many=True).data)