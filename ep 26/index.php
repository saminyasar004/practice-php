<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in or sign up</title>
</head>

<body>

<?php 

if (isset($_REQUEST['data_send'])) {
    echo "Your Session ended.";
}

?>

<form action="check.php" method="post">
    <input type="name" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="submit" name="submit" value="Login">
</form>
    
</body>

</html>
