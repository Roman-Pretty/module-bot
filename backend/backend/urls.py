from django.contrib import admin
from django.urls import path, include  # Import include to link app URLs

urlpatterns = [
    path('admin/', admin.site.urls),  # Admin panel URL
    path('api/', include('api.urls')),  # Include the URLs from 'api' app
]
