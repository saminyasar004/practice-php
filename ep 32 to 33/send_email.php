<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    if (isset($_REQUEST['submit'])) {
        $connect = mysqli_connect('localhost', 'root', '', 'practice') or die("Connection Failed!" . mysqli_error($connect));
        $checked_id = $_REQUEST['checked_id'];
        $marked_id = implode(",", $checked_id);
        $query = "SELECT * FROM admin_info WHERE id in ($marked_id)";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0 && $result == true) {
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $email = $row['email'];
                $pwd = $row['pwd'];
                $sub = "Password recovery";
                $body = "Hi $username your Password is : $pwd";
                $headers = "From: yasarsamin57@yahoo.com";
                if (mail($email, $sub, $body, $headers)) {
                    echo "Email Successfully send to $email <br>";
                } else {
                    echo "Sorry <br>";
                }
            }
        }
    }

    ?>


</body>

</html>
