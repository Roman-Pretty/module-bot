from rest_framework import serializers

from .models import Module, ChatLog


class ModuleSerializer(serializers.ModelSerializer):
    class Meta:
        model = Module
        fields = 'id', 'name', 'url', 'organizers'

class URLModuleSerializer(serializers.ModelSerializer):
    class Meta:
        model = Module
        fields = 'url'

class ChatLogSerializer(serializers.ModelSerializer):
    class Meta:
        model = ChatLog
        fields = '__all__'
