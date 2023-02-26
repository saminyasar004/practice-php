<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Submissions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php


    $connect = mysqli_connect('localhost', 'root', '', 'practice');

    if (!$connect) {
        die('Not Connected.' . mysqli_error($connect));
    }

    if (isset($_REQUEST['submit'])) {
        $keyword = $_REQUEST['keyword'];
        $query = "SELECT * FROM user_info WHERE username LIKE '%$keyword%'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
    

    // $query = "SELECT * FROM user_info";
   

        if ($count > 0) {

        ?>

            <br>
            <br>

            <center>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="name" name="username" placeholder="Username">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="file" name="upload_image">
                    <input class="btn btn-primary" type="submit" name="submit" value="Search">
                </form>
            </center>

            <br>
            <br>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Serial</th>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Username</th>
                        <th>Eamil</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php

                $serial_num = 0;
                while ($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $profile_pic = $row['profile_pic'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $pwd = $row['pwd'];
                    $serial_num++;

                ?>

                    <tbody>
                        <tr>
                            <td><?php echo "$serial_num" ?></td>
                            <td><?php echo "$id" ?></td>
                            <td><img src="upload/<?php echo "$profile_pic" ?>" ></td>
                            <td><?php echo "$username" ?></td>
                            <td><?php echo "$email" ?></td>
                            <td><?php echo "$pwd" ?></td>
                            <td><a href="single_data_edit.php?edit_id= <?php echo "$id" ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this?')" href="delete.php?id= <?php echo "$id" ?>&profile_pic=<?php echo $profile_pic ?>">Delete</a></td>
                        </tr>
                    </tbody>

                <?php

                }

                ?>

            </table>

        <?php

        } else {
            echo "No data found!";
        }
    }

    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
