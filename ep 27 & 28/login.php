<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- google fonts: poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendor/css/grid.css">
    <link rel="stylesheet" href="vendor/css/normalize.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php

    session_start();
    $invalid_msg = "";
    if (isset($_REQUEST['submit'])) {
        $username = $_REQUEST['username'];
        $pwd = $_REQUEST['pwd'];
        if ($username || $pwd != "") {
            $connect = mysqli_connect("localhost", "root", "", "practice");
            if (!$connect) {
                die("Connection Failed!" . mysqli_error($connect));
            }
            $query = "select * from admin_info where username = '$username' and pwd = '$pwd'";
            $result = mysqli_query($connect, $query);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $row = mysqli_fetch_assoc($result);
                $role = $row['role'];
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['is_login'] = 'yes';
                $_SESSION['current_timestamp'] = time();
                if ($role === "1") {
                    header("location: db.php");
                } else if ($role === "0") {
                    header("location: personal_db.php");
                }
            } else {
                $invalid_msg = "Please Enter a Valid Login Details.";
            }
        } else {
            header("location: login.php");
        }
    }

    ?>

    <header class="headerSection">
        <div class="row">
            <div class="formContainer">
                <div class="formHeader">
                    <h3>login</h3>
                    <center><?php echo $invalid_msg  ?></center>
                </div>
                <form action="login.php" method="post">
                    <label for="username">username</label>
                    <input type="name" name="username" placeholder="Enter username">
                    <label for="pwd">password</label>
                    <input type="password" name="pwd" placeholder="Enter Password">
                    <input type="checkbox" name="remember_pwd">
                    <label class="remember_pwd" for="remember_pwd">Remember password</label>
                    <a class="forgot_pwd" href="../ep 29 & 30/forget_pwd.php">forgote password?</a>
                    <input class="btnLogin" type="submit" name="submit" value="login">
                </form>
                <div class="formFooter">
                    <a href="#">need an account?sign up</a>
                </div>
            </div>
        </div>
    </header>

    <script src="vendor/js/html5shiv.min.js"></script>
    <script src="vendor/js/morphext.min.js"></script>
    <script src="vendor/js/respond.min.js"></script>
</body>

</html>
