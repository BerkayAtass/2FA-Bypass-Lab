<?php 
require '../conn.php';
$email = "N/A";
$password = "N/A";
$hashedCode = "N/A";
$generateCode = "N/A";
$attempts = "N/A";



if (isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['hashedCode']) && isset($_REQUEST['generateCode']) && isset($_REQUEST['attempts'])){
     $email = $_REQUEST['email'];
     $password = $_REQUEST['password'];
     $hashedCode = $_REQUEST['hashedCode'];
     $generateCode = $_REQUEST['generateCode'];
     $attempts = $_REQUEST['attempts'];

     if ($attempts <= 0) {
        header("Location: badEnding.php");
        exit;
    }

}else{
    $em  = "Form inputs is required";
    header("Location: login.php?error=$em");
    exit;
}
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
    <div class="container">
        <div class="box-email" >
                <div class="email align-self-center mb-5  ">
                    <div class="d-flex justify-content-start ">
                        <h4>victim@gmail.com   Code ------------ </h4>
                    </div>
                    
                   
                    <div class="code-list">
                    <ol>
                       
                            <li class="list">
                            <div class="list-field">
                                <strong class="list-field" ><?php echo $generateCode; ?></strong>
                            <div>
                            </li>
                    
                    
                    </ol>
                    </div>
                    
                    
            </div>
        </div>
    </div>
    <div class="container-plus">
        <div class="box-code d-flex justify-content-center ">

            <div class="Login-Register align-self-center mb-5">
            
            <?php if (isset($_REQUEST['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_REQUEST['error']?>
			</div>
			<?php } ?>
               
                <div class="top-header">
                    <h3>Code</h3>
                </div>
                <div class="input-group-plus">

                    <form action="loginQuery.php" method="POST">
                   
                    <div class="input-field">
                        <input type="password" class="input-box" name="code" required>
                        <label for="text">Code</label>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                    <input type="hidden" name="hashedCode" value="<?php echo $hashedCode; ?>">
                    <input type="hidden" name="attempts" value="<?php echo $attempts; ?>">
                    <input type="hidden" name="generateCode" value="<?php echo $generateCode; ?>">


                    <button class="input-submit input-field">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>