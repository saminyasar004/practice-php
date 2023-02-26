<?php

include "connect.php";
include "function.php";

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
    }
  }
} else {
  header("location: login.php");
  die();
}

?>

<!-- nav start -->

<nav>
  <div class="col1 span-1-of-4">
    <div class="logo">
      <a href="header.php">
        <h3>ChatBot</h3>
      </a>
    </div>
  </div>
  <div class="col1 span-1-of-2 btn-toggle-container">
    <button class="btn btn-toggle">
      <i class="fa fa-bars"></i>
      <!-- <img src="./img/menu.png"> -->
    </button>
  </div>
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

<!-- header styles start -->

<header class="header">
  <div class="two-span-wrapper">
    <div class="col1 span-1-of-4 header-container-wrapper">
      <div class="header-container">
        <div class="user-lists">
          <?php
          if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            if (allSelect($connect, "user_info") != false) {
              $result_all_user = allSelect($connect, "user_info");
              while ($row = mysqli_fetch_assoc($result_all_user)) {
                $friend_id = $row["id"];
                $friend_profile_pic = $row["profile_pic"];
                $friend_full_name = $row["firstname"] . " " . $row["lastname"];
                if ($user_id != $friend_id) {
          ?>
                  <a href="?friend=<?php echo $friend_id; ?>">
                    <?php
                    if (isset($_REQUEST["friend"])) {
                      $getFriend = $_REQUEST["friend"];
                      $active_per_user_list = "";
                      if ($getFriend == $friend_id) {
                        $active_per_user_list = "active-per-user-list";
                      } else {
                        $active_per_user_list = "";
                      }
                    } else {
                      $active_per_user_list = "";
                    }
                    ?>
                    <div class="per-user-list <?php echo $active_per_user_list; ?>">
                      <div class="col1 span-1-of-5 profile-image">
                        <img src="./.upload/<?php echo $friend_profile_pic; ?>" alt="<?php echo $friend_full_name; ?>" />
                      </div>
                      <div class="col1 span-2-of-3 profile-name">
                        <span class="username"><?php echo $friend_full_name; ?></span>
                      </div>
                    </div>
                  </a>
              <?php
                }
              }
            } else {
              ?>
              <a href="?friend=<?php echo $friend_id; ?>">
                <div class="per-user-list">
                  <div class="no-friend">you have no friend.</div>
                </div>
              </a>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>


    <!-- header styles end -->

    <!-- javascript start -->

    <script>
      // select all necessary DOM

      const btnToggle = document.querySelector(".btn-toggle");
      const headerContainer = document.querySelector(".header-container");
      const userImage = document.querySelector(".user-image-wrapper img");
      const menuWrapper = document.querySelector(".menu-wrapper");
      // const homeContainer = document.querySelector(".home-container");
      // addeventlistener

      btnToggle.addEventListener("click", () => {
        headerContainer.classList.toggle("toggle-nav-bar");
        // homeContainer.classList.toggle("toggle-home-container");
      });
      userImage.addEventListener("click", () => {
        menuWrapper.classList.toggle("toggle-menu-wrapper");
      });
    </script>

    <!-- javascript end -->