<?php 
include "../../connection/connection.php";

$id = $_GET['id'];


$update_leave = "UPDATE `tbl_file_leave` SET `Leave_Status`= 'Postponed' , Leave_Count = 0 WHERE Leave_ID = $id ";
$query = mysqli_query($conn,$update_leave);




header("Location: approved_leave_layout.php");




?>