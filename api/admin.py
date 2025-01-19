from django.contrib import admin

# Register your models here.

from .models import Module, ChatLog, ModuleEmbedding, User, ModuleMember
from .user_admin import UserAdmin

# We need to unregister the default User model before registering our custom User model
try:
    admin.site.unregister(User)
except:
    pass

admin.site.register(User, UserAdmin)
admin.site.register(Module)
admin.site.register(ModuleMember)
admin.site.register(ModuleEmbedding)
admin.site.register(ChatLog)