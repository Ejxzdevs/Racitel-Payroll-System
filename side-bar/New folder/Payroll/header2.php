<?php 
	include "../../connection/connection.php";


	if(isset($_POST['submit'])){

	date_default_timezone_set('Asia/Manila');
	$id =$_POST['id'];
	$first_date = $_POST['a'];
	$Last_date = $_POST['b'];

	

	$sql2 = "SELECT * FROM (SELECT Employees_ID From tbl_employees_information where Employees_ID = '$id') tbl_employees_information inner join (SELECT Employees_ID,Leave_Types ,Leave_Date from tbl_file_leave where Leave_Date BETWEEN '$first_date' and '$Last_date' and Employees_ID = '$id') tbl_file_leave " ;
	$query2 = mysqli_query($conn,$sql2);
	$res2 = mysqli_fetch_assoc($query2);

	echo "<script> alert('Success') </script>";

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<p><?php echo $res2['Employees_ID']; ?></p>
<?php do{ ?>
	<p><?php echo $res2['Leave_Types']; ?> </p>
	<p><?php echo $res2['Leave_Date']; ?> </p>
<?php }while($res2=$query2->fetch_assoc()); ?>



	<form method="post" action="header2.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="date" name="a" value="<?php echo $first_date; ?>">
		<input type="date" name="b" value="<?php echo $Last_date; ?>">
		<p><?php echo $Last_date; ?></p>
		<input type="submit" name="submit">
		
	</form>

</body>
</html>