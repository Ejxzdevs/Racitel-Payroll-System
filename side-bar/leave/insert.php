<?php 
include "../../connection/connection.php";


if(isset($_POST['submit'])){

$id = $_POST['id'];
$leave = $_POST['leave'];
$message = $_POST['message'];
$leave_Count = 1;
$status = "Pending";
$date = date('Y-n-d', strtotime($_POST['date']));


$file_leave = "INSERT INTO `tbl_file_leave`(`Employees_ID`,`Leave_Types`,`Leave_Messages`,`Leave_Date`,`Leave_Count`,`Leave_Status`) VALUES ('$id ','$leave ','$message','$date','$leave_Count','$status')";
		$conn->query($file_leave) or die ($conn->error);




		echo header("Location: Pending_leave_layout.php");
}






?>