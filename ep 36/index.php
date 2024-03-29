<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //প্রথমে আপনার সুবিধে মত করে ডেটাবেজ হতে ডেটা নিন এখানে mysqli ব্যবহার করে mysql/mariadb ডেটাবেজ হতে ডেটা নিয়ে দেখানো হলো তবে চাইলে লুপের মধ্যে সেন্ড এর কোড দিয়ে একাধিক অথবা ডাইনামিক ভাবেও এসএমএস প্রেরন করা যাবে । তবে এভাবে ডাইনামিক প্রেরন না করে many to many পদ্ধতি ব্যবহার করুন যা এর পরবর্তি মেনুতে দেখানো হয়েছে । এটি স্ট্যাটিক এসএমএস এর জন্য বেস্ট যেমন আপনার ডেটাবেজে ১০০ নাম্বার আছে তাদের সবাইকে একটি সেম ম্যাসেজ (নোটিশ, মার্কেটিং ইত্যাদি) দিতে চান এক্ষেত্রে ডেটাবেজ থেকে আপনি সব নাম্বার একবারে নিয়ে কমা সেপারেট ফরম্যাটে সাজিয়ে একটি রিকোয়েস্টের মাধ্যমে সব এসএমএস প্রেরন করা যাবে ।

    $dblink = mysqli_connect("localhost", "root", "", "practice");
    /* If connection fails throw an error */
    if (mysqli_connect_errno()) {
        echo "Could  not connect to database: Error: " . mysqli_connect_error();
        exit();
    }
    $sqlquery = "SELECT * FROM sms_sent";
    if ($result = mysqli_query($dblink, $sqlquery)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["username"];
            $pwd = $row["pwd"];
            $phone = $row["phone"];
            $to = "$phone,$to";
        }
    }

    // আমরা $to তে সব নাম্বার কমা সেপারেট করা অবস্থায় পেয়েছি এবার এসএমএস প্রেরন করুন
    $token = "446a13b2dfbd97d99c06ac57821a99c3";
    $message = "Hi $username your password is: $pwd";

    $url = "http://api.greenweb.com.bd/api2.php";


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

    ?>
</body>

</html>
