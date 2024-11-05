from django.db import models
from django.contrib.auth.models import User  # Use Django's built-in User model

# Module model stores course-related information
class Module(models.Model):
    course_id = models.CharField(max_length=20, unique=True)
    name = models.CharField(max_length=100)
    url = models.URLField()
    html = models.TextField()
    index_data = models.BinaryField(null=True, blank=True)
    students = models.ManyToManyField(User, related_name='modules', blank=True)

    def __str__(self):
        return f"{self.name} ({self.course_id})"

# ChatLog model that links users, modules, and their respective chat history
class ChatLog(models.Model):
    user = models.ForeignKey(User, on_delete=models.CASCADE, related_name='chatlogs')
    module = models.ForeignKey(Module, on_delete=models.CASCADE, related_name='chatlogs')
    timestamp = models.DateTimeField(auto_now_add=True)
    message = models.TextField()
    bot_message = models.BooleanField(default=False)

    def __str__(self):
        return f"ChatLog by {self.user.username} for {self.module.name} at {self.timestamp}. Bot message: {self.bot_message}"
