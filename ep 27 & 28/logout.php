<?php 

session_start();
unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['is_login']);
session_destroy();
header("location: login.php");

?>
