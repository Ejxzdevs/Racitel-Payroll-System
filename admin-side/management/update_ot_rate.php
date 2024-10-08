<?php 
include "../../connection/connection.php";


if(isset($_POST['submit'])){

$ot_rate = $_POST['ot_rate'];

$sql = " UPDATE `tbl_rate` SET OT_Rate = '$ot_rate' " ;

$conn->query($sql) or die ($conn->error);

	

echo header("location: edit_ot_rate_layout.php");


}
?>


