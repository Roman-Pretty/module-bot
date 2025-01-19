# from django.contrib.auth.models import User
from rest_framework import serializers

from .models import Module, ChatLog, User


class ModuleSerializer(serializers.ModelSerializer):
    class Meta:
        model = Module
        fields = 'id', 'name', 'url', 'organizers', 'enable_welcome_message', 'welcome_message'


class ModuleSettingsSerializer(serializers.ModelSerializer):
    class Meta:
        model = Module
        fields = 'id', 'name', 'url', 'enable_welcome_message', 'welcome_message', 'enabled'


class ChatLogSerializer(serializers.ModelSerializer):
    class Meta:
        model = ChatLog
        fields = '__all__'

class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = User
        fields = 'id', 'username', 'email', 'is_module_organizer'