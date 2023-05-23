<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

  include '../db.conn.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
    $em = "username is not defined";
    header("location: ../../index.php?error=$em");
  } else if (empty($password)) {
    $em = "password is not defined";
    header("location: ../../index.php?error=$em");
  } else {
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() === 1) {
      $user = $stmt->fetch();

      if ($user['username'] === $username) {

        if (password_verify($password, $user['password'])) {

          $_SESSION['name'] = $user['name'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['user_id'] = $user['user_id'];

          header("location: ../../home.php");
        } else {
          $em = "Invalid username and password password match";
          header("location: ../../index.php?error=$em");
        }
      } else {
        $em = "Invalid username and password username";
        header("location: ../../index.php?error=$em");
      }
    } else {
      $em = "Invalid username and password row na mali";
      header("location: ../../index.php?error=$em");
    }
  }
} else {
  header("location: ../../index.php");
  exit;
}
?>