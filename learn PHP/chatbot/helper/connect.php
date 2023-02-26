<?php
session_start();
$dbhost = "localhost";
$bduser = "root";
$bdpwd = "";
$dbname = "chatbot";
$connect = mysqli_connect($dbhost, $bduser, $bdpwd, $dbname);
if (!$connect) {
  die("Connection Faild!" . mysqli_error($connect));
}
