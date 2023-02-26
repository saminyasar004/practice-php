<?php

session_start();
unset($_SESSION["user_id"]);
// unset($_SESSION["is_logged"]);
session_destroy();
header("location: login.php");
die();
