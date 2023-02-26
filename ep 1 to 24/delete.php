

<?php 

$connect = mysqli_connect('localhost','root','','practice'); 

if (!$connect) {
	die ('Not Connected.' . mysqli_error($connect)); 
}

$id = $_REQUEST['id'];
$profile_pic = $_REQUEST['profile_pic'];

unlink("upload/" . $profile_pic);

$query = "DELETE FROM user_info WHERE id = $id";

$result = mysqli_query($connect, $query);

if ($result) {
	header("location: test.php");
}


 ?>
