from rest_framework.decorators import api_view
from rest_framework.response import Response
from django.shortcuts import get_object_or_404
# from django.contrib.auth.models import User
from api.models import Module, ChatLog, User
from api.serializers import ChatLogSerializer


@api_view(['GET', 'DELETE'])
def manage_chat_logs(request):
    try:
        username = request.user.username
        id = request.GET.get('id', '')

        # Validate user and module
        user = get_object_or_404(User, username=username)
        module = get_object_or_404(Module, id=id)

        if request.method == 'GET':
            # Fetch chat_old logs
            chat_logs = ChatLog.objects.filter(user=user, module=module).order_by('timestamp')
            serializer = ChatLogSerializer(chat_logs, many=True)
            return Response(serializer.data)

        elif request.method == 'DELETE':
            # Clear chat_old logs
            ChatLog.objects.filter(user=user, module=module).delete()
            return Response({'status': 'success', 'message': 'Chat logs cleared successfully'}, status=200)

    except Exception as e:
        return Response({'status': 'error', 'message': str(e)}, status=400)
