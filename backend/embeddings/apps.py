from django.apps import AppConfig

class EmbeddingsConfig(AppConfig):
    default_auto_field = 'django.db.models.BigAutoField'
    name = 'embeddings'

    def ready(self):
        from . import signals
        signals.initialize_embeddings()
