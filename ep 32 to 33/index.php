<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Send</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php

    $connect = mysqli_connect('localhost', 'root', '', 'practice') or die("Connection Failed!" . mysqli_error($connect));
    $query = "select * from admin_info";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {

    ?>

        <form action="send_email.php" method="post">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            <center>DB ID</center>
                        </th>
                        <th>
                            <center>Username</center>
                        </th>
                        <th>
                            <center>Email</center>
                        </th>
                        <th>
                            <center><input type="submit" name="submit" class="btn btn-primary" value="Send"></center>
                        </th>
                    </tr>
                </thead>

                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $pwd = $row['pwd'];

                ?>

                    <tbody>
                        <tr>
                            <td>
                                <center><?php echo $id;  ?></center>
                            </td>
                            <td>
                                <center><?php echo $username;  ?></center>
                            </td>
                            <td>
                                <center><?php echo $email;  ?></center>
                            </td>
                            <td>
                                <center><input type="checkbox" name="checked_id[]" value="<?php echo $id; ?>"></center>
                            </td>
                        </tr>
                    </tbody>

                <?php
                }

                ?>

            </table>
        </form>

    <?php

    }

    ?>

</body>

</html>
