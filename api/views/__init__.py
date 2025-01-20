from django.http import HttpRequest
from django.shortcuts import render

from .module_chat import *
from .modules import *
from .manage_chat_logs import *
from .generate_module import *
from .auth import *
from .usage_data import *
from .module_members import *
from .module_settings import *

def main_spa(request: HttpRequest, path=None) -> HttpResponse:
    return render(request, 'api/spa/index.html', {})