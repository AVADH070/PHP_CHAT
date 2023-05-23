<?php

session_start();

if (!isset($_SESSION['username'])) {

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App - Sign UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
  </head>

  <body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
    <div class="w-400 p-5 shadow rounded">
      <form method="post" enctype="multipart/form-data" action="app/http/signup.php">
        <div class="d-flex
                   justify-content-center
                   align-items-center
                   flex-column">

          <img src="img/logo.png" class="w-25">
          <h3 class="display-4 fs-1 
                  text-center">
            Sing UP</h3>
        </div>

        <?php
        if (isset($_GET['error'])) {
          echo "<div class='alert alert-warning' role='alert'>
          " . htmlspecialchars($_GET['error']) . "
        </div>";
        }
        ?>

        <?php
        if (isset($_GET['name'])) {
          $name = $_GET['name'];
        } else {
          $name = "";
        }

        if (isset($_GET['username'])) {
          $username = $_GET['username'];
        } else {
          $username = "";
        }
        ?>

        <div class="mb-3">
          <label class="form-label">
            Name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">
            User name</label>
          <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
        </div>


        <div class="mb-3">
          <label class="form-label">
            Password</label>
          <input type="password" class="form-control" name="password">
        </div>

        <div class="mb-3">
          <label class="form-label">
            Profile Picture</label>
          <input type="file" class="form-control" name="pp">
        </div>

        <button type="submit" class="btn btn-primary">
          Sign UP</button>
        <a href="index.php">Login</a>
      </form>
    </div>
  </body>

  </html>
  <?php
} else {
  header("location: ./home.php");
  exit;
}
?>