<?php 

if (isset($_REQUEST["submit"])) {
	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$pwd = $_REQUEST['pwd'];
	if ($username || $email || $pwd != "") {
		$connect = mysqli_connect("localhost", "root", "", "test");
		if (!$connect) {
			die("Not Connect." . mysqli_error($connect));
		}
		$query = "INSERT INTO login_info (username, email, pwd) VALUES ('$username', '$email', '$pwd')";
		$result = mysqli_query($connect, $query);
	}
	header("location: show.php");
}



?>
