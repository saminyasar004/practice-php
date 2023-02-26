<?php 

$connect = mysqli_connect("localhost", "root", "", "test");
if (!$connect) {
	die("Not Connect." . mysqli_error($connect));
}
if ($_REQUEST['del_id']) {
	echo $del_id = $_REQUEST['del_id'];
	$query = "DELETE FROM login_info WHERE id = $del_id";
	$result = mysqli_query($connect, $query);
	header("location: show.php");
} else {
	header("location: show.php");
} 

?>
