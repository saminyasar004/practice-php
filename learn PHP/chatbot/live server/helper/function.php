
<?php

function hashPassword($password)
{
  $result = base64_encode($password);
  return $result;
}

function unhashPassword($password)
{
  $result = base64_decode($password);
  return $result;
}

function autoLogout()
{
  $limit = 5000;
  if ((time() - $_SESSION["current_time"]) > $limit) {
    header("location: logout.php");
    die();
  }
}

function emptyInputLogin($username, $password)
{
  $result = "";
  if (empty($username) || empty($password)) {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
}

function emptyInputSignup($fname, $lname, $username, $email, $password)
{
  $result = "";
  if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password)) {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
}

function emptyMessage($message)
{
  $result = "";
  if (empty($message)) {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
}

function usernameExist($connect, $username)
{
  $result = "";
  $query_select = "SELECT * FROM user_info WHERE username = '$username'";
  $result_select = mysqli_query($connect, $query_select);
  $count = mysqli_num_rows($result_select);
  if ($count > 0) {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
}

function emailExist($connect, $email)
{
  $result = "";
  $query_select = "SELECT * FROM user_info WHERE email = '$email'";
  $result_select = mysqli_query($connect, $query_select);
  $count = mysqli_num_rows($result_select);
  if ($count > 0) {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
}

function userIdSelect($connect, $user_id)
{
  $result = "";
  $query_select = "SELECT * FROM user_info WHERE id = '$user_id'";
  $result_select = mysqli_query($connect, $query_select);
  $count = mysqli_num_rows($result_select);
  if ($count > 0) {
    $result = $result_select;
  } else {
    $result = false;
  }
  return $result;
}

function allSelect($connect, $table)
{
  $result = "";
  $query_select = "SELECT * FROM $table";
  $result_select = mysqli_query($connect, $query_select);
  $count = mysqli_num_rows($result_select);
  if ($count > 0) {
    $result = $result_select;
  } else {
    $result = false;
  }
  return $result;
}

function createAccount($connect, $fname, $lname, $username, $email, $password)
{
  $profile_pic = "user-avatar.jpg";
  $query_insert = "INSERT INTO user_info (profile_pic, firstname, lastname, username, email, password) VALUES ('$profile_pic', '$fname', '$lname','$username', '$email', '$password')";
  $result_insert = mysqli_query($connect, $query_insert);
  $query_select = "SELECT * FROM user_info WHERE username = '$username' AND password = '$password'";
  $result_select = mysqli_query($connect, $query_select);
  $count = mysqli_num_rows($result_select);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result_select)) {
      $user_id = $row["id"];
      $_SESSION["user_id"] = $user_id;
      // $_SESSION["is_logged"] = true;
      $_SESSION["current_time"] = time();
      header("location: profile.php");
    }
  } else {
    header("location: login.php?err=cannotCreate");
    die();
  }
}

function userLogin($connect, $username, $password)
{
  $query_select = "SELECT * FROM user_info WHERE username = '$username' AND password = '$password'";
  $result_select = mysqli_query($connect, $query_select);
  $count = mysqli_num_rows($result_select);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result_select)) {
      $user_id = $row["id"];
      $_SESSION["user_id"] = $user_id;
      // $_SESSION["is_logged"] = true;
      $_SESSION["current_time"] = time();
      header("location: profile.php");
      exit();
    }
  } else {
    header("location: login.php?err=invalid");
    die();
  }
}

function messageSend($connect, $from_id, $to_id, $message, $currentTime)
{
  $result = "";
  $query_message_send = "INSERT INTO message (from_id, to_id, message, time) VALUES ('$from_id', '$to_id', '$message', '$currentTime')";
  $result_message_send = mysqli_query($connect, $query_message_send);
  if ($result_message_send) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}


?>
