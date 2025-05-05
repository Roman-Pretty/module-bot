import json

from api.models import Module, User
from api.serializers import UserSerializer
from django.http import JsonResponse
from django.db.models import Q
from django.core.paginator import Paginator

# This handles the members of a module, and is used mainly in the
# members panel of the dashboard.

def module_members(request, module_id):
    """
    Retrieves all the members of a module and their roles.
    """
    try:
        module = Module.objects.get(id=module_id)
    except Module.DoesNotExist:
        return JsonResponse({'error': 'Module not found'}, status=404)

    members = module.members.all()

    # Combine data into a single response
    data = {
        'organizers': UserSerializer(members.filter(modulemember__role='Organizer'), many=True).data,
        'demonstrators': UserSerializer(members.filter(modulemember__role='Demonstrator'), many=True).data,
        'students': UserSerializer(members.filter(modulemember__role='Student'), many=True).data,
    }

    return JsonResponse(data, safe=False)


def users_not_in_module(request, module_id):
    """
    Retrieves all the users that are not in a module.
    Useful for the add members modal in the frontend.
    """
    search_query = request.GET.get('search', '').strip()
    page = request.GET.get('page', 1)
    users_per_page = 40

    users_already_in_module = Module.objects.get(id=module_id).members.all().values_list('id', flat=True)
    users = User.objects.exclude(id__in=users_already_in_module).filter(is_active=True, is_staff=False).order_by(
        'username')

    if search_query:
        users = users.filter(Q(username__icontains=search_query))

    paginator = Paginator(users, users_per_page)
    paginated_users = paginator.get_page(page)

    serialized_users = UserSerializer(paginated_users.object_list, many=True).data

    response = {
        "users": serialized_users,
        "total_pages": paginator.num_pages,
        "current_page": paginated_users.number
    }

    return JsonResponse(response, safe=False)


def add_member_to_module(request, module_id):
    """
    Adds a user to a module with a specific role.
    Simply creates a new ModuleMember object for the pair.
    """
    try:
        module = Module.objects.get(id=module_id)
    except Module.DoesNotExist:
        return JsonResponse({'error': 'Module not found'}, status=404)

    user_id = request.POST.get('user_id')
    role = request.POST.get('role')

    if not user_id or not role:
        return JsonResponse({'error': 'Missing user_id or role'}, status=400)

    try:
        user = User.objects.get(id=user_id)
    except User.DoesNotExist:
        return JsonResponse({'error': 'User not found'}, status=404)

    module.members.add(user, through_defaults={'role': role})

    return JsonResponse({'success': 'User added to module'}, status=200)


def update_member(request, module_id):
    """
    Updates the role of a user in a module.
    Useful for promoting members to demonstrators or organizers,
    though as mentioned in the models class demonstrators currently have
    no additional permissions.
    """
    if request.method == 'PUT':
        try:
            module = Module.objects.get(id=module_id)
        except Module.DoesNotExist:
            return JsonResponse({'error': 'Module not found'}, status=404)

        try:
            data = json.loads(request.body)
            user_id = data.get('user_id')
            role = data.get('role')
        except json.JSONDecodeError:
            return JsonResponse({'error': 'Invalid JSON'}, status=400)

        if not user_id or not role:
            return JsonResponse({'error': 'Missing user_id or role'}, status=400)

        try:
            user = User.objects.get(id=user_id)
        except User.DoesNotExist:
            return JsonResponse({'error': 'User not found'}, status=404)

        module.members.through.objects.filter(user=user, module=module).update(role=role)
        return JsonResponse({'success': 'User role updated'}, status=200)
    return JsonResponse({'error': 'Invalid method'}, status=405)


def remove_member(request, module_id, user_id):
    """
    Removes a user from a module by simply deleting the ModuleMember object.
    """
    try:
        module = Module.objects.get(id=module_id)
    except Module.DoesNotExist:
        return JsonResponse({'error': 'Module not found'}, status=404)

    if not user_id:
        return JsonResponse({'error': 'Missing user_id'}, status=400)

    try:
        user = User.objects.get(id=user_id)
    except User.DoesNotExist:
        return JsonResponse({'error': 'User not found'}, status=404)

    module.members.remove(user)
    return JsonResponse({'success': 'User removed from module'}, status=200)
