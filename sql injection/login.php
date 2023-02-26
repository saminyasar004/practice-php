<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 
if (isset($_REQUEST['submit'])) {
  $connect = mysqli_connect("localhost", "root", "", "test");
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  echo $query = "SELECT * FROM sql_inject WHERE username = '$username' AND pwd = '$password'";
  // echo $query = "SELECT * FROM sql_inject WHERE username = 'sdfds' AND pwd = '' OR '1=1'";
  echo "<br/>";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0) {
    echo "Welcome";
  } else {
    echo "Invalid login";
  }
}
?>
  <form method="POST" action="#">
    <label for="username">Username</label><br><br>
    <input type="text" name="username"> <br><br>
    <label for="password">Password</label><br><br>
    <input type="text" name="password"><br><br>
    <input type="submit" name="submit">
  </form>
</body>
</html>