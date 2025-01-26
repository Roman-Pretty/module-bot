import csv

from django.core.management.base import BaseCommand
import secrets
from faker import Faker
import random
from ...models import User, Module, ModuleMember


class Command(BaseCommand):
    help = "Create users with AdjectiveNoun usernames, assign them to a module, and print credentials."

    def add_arguments(self, parser):
        parser.add_argument(
            '--num-users',
            type=int,
            default=10,
            help="Number of users to create (default: 10)"
        )
        parser.add_argument(
            '--module-id',
            type=str,
            required=True,
            help="Module ID to assign users to"
        )

    def handle(self, *args, **options):
        num_users = options['num_users']
        module_id = options['module_id']

        # Verify the module exists
        try:
            module = Module.objects.get(id=module_id)
        except Module.DoesNotExist:
            self.stdout.write(self.style.ERROR(f"Module with ID {module_id} does not exist."))
            return

        adjectives = self.load_csv("data/adjectives.csv")
        nouns = self.load_csv("data/nouns.csv")

        if not adjectives or not nouns:
            self.stdout.write(self.style.ERROR("Adjectives or nouns file missing or empty."))
            return

        fake = Faker()
        users_data = []

        for _ in range(num_users):
            # Generate AdjectiveNoun username
            adjective = random.choice(adjectives)
            noun = random.choice(nouns)
            username = f"{adjective}{noun}"

            # Ensure username is unique
            while User.objects.filter(username=username).exists():
                adjective = random.choice(adjectives)
                noun = random.choice(nouns)
                username = f"{adjective}{noun}"

            password = secrets.token_urlsafe(8)
            user = User.objects.create_user(username=username, password=password)

            # Assign user to the module
            ModuleMember.objects.create(user=user, module=module, role="Student")

            users_data.append({"Username": username, "Password": password})

        # Print credentials in a comma-delimited format
        print("\nGenerated Users (copy and paste into Excel):\n")
        print("Username,Password")
        for user in users_data:
            print(f"{user['Username']},{user['Password']}")
        print("\nCopy and save these credentials securely.")

    def load_csv(self, file_path):
        """Load words from a CSV file into a list."""
        words = []
        try:
            with open(file_path, mode="r", newline="", encoding="utf-8") as file:
                reader = csv.reader(file)
                for row in reader:
                    if row:
                        words.append(row[0].strip())
        except FileNotFoundError:
            self.stdout.write(self.style.ERROR(f"File {file_path} not found"))
            return []
        return words
