<?php 
include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$sql = "SELECT * FROM tbl_personal_information INNER JOIN tbl_time_entries on tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID  group by tbl_personal_information.Employees_ID  ";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();


if(isset($_GET['id'])){

$id = $_GET['id'];


$select_entry = "SELECT * FROM 
(SELECT * FROM tbl_personal_information WHERE Employees_ID = $id)tbl_personal_information LEFT JOIN 
(SELECT * FROM tbl_time_entries WHERE Employees_ID = $id ) tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_entry = mysqli_query($conn,$select_entry);
// $row = mysqli_num_rows($query_entry);
$result_entry=mysqli_fetch_assoc($query_entry);

}

// filter

if(isset($_POST['submit-filter'])){

$from = $_POST['from'];
$to = $_POST['to'];
$id = $_POST['id'];

$select_entry = "SELECT * FROM (SELECT * FROM tbl_personal_information WHERE Employees_ID = $id)tbl_personal_information INNER JOIN (SELECT * from tbl_time_entries WHERE Employees_ID = $id AND Date_Attendance BETWEEN '$from' AND '$to') tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_entry = mysqli_query($conn,$select_entry);
// $row = mysqli_num_rows($query_entry);
$result_entry=mysqli_fetch_assoc($query_entry);

header("Location: time_record_view_layout.php");

}




						
error_reporting(0);


?>