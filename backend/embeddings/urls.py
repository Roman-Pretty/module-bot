from django.urls import path
from . import views

urlpatterns = [
    path('embedding/', views.embedding_response, name='embedding_response'),
    path('chatlogs/', views.get_chatlogs, name='get_chatlogs'),
    path('save-chatlog/', views.save_chatlog, name='save_chatlog'),
    path('clear-chatlogs/', views.clear_chatlogs, name='clear_chatlogs'),
    path('get_bots/', views.get_bots, name='get_bots'),

]
