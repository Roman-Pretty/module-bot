from api.models import Module
from api.serializers import UserSerializer
from django.http import JsonResponse

def module_members(request, module_id):
    try:
        module = Module.objects.get(id=module_id)
    except Module.DoesNotExist:
        return JsonResponse({'error': 'Module not found'}, status=404)

    # Get users for each role and serialize them
    students = UserSerializer(module.students.all(), many=True).data
    demonstrators = UserSerializer(module.demonstrators.all(), many=True).data
    organizers = UserSerializer(module.organizers.all(), many=True).data

    # Combine data into a single response
    data = {
        'organizers': organizers,
        'demonstrators': demonstrators,
        'students': students,
    }

    return JsonResponse(data, safe=False)

