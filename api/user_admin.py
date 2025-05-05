from django.contrib import admin
from django.contrib.auth.admin import UserAdmin as BaseUserAdmin
from django.utils.translation import gettext_lazy as _
from .models import User

@admin.register(User)
class UserAdmin(BaseUserAdmin):
    """
    This is boilerplate code for a custom UserAdmin Django class,
    covered in https://docs.djangoproject.com/en/5.2/topics/auth/customizing/.
    All this does is add the is_module_organizer field to the User entry
    in the Django admin interface.
    """

    # Define the fields to display in the User list view
    list_display = ('username', 'email', 'first_name', 'last_name', 'is_module_organizer')

    # Add custom fields to the detail view
    fieldsets = (
        (None, {'fields': ('username', 'password')}),
        (_('Personal info'), {'fields': ('first_name', 'last_name', 'email',)}),
        (_('Permissions'), {'fields': ('is_active', 'is_staff', 'is_superuser', 'is_module_organizer', 'groups', 'user_permissions')}),
        (_('Important dates'), {'fields': ('last_login', 'date_joined')}),
    )

    # Fields for the add user form
    add_fieldsets = (
        (None, {
            'classes': ('wide',),
            'fields': ('username', 'password1', 'password2', 'email', 'is_module_organizer'),
        }),
    )

    # Add custom fields to search and filter functionality
    search_fields = ('username', 'email', 'first_name', 'last_name', 'is_module_organizer')
    list_filter = ('is_staff', 'is_superuser', 'is_active', 'is_module_organizer', 'groups')
