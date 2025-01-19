from rest_framework.decorators import api_view
from rest_framework.response import Response
from api.models import Module
from api.serializers import ModuleSettingsSerializer


@api_view(['GET', 'PUT'])
def module_settings(request, module_id):
    if request.method == 'GET':
        return Response(ModuleSettingsSerializer(Module.objects.get(id=module_id)).data)
    elif request.method == 'PUT':
        module = Module.objects.get(id=module_id)
        module.enable_welcome_message = request.POST.get('enable_welcome_message', module.enable_welcome_message)
        module.welcome_message = request.POST.get('welcome_message', module.welcome_message)
        module.enabled = request.POST.get('enabled', module.enabled)
        module.name = request.POST.get('name', module.name)
        module.save()
        return Response(ModuleSettingsSerializer(module).data)
