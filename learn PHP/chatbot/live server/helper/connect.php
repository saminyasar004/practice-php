<?php
session_start();
$dbhost = "sql108.unaux.com";
$bduser = "unaux_26797354";
$bdpwd = "8d2mtyhhnftm";
$dbname = "unaux_26797354_648";
$connect = mysqli_connect($dbhost, $bduser, $bdpwd, $dbname);
if (!$connect) {
  die("Connection Faild!" . mysqli_error($connect));
}
