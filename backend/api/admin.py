from django.contrib import admin

# Register your models here.

from .models import Module, ChatLog

admin.site.register(Module)
admin.site.register(ChatLog)