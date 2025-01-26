import os
import tempfile
from abc import ABC
from pathlib import Path, PurePath
from typing import (
    Iterator,
    Optional,
    Union,
)
from urllib.parse import urlparse

import requests
from langchain_core.documents import Document

from langchain_community.document_loaders.base import BaseLoader
from langchain_community.document_loaders.blob_loaders import Blob
from langchain_community.document_loaders.parsers.pdf import (
    PyPDFParser,
)

class BasePDFLoader(BaseLoader, ABC):
    """Edited Base Loader class for `PDF` files with support for file bytes."""

    def __init__(
            self,
            file_input: Optional[Union[bytes, str, PurePath]],
            *,
            headers: Optional[dict] = None
    ) -> None:
        """Initialize with either byte data or a file path."""
        self.file_bytes = None
        self.file_path = None
        self.web_path = None
        self.headers = headers

        if isinstance(file_input, bytes):
            # If the input is bytes, use it directly
            self.file_bytes = file_input
        elif isinstance(file_input, (str, PurePath)):
            # If it's a file path, process as usual
            self.file_path = str(file_input)
            if "~" in self.file_path:
                self.file_path = os.path.expanduser(self.file_path)

            if not os.path.isfile(self.file_path) and self._is_valid_url(self.file_path):
                self._download_temp_file(self.file_path)

            elif not os.path.isfile(self.file_path):
                raise ValueError(f"File path {self.file_path} is not a valid file or URL")

        else:
            raise ValueError("Invalid input type. Provide either bytes or a file path.")

        self.parser = PyPDFParser(
            password=None,
            extract_images=False,
            extraction_mode="plain",
            extraction_kwargs=None,
        )

    def _download_temp_file(self, file_url: str):
        """Helper method to download file if it's a web path or URL."""
        self.temp_dir = tempfile.TemporaryDirectory()
        _, suffix = os.path.splitext(file_url)
        temp_pdf = os.path.join(self.temp_dir.name, f"tmp{suffix}")
        self.web_path = file_url
        r = requests.get(file_url, headers=self.headers)
        if r.status_code != 200:
            raise ValueError(f"Failed to download the file: {r.status_code}")

        with open(temp_pdf, mode="wb") as f:
            f.write(r.content)
        self.file_path = temp_pdf

    def lazy_load(self) -> Iterator[Document]:
        """Lazy load given data as pages, either from bytes or file path."""
        if self.file_bytes:
            # If file_bytes is set, use BytesIO to simulate file-like behavior
            blob = Blob.from_data(self.file_bytes, path="in-memory.pdf")
        else:
            # Otherwise, use the file path (either local or temp file)
            blob = Blob.from_path(self.file_path)

        yield from self.parser.parse(blob)

    def __del__(self) -> None:
        """Cleanup temporary files if they were used."""
        if hasattr(self, "temp_dir"):
            self.temp_dir.cleanup()

    @staticmethod
    def _is_valid_url(url: str) -> bool:
        """Check if the URL is valid."""
        parsed = urlparse(url)
        return bool(parsed.netloc) and bool(parsed.scheme)

    @property
    def source(self) -> str:
        return self.web_path if self.web_path is not None else self.file_path


class RomanLoader(BasePDFLoader):
    def __init__(
            self,
            file_bytes: bytes,
            password: Optional[Union[str, bytes]] = None,
            headers: Optional[dict] = None,
            extract_images: bool = False,
            *,
            extraction_mode: str = "plain",
            extraction_kwargs: Optional[dict] = None,
    ) -> None:
        """Initialize with byte data."""
        try:
            import pypdf
        except ImportError:
            raise ImportError(
                "pypdf package not found, please install it with `pip install pypdf`"
            )

        # Call the parent constructor with file_bytes
        super().__init__(file_input=file_bytes, headers=headers)

        # Initialize the parser with custom settings
        self.parser = PyPDFParser(
            password=password,
            extract_images=extract_images,
            extraction_mode=extraction_mode,
            extraction_kwargs=extraction_kwargs,
        )

    def lazy_load(self) -> Iterator[Document]:
        """Lazy load given bytes as pages."""
        # Use Blob.from_data() to create a Blob from the byte data
        blob = Blob.from_data(self.file_bytes, path="in-memory.pdf")
        yield from self.parser.parse(blob)
