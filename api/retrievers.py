from langchain_core.callbacks import CallbackManagerForRetrieverRun
from langchain_core.documents import Document
from langchain_core.retrievers import BaseRetriever
from pgvector.django import CosineDistance
from langchain_openai import OpenAIEmbeddings
from django.conf import settings
from api.models import ModuleEmbedding, Module


class DocumentRetriever(BaseRetriever):
    max_results: int
    module_id: str

    class Config:
        arbitrary_types_allowed = True

    def _get_relevant_documents(
            self,
            query: str,
            *,
            run_manager: CallbackManagerForRetrieverRun,
    ) -> list[Document]:
        embeddings_function = OpenAIEmbeddings(api_key=settings.OPENAI_API_KEY)
        embeddings = embeddings_function.embed_documents([query])
        documents = ModuleEmbedding.objects.filter(
            module__id=self.module_id
        ).annotate(
            distance=CosineDistance("embedding_data", embeddings[0])
        ).order_by("distance")

        return [
            Document(
                page_content=document.content,
            )
            for document in documents[:self.max_results]
        ]