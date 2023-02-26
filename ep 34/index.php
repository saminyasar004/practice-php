<?php

if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    if ($email != "") {
        $connect = mysqli_connect('localhost', 'root', '', 'practice') or die("Connection Failed" . mysqli_error($connect));
        $query = "select * from admin_info where email = '$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $pwd = $row['pwd'];
                $subject = "Password Recover";
                $body = "Hi $username your password is : $pwd";
                $headers = "From: yasarsamin57@yahoo.com";
                if (mail($email, $subject, $body, $headers)) {
                    echo "Email successfully sent.";
                } else {
                    echo "Sorry";
                }
            }
        }
    } else {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">
        <label>Recover Password: </label>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>
