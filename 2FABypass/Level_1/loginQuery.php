<?php 
require '../conn.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['hashedCode']) && isset($_POST['code'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedCode = $_POST['hashedCode'];
    $code = $_POST['code'];


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
    } else if (empty($code)) {
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
                        header("Location: badEnding.php");
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