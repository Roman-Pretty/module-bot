from django.http import HttpResponseForbidden
from rest_framework.decorators import api_view
from rest_framework.response import Response
from api.models import ModuleMember
from api.serializers import ModuleSerializer


@api_view(['GET'])
def modules(request):
    """
    Returns all the modules that the user is registered in.
    This is used for the sidebar in the frontend to allow users
    to select a module to chat with.
    """
    if not request.user:
        return Response({'message': 'Not logged in'}, status=401)

    memberships = ModuleMember.objects.filter(user=request.user)
    registered_modules = [m.module for m in memberships]

    return Response(ModuleSerializer(registered_modules, many=True).data)

@api_view(['GET'])
def organized_modules(request):
    """
    The same as modules, but only returns the modules that the user is
    an organizer of.
    """
    if not request.user:
        return Response({'message': 'Not logged in'}, status=401)
    elif not request.user.is_module_organizer:
        return HttpResponseForbidden()

    memberships = ModuleMember.objects.filter(user=request.user, role='Organizer')
    registered_modules = [m.module for m in memberships]

    return Response(ModuleSerializer(registered_modules, many=True).data)