<?php 

include "../../connection/connection.php";


$id = $_GET['id'];
$emp = $_GET['Emp_id'];

$select_allowance = "SELECT * FROM tbl_allowance_emp WHERE Allowance_Emp_ID = '$id'";
$query = mysqli_query($conn,$select_allowance);
$res_query = mysqli_fetch_assoc($query);


$res_query['Allowance_Status'];

if($res_query['Allowance_Status'] == 'Enable')
{

	$status_disable = 'Disable';
	$update_allowance = "UPDATE `tbl_allowance_emp` SET Allowance_Status ='$status_disable' WHERE Allowance_Emp_ID = '$id' ";
	$query = mysqli_query($conn,$update_allowance); 
}else{

	$status_enable = 'Enable';
	$update_allowance = "UPDATE `tbl_allowance_emp` SET Allowance_Status ='$status_enable' WHERE Allowance_Emp_ID = '$id' ";
	$conn->query($update_allowance);  
	



}

header("Location: edit_allowance_layout.php?id=" .$emp);
?>