<?php

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    if ($username != "") {
        $connect = mysqli_connect('localhost', 'root', '', 'practice') or die("Connetion Failed" . mysqli_error($connect));
        $query = "select * from admin_info where username = '$username'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $email = $row['email'];
                $username = $row['username'];
                $pwd = $row['pwd'];

                $to_email = $email;
                $subject = "Password Recovery";
                $body = "Hi, $username your password is: $pwd";
                $headers = "From: ayeshaakterpay@gmail.com";

                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                } else {
                    echo "Email sending failed...";
                }
            }
        } else {
            header("location: login.php");
        }
    } else {
        header("location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>

<body>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="name" name="username" placeholder="Username">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>
