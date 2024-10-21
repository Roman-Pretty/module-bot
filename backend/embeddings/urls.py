from django.urls import path
from . import views

urlpatterns = [
    path('embedding/', views.embedding_response, name='embedding_response'),
]
