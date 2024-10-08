<?php 


include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');


$sql = "SELECT Employees_ID , Shift_Type ,Position FROM tbl_employees_information WHERE Employees_ID = 169 ";
	$a = mysqli_query($conn,$sql);
	$emp_id=$a->fetch_assoc();

	$schedule_type = $emp_id['Shift_Type']; 

$sql ="SELECT Schedule_ID , Schedule_Name ,Schedule_In ,Schedule_Out FROM tbl_types_schedule WHERE Schedule_Name = '$schedule_type' ";
$time = mysqli_query($conn,$sql);
$schedule=mysqli_fetch_array($time);

$time_start = $schedule['Schedule_In'];
$time_end = $schedule['Schedule_Out'];
$shift = $schedule['Schedule_Name'];


echo $time_start;
echo "<br>";
echo $time_end;
echo "<br>";



$shift = date('g:i A',mktime(11,00));
$time_in = date("g:i A");

// echo $shift;
// echo "<br>";
// echo $time_in;



$cshift = strtotime($time_start);
$b = strtotime($time_in);

$diff = ($b - $cshift);

echo "<br>";
$c = floor($diff/60);
echo "<br>";


// echo "Minutes " .$c;
echo "<br>";



if ($c < 60) {
	echo $c. " Minutes";
}
elseif($c >= 60 && $c <= 120 ){
	$total = $c % 60;
	echo "1:" .$total . " Minutes";
	echo "<br>";
	echo $c. " Minutes";
}
elseif($c >= 120 && $c <= 180 ){

	$total = $c % 60;
	echo "2:" .$total . " Minutes";
	echo "<br>";
	echo $c. " Minutes";
}
elseif($c >= 180 && $c <= 240 ){

	$total = $c % 60;
	echo "3:" .$total . " Minutes";
	echo "<br>";
	echo $c. " Minutes";
}
elseif($c >= 240 && $c <= 300 ){

	$total = $c % 60;
	echo "4:" .$total . " Minutes";
	echo "<br>";
	echo $c. " Minutes";
}


$l = " " .$c;

echo "L = ".$L;

echo "<br>";








?>