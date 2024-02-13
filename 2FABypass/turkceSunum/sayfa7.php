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
                    <h2>2FA Bypass'ta Denenebilecek Yöntemler Nelerdir?</h2>
                </div>
                <div class="input-group-plus">
               
                <p class="d-flex fw-bold fs-5">
                1 - Sonunda yanıtı 1 (başarı için) veya 0 (başarısızlık için) olarak gösteren bir mesaj varsa, numarayı değiştirmeyi deneyin ve bunu atlayıp atlayamayacağınıza bakın.                </p>
                <p class="d-flex fw-bold fs-5">
                2 - SUCCESS veya FAILURE gibi bir mesaj varsa, şartları değiştirmeyi deneyin ve bunu atlayıp atlayamayacağınıza bakın.                </p>
                <p class="d-flex fw-bold fs-5">
                3 - OTP'nin nasıl oluşturulduğunu kontrol edin, talep ettiğiniz her OTP için size sıralı numaralar veriyorsa bir sonraki girişinizde bir sonraki numarayı deneyin.                </p>
                <p class="d-flex fw-bold fs-5">
                4 - OTP parametresini brute force atmayi deneyin.                </p>
                <p class="d-flex fw-bold fs-5">
                5 - OTP parametresini istekten tamamen kaldırmayı deneyin, iletin ve atlayıp atlayamayacağınıza bakın.                </p>
                <p class="d-flex fw-bold fs-5">
                {email:'abc@abc.abc', OTP:'123456'} ifadesini {email:'abc@abc.abc'} olarak değiştirmeyi deneyin                </p>
                <p class="d-flex fw-bold fs-5">
                6 - OTP yerine NULL veya BLANK değeri vermeyi deneyin ve bypass edip edemeyeceğinize bakın.                </p>
                <p class="d-flex fw-bold fs-5">
                {OTP:'123456'} değerini {OTP:"} olarak değiştirmeyi deneyin                </p>
                <p class="d-flex fw-bold fs-5">
                {OTP:'123456'} değerini {OTP:'null'} olarak değiştirmeyi deneyin                </p>
               
           
                <div class="d-flex justify-content-between mt-5" style="position: relative; bottom: -50px;">
                    <p><a href="sayfa6.php" class="btn btn-warning" role="button" data-bs-toggle="button">BACK</a></p>
                    <p><a href="sayfa8.php" class="btn btn-info" role="button" data-bs-toggle="button">NEXT</a></p>
                </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>