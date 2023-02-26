<?php

include "helper/connect.php";
include "helper/function.php";
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
    }
  }
} else {
  header("location: login.php");
  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile / <?php echo $fname . " " . $lname; ?></title>
  <!-- linking favicn icon -->
  <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
  <!-- google fonts: Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!--- google fonts: Poppins ------>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!--- FONT AWESOME ------->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
  <!-- linking vendor files -->
  <link rel="stylesheet" href="./vendor/css/grid.css" />
  <link rel="stylesheet" href="./vendor/css/normalize.css" />
  <!-- linking stylesheet -->
  <link rel="stylesheet" href="./css/profile.css" />
  <link rel="stylesheet" href="./css/profile-responsive.css" />
</head>

<body>

  <!-- nav start -->

  <nav>
    <div class="col1 span-1-of-4">
      <div class="logo">
        <a href="#">
          <h3>ChatBot</h3>
        </a>
      </div>
    </div>
    <div class="col1 span-1-of-2 btn-toggle-container"></div>
    <div class="col1 span-1-of-4 menu-container">
      <div class="user-image-wrapper">
        <img src="./.upload/<?php echo $profile_pic; ?>" alt="<?php echo $fname . " " . $lname; ?>" />
      </div>
      <div class="toggle-menu-wrapper menu-wrapper">
        <ul class="menu-lists">
          <li><a href="./home.php">inbox</a></li>
          <li><a href="./profile.php">profile</a></li>
          <li><a href="./logout.php">logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- nav end -->

  <!-- profile section start -->

  <section class="profile-section">
    <div class="row">
      <div class="form-wrapper">
        <form action="#">
          <div class="form-group">
            <div class="user-image-container">
              <img src="./.upload/<?php echo $profile_pic; ?>" alt="<?php echo $fname . " " . $lname; ?>" class="user-image" />
            </div>
          </div>
          <div class="form-group">
            <div class="firstname-wrapper">
              <label for="fname">first name</label>
              <input name="fname" type="text" value="<?php echo $fname; ?>" readonly />
            </div>
          </div>
          <div class="form-group">
            <div class="lastname-wrapper">
              <label for="lname">last name</label>
              <input name="lname" type="text" value="<?php echo $lname; ?>" readonly />
            </div>
          </div>
          <div class="form-group">
            <div class="username-wrapper">
              <label for="username">username</label>
              <input name="username" type="username" value="<?php echo $username; ?>" readonly />
            </div>
          </div>
          <div class="form-group">
            <div class="email-wrapper">
              <label for="email">your email</label>
              <input name="email" type="email" value="<?php echo $email; ?>" readonly />
            </div>
          </div>
        </form>
      </div>
      <div class="user-controle-wrapper">
        <a href="./editinfo.php">edit</a>
      </div>
    </div>
  </section>

  <!-- profile section end -->

  <!-- javascript start -->

  <script>
    // select all necessary DOM

    const userImage = document.querySelector(".user-image-wrapper img");
    const menuWrapper = document.querySelector(".menu-wrapper");

    // addeventlistener

    userImage.addEventListener("click", () => {
      menuWrapper.classList.toggle("toggle-menu-wrapper");
    });
  </script>

  <!-- javascript end -->

</body>

</html>