<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 : Page Not Found!</title>
  <link rel="icon" href="./forbidden.png" type="image/x-icon" />
  <style>
    * {
      user-select: none;
      -webkit-user-select: none;
      font-family: Arial;
    }

    .container {
      width: 100vw;
      height: 100vh;
      overflow: hidden;
    }
  </style>
</head>

<body>
  <!-- container start -->

  <div class="container">
    <div class="row">
      <?php
      header("location: ./../logout.php");
      ?>
    </div>
  </div>

  <!-- container end -->
  <script>
    document.addEventListener("contextmenu", (e) => {
      e.preventDefault();
    });
  </script>
</body>

</html>