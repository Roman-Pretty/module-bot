from django.http import JsonResponse
from datetime import datetime
from django.shortcuts import get_object_or_404
from .models import ChatLog, Module
from django.contrib.auth.models import User
import json

from django.http import JsonResponse
from datetime import datetime
from django.shortcuts import get_object_or_404
from .models import ChatLog, Module
from django.contrib.auth.models import User
import json


def embedding_response(request):
    from .signals import chat_engine

    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            user_input = data.get('message', '')
            username = data.get('username')
            course_id = data.get('module_id')

            if not user_input or not username or not course_id:
                return JsonResponse({'error': 'Missing message, username, or module ID'}, status=400)

            user = get_object_or_404(User, username=username)
            module = get_object_or_404(Module, course_id=course_id)

            if not chat_engine:
                return JsonResponse({'response': 'Chat engine not initialized'}, status=500)

            response = chat_engine.chat(
                "You are only allowed to answer questions based on the provided embeddings. Do not mention you are providing a response based on the embeddings or information provided."
                f" today's date is {datetime.now().strftime('%d/%m/%Y %H:%M:%S')}, but don't repeat it unless asked to. Use this information when answering questions based on what to do now or in the future."
                f" if you do not know the answer, please direct the user to the appropriate contact. Please ensure your responses are lengthy if needed and accurate."
                f" Please ensure your responses are structured clearly and nicely. Here is your message: {user_input}"
            )

            # Save both user message and bot response in chat log
            ChatLog.objects.create(
                user=user,
                module=module,
                message=user_input,
                bot_message=False
            )
            ChatLog.objects.create(
                user=user,
                module=module,
                message=response,
                bot_message=True
            )

            return JsonResponse({'response': str(response)})

        except Exception as e:
            print(f"Server error: {e}")
            return JsonResponse({'error': 'Internal Server Error'}, status=500)

    return JsonResponse({'error': 'Invalid request method'}, status=400)


def set_current_module(request):
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            course_id = data.get('course_id')

            module = Module.objects.get(course_id=course_id)
            from .signals import initialize_embeddings
            initialize_embeddings(module_id=course_id)

            return JsonResponse({'status': 'success', 'message': f'Module switched to {module.name}'})
        except Module.DoesNotExist:
            return JsonResponse({'status': 'error', 'message': 'Module not found'}, status=404)
        except json.JSONDecodeError:
            return JsonResponse({'status': 'error', 'message': 'Invalid JSON'}, status=400)

    return JsonResponse({'status': 'error', 'message': 'Invalid request method'}, status=405)


def get_chatlogs(request):
    username = request.GET.get('username', 'roman')  # Get the username, TODO: remove default value
    course_id = request.GET.get('course_id', 'ECS417U')  # Get the course_id TODO: remove default value

    user = get_object_or_404(User, username=username)
    module = get_object_or_404(Module, course_id=course_id)

    # Fetch the chat logs for the specified user and module
    chatlogs = ChatLog.objects.filter(user=user, module=module).order_by('timestamp')

    # Prepare data to send to the frontend
    data = [
        {
            'message': log.message,
            'bot': log.bot_message
        }
        for log in chatlogs
    ]
    return JsonResponse(data, safe=False)


def clear_chatlogs(request):
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            username = data['username']
            module_id = data['module_id']

            # Get the user and module
            user = User.objects.get(username=username)
            module = Module.objects.get(course_id=module_id)

            # Delete all chat logs for this user and module
            ChatLog.objects.filter(user=user, module=module).delete()

            return JsonResponse({'status': 'success', 'message': 'Chat logs cleared successfully'}, status=200)
        except Exception as e:
            return JsonResponse({'status': 'error', 'message': str(e)}, status=400)

    return JsonResponse({'status': 'error', 'message': 'Invalid request method'}, status=405)


def get_bots(request):
    if request.method == 'GET':
        # Fetch all modules/bots
        modules = Module.objects.all()

        # Prepare data to send to the frontend
        data = [
            {
                'course_id': module.course_id,
                'name': module.name
            }
            for module in modules
        ]

        # Return data as JSON response
        return JsonResponse(data, safe=False)
    else:
        return JsonResponse({'error': 'Invalid request method'}, status=400)
