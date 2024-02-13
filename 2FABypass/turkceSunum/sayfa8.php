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
                    <h2>2FA'nın dezavantajları nelerdir?</h2>
                </div>
                <div class="input-group-plus">
               
                <p class="d-flex fw-bold fs-5">
                Kullanıcı Dostu Değil: 2FA'nın kullanımı, kullanıcılar için ek bir adım gerektirir ve bu bazen zahmetli olabilir. 
                Özellikle mobil SMS ile göndermeyi sürdürme kodlarını bekleyip, kullanıcı deneyimi olumsuz etkilenebilir.
                </p>
                <p class="d-flex fw-bold fs-5">
                Teknolojik Sorunlar: 2FA, teknik sorunlarla karşılaşılabilir. Örneğin, SMS ile gönderilen kodların gecikmesi veya 
                hiç gelmemesi gibi sorunlar, kullanıcıların erişim sorunları yaşamasına neden olabilir.
                </p>
                <p class="d-flex fw-bold fs-5">
                Yedek Kilitlerin Kaybedilmesi: 2FA'da genellikle yedek kurtarma kodları veya anahtarlar kullanılır. Bu kodlar veya anahtarlar 
                saklanırsa, bunların tümüne erişim kaybedilir. Bu nedenle kullanıcıların bu yedekleri korumaları önemlidir.
                </p>
                <div class="d-flex justify-content-center mt-5" style="position: relative;">
                    <img src="../img/2FA3.gif" width="450" height="300" style="position: absolute; z-index: -1;" />
                </div>
               
                <div class="d-flex justify-content-between mt-5" style="position: relative; bottom: -250px;">
                    <p><a href="sayfa7.php" class="btn btn-warning" role="button" data-bs-toggle="button">BACK</a></p>
                    <p><a href="../index.php" class="btn btn-info" role="button" data-bs-toggle="button">FINISH</a></p>
                </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>