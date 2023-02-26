<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard  | Welcome to NSN Shopping</title>
</head>
<body>
    <h1>Welcome To
        <?php 
            session_start();
            if ($_SESSION['username'] == true) {
                $username = $_SESSION['username'];
                $username = ucfirst($username);
                echo $username;
            } else {
                header("location: index.php");
            }
        ?>
    </h1>
    <br>
    <a href="logout.php">Logout</a>    
</body>
</html>
