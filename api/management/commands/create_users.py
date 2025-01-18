from django.core.management.base import BaseCommand
from django.contrib.auth.models import User
import csv
import secrets
from faker import Faker
import random


class Command(BaseCommand):
    help = 'Create users with AdjectiveNoun usernames and export them to a CSV file.'

    def handle(self, *args, **options):
        adjectives = self.load_csv("data/adjectives.csv")
        nouns = self.load_csv("data/nouns.csv")

        fake = Faker()
        num_users = 10
        csv_file_path = "data/users.csv"

        csv_data = []

        for _ in range(num_users):
            # Generate AdjectiveNoun username (Like Kahoot!)
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

            csv_data.append({"Username": username, "Password": password})

        # Write data to CSV
        with open(csv_file_path, mode="w", newline="", encoding="utf-8") as file:
            writer = csv.DictWriter(file, fieldnames=["Username", "Password"])
            writer.writeheader()
            writer.writerows(csv_data)

        self.stdout.write(self.style.SUCCESS(f"{num_users} users created and exported to {csv_file_path}"))

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
