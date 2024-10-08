<?php 

include "../../connection/connection.php";





echo $id = $_GET['id'];

$udpate_paid = mysqli_query($conn,"UPDATE tbl_payroll_list SET `Payroll_Status`= 'Pending' WHERE Payroll_ID = $id");

header("Location: Record_Layout.php");



?>