<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<?php 
	include "../../connection/connection.php";

	$sql = "SELECT * from tbl_employees_information";
	$query = mysqli_query($conn,$sql);
	$res = mysqli_fetch_assoc($query);

?>
<body>
	<?php do{ ?>
	<a href="header1.php?id=<?php echo $res['Employees_ID']; ?>"><?php echo $res['Employees_ID']; ?></a> <br>
<?php }while($res=$query->fetch_assoc()); ?>
</body>
</html>