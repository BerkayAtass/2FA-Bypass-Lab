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
                    <h2>FIDO (Fast IDentity Online)  Nedir?</h2>
                </div>
                <div class="input-group-plus">
               
                <p class="d-flex justify-content-center fw-bold fs-5">
                Eski "bildiğiniz bir şey" (şifre veya parola) ifadesini ortadan kaldırır ve onu "sahip olduğunuz bir şey" (jeton veya değerlendirilebilir) ve 
                "olduğunuz bir şey" (parmak izi, ses, yüz, iris) ile değiştirir.
                </p>
                <div class="d-flex justify-content-center mt-5">
                    <img src="../img/2fa_10.gif" width="550" height="400" />
                </div>
                <div class="d-flex justify-content-between mt-5">
                    <p><a href="sayfa3.php" class="btn btn-warning" role="button" data-bs-toggle="button">BACK</a></p>
                    <p><a href="sayfa5.php" class="btn btn-info" role="button" data-bs-toggle="button">NEXT</a></p>
                </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>