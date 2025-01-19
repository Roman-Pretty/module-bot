from django.db import models
from django.contrib.auth.models import AbstractUser
from pgvector.django import VectorField
from backend import settings

class User(AbstractUser):
    is_module_organizer = models.BooleanField(default=False)

# Module model stores course-related information
class Module(models.Model):
    id = models.CharField(max_length=100, unique=True, primary_key=True)
    name = models.CharField(max_length=100)
    url = models.URLField(max_length=300)

    members = models.ManyToManyField(settings.AUTH_USER_MODEL, through='ModuleMember')

    # Module settings
    enabled = models.BooleanField(default=True)
    enable_welcome_message = models.BooleanField(default=False)
    welcome_message = models.TextField(default="Welcome to Q-Module-Bot!")

    def __str__(self):
        return f"{self.name} ({self.id})"

class ModuleMember(models.Model):
    ROLE_CHOICES = [
        ('Student', 'Student'),
        ('Demonstrator', 'Demonstrator'),
        ('Organizer', 'Organizer'),
    ]
    module = models.ForeignKey(Module, on_delete=models.CASCADE)
    user = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.CASCADE)
    role = models.CharField(max_length=50, choices=ROLE_CHOICES)

    def __str__(self):
        return f'{self.user.username} as {self.role} in {self.module.name}'

class ModuleEmbedding(models.Model):
    module = models.ForeignKey(Module, on_delete=models.CASCADE, related_name='embeddings')
    embedding_data = VectorField(dimensions=settings.EMBEDDING_MODEL_DIMENSIONS)
    content = models.TextField()

    def __str__(self):
        return f"Embedding for {self.module.name} (ID: {self.id})"



# ChatLog model that links users, modules, and their respective chat_old history
class ChatLog(models.Model):
    user = models.ForeignKey(User, on_delete=models.CASCADE, related_name='chatlogs')
    module = models.ForeignKey(Module, on_delete=models.CASCADE, related_name='chatlogs')
    timestamp = models.DateTimeField(auto_now_add=True)
    message = models.TextField()
    bot_message = models.BooleanField(default=False)

    def __str__(self):
        return f"ChatLog by {self.user.username} for {self.module.name} at {self.timestamp}. Bot message: {self.bot_message}"
