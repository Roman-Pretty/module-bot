# Generated by Django 5.1.5 on 2025-01-17 20:46

from django.conf import settings
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('api', '0010_remove_module_icon'),
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.AddField(
            model_name='module',
            name='demonstrators',
            field=models.ManyToManyField(blank=True, related_name='demonstrated_modules', to=settings.AUTH_USER_MODEL),
        ),
    ]
