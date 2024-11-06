from django.urls import path
from . import views

urlpatterns = [
    path('embedding_response/', views.embedding_response, name='embedding_response'),
    path('chatlogs/', views.get_chatlogs, name='get_chatlogs'),
    path('clear-chatlogs/', views.clear_chatlogs, name='clear_chatlogs'),
    path('get_bots/', views.get_bots, name='get_bots'),
    path('set_current_module/', views.set_current_module, name='set_current_module'),
    path('generate-module/', views.generate_module, name='generate_module'),
    path('upload-files/', views.upload_files, name='upload_files'),
]

#TODO: Follow URL naming conventions