from django.urls import path
from . import views

urlpatterns = [

    # Conversation API
    path('embedding-response/', views.embedding_response, name='embedding_response'),
    path('chat-logs/', views.manage_chat_logs, name='manage_chat_logs'),
    path('get_bots/', views.get_bots, name='get_bots'),
    path('set-current-module/', views.set_current_module, name='set_current_module'),

    # Generate Module API
    path('generate-module/', views.generate_module, name='generate_module'),
    path('upload-files/', views.upload_files, name='upload_files'),

    # Auth API
    path('set-csrf-token', views.set_csrf_token, name='set_csrf_token'),
    path('login', views.login_view, name='login_view'),
    path('logout', views.logout_view, name='logout_view'),
    path('user', views.user, name='user'),
    path('register', views.register, name='register'),

]

#TODO: Follow URL naming conventions