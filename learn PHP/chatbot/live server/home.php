<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inbox · Chatbot</title>
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

<style>
  body {
    height: 100vh;
    overflow: hidden;
    background: #242526;
  }

  /* for max width: 1140px */

  @media screen and (max-width: 1140px) {
    html {
      font-size: 90%;
    }
  }

  /* for max width 960px */

  @media screen and (max-width: 960px) {
    html {
      font-size: 80%;
    }
  }

  /* for max width 720px */

  @media screen and (max-width: 720px) {
    html {
      font-size: 60%;
    }

    body {
      min-height: 100vh;
      overflow: auto !important;
    }
  }

  /* for max width 400px */

  @media screen and (max-width: 400px) {
    html {
      font-size: 50%;
    }
  }

  /* for max width 250px */

  @media screen and (max-width: 251px) {
    html {
      font-size: 45%;
    }
  }
</style>

<body>

  <?php include "helper/header.php"; ?>

  <!-- home-container start -->

  <?php
  if (isset($_REQUEST["friend"]) && isset($_SESSION["user_id"])) {
    $friend_id = $_REQUEST["friend"];
    $user_id = $_SESSION["user_id"];
  ?>
    <div class="home-container col1 span-3-of-4">
      <div class="inbox-wrapper">
        <?php
        if (userIdSelect($connect, $friend_id) != false) {
          $friend_result_select = userIdSelect($connect, $friend_id);
          while ($friend_row = mysqli_fetch_assoc($friend_result_select)) {
            $friend_profile_pic = $friend_row["profile_pic"];
            $friend_fname = $friend_row["firstname"];
            $friend_lname = $friend_row["lastname"];
            $friend_username = $friend_row["username"];
            $friend_email = $friend_row["email"];
          }
        }
        if (userIdSelect($connect, $user_id) != false) {
          $user_result_select = userIdSelect($connect, $user_id);
          while ($user_row = mysqli_fetch_assoc($user_result_select)) {
            $user_profile_pic = $user_row["profile_pic"];
            $user_fname = $user_row["firstname"];
            $user_lname = $user_row["lastname"];
            $user_username = $user_row["username"];
            $user_email = $user_row["email"];
          }
        }
        ?>
        <div class="friend-title">
          <h3><?php echo $friend_fname . " " . $friend_lname; ?></h3>
        </div>
        <div class="message-container">
          <?php
          if (allSelect($connect, "message") != false) {
            $message_result_select = allSelect($connect, "message");
            while ($row = mysqli_fetch_assoc($message_result_select)) {
              $message_id = $row["id"];
              $message_from_id = $row["from_id"];
              $message_to_id = $row["to_id"];
              $message_text = $row["message"];
              $message_time = $row["time"];
          ?>
              <?php
              if ($message_from_id == $user_id && $message_to_id == $friend_id) {
              ?>
                <div class="user-message-box">
                  <div class="per-message-box">
                    <div class="message-user-image">
                      <img src="./.upload/<?php echo $user_profile_pic; ?>" alt="<?php echo $user_fname . " " . $user_lname; ?>">
                    </div>
                    <div class="message-user-text">
                      <p><?php echo $message_text; ?></p>
                    </div>
                    <div class="message-user-time">
                      <span class="message-user-time-span"><?php echo $message_time; ?></span>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
              <?php
              if ($message_from_id == $friend_id && $message_to_id == $user_id) {
              ?>
                <div class="friend-message-box">
                  <div class="per-message-box">
                    <div class="message-friend-image">
                      <img src="./.upload/<?php echo $friend_profile_pic; ?>" alt="<?php echo $friend_fname . " " . $friend_lname; ?>">
                    </div>
                    <div class="message-friend-text">
                      <p><?php echo $message_text; ?></p>
                    </div>
                    <div class="message-friend-time">
                      <span class="message-friend-time-span"><?php echo $message_time; ?></span>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
          <?php
            }
          }
          ?>
        </div>
        <div class="user-control-wrapper">
          <form class="message-send-form" action="message_send.php?user_id=<?php echo $user_id; ?>&friend_id=<?php echo $friend_id; ?>" method="post" autocomplete="off">
            <div class="message-input-wrapper col1 span-2-of-3">
              <input type="text" name="message" placeholder="Aa" autocomplete="off">
            </div>
            <div class="message-send-wrapper col1 span-1-of-3">
              <input type="submit" name="submit" value="Send" class="btn btn-send-message">
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  </div>
  </header>

  <!-- home-container end -->

  <!-- err handler -->

  <?php
  if (isset($_REQUEST["err"])) {
    $getErr = $_REQUEST["err"];
    if ($getErr == "emptyMessage") {
  ?>
      <script>
        alert("Please type something to message.");
      </script>
    <?php
    } else if ($getErr == "cannotMessage") {
    ?>
      <script>
        alert("Something went wrong! Check your internet connection.");
      </script>
  <?php
    }
  }
  ?>

</body>

</html>