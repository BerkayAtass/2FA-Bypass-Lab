<?php 
require '../conn.php';


$attempts = "N/A";
$userIP = $_SERVER['REMOTE_ADDR'];

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
}


$query = $conn->prepare("SELECT ip_number, visit_count FROM blacklist");
$query->execute();
$ipLists = $query->fetchAll(PDO::FETCH_ASSOC);

if(empty($ipLists)){
        $attempts = 3;

        $sql = "INSERT INTO blacklist(ip_number,visit_count) VALUES (:ip_number,:visit_count)";
        $query = $conn->prepare($sql);
        $query->bindParam(':ip_number', $userIP);
        $query->bindParam(':visit_count', $attempts);
        $query->execute(); 
}else{
    foreach($ipLists as $ipList){
        if (($userIP == $ipList["ip_number"] ) && ($ipList["visit_count"] <= 0)) {
            header("Location: badEnding.php");
            exit;
        }else{
            $attempts = 3;

            $sql = "INSERT INTO blacklist(ip_number,visit_count) VALUES (:ip_number,:visit_count)";
            $query = $conn->prepare($sql);
            $query->bindParam(':ip_number', $userIP);
            $query->bindParam(':visit_count', $attempts);
            $query->execute();    
        }
    }
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
    



                    <button class="input-submit input-field">Login</button>
                    <p>Is this too much for you? <a href="../index.php" class="btn btn-secondary" role="button" data-bs-toggle="button">HOME</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>