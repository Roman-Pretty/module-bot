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
    Set the CSRF cookie on the frontend. This is nicely
    handled by the @ensure_csrf_cookie decorator.
    """
    return Response({'message': 'CSRF token successfully set.'}, status=200)


@api_view(['POST'])
def login_view(request):
    """
    The login API. It authenticates the user using django's built-in authenticate
    method, and starts a session using django's built-in login method if
    authentication is successful.
    """
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
    """
    Very simple logout using django's built-in logout method.
    """
    logout(request)
    return Response({'message': 'Logged out'})


@api_view(['GET'])
def user(request):
    """
    Get the current user's information. Used in the frontend
    after logging in to get the user's information (to display
    the dashboard, etc.)
    """
    if request.user.is_authenticated:
        return Response(
            {'username': request.user.username, 'email': request.user.email, 'id': request.user.id,
             'is_module_organizer': request.user.is_module_organizer}
        )
    return Response(
        {'message': 'Not logged in'}, status=401
    )
