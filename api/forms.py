from django import forms
from api.models import User
# from django.contrib.auth.models import User

class CreateUserForm(forms.ModelForm):
    class Meta:
        model = User
        fields = ['username', 'password']

    def save(self, commit=True) -> User:
        user = super().save(commit=False)
        user.username = self.cleaned_data["username"]
        user.set_password(self.cleaned_data["password"])
        if commit:
            user.save()
        return user
