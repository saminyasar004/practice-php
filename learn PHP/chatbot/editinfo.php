<?php

include "helper/connect.php";
include "helper/function.php";
$err = "";
autoLogout();
if (isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];
  if (userIdSelect($connect, $user_id) == false) {
    header("location: logout.php");
    die();
  } else {
    $result_select = userIdSelect($connect, $user_id);
    while ($row = mysqli_fetch_assoc($result_select)) {
      $profile_pic = $row["profile_pic"];
      $fname = $row["firstname"];
      $lname = $row["lastname"];
      $username = $row["username"];
      $email = $row["email"];
      $password = unhashPassword($row["password"]);
    }
  }
} else {
  header("location: login.php");
  die();
}

if (isset($_REQUEST["err"])) {
  $getErr = $_REQUEST["err"];
  if ($getErr == "invalidExt") {
    $err = "please select a png/jpg/jpeg file to upload.";
  } else if ($getErr == "cannotUpdate") {
    $err = "something went wrong. please try again later.";
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
  <title>Edit Profile</title>
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
  <header class="editinfo-header">
    <div class="container">
      <div class="row">
        <div class="editinfo-form-wrapper">
          <!-- form start -->
          <form action="update_profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="card-head">
              <h3>edit profile</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="user-image-container">
                  <label for="profile_pic">upload new image</label>
                  <input type="file" name="profile_pic" id="profile_pic" />
                  <input type="hidden" name="previous_profile_pic" value="<?php echo $profile_pic; ?>">
                  <img src="./.upload/<?php echo $profile_pic; ?>" alt="<?php echo $fname . " " . $lname; ?>" class="user-image" />
                </div>
              </div>
              <div class="form-group">
                <label for="fname">first name</label>
                <input class="inputField" type="fname" name="fname" value="<?php echo $fname; ?>" placeholder="Enter your first name" required />
              </div>
              <div class="form-group">
                <label for="lname">last name</label>
                <input class="inputField" type="lname" name="lname" value="<?php echo $lname; ?>" placeholder="Enter your last name" required />
              </div>
              <div class="form-group">
                <label for="username">username</label>
                <input class="inputField" type="username" name="username" value="<?php echo $username; ?>" placeholder="Enter your username" required />
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input class="inputField" type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required />
              </div>
              <div class="form-group">
                <label for="password">password</label>
                <input class="inputField" type="text" name="password" value="<?php echo $password; ?>" placeholder="Enter your password" />
              </div>
            </div>
            <div class="card-end">
              <div class="form-group">
                <input type="submit" name="submit" value="Update" class="btn btn-submit" />
              </div>
            </div>
          </form>
          <!-- form end -->
          <div class="card-links">
            <div class="links-wrapper">
              <a href="./profile.php" class="link-profile">profile page</a>
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