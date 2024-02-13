<?php 
require '../conn.php';

if (isset($_REQUEST['email']) && isset($_REQUEST['password'])  ){
     $email = $_REQUEST['email'];
     $password = $_REQUEST['password'];
     //$hashedCode = $_REQUEST['hashedCode'];
     //$generateCode = $_REQUEST['generateCode'];
     $answer = "Los Angeles";

     
     $userIP = $_SERVER['REMOTE_ADDR'];

     if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
     }
     
     $query = $conn->prepare("SELECT visit_count FROM blacklist WHERE ip_number = :ip_number");
     $query->bindParam(':ip_number', $userIP);
     $query->execute();
     $array = $query->fetchAll(PDO::FETCH_ASSOC);
     //BURADA KALDIK
     $attempts = $array[0]["visit_count"];
     //var_dump($attempts);
     if ( intval($attempts) <= 0) {
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
<script language='javascript' type='text/javascript'>
function DisableBackButton() {
window.history.forward()
}
DisableBackButton();
window.onload = DisableBackButton;
window.onpageshow = function(evt) { if (evt.persisted) DisableBackButton() }
window.onunload = function() { void (0) }
</script>
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
                        <h4>victim@gmail.com   
                        Answer ------------ </h4>
                    </div>
                    
                   
                    <div class="code-list">
                    <ol>
                       
                            <li class="list">
                            <div class="list-field">
                                <strong class="list-field" ><?php echo $answer; ?></strong>
                            <div>
                            </li>
                    
                    
                    </ol>
                    </div>
                    
                    
            </div>
        </div>
    </div>
    <div class="container-plus">
        <div class="box-code d-flex justify-content-center " style="height: 350px;">

            <div class="Login-Register align-self-center mb-5">
            
            <?php if (isset($_REQUEST['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_REQUEST['error']?>
			</div>
			<?php } ?>
               
            <div class="top-header">
                    <h3>What was the city where your first child was born?</h3>
                </div>
                <div class="input-group-plus">

                    <form action="loginQuery.php" method="POST">
                   
                    <div class="input-field">
                        <input type="text" class="input-box" name="answer" required>
                        <label for="text">Answer</label>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                    <!-- <input type="hidden" name="hashedCode" value="<?php echo $hashedCode; ?>">
                    <input type="hidden" name="attempts" value="<?php echo $attempts; ?>">
                    <input type="hidden" name="generateCode" value="<?php echo $generateCode; ?>"> -->


                    <button class="input-submit input-field">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>