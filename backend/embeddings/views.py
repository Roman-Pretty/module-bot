from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from . import chat_engine
from datetime import datetime
from django.shortcuts import get_object_or_404
from .models import ChatLog, Module
from django.contrib.auth.models import User
import json

@csrf_exempt  # Remove this for production
def embedding_response(request):
    try:
        if request.method == 'POST':
            print("Request data:", request.body)
            user_input = request.POST.get('message', '')
            if chat_engine and user_input:
                response = chat_engine.chat(
                    "You are only allowed to answer questions based on the provided embeddings. Do not mention you are providing a response based on the embeddings or information provided."
                    f" today's date is {datetime.now().strftime('%d/%m/%Y %H:%M:%S')}, but don't repeat it unless asked to. Use this information when answering questions based on what to do now or in the future."
                    f" if you do not know the answer, please direct the user to the appropriate contact. Please ensure your responses are lengthy if needed and accurate." #TODO: change the word lengthy
                    f" For new lines please use <br/><br/> and for headers use <strong>. Please ensure your responses are structured clearly and nicely. Here is your message: {user_input}")
                return JsonResponse({'response': str(response)})

            return JsonResponse({'error': 'No message provided'}, status=400)

        return JsonResponse({'error': 'Invalid request method'}, status=400)
    except Exception as e:
        print(f"Server error: {e}")
        return JsonResponse({'error': 'Internal Server Error'}, status=500)

@csrf_exempt  # Remove this for production
def get_chatlogs(request):
    # Filter user by username 'roman'
    user = get_object_or_404(User, username='roman')

    # Filter module by course_id 'ECS417U'
    module = get_object_or_404(Module, course_id='ECS417U')

    # Get the chat logs for the specified user and module, ordered by timestamp
    chatlogs = ChatLog.objects.filter(user=user, module=module).order_by('timestamp')

    # Prepare data to send to the frontend
    data = [
        {
            'message': log.message,
            'bot': log.bot_message
        }
        for log in chatlogs
    ]
    # Return the data as a JSON response
    return JsonResponse(data, safe=False)

@csrf_exempt  # Disable CSRF protection for simplicity (only in development)
def save_chatlog(request):
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            user = User.objects.get(username=data['username'])  # Assume you send 'username'
            module = Module.objects.get(course_id=data['module_id'])  # Assume you send 'module_id'
            message = data['message']
            bot_message = data.get('bot_message', False)  # Defaults to False if not provided

            # Save the chat log entry
            chatlog = ChatLog.objects.create(
                user=user,
                module=module,
                message=message,
                bot_message=bot_message
            )

            return JsonResponse({'status': 'success', 'message': 'Chat log saved successfully'}, status=201)

        except Exception as e:
            return JsonResponse({'status': 'error', 'message': str(e)}, status=400)

    return JsonResponse({'status': 'error', 'message': 'Invalid request method'}, status=405)

@csrf_exempt  # Disable CSRF protection for simplicity (only in development)
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

