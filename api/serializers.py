from rest_framework import serializers

from backend import settings
from .models import Module, ChatLog, User, ModuleMember


class ModuleMemberSerializer(serializers.ModelSerializer):
    member_id = serializers.PrimaryKeyRelatedField(queryset=User.objects.all(), source='user')
    role = serializers.CharField()

    class Meta:
        model = ModuleMember
        fields = ('member_id', 'role')


class ModuleSerializer(serializers.ModelSerializer):
    members = ModuleMemberSerializer(source='modulemember_set', many=True)

    class Meta:
        model = Module
        fields = ('id', 'name', 'url', 'enable_welcome_message', 'welcome_message', 'members')


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
