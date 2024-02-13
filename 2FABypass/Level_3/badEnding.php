
<?php
require '../conn.php';

$gifNames = array('banned1', 'banned2', 'banned3', 'banned4', 'banned5');
$randomGif = $gifNames[array_rand($gifNames)];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">


</head>
<body class="body-plus">
    <div class="container-plus">
        <div class="box-login-register d-flex justify-content-center ">

            <div class="Login-Register align-self-center mb-5">
                
               
                <div class="top-header">
                    <h3>GAME OVER</h3>
                </div>
                <div class="input-group-plus">
                    <div>
                    <img src="../img/<?php echo $randomGif; ?>.gif" width="300" height="250" />
                    </div>
                    <br>
                    <p class="d-flex justify-content-center fw-bold fs-5">You've made too many failed attempts.</p>
                    <br>
                    <div class="input-group-plus ">
                    <p class="d-flex justify-content-center mr-3 "><a href="../Level_3/restart.php" class="btn btn-info" role="button" data-bs-toggle="button">RESTART</a></p>
                    
                    <p class="d-flex justify-content-center"><a href="../index.php" class="btn btn-warning" role="button" data-bs-toggle="button">HOME</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>