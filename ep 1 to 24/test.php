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
        
    if (isset($_REQUEST['multiple_data'])) {
        $check_box = $_REQUEST['check_box'];
        $checked_data = implode(",", $check_box);
        if (isset($check_box)) {
            $connect = mysqli_connect('localhost', 'root', '', 'practice');
            if (!$connect) {
                die('Not Connected.' . mysqli_error($connect));
            }
            $query2 = "DELETE FROM user_info WHERE id in ($checked_data)";
            $result2 = mysqli_query($connect, $query2);
        } else {
            return;
        }
    }

?>



    <?php


    $connect = mysqli_connect('localhost', 'root', '', 'practice');

    if (!$connect) {
        die('Not Connected.' . mysqli_error($connect));
    }

    $query = "SELECT * FROM user_info";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {

    ?>

        <br>
        <br>

        <center>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="name" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <input type="radio" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" name="gender" value="Female">
                <label for="female">Female</label>
                <select name="country" class="countrySelect">
                    <option value="Null">Select Your Country</option>
                    <option value="America">America</option>
                    <option value="England">England</option>
                    <option value="Canada">Canada</option>
                    <option value="Beazil">Brazil</option>
                    <option value="India">India</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="China">China</option>
                </select>
                <input type="file" name="upload_image">
                <input type="submit" name="submit" value="Update">
                <a target="_blank" href="test.php">Show All Data</a>
            </form>
        </center>

        <br>
        <br>

        <form action="test.php" method="POST">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Serial</th>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Username</th>
                        <th>Eamil</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Action</th>
                        <th><input type="submit" class="btn btn-info" name="multiple_data" value="Delete Multiple Data"></th>
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
                    $gender = $row['gender'];
                    $country = $row['country'];
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
                            <td><?php echo "$gender" ?></td>
                            <td><?php echo "$country" ?></td>
                            <td><a href="single_data_edit.php?edit_id= <?php echo "$id" ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this?')" href="delete.php?id= <?php echo "$id" ?>&profile_pic=<?php echo $profile_pic ?>">Delete</a></td>
                            <td><center><input type="checkbox" name="check_box[]" value="<?php echo $id ?>"></center></td>
                        </tr>
                    </tbody>

                <?php

                }

                ?>

            </table>
        </form>

    <?php

    } else {
        echo "No data found!";
    }

    ?>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
