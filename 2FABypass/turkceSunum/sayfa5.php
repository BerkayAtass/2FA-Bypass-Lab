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
                    <h2>2FA Katagorileri Nedir?</h2>
                </div>
                <div class="input-group-plus">
                <p class="d-flex justify-content-center fw-bold fs-5">
                2FA, kullanıcının kimliğini doğrulamak için iki parça bilgi (veya faktör) sağlamasını gerektiren bir kimlik doğrulama yöntemidir. 
                Bu faktörler genellikle aşağıdaki kategorilerden birine girer:
                </p>

                <p class="d-flex fw-bold fs-5">
                1 -Bildiğiniz bir şey (Something you know)
                </p>
                <p class="d-flex fw-bold fs-5">
                2 - Sahip olduğunuz bir şey (Something you have)
                </p>
                <p class="d-flex fw-bold fs-5">
                3 - Olduğunuz bir şey (Something you are)
                </p>
                <p class="d-flex fw-bold fs-5">
                4 - Bulunduğunuz bir yer (Somewhere you are) 
                </p>
                <p class="d-flex fw-bold fs-5">
                5 - Yaptığınız bir şey (Something you do) 
                </p>
                
                <div class="d-flex justify-content-center mt-5" style="position: relative;">
                    <img src="../img/2FA_konserce.jpg" width="550" height="400" style="position: absolute; right: 100px; top: -250px; z-index: -1;" />
                </div>

                <div class="d-flex justify-content-between mt-5" style="position: relative; bottom: -180px;">
                    <p><a href="sayfa4.php" class="btn btn-warning" role="button" data-bs-toggle="button">BACK</a></p>
                    <p><a href="sayfa6.php" class="btn btn-info" role="button" data-bs-toggle="button">NEXT</a></p>
                </div>


                </div>
            </div>
        </div>
    </div>
    
</body>
</html>