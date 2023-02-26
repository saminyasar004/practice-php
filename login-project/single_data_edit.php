<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Signup</title>
  <!-- google fontts poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section>
    <?php

    if ($_REQUEST['edit_id']) {
        $edit_id = $_REQUEST['edit_id'];
        $connect = mysqli_connect("localhost", "root", "", "test");
        if (!$connect) {
            die("Not Connect." . mysqli_error($connect));
        }
        $query = "SELECT * FROM login_info WHERE id = $edit_id";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $email = $row['email'];
                $pwd = $row['pwd'];
            }
        }
    }

    ?>
    <div class="container">
        <div class="row">
        <div class="formBox">
            <div class="imgBox">
            <i class="fa fa-user"></i>
            </div>
            <form action="update_data_edit.php?edit_id= <?php echo $edit_id ?>" method="POST">
            <input class="name" type="name" name="username" placeholder="Name" value=" <?php echo $username ?> " required>
            <input class="email" type="email" name="email" placeholder="Email" value=" <?php echo $email ?> " required>
            <input class="pwd" type="password" name="pwd" placeholder="Password" value=" <?php echo $pwd ?> " required>
            <i onclick="showPwd(this)" class="fa eyeButton fa-eye-slash"></i>
            <input type="submit" name="submit" value="Update">
            <!-- <a target="_blank" href="show.php" class="btnShow">Show All Data</a> -->
            </form>
            <div class="overlay">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,96L48,122.7C96,149,192,203,288,202.7C384,203,480,149,576,112C672,75,768,53,864,90.7C960,128,1056,224,1152,266.7C1248,309,1344,299,1392,293.3L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            </div>
        </div>
        </div>
    </div>
</section>


  <script src="script.js"></script>
</body>
</html>
