import time

from selenium.webdriver import Keys
from selenium.webdriver.chrome import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options

def get_qmplus_cookies(email, password):
    """Get QMPlus cookies."""
    options = Options()
    options.add_argument("--headless")
    options.add_argument("--disable-gpu")
    driver = webdriver.WebDriver(options=options)
    driver.get('https://qmplus.qmul.ac.uk/auth/saml2/login.php?wants&idp=4eb950c6f0e1110dc8e14b5cf41532d7&passive=off')
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