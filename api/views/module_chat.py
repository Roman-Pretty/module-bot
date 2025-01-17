from django.http import JsonResponse, HttpResponseBadRequest, StreamingHttpResponse
from langchain_openai import OpenAIEmbeddings
from langchain_community.document_loaders import PyMuPDFLoader
from dotenv import load_dotenv
import os

from api.models import Module, ModuleEmbedding, ChatLog
from api.rag import conversational_rag
from api.selenium import get_qmplus_cookies


def module_chat(request):
    user_question = request.POST.get("question")
    module_id = request.POST.get("id")
    user = request.user
    chat_session_id = str(user.id) + '-' + str(module_id)

    if not user_question or not chat_session_id or not module_id or not user:
        return HttpResponseBadRequest()

    ChatLog.objects.create(
        user_id=user.id,
        module_id=module_id,
        message=user_question,
    )
    condense_question_prompt_template = """
         Given a chat history and the latest user question
         which might reference context in the chat history,
         formulate a standalone question which can be understood
         without the chat history. Do NOT answer the question,
         just reformulate it if needed and otherwise return it as is.
       """
    system_prompt_template = """
        You are an assistant for answering questions.
        You should answer based on the provided context, and the conversation history.
        If you don't have any context, or the question is not relevant to the context just say
        "I'm sorry, but I can only answer questions relevant to this module.". If the question
        asks you to write something or to write code, just say "I'm sorry, but I can't do your work for you!".
        Context: {context}
       """
    def message_stream():
        response_text = ''
        data = {
            "input": user_question,
        }
        rag_chain = conversational_rag(
            condense_question_prompt_template,
            system_prompt_template,
            module_id
        )
        for chunk in rag_chain.stream(
                data,
                {"configurable": {"session_id": chat_session_id}},
        ):
            response_text += chunk.get("answer", "")
            yield chunk.get("answer", "")
        ChatLog.objects.create(
            user_id=user.id,
            module_id=module_id,
            message=response_text,
            bot_message=True,
        )

    return StreamingHttpResponse(message_stream(), content_type="text/event-stream")
