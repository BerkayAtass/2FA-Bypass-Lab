<?php 
require '../conn.php';
$email = "N/A";
$password = "N/A";
$hashedCode = "N/A";
$generateCode = "N/A";


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['hashedCode']) && isset($_POST['generateCode'])){
     $email = $_POST['email'];
     $password = $_POST['password'];
     $hashedCode = $_POST['hashedCode'];
     $generateCode = $_POST['generateCode'];

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

                    <button class="input-submit input-field">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>