<?php 
require '../conn.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['hashedCode']) && isset($_POST['code'])  && isset($_POST['attempts'])  && isset($_POST['generateCode'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedCode = $_POST['hashedCode'];
    $code = $_POST['code'];
    $attempts = $_POST['attempts'];
    $generateCode = $_POST['generateCode'];



    if (empty($email)) {
        $em  = "Email is required";
        header("Location: login.php?error=$em");
        exit;
    } else if (empty($password)) {
        $em  = "Password is required";
        header("Location: login.php?error=$em");
        exit;
    }  else if (empty($hashedCode)) {
        $em  = "An error has occurred, please try again.";
        header("Location: login.php?error=$em");
        exit;
    }  else if (empty($attempts)) {
        $em  = "An error has occurred, please try again.";
        header("Location: login.php?error=$em");
        exit;
    }else if (empty($code)) {
        $em  = "Code is required";
        header("Location: login.php?error=$em");
        exit;
    }else {
        
        $query = $conn->prepare("SELECT email, password FROM users WHERE email = :email");
        $query->bindParam(':email',  $email);
        $query->execute();
       
        if ($query->rowCount() == 1) {
            $user = $query->fetch();

            $storedEmail = $user['email']; 
            $storedPassword = $user['password'];

           
            if ($storedEmail === $email) {
                if (password_verify($password, $storedPassword)) {
                    $code = md5($code);
                    if ($code === $hashedCode) {
                        header("Location: goodEnding.php");
                        exit;
                    }else{
                        $attempts--;
                        $em  = "You have ". $attempts ." attempts left";
                        $redirectUrl = "confirmCode.php?email=$email&password=$password&hashedCode=$hashedCode&generateCode=$generateCode&attempts=$attempts&error=$em";
                        header("Location: $redirectUrl");
                        exit;
                    }

                } else {
                    $em  = "Incorrect Username or Password";
                    header("Location: login.php?error=$em");
                    exit;       
                }
            } else {
                $em  = "Incorrect Username or Password";
                header("Location: login.php?error=$em");
                exit; 
            }
        } else {
            $em  = "Incorrect Username or Password";
            header("Location: login.php?error=$em");
            exit;
        }  
    }
} else {
    header("Location: login.php");
    exit;
}
?>