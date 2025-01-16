from django.contrib import admin

# Register your models here.

from .models import Module, ChatLog, ModuleEmbedding

admin.site.register(Module)
admin.site.register(ModuleEmbedding)
admin.site.register(ChatLog)