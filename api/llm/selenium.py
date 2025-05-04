import os
import time

from selenium.webdriver import Keys
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium import webdriver


def get_qmplus_cookies(email, password):
    """
    Uses selenium to log into QMPlus with the provided
    credentials, then returns all the cookies from the page.
    """

    options = webdriver.ChromeOptions()
    options.binary_location = os.environ.get("GOOGLE_CHROME_BIN")
    options.add_argument("--headless")
    options.add_argument("--disable-dev-shm-usage")
    options.add_argument("--no-sandbox")
    options.add_argument("--disable-notifications")
    service = Service(executable_path=os.environ.get("CHROMEDRIVER_PATH"))
    driver = webdriver.Chrome(service=service, options=options)

    # Navigate to QMPlus
    driver.get('https://qmplus.qmul.ac.uk/auth/saml2/login.php?wants&idp=4eb950c6f0e1110dc8e14b5cf41532d7&passive=off')

    # Try to login, is a bit of a hack as it uses rudimentary sleeping to wait for page
    # loads, I could probably use a more sophisticated waiting method in the future
    try:
        time.sleep(2)
        username_field = driver.find_element(By.NAME, "loginfmt")
        username_field.send_keys(email)
        username_field.send_keys(Keys.RETURN)
        time.sleep(2)
        password_field = driver.find_element(By.NAME, "passwd")
        password_field.send_keys(password)
        password_field.send_keys(Keys.RETURN)
        time.sleep(2)
    except Exception as e:
        print(e)

    cookies = driver.get_cookies()
    driver.quit()
    return cookies
