<?php 
require '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">


</head>
<body class="body-plus">
    <div class="container-plus ">
        <div class="box-login-register d-flex justify-content-center " style="width: 1500px; height: 750px; ">

            <div class="Login-Register align-self-center mb-5 " style="width: 1450px; height: 700px;">
    
                <div class="top-header">
                    <h2>Banka Örneği</h2>
                </div>
                <div class="input-group-plus">
               
                <p class="d-flex fw-bold fs-5">
                Birinci Faktör - Kullanıcı Adı ve Şifre
                </p>
                <p class="d-flex fw-bold fs-5">
                İkinci Faktör – Tek Kullanımlık PIN (OTP)
                </p>
                <p class="d-flex fw-bold fs-5">
                OTP Doğrulaması
                </p>
                <div class="d-flex justify-content-center mt-5" style="position: relative;">
                    <img src="../img/banka.png" width="750" height="520" style="position: absolute; right: 140px; top: -170px; z-index: -1;" />
                </div>

                <div class="d-flex justify-content-between mt-5" style="position: relative; bottom: -350px;">
                    <p><a href="sayfa5.php" class="btn btn-warning" role="button" data-bs-toggle="button">BACK</a></p>
                    <p><a href="sayfa7.php" class="btn btn-info" role="button" data-bs-toggle="button">NEXT</a></p>
                </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>