<?php 

if ($_REQUEST['edit_id']) {
    $edit_id = $_REQUEST['edit_id'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $pwd = $_REQUEST['pwd'];
    $connect = mysqli_connect("localhost", "root", "", "test");
    if (!$connect) {
        die ("No connect." . mysqli_error($connect));
    }
    $query = "UPDATE login_info SET username = '$username', email = '$email', pwd = '$pwd' WHERE login_info.id = $edit_id";
    $result = mysqli_query($connect, $query);
    header("location: show.php");
} else {
    header("location: show.php");
}

?>
