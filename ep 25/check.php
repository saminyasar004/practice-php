<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        session_start();
        if (isset($_REQUEST['submit'])) {
            $username = $_REQUEST['username'];
            $pwd = $_REQUEST['pwd'];
            if ($username || $pwd != "") {
                $connect = mysqli_connect("localhost", "root", "", "practice");
                if (!$connect) {
                    die ("Connection Falied!" . mysqli_error($connect));
                }
                $query = "select * from login_info where username = '$username' and pwd = '$pwd'";
                $result = mysqli_query($connect, $query);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    $_SESSION['username'] = $username;
                    header("location: dashboard.php");
                } else {
                    echo "Please Enter Valid Login details.";
                    header("location: index.php");
                }
            }
        }
    
    ?>
</body>
</html>
