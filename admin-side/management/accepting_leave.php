<?php 
include "../../connection/connection.php";

if(isset($_GET['id']))
{


$id = $_GET['id'];

$accept = "UPDATE `tbl_file_leave` SET `Leave_Status`='Accepted' ,`Leave_Count` = 1 WHERE Leave_ID = $id ";
$conn->query($accept);

}
header("Location: pending_leave_layout.php");


?>