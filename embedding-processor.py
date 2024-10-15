import pandas as pd
from dotenv import load_dotenv
from PyPDF2 import PdfReader
import re
from transformers import GPT2TokenizerFast
from openai import OpenAI
import os

# Load environment variables from .env file
load_dotenv()

# Set up OpenAI client with API key
client = OpenAI(api_key=os.getenv("OPENAI_API_KEY"))

# Read the PDF file
reader = PdfReader("data/UG_Guide.pdf")
pdf_text = ""

# Extract text from each page of the PDF
for page in reader.pages:
    pdf_text += page.extract_text() + "\n"

# Create a dictionary to store the section documents
section_dict = {}

# Iterate through each page of the PDF document
for i, page in enumerate(reader.pages):
    text = page.extract_text()
    text = re.sub(r'[^\w\s]', '', text)  # Remove punctuation
    section_dict[i] = text

# Create a pandas DataFrame with the documents
dataframe = pd.DataFrame.from_dict(section_dict, orient='index', columns=['content'])

# Create a new column 'heading' with the first five words of each section
dataframe['heading'] = dataframe['content'].str.extract(r'((?:\w+\W+){0,1}\w+)')

# Create a new column 'title' with the document title
dataframe['title'] = 'UG_Guide'

# Reorder columns
columns_titles = ["title", "heading", "content"]
dataframe = dataframe.reindex(columns=columns_titles)
dataframe.index.name = 'page'

# Create a tokenizer
tokenizer = GPT2TokenizerFast.from_pretrained('gpt2')

# Define a function to count the number of tokens in a text string
def count_tokens(text: str, tokenizer: GPT2TokenizerFast) -> int:
    return len(tokenizer.encode(text, add_special_tokens=False))

# Count the number of tokens in the 'content' column of the dataframe
dataframe['tokens'] = dataframe['content'].apply(lambda x: count_tokens(x, tokenizer))

# Define the get_embedding function to retrieve embeddings using OpenAI API
def get_embedding(text: str) -> list:
    try:
        response = client.embeddings.create(model='text-embedding-ada-002',
        input=text)
        return response.data[0].embedding  # Return the embedding vector
    except Exception as e:
        print(f"Error getting embedding: {e}")
        return None  # Return None if there's an error

# Apply the get_embedding function to the 'content' column of the dataframe
dataframe['embedding'] = dataframe['content'].apply(get_embedding)

# Save the DataFrame to a CSV file
dataframe.to_csv('data/ug-embeddings.csv', index=True)
