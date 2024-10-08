<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head><body>
	<?php 
	INCLUDE "Connection.php";

	date_default_timezone_set("Asia/Manila");


	if(isset($_POST['submit'])){

		echo $name = $_POST['name'];
		$time_in = date("Y-m-d h:i:s");
		// echo $in = $_POST['in'] . date("Y-m-d");
		// echo $out = $_POST['out'] . date("Y-m-d");
		$insert_time = mysqli_query($conn,"INSERT INTO `test` (`name`,`time_in`) VALUES ('$name','$time_in')");

	// echo header("Location: in.php");
	}




	?>
	<form action="in.PHP" method="POST">
		<label>in</label>
		<!-- <input type="time" name="in">
		<input type="time" name="out"> -->
		<input type="text" name="name">
		<input type="submit" name="submit">
	</form>
	<a href="tae.php">back</a>

</body>
</html>