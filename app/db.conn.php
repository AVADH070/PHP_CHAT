<?php

$sName = "127.0.0.1:3310";
$uName = "root";
$pass = "";
$db_name = "chat_app_db";

try {
  $conn = new PDO(
    "mysql:host=$sName;dbname=$db_name",
    $uName,
    $pass
  );
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed : " . $e->getMessage();
}