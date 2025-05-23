from django.http import HttpResponseBadRequest, StreamingHttpResponse
from api.models import Module, ChatLog
from api.llm.rag import conversational_rag
from backend import settings
from django.utils.timezone import now, timedelta


def get_current_semester_week():
    """
    Calculate the current semester week based on the start date
    This semester started on the 22nd January
    """
    start_date = now().replace(year=2025, month=1, day=22, hour=0, minute=0, second=0, microsecond=0)

    current_date = now()
    if current_date < start_date:
        return 0

    elapsed_days = (current_date - start_date).days
    week = elapsed_days // 7 + 1

    return week


def get_today():
    """
    Return todays date and the day of the week
    """
    today = now()
    return today.strftime("%A %d %B %Y")


def module_chat(request):
    """
    Takes a question, module id and user and generates a response using the
    conversational RAG model.
    """
    user_question = request.POST.get("question")
    module_id = request.POST.get("id")
    user = request.user
    chat_session_id = str(user.id) + '-' + str(module_id)

    if not user_question or not chat_session_id or not module_id or not user:
        return HttpResponseBadRequest()

    # Check if the module is enabled
    module = Module.objects.get(id=module_id)
    if not module.enabled:
        response_text = "ERROR:This module is currently disabled."
        return StreamingHttpResponse(response_text, content_type="text/event-stream")

    # Count the number of chat logs for the user and module in the last 1 hour
    one_hour_ago = now() - timedelta(hours=1)
    chat_logs = ChatLog.objects.filter(
        user_id=user.id,
        module_id=module_id,
        bot_message=False,
        timestamp__gte=one_hour_ago
    ).order_by('-timestamp')

    # If the user has asked 10 or more questions, return a message
    # This is to prevent spamming the model!
    if len(chat_logs) >= settings.QUESTION_LIMIT:
        available_at = chat_logs[0].timestamp + timedelta(hours=1)
        available_at = available_at.strftime("%H:%M")
        response_text = f"ERROR:You have reached the maximum number of questions for this module. Please try again after {available_at}."
        return StreamingHttpResponse(response_text, content_type="text/event-stream")

    # Prompt for condensing the question based on chat history
    # This prompt is based on the documentation by Pedro Beethoven referenced in the report.
    condense_question_prompt_template = """
         Given a chat history and the latest user question
         which might reference context in the chat history,
         formulate a standalone question which can be understood
         without the chat history. Do NOT answer the question,
         just reformulate it if needed and otherwise return it as is.
       """

    # Augment the question with the chat history, date and current semester week,
    # then provide the context to the model.
    system_prompt_template = f"""
        You are an assistant for answering university module questions.
        You should answer based on the provided context, and the conversation history.
        If you don't have any context just say "I'm sorry, but I can only answer questions relevant to {module.name}.".
        You may respond to greetings and other non-question prompts. Answer the question in the context that the
        current semester week is {get_current_semester_week()} and the date is {get_today()}.
        Note that reading week refers to week 7, and the weeks run wednesday to wednesday this year.
        Context: {'{context}'}
       """

    def message_stream():
        """
        This function streams the response from the RAG model to the client.
        It gives it the same kind of response as other chatbots such as
        ChatGPT, where it streams the response in chunks.

        This is also included ot make it clear to the user that they are receiving
        a response, an important design principle mentioned in the accompanying report.
        """
        response_text = ''
        data = {
            "input": user_question,
        }
        # See the llm package for the implementation of the RAG
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

        # AFTER a response is received, log the question and answer
        ChatLog.objects.create(
            user_id=user.id,
            module_id=module_id,
            message=user_question,
        )
        ChatLog.objects.create(
            user_id=user.id,
            module_id=module_id,
            message=response_text,
            bot_message=True,
        )

    return StreamingHttpResponse(message_stream(), content_type="text/event-stream")
