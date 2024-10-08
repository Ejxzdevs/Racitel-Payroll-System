<?php 

include "../../connection/connection.php";


$num_emp = "SELECT * from tbl_employees_information ";
$query_emp = mysqli_query($conn,$num_emp);
$row = mysqli_num_rows($query_emp);





?>