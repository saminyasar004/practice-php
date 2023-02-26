<?php

include "helper/connect.php";
include "helper/function.php";

$err = "";

if (isset($_SESSION["user_id"])) {
  header("location: profile.php");
  die();
}

if (isset($_REQUEST["submit"])) {
  $username = mysqli_real_escape_string($connect, $_REQUEST["username"]);
  $password = mysqli_real_escape_string($connect, hashPassword($_REQUEST["password"]));
  if (emptyInputLogin($username, $password) == false) {
    header("location: login.php?err=emptyInput");
    die();
  }
  userLogin($connect, $username, $password);
}

if (isset($_REQUEST["err"])) {
  $getErr = $_REQUEST["err"];
  if ($getErr == "emptyInput") {
    $err = "all fields are required.";
  } else if ($getErr == "invalid") {
    $err = "invalid login details.";
  } else {
    $err = "";
  }
}

$err = ucfirst($err);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login to Chatbot</title>
  <!-- google fonts: Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!--- google fonts: Poppins ------>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!--- FONT AWESOME ------->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
  <!-- linking favicn icon -->
  <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
  <!-- linking vendor files -->
  <link rel="stylesheet" href="./vendor/css/grid.css" />
  <link rel="stylesheet" href="./vendor/css/normalize.css" />
  <!-- linking stylesheet -->
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/responsive.css" />
</head>

<body>
  <header class="login-header">
    <div class="container">
      <div class="row">
        <div class="login-form-wrapper">
          <!-- form start -->
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="card-head">
              <h3>login</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="username">username</label>
                <input class="inputField" type="username" name="username" placeholder="Enter your username" />
              </div>
              <div class="form-group">
                <label for="password">password</label>
                <input class="inputField" type="password" name="password" placeholder="Enter your password" />
              </div>
            </div>
            <div class="card-end">
              <div class="form-group">
                <input type="submit" name="submit" value="Login" class="btn btn-submit" />
              </div>
            </div>
          </form>
          <!-- form end -->
          <div class="card-links">
            <div class="links-wrapper">
              <a href="./forgotpwd.php" class="link-forgot">forgot password?</a>
              <a href="./register.php" class="link-signup">create account</a>
            </div>
          </div>
          <div class="phpError">
            <?php
            echo $err;
            ?>
          </div>
        </div>
      </div>
    </div>
  </header>
</body>

</html>