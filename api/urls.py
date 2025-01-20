from django.urls import path
from . import views

urlpatterns = [

    # Conversation API
    path('embedding-response/', views.module_chat, name='embedding_response'),
    path('chat-logs/', views.manage_chat_logs, name='manage_chat_logs'),
    path('modules', views.modules, name='modules'),

    # Generate Module API
    path('generate-module/', views.generate_module, name='generate_module'),
    path('regenerate-module/', views.regenerate_module, name='regenerate_module'),

    # Auth API
    path('set-csrf-token', views.set_csrf_token, name='set_csrf_token'),
    path('login', views.login_view, name='login_view'),
    path('logout', views.logout_view, name='logout_view'),
    path('user', views.user, name='user'),
    path('register', views.register, name='register'),

    # Dashboard API
    path('chart-data/<str:module_id>/', views.chart_data, name='chart_data'),
    path('chat-summary/<str:module_id>/', views.chat_summary, name='chat_summary'),
    path('download-chat-logs/<str:module_id>/', views.download_chat_logs, name='download_chat_logs'),
    path('module-settings/<str:module_id>/', views.module_settings, name='module_settings'),

    # Module Users API
    path('module-members/<str:module_id>/', views.module_members, name='module_users'),
    path('all-users/<str:module_id>/', views.users_not_in_module, name='all_users'),
    path('add-member/<str:module_id>/', views.add_member_to_module, name='add_member_to_module'),
    path('update-member/<str:module_id>/', views.update_member, name='update_member'),
    path('remove-member/<str:module_id>/<str:user_id>/', views.remove_member, name='remove_member'),

    # Profile API
    path('user-summary/', views.user_summary, name='user_summary'),

]

#TODO: Follow URL naming conventions