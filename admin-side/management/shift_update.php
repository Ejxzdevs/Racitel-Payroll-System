<?php 

include "../../connection/connection.php";

$id = $_POST['id'];
$shift = $_POST['shift'];

$sql = " UPDATE `tbl_employees_information` SET Schedule_ID = '$shift' WHERE Employees_ID = '$id'" ;

$conn->query($sql) or die ($conn->error);

	

echo header("location: edit_shift_layout.php?id=" .$id);



?>


