<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- google fonts: poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/grid.css">
    <link rel="stylesheet" href="vendor/css/normalize.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

    <!-- header section start -->

    <header class="headerSection">
        <div class="row">
            <div class="headContainer">
                <div class="leftContainer">
                    <h2>admin panel</h2>
                </div>
                <div class="rightContainer">
                    <form action="#" method="post">
                        <input type="search" name="keyword" placeholder="Search by Username">
                        <input class="btnSearch" type="submit" name="submit" value="Search">
                    </form>
                    <ul class="visible_list">
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- header section end -->
    <!-- sidebar start -->

    <section class="sideBar">
        <div class="sideBar_container">
            <ul>
                <li><a href="#"><i class="fa fa-tachometer"></i>dashboard</a></li>
                <li><a href="#"><i class="fa fa-address-card-o "></i>all employee</a></li>
                <li><a href="#"><i class="fa fa-unlock-alt"></i>user information</a></li>
                <!-- <li><i class="collapse_icon fa fa-caret-left"></i>collapse menu</li> -->
            </ul>
        </div>
    </section>

    <!-- sidebar end -->

    <script src="js/home.js"></script>
</body>
</html>
