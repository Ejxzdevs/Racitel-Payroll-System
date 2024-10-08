<?php 


include "../../connection/connection.php";


if(isset($_GET['id'])){


$emp = $_GET['Emp_id'];
$id = $_GET['id'];


$select_deduction = "SELECT * FROM tbl_deduction_emp WHERE Deduction_List_ID = '$id' ";
$query_deduction = mysqli_query($conn,$select_deduction);
$res_query_deduction = mysqli_fetch_assoc($query_deduction);

$res_query_deduction['Deduction_Status'];

if($res_query_deduction['Deduction_Status'] == 'Enable')
{

	$status_disable = 'Disable';
	$update_deduction = "UPDATE `tbl_deduction_emp` SET Deduction_Status ='$status_disable' WHERE Deduction_List_ID = '$id' ";
	$query = mysqli_query($conn,$update_deduction); 
}else{

	$status_enable = 'Enable';
	$update_deduction = "UPDATE `tbl_deduction_emp` SET Deduction_Status ='$status_enable' WHERE Deduction_List_ID = '$id' ";
	$conn->query($update_deduction);  
	



}

header("Location: edit_deduction_layout.php?id=" .$emp);



}

?>