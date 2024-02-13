<?php 
require '../conn.php';

if (isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['answer'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $answer = $_POST['answer'];

    $id = 1;
    $query = $conn->prepare("SELECT attempts_number FROM attempts WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $array = $query->fetchAll(PDO::FETCH_ASSOC);
    $attempts = $array[0]["attempts_number"];



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
                        header("Location: goodEnding.php");
                        exit;
                    }else{
                        $attempts--;
                        if ($attempts <= 0) {
                            header("Location: badEnding.php");
                            exit;
                        }else{
                            $sql = "UPDATE attempts SET attempts_number = :attempts_number WHERE id = 1";
                            $query = $conn->prepare($sql);
                            $query->bindParam(':attempts_number', $attempts);
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