<?php

include "helper/connect.php";
include "helper/function.php";

if (isset($_REQUEST["submit"]) && isset($_REQUEST["user_id"]) && isset($_REQUEST["friend_id"])) {
  $user_id = $_REQUEST["user_id"];
  $friend_id = $_REQUEST["friend_id"];
  $message = mysqli_real_escape_string($connect, $_REQUEST["message"]);
  date_default_timezone_set("Asia/Dhaka");
  $currentTime = date("h:i a", time());
  if (emptyMessage($message) == false) {
    header("location: home.php?friend=$friend_id&err=emptyMessage");
    die();
  }
  if (messageSend($connect, $user_id, $friend_id, $message, $currentTime) == false) {
    header("location: home.php?friend=$friend_id&err=cannotMessage");
    die();
  } else {
    header("location: home.php?friend=$friend_id");
    die();
  }
}
