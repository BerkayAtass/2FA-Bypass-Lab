<?php 
require '../conn.php';

if (isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['answer'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $answer = $_POST['answer'];

    $userIP = $_SERVER['REMOTE_ADDR'];

    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
    $query = $conn->prepare("SELECT visit_count FROM blacklist WHERE ip_number = :ip_number");
    $query->bindParam(':ip_number', $userIP);
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
    $attempts = $array[0]["visit_count"];

    if ($attempts <= 0) {
        header("Location: badEnding.php");
        exit;
    }

    if (empty($email)) {
        $em  = "Email is required";
        header("Location: login.php?error=$em");
        exit;
    } else if (empty($password)) {
        $em  = "Password is required";
        header("Location: login.php?error=$em");
        exit;
    } else if (empty($answer)) {
        $em  = "Answer is required.";
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
                   
                    if ($answer === "Los Angeles") {
                        $attempts = 3;
                        $userIP = $_SERVER['REMOTE_ADDR'];
                        $sql = "UPDATE blacklist SET visit_count = :visit_count WHERE ip_number = :ip_number";
                        $query = $conn->prepare($sql);
                        $query->bindParam(':ip_number', $userIP);
                        $query->bindParam(':visit_count', $attempts);
                        $query->execute();
                        header("Location: goodEnding.php");
                        exit;
                    }else{
                        $attempts--;
                        
                       
                        if ($attempts <= 0) {
                            $userIP = $_SERVER['REMOTE_ADDR'];
                            $sql = "UPDATE blacklist SET visit_count = :visit_count WHERE ip_number = :ip_number";
                            $query = $conn->prepare($sql);
                            $query->bindParam(':ip_number', $userIP);
                            $query->bindParam(':visit_count', $attempts);
                            $query->execute();
                            header("Location: badEnding.php");
                            exit;
                        }else{
                            $userIP = $_SERVER['REMOTE_ADDR'];
                            $sql = "UPDATE blacklist SET visit_count = :visit_count WHERE ip_number = :ip_number";
                            $query = $conn->prepare($sql);
                            $query->bindParam(':ip_number', $userIP);
                            $query->bindParam(':visit_count', $attempts);
                            $query->execute();
                            $em  = "You have ". $attempts ." attempts left";
                            $redirectUrl = "confirmCode.php?email=$email&password=$password&error=$em";
                            header("Location: $redirectUrl");
                            exit;
                        }

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