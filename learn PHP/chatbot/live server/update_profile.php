
<?php

include "helper/connect.php";
include "helper/function.php";

if (isset($_REQUEST["submit"])) {
  $user_id = $_SESSION["user_id"];
  $new_image = "";
  $uploaded_image = $_FILES["profile_pic"];
  $uploaded_image_name = $uploaded_image["name"];
  $previous_image = $_REQUEST["previous_profile_pic"];
  $fname = mysqli_real_escape_string($connect, $_REQUEST["fname"]);
  $lname = mysqli_real_escape_string($connect, $_REQUEST["lname"]);
  $username = mysqli_real_escape_string($connect, $_REQUEST["username"]);
  $email = mysqli_real_escape_string($connect, $_REQUEST["email"]);
  $password = mysqli_real_escape_string($connect, hashPassword($_REQUEST["password"]));
  if (empty($uploaded_image_name)) {
    $new_image = $previous_image;
  } else {
    $loc = ".upload/";
    $uploaded_image_tmp_name = $uploaded_image["tmp_name"];
    $uploaded_image_size = $uploaded_image["size"];
    $valid_ext = array("png", "jpg", "jpeg");
    $new_image_ext = end(explode(".", $uploaded_image_name));
    if (in_array($new_image_ext, $valid_ext) == false) {
      header("location: editinfo.php?err=invalidExt");
      die();
    }
    $new_image = $fname . "-" . $lname . "." . $new_image_ext;
    if ($previous_image != "user-avatar.jpg") {
      unlink($loc . $previous_image);
    }
    move_uploaded_file($uploaded_image_tmp_name, $loc .  $new_image);
  }
  if (!empty($new_image)) {
    $query_update = "UPDATE user_info SET profile_pic = '$new_image', firstname = '$fname', lastname = '$lname', username = '$username', email = '$email', password = '$password' WHERE user_info.id = '$user_id'";
    $result_update = mysqli_query($connect, $query_update);
    if ($result_update) {
      header("location: profile.php");
      die();
    } else {
      header("location: editinfo.php?err=cannotUpdate");
      die();
    }
  }
}

?>

