<?php 
include "../../connection/connection.php";
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

if(isset($_POST['btnsub'])){

$from = $_POST['from'];
$to = $_POST['to'];
$type = $_POST['Type'];

$insert_payroll_list = mysqli_query($conn,"INSERT INTO `tbl_payroll_list`(`Payroll_Start`, `Payroll_End`, `Payroll_Date`, `Payroll_Status`,`Payroll_Emp_Type`) VALUES ('$from','$to','$date','Pending','$type')");





header("Location: payroll_layout.php");






}?>