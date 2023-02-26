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
        $phone = $_REQUEST['phone'];
        if ($phone != "") {
            $connect = mysqli_connect('localhost', 'root', '', 'practice') or die("Connection Failed!" . mysqli_error($connect));
            $query = "select * from sms_sent where phone = '$phone'";
            $result = mysqli_query($connect, $query);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $pwd = $row['pwd'];
                    $to = "0$phone";
                    $token = "446a13b2dfbd97d99c06ac57821a99c3";
                    $message = "Hi $username your password is: $pwd";

                    $url = "http://api.greenweb.com.bd/api.php";


                    $data = array(
                        'to' => "$to",
                        'message' => "$message",
                        'token' => "$token"
                    ); // Add parameters in key value
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);

                    //Result
                    echo $smsresult;

                    //Error Display
                    echo curl_error($ch);
                }
            } else {
                header("location: form.php");
            }
        }
    }

    ?>
    <form action="forgot_pwd.php" method="post">
        <input type="phone" name="phone" placeholder="Phone">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>
