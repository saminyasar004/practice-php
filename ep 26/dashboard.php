<?php 
    session_start();
    if ($_SESSION['username'] == true) {
        if ((time() - $_SESSION['current_timestamp']) > 120) {
            header("location: logout.php");
        } else {
            $username = $_SESSION['username'];
            $username = ucfirst($username);
            echo $username;
            echo "<a href='logout.php'>Logout</a>";
        }
    } else {
        header("location: index.php");
    }
?>
