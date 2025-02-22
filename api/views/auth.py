from django.http import JsonResponse
from django.views.decorators.csrf import ensure_csrf_cookie
import json
from django.contrib.auth import authenticate, login, logout
from rest_framework.decorators import api_view
from rest_framework.response import Response


@ensure_csrf_cookie
@api_view(['GET'])
def set_csrf_token(request):
    """
    We set the CSRF cookie on the frontend.
    """
    return Response({'message': 'CSRF token successfully set.'}, status=200)


@api_view(['POST'])
def login_view(request):
    try:
        data = json.loads(request.body.decode('utf-8'))
        username = data['username']
        password = data['password']
    except json.JSONDecodeError:
        return Response(
            {'success': False, 'message': 'Invalid JSON'}, status=400
        )

    user = authenticate(request, username=username, password=password)
    if user:
        login(request, user)
        return JsonResponse({'success': True})
    return Response(
        {'success': False, 'message': 'Invalid credentials'}, status=401
    )


@api_view(['POST'])
def logout_view(request):
    logout(request)
    return Response({'message': 'Logged out'})


@api_view(['GET'])
def user(request):
    if request.user.is_authenticated:
        return Response(
            {'username': request.user.username, 'email': request.user.email, 'id': request.user.id,
             'is_module_organizer': request.user.is_module_organizer}
        )
    return Response(
        {'message': 'Not logged in'}, status=401
    )
