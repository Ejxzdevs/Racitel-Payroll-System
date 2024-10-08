<?php 
	INCLUDE "Connection.php";
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');
	echo $out = date("H:i:s");

	if(isset($_POST['submit']))
	{
	



	$id = $_POST['id'];

	
	$update = mysqli_query($conn, "UPDATE `tbl_time_entries` SET `Time_Out`='$out' WHERE Employees_ID = 269 and Date_Attendance = '$date' ");


}




	?>



		<form action="out.PHP" method="POST">
		<label>OUT</label>
		<input type="text" name="id">
		<input type="submit" name="submit">
		<a href="tae.php">back</a>
	</form>