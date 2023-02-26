<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
<?php 

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    $pwd = $_REQUEST['pwd'];
    if ($username || $pwd != "") {
        $connect = mysqli_connect('localhost', 'root', '', 'practice') or die ("Connection Failed!" . mysqli_error($connect));
        $query = "select * from admin_info where username = '$username' and pwd = '$pwd'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            header("location: https://www.facebook.com");
        } else {
            header("location: from.php");
        }
    }
}

?>
    <form method="post">
        <input type="name" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="submit" name="submit" value="Submit">
        <a href="forget_pwd.php">Forget Password?</a>
    </form>
</body>

</html>
