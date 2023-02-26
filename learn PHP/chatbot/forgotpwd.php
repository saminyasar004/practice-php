<?php

include "helper/connect.php";
include "helper/function.php";
$err = "";
$username = "";
$password = "";
if (isset($_REQUEST["submit"])) {
  $username = mysqli_real_escape_string($connect, $_REQUEST["username"]);
  if (empty($username)) {
    $err = "please enter your username.";
  } else {
    $query_select = "SELECT password FROM user_info WHERE username = '$username'";
    $result_select = mysqli_query($connect, $query_select);
    $count = mysqli_num_rows($result_select);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($result_select)) {
        $password = $row["password"];
        $password = unhashPassword($password);
      }
    } else {
      $err = "please enter your valid username.";
    }
  }
}

$err = ucfirst($err);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Get password</title>
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
  <header class="forgot-header">
    <div class="container">
      <div class="row">
        <div class="forgot-form-wrapper">
          <!-- form start -->
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="card-head">
              <h3>reset password</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="username">username</label>
                <input class="inputField" type="username" name="username" value="<?php echo $username; ?>" placeholder="Enter your username" />
              </div>
              <div class="form-group">
                <label for="password">password</label>
                <input class="inputField" type="text" value="<?php echo $password ?>" readonly />
              </div>
            </div>
            <div class="card-end">
              <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-submit" />
              </div>
            </div>
          </form>
          <!-- form end -->
          <div class="card-links">
            <div class="links-wrapper">
              <a href="./login.php" class="link-forgot">login</a>
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