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
                    <h2>2FA Nedir?</h2>
                </div>
                <div class="input-group-plus">
               
                <p class="d-flex justify-content-center fw-bold fs-5">
                    2FA (İki Faktörlü Kimlik Doğrulama), şifre tabanlı kimlik doğrulama yöntemine ekstra bir koruma katmanı ekleyen bir güvenlik protokolüdür.
                    2FA'nın yanına bir faktör daha eklediğimizde MFA oluyor. MFA (Çok Faktörlü Kimlik Doğrulama), 2FA'nın bir üst versiyonu olarak düşünülebilir.
                </p>
                <div class="d-flex justify-content-center mt-5">
                    <img src="../img/2FA.gif" width="550" height="400" />
                </div>
                <div class="d-flex justify-content-between mt-5">
                    <p><a href="sayfa2.php" class="btn btn-warning" role="button" data-bs-toggle="button">BACK</a></p>
                    <p><a href="sayfa4.php" class="btn btn-info" role="button" data-bs-toggle="button">NEXT</a></p>
                </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>