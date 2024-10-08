<?php 
include "../../connection/connection.php";

if(isset($_POST['submit'])){

$sss = $_POST['sss'];
$phil = $_POST['phil'];
$pagibig = $_POST['pagibig'];
$id = $_POST['id'];

$deduction = "INSERT INTO `tbl_salary_deduction`(`Employees_ID`,`PHILHEALTH`,`PAGBIG`,`SSS`) VALUES ('$id','$phil','pagibig','sss')";
						$conn->query($deduction) or die ($conn->error);
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
	<form method="post" action="rrrr.php"> 
		<input type="text" name="id">
		<input type="text" name="sss">
		<input type="text" name="phil">
		<input type="text" name="pagibig">
	<input type="submit" name="submit">

	</form>

</body>
</html>