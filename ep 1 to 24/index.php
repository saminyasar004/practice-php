<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in or sign up</title>
</head>

<body>


    <?php

    if (isset($_REQUEST['submit'])) {
        $username = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['pwd'];
        $gender = $_REQUEST['gender'];
        $country = $_REQUEST['country'];

        $upload_image = $_FILES['upload_image'];
        $image_name = $upload_image['name'];
        $image_type = $upload_image['type'];
        $tmp_name = $upload_image['tmp_name'];
        $loc = "upload/";

        if ($image_type == "image/png") {
            $name_changer = uniqid() . ".png";
        } else if ($image_type == "image/jpeg" || $image_type == "image/jpg") {
            $name_changer = uniqid() . ".jpg";
        }
        

        move_uploaded_file($tmp_name, $loc . $name_changer);

        if ($username || $email || $pwd || $upload_image != " ") {
            $connect = mysqli_connect("localhost", "root", "", "practice");
            if (!$connect) {
                die("Not Connect." . mysqli_error($connect));
            }
            if (!empty($upload_image)) {
                $query = "INSERT INTO user_info (profile_pic, username, email, pwd, gender, country) VALUES ('$name_changer', '$username', '$email', '$pwd', '$gender', '$country')";
            } else {
                $query = "INSERT INTO user_info (profile_pic, username, email, pwd, gender, country) VALUES ('samin-potrait-02.png', '$username', '$email', '$pwd', '$gender', '$country')";
            }
            $result = mysqli_query($connect, $query);
            header("location: test.php");
        } else {
            header("location: test.php");
        }
    }
    
    ?>
</body>

</html>
