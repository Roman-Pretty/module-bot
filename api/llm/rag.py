from langchain_openai import ChatOpenAI
from langchain.chains.combine_documents import create_stuff_documents_chain
from langchain.chains.history_aware_retriever import create_history_aware_retriever
from langchain.chains.retrieval import create_retrieval_chain
from langchain_core.prompts import ChatPromptTemplate
from langchain_core.runnables.history import RunnableWithMessageHistory
from langchain_core.chat_history import BaseChatMessageHistory
from langchain_core.messages import BaseMessage
from pydantic import BaseModel
from pydantic import Field
from django.conf import settings
from api.llm.retrievers import DocumentRetriever


class InMemoryHistory(BaseChatMessageHistory, BaseModel):
    """
    The LangChain implementation of in-memory chat history. Modified to
    retrieve the two most relevant embeddings only for the currently selected module.
    """
    messages: list[BaseMessage] = Field(default_factory=list)

    def add_message(self, message: BaseMessage) -> None:
        """Add a self-created message to the store"""
        self.messages.append(message)

    def clear(self) -> None:
        self.messages = []


store = {}


def conversational_rag(
        condense_question_prompt_template,
        system_prompt_template,
        module_id,
):
    llm = ChatOpenAI(api_key=settings.OPENAI_API_KEY)
    condense_question_prompt = ChatPromptTemplate.from_messages(
        [
            ("system", condense_question_prompt_template),
            ("placeholder", "{chat_history}"),
            ("human", "{input}"),
        ],
    )
    history_aware_retriever = create_history_aware_retriever(
        llm,
        DocumentRetriever(module_id=module_id, max_results=2),
        condense_question_prompt,
    )
    qa_prompt = ChatPromptTemplate.from_messages(
        [
            ("system", system_prompt_template),
            ("placeholder", "{chat_history}"),
            ("human", "{input}"),
        ],
    )
    qa_chain = create_stuff_documents_chain(
        llm=llm,
        prompt=qa_prompt,
    )
    convo_qa_chain = create_retrieval_chain(history_aware_retriever, qa_chain)

    def get_session_history(session_id):
        if session_id not in store:
            store[session_id] = InMemoryHistory()
        return store[session_id]

    return RunnableWithMessageHistory(
        runnable=convo_qa_chain,
        get_session_history=get_session_history,
        input_messages_key="input",
        history_messages_key="chat_history",
        output_messages_key="answer",
    )
