import os
import time
from datetime import datetime
from unittest.mock import patch

from django.contrib.staticfiles.testing import StaticLiveServerTestCase
from django.test import TestCase, LiveServerTestCase
from selenium.webdriver.chrome.webdriver import WebDriver

from api.views import get_current_semester_week, get_today
from django.contrib.auth import get_user_model


class UnitTests(TestCase):
    """
    Unit tests for the simple functions, views are tested below with E2E tests.
    """

    def test_get_today(self):
        """
        Test the get_today function to ensure it returns the correct date format.
        """
        print("Testing get_today function...")
        mock_date = datetime(2025, 2, 1)
        with patch('api.views.module_chat.now', return_value=mock_date):
            today = get_today()
            assert today == "Saturday 01 February 2025", f"Expected 'Saturday 01 February 2025', but got {today}"

    def test_get_current_semester_week(self):
        """
        Test the get_current_semester_week function to ensure it returns the correct week number.
        """
        print("Testing get_current_semester_week function...")
        mock_date = datetime(2025, 2, 1)
        with patch('api.views.module_chat.now', return_value=mock_date):
            week = get_current_semester_week()
            assert week == 2, f"Expected week 2, but got {week}"


class EndToEndTests(StaticLiveServerTestCase):
    """
    End-to-end tests for the views. Uses selenium to test the frontend's
    interaction with the backend. We have to use StaticLiveServerTestCase
    instead of LiveServerTestCase because the latter does not support
    static files (which our whole frontend is based on).
    """

    @classmethod
    def setUpClass(cls):
        super().setUpClass()
        cls.selenium = WebDriver()
        cls.selenium.implicitly_wait(4)
        cls.selenium.set_window_size(980, 1060)

    @classmethod
    def tearDownClass(cls):
        cls.selenium.quit()
        super().tearDownClass()


    def _login(self):
        """
        Login as module organizer user for testing
        using the web driver
        """
        User = get_user_model()
        if User.objects.filter(username='admin').exists():
            User.objects.get(username='admin').delete()
        module_organizer = User.objects.create_user(
            username='admin',
            password='password',
            is_module_organizer=True,
            is_active=True
        )
        module_organizer.save()
        self.selenium.get(f"{self.live_server_url}/login/")
        time.sleep(0.1)

        username_input = self.selenium.find_element("id", "username")
        username_input.send_keys('admin')
        time.sleep(0.1)

        password_input = self.selenium.find_element("id", "password")
        password_input.send_keys('password')
        time.sleep(0.1)

        login_button = self.selenium.find_element("xpath", "//button[contains(text(), 'Login')]")
        login_button.click()
        time.sleep(2)

    def _logout(self):
        """
        Logout from the module organizer account
        """
        self.selenium.get(f"{self.live_server_url}/logout")
        time.sleep(0.1)

    def test_login(self):
        """
        Test the module login functionality.
        """
        print("Testing login functionality...")
        self._login()
        time.sleep(0.1)

        # Check if the user is redirected to the home
        current_url = self.selenium.current_url
        assert current_url == f"{self.live_server_url}/", f"Expected {self.live_server_url}/, but got {current_url}"

    def test_incorrect_login(self):
        """
        Test the login functionality with incorrect credentials.
        """
        print("Testing incorrect login functionality...")
        self._logout()
        self.selenium.get(f"{self.live_server_url}/login/")
        time.sleep(0.1)

        username_input = self.selenium.find_element("id", "username")
        username_input.send_keys('wrong_user')
        time.sleep(0.1)

        password_input = self.selenium.find_element("id", "password")
        password_input.send_keys('wrong_password')
        time.sleep(0.1)

        login_button = self.selenium.find_element("xpath", "//button[contains(text(), 'Login')]")
        login_button.click()
        time.sleep(2)

        # Check if the user is still on the login page
        current_url = self.selenium.current_url
        assert current_url == f"{self.live_server_url}/login/", f"Expected {self.live_server_url}/login/, but got {current_url}"


    def test_dashboard(self):
        """
        Test the dashboard functionality. What this is really
        testing is that links are correctly setup to work with Vue router,
        as if not configured correctly this will throw an error.
        """
        print("Testing dashboard functionality...")

        self._login()
        time.sleep(0.1)

        # Navigate to the dashboard
        self.selenium.get(f"{self.live_server_url}/dashboard/")
        time.sleep(0.1)

        # Check if the user is redirected to the dashboard
        current_url = self.selenium.current_url
        assert current_url == f"{self.live_server_url}/dashboard/", f"Expected {self.live_server_url}/dashboard/, but got {current_url}"
        self._logout()


    def test_generate_module(self):
        """
        Tests generating a module.
        IMPORTANT! If the .env file does not contain the entries
        QMPLUS_EMAIL and QMPLUS_PASSWORD, this test will fail.

        This is so that I don't leak my credentials accidentally.
        """
        print("Testing module generation...")

        # Get the email and password from the .env file
        qmplus_email = os.getenv("QMPLUS_EMAIL")
        qmplus_password = os.getenv("QMPLUS_PASSWORD")
        if not qmplus_email or not qmplus_password:
            print("QMPLUS_EMAIL and QMPLUS_PASSWORD must be set in the .env file.")
            return

        self._login()
        time.sleep(0.1)

        # Navigate to the module generation page
        self.selenium.get(f"{self.live_server_url}/addmodule/")
        time.sleep(0.1)

        # Find the first input field and enter the module name
        module_name_input = self.selenium.find_element("xpath", "//input[@placeholder='Module Name']")
        module_name_input.send_keys("Final Year Project")

        # Find the second input field and enter the module code
        module_code_input = self.selenium.find_element("xpath", "//input[@placeholder='Module Code']")
        module_code_input.send_keys("ECS635U")
        time.sleep(0.1)

        # Find the third input field and enter the module url
        module_url_input = self.selenium.find_element("xpath", "//input[@placeholder='Module URL']")
        module_url_input.send_keys("https://qmplus.qmul.ac.uk/course/view.php?id=26137")
        time.sleep(0.1)

        # Enter the Staff email from the .env file
        staff_email_input = self.selenium.find_element("xpath", "//input[@placeholder='Staff Email']")
        staff_email_input.send_keys(qmplus_email)
        time.sleep(0.1)

        # Enter the Staff password from the .env file
        staff_password_input = self.selenium.find_element("xpath", "//input[@placeholder='Password']")
        staff_password_input.send_keys(qmplus_password)
        time.sleep(0.1)

        # Click the Next button
        next_button = self.selenium.find_element("xpath", "//button[contains(text(), 'Next')]")
        next_button.click()
        time.sleep(0.1)

        # Click the next Next button
        next_button = self.selenium.find_element("xpath", "//button[contains(text(), 'Next')]")
        next_button.click()
        time.sleep(0.1)

        # Click the Submit button, then wait for it to generate
        submit_button = self.selenium.find_element("xpath", "//button[contains(text(), 'Submit')]")
        submit_button.click()
        time.sleep(60)

        # If there is a li anywhere in the sidebar (nav) assert true
        sidebar = self.selenium.find_element("tag name", "nav")
        sidebar_items = sidebar.find_elements("tag name", "li")
        assert len(sidebar_items) > 0, "Module was not created successfully or sidebar is empty"