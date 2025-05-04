from rest_framework import serializers
from .models import Module, ChatLog, User, ModuleMember


class ModuleMemberSerializer(serializers.ModelSerializer):
    """
    Serializer for ModuleMember model, simply returning the
    member_id and role fields.
    """
    member_id = serializers.PrimaryKeyRelatedField(queryset=User.objects.all(), source='user')
    role = serializers.CharField()

    class Meta:
        model = ModuleMember
        fields = ('member_id', 'role')


class ModuleSerializer(serializers.ModelSerializer):
    """
    Serializer for Module model, returning the id, name, url,
    enable_welcome_message, and welcome_message fields.
    """

    class Meta:
        model = Module
        fields = ('id', 'name', 'url', 'enable_welcome_message', 'welcome_message')


class ModuleSettingsSerializer(serializers.ModelSerializer):
    """
    Serializer for Module model, returning the id, name, url,
    enable_welcome_message, welcome_message, and enabled fields.
    """

    class Meta:
        model = Module
        fields = 'id', 'name', 'url', 'enable_welcome_message', 'welcome_message', 'enabled'


class ChatLogSerializer(serializers.ModelSerializer):
    """
    Serializer for ChatLog model, returning all fields.
    """

    class Meta:
        model = ChatLog
        fields = '__all__'


class UserSerializer(serializers.ModelSerializer):
    """
    Serializer for User model, returning the id, username,
    email, and is_module_organizer fields.
    """

    class Meta:
        model = User
        fields = 'id', 'username', 'email', 'is_module_organizer'
