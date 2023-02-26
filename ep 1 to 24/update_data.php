<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $connect = mysqli_connect("localhost", "root", "", "practice");

    if (!$connect) {
        die("Not Connect." . mysqli_error($connect));
    }

    if (isset($_REQUEST['submit'])) {
        $edit_id = $_REQUEST['edit_id'];
        $username = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['pwd'];
    }


    $query = "UPDATE user_info SET username = '$username', email = '$email', pwd = '$pwd' WHERE user_info.id = $edit_id";

    $result = mysqli_query($connect, $query);

    header('location: test.php');

    ?>

</body>

</html>
