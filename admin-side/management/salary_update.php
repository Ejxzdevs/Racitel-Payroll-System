<?php 

include "../../connection/connection.php";

$id = $_POST['id'];
$salary = $_POST['salary'];

$sql = " UPDATE `tbl_employees_information` SET Salary = '$salary' WHERE Employees_ID = '$id'" ;

$conn->query($sql) or die ($conn->error);

	

echo header("location: salary_edit.php?id=" .$id);



?>


