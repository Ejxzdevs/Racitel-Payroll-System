<?php 
include "../../connection/connection.php";


echo $id = $_GET['id'];


$delete = mysqli_query($conn,"DELETE FROM `tbl_payroll_list` WHERE Payroll_ID = $id ");

header("Location: payroll_layout.php");



?>