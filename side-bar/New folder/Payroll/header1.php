<?php 
	include "../../connection/connection.php";


	If(isset($_GET['id'])){

	date_default_timezone_set('Asia/Manila');
	$first_date = date('Y-m-01');
	$Last_date = date('Y-m-t');

	$id =$_GET['id'];

	$sql1 = "SELECT * FROM (SELECT Employees_ID From tbl_employees_information where Employees_ID = '$id') tbl_employees_information inner join (SELECT Employees_ID,Leave_Types ,Leave_Date from tbl_file_leave where Leave_Date BETWEEN '$first_date' and '$Last_date' and Employees_ID = '$id' ) tbl_file_leave " ;
	$query1 = mysqli_query($conn,$sql1);
	$res1 = mysqli_fetch_assoc($query1);

	
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

	
<?php do{ ?>
	<p><?php echo $res1['Employees_ID']; ?></p>
	<p><?php echo $res1['Leave_Types']; ?> </p>
	<p><?php echo $res1['Leave_Date']; ?> </p>
	<?php }while($res1=$query1->fetch_assoc()); ?>





	<form method="post" action="header2.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<input type="date" name="a">
		<input type="date" name="b">
		<input type="submit" name="submit">
		
	</form>
</body>
</html>