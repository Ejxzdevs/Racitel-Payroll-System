<?php 
include "../../connection/connection.php";


if(isset($_POST['save'])){

$id = $_POST['id'];
$salary = $_POST['salary'];

$sql = " UPDATE `tbl_employees_information` SET Daily_Rate = '$salary' WHERE Employees_ID = '$id'" ;

$conn->query($sql) or die ($conn->error);

	

echo header("location: edit_basic_salary_layout.php?id_edit=" .$id);


}
?>


