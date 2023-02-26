<?php

include "helper/connect.php";
include "helper/function.php";

$err = "";

if (isset($_REQUEST["submit"])) {
    $fname = mysqli_real_escape_string($connect, $_REQUEST["fname"]);
    $lname = mysqli_real_escape_string($connect, $_REQUEST["lname"]);
    $username = mysqli_real_escape_string($connect, $_REQUEST["username"]);
    $email = mysqli_real_escape_string($connect, $_REQUEST["email"]);
    $password = mysqli_real_escape_string($connect, hashPassword($_REQUEST["password"]));
    if (emptyInputSignup($fname, $lname, $username, $email, $password) == false) {
        header("location: register.php?err=emptyInput");
        die();
    }
    if (usernameExist($connect, $username) == false) {
        header("location: register.php?err=usernameExist");
        die();
    }
    if (emailExist($connect, $email) == false) {
        header("location: register.php?err=emailExist");
        die();
    }
    createAccount($connect, $fname, $lname, $username, $email, $password);
}

if (isset($_REQUEST["err"])) {
    $getErr = $_REQUEST["err"];
    if ($getErr == "emptyInput") {
        $err = "all fields are required.";
    } else if ($getErr == "usernameExist") {
        $err = "username already exist.";
    } else if ($getErr == "emailExist") {
        $err = "email already exist.";
    } else if ($getErr == "cannotCreate") {
        $err = "something went wrong. please try again later.";
    } else {
        $err = "";
    }
}

$err = ucfirst($err);

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signup to Chatbot</title>
    <!-- google fonts: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!--- google fonts: Poppins ------>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!--- FONT AWESOME ------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <!-- linking favicn icon -->
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <!-- linking vendor files -->
    <link rel='stylesheet' href='./vendor/css/grid.css'>
    <link rel='stylesheet' href='./vendor/css/normalize.css'>
    <!-- linking stylesheet -->
    <link rel='stylesheet' href='./css/style.css'>
    <link rel="stylesheet" href="./css/responsive.css" />
</head>

<body>
    <header class="register-header">
        <div class="container">
            <div class="row">
                <div class="register-form-wrapper">
                    <!-- form start -->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
                        <div class="card-head">
                            <h3>signup</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fname">first name</label>
                                <input class="inputField" type="fname" name="fname" placeholder="Enter your first name" />
                            </div>
                            <div class="form-group">
                                <label for="lname">last name</label>
                                <input class="inputField" type="lname" name="lname" placeholder="Enter your last name" />
                            </div>
                            <div class="form-group">
                                <label for="username">username</label>
                                <input class="inputField" type="username" name="username" placeholder="Enter your username" />
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input class="inputField" type="email" name="email" placeholder="Enter your email" />
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input class="inputField" type="password" name="password" placeholder="Enter your password" />
                            </div>
                        </div>
                        <div class="card-end">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Create Account" class="btn btn-submit" />
                            </div>
                        </div>
                    </form>
                    <!-- form end -->
                    <div class="card-links">
                        <div class="links-wrapper">
                            <a href="./login.php" class="link-login">login</a>
                        </div>
                    </div>
                    <div class="phpError">
                        <?php
                        echo $err;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>