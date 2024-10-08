<?php 
include "../../connection/connection.php";


if(isset($_POST['submit']))
{


$name = $_POST['name'];
$emp = "UPDATE `gago` SET name = '$name' ";
$conn->query($emp) or die ($conn->error);
		

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
	<form method="post" action="try.php">
		<input type="text" name="name">
		<input type="submit" name="submit">

	</form>
</body>
</html>