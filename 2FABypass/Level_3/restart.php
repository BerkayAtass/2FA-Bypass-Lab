<?php
require '../conn.php';

  $userIP = $_SERVER['REMOTE_ADDR'];

  if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }


  $sql = "DELETE FROM blacklist WHERE ip_number = :ip_number";
  $query = $conn->prepare($sql);
  $query->bindParam(':ip_number', $userIP,);
  $query->execute();
  
  header("Location: index.php");
  exit;
?>