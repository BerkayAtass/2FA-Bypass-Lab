<?php 
require '../conn.php';

$numbers = range(0, 9999); 
shuffle($numbers); 
$generateCode = str_pad($numbers[0], 4, '0', STR_PAD_LEFT);
$hashedCode = md5($generateCode);

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
                
            <?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>

                <div class="top-header">
                    <h3>Login</h3>
                </div>
                <div class="input-group-plus">
                    <form method="POST" action="confirmCode.php">
                    <div class="input-field">
                        <input type="text" class="input-box" id="mail" name="email" required>
                        <label for="mail">E-mail</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="pass" name="password" required>
                        <label for="pass">Password</label>
                    </div>
                   
                    <input type="hidden" name="hashedCode" value="<?php echo $hashedCode; ?>">
                    <input type="hidden" name="generateCode" value="<?php echo $generateCode; ?>">


                    <button class="input-submit input-field">Login</button>
                    <p>Is this too much for you? <a href="../index.php" class="btn btn-secondary" role="button" data-bs-toggle="button">HOME</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>