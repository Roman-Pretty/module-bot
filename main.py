from dotenv import load_dotenv
from openai import OpenAI
import os
import pandas as pd
import numpy as np
from scipy import spatial
import ast
import tiktoken

load_dotenv()
client = OpenAI(api_key=os.getenv("OPENAI_API_KEY"))
COMPLETIONS_MODEL = "text-davinci-003"
EMBEDDING_MODEL = "text-embedding-ada-002"
GPT_MODEL = "gpt-4o-mini"

question = "What deadline is coming up next?"
module = "Undergraduate Project"
embeddings = "data/ug-embeddings.csv"

# Read data from the previously created embedding CSV file and convert the 'embedding' column to NumPy arrays
df = pd.read_csv(embeddings)
df['embedding'] = df['embedding'].apply(ast.literal_eval).apply(np.array)


# Function to calculate the number of tokens in a string
def num_tokens(text: str, model: str = GPT_MODEL) -> int:
    encoding = tiktoken.encoding_for_model(model)
    return len(encoding.encode(text))


# Function to rank strings based on relatedness to a given query
def strings_ranked_by_relatedness(query: str, data_frame: pd.DataFrame,
                                  relatedness_fn=lambda x, y: 1 - spatial.distance.cosine(x, y), top_n: int = 100) -> \
        tuple[list[str], list[float]]:
    query_embedding_response = client.embeddings.create(model=EMBEDDING_MODEL, input=query)
    query_embedding = query_embedding_response.data[0].embedding

    strings_and_relatednesses = [(row["content"], relatedness_fn(query_embedding, row["embedding"])) for i, row in
                                 data_frame.iterrows()]
    strings_and_relatednesses.sort(key=lambda x: x[1], reverse=True)
    strings, relatednesses = zip(*strings_and_relatednesses)

    return strings[:top_n], relatednesses[:top_n]


# Function to generate a query message for GPT
def query_message(query: str, data_frame: pd.DataFrame, model: str, token_budget: int) -> str:
    strings, relatednesses = strings_ranked_by_relatedness(query, data_frame)
    introduction = (f'Use the below articles on the {module} Module to answer the '
                    'subsequent question. If the answer cannot be found in the articles, write "I\'m sorry, '
                    'I could not find an appropriate answer."')
    query = f"\n\nQuestion: {query}"
    message = introduction

    for string in strings:
        next_article = f'\n\nInformation section:\n"""\n{string}\n"""'
        if num_tokens(message + next_article + query, model=model) > token_budget:
            break
        else:
            message += next_article

    return message + query


# Function to interact with GPT and generate an answer for the query
def ask(query: str, data_frame: pd.DataFrame = df, model: str = GPT_MODEL, token_budget: int = 4096 - 500,
        print_message: bool = False) -> str:
    message = query_message(query, data_frame, model=model, token_budget=token_budget)

    if print_message:
        print(message)

    messages = [
        {"role": "system", "content": f"You answer questions about the {module} module."},
        {"role": "user", "content": message},
    ]

    response = client.chat.completions.create(model=model, messages=messages, temperature=0)
    response_message = response.choices[0].message.content

    return response_message


# Call the ask function with the question and print the answer
answer = ask(question)
print("Answer:", answer)
