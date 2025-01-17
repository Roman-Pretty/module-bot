from django.urls import path
from . import views

urlpatterns = [

    # Conversation API
    path('embedding-response/', views.module_chat, name='embedding_response'),
    path('chat-logs/', views.manage_chat_logs, name='manage_chat_logs'),
    path('modules', views.modules, name='modules'),

    # Generate Module API
    path('generate-module/', views.generate_module, name='generate_module'),

    # Auth API
    path('set-csrf-token', views.set_csrf_token, name='set_csrf_token'),
    path('login', views.login_view, name='login_view'),
    path('logout', views.logout_view, name='logout_view'),
    path('user', views.user, name='user'),
    path('register', views.register, name='register'),

    # Dashboard API
    path('chart-data/<str:module_id>/', views.chart_data, name='chart_data'),
    path('chat-summary/<str:module_id>/', views.chat_summary, name='chat_summary'),

]

#TODO: Follow URL naming conventions