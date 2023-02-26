<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- google fonts: poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/grid.css">
    <link rel="stylesheet" href="vendor/css/normalize.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['is_login'])) {
        include "home.php";
        if ((time() - $_SESSION['current_timestamp']) > 10) {
            header("location: logout.php");
        }
    } else {
        header("location: login.php");
    }
    ?>
</body>

</html>
