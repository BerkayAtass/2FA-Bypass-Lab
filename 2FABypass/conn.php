<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "bypass";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $victimCheck = $conn->prepare("SELECT id FROM users WHERE username = 'victim'");
    $victimCheck->execute();
    $victimExists = $victimCheck->fetchColumn();

    if (!$victimExists) {
        $password = "pass";
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, username, password) 
        VALUES ('victim@gmail.com', 'victim', '$hashedpassword')";
        $conn->exec($sql);
        echo "Victim user created successfully.";
    }

    $unknownCheck = $conn->prepare("SELECT id FROM users WHERE username = 'unknown'");
    $unknownCheck->execute();
    $unknownExists = $unknownCheck->fetchColumn();

    if (!$unknownExists) {
        $password = "pass";
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, username, password) 
        VALUES ('unknown@gmail.com', 'unknown', '$hashedpassword')";
        $conn->exec($sql);
        echo "Victim user created successfully.";
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
