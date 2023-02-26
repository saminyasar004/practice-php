

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Show All Submissions</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

	<?php 
		$connect = mysqli_connect("localhost", "root", "", "test");
		if (!$connect) {
			die("Not Connected." . mysqli_error($connect));
		}
		$query = "SELECT * FROM login_info";
		$result = mysqli_query($connect, $query);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
	?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Password</th>
					<th>Action</th>
				</tr>
			</thead>
	<?php
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['id'];
				$username = $row['username'];
				$email = $row['email'];
				$pwd = $row['pwd'];
	?>
				<tbody>
					<tr>
						<td> <?php echo $id  ?> </td>
						<td> <?php echo $username  ?> </td>
						<td> <?php echo $email  ?> </td>
						<td> <?php echo $pwd  ?> </td>
						<td><a href="single_data_edit.php?edit_id= <?php echo $id ?> ">Edit</a> | <a href="delete.php?del_id= <?php echo $id ?> ">Delete</a></td>
					</tr>
				</tbody>
	<?php
			}
	?>
		</table>
	<?php
		} else {
			echo "No Data Remain in Your Database";
		}
	?>

 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
