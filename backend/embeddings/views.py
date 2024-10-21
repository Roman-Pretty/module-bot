from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from . import chat_engine
from datetime import datetime

@csrf_exempt  # Remove this for production
def embedding_response(request):
    try:
        if request.method == 'POST':
            print("Request data:", request.body)
            user_input = request.POST.get('message', '')
            if chat_engine and user_input:
                response = chat_engine.chat(
                    "You are only allowed to answer questions based on the provided embeddings. Do not mention you are providing a response based on the embeddings or information provided."
                    f" today's date is {datetime.now().strftime('%d/%m/%Y %H:%M:%S')}, but don't repeat it unless asked to."
                    f" if you do not know the answer, please direct the user to the appropriate contact."
                    f"Here is your message: {user_input}")
                return JsonResponse({'response': str(response)})

            return JsonResponse({'error': 'No message provided'}, status=400)

        return JsonResponse({'error': 'Invalid request method'}, status=400)
    except Exception as e:
        print(f"Server error: {e}")
        return JsonResponse({'error': 'Internal Server Error'}, status=500)
