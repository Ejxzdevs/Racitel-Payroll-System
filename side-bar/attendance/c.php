<?php 


date_default_timezone_set('Asia/Manila');
$time_out = date("13:30");


$a = date("h:i A", strtotime($time_out));
echo "<BR>";
// echo $a;

echo "<BR>";
// echo strtotime($time_out);

echo "<BR>";echo "<BR>";echo "<BR>";echo "<BR>";
$b=date("10:00");
$c=date("15:50");

echo "<BR>";echo "<BR>";echo "<BR>";echo "<BR>";

$subb = strtotime($b);
$subc = strtotime($c);

$total = ($subc - $subb)/60/60;


// $hours = number_format($total,0);
echo "<BR>";echo "<BR>";

$sahod = 10;

$t = floor($total);
echo "<BR>";echo "<BR>";

// echo $t * $sahod; 


// echo "<BR>";echo "<BR>";
// echo "<BR>";echo "<BR>";
// if ($total == $whole) {
// 	echo $total;
// }





echo "<BR>";echo "<BR>";


// compute late
		// $minute = date("i");
		// $hr = 60;
		// $late = $hr - $minute;
		
		// echo "<br>";
		// echo $late; echo "mins late";
		// echo "<br>";


include "../../connection/connection.php";
	$date = date('Y-m-d');
	$sql = "SELECT * FROM tbl_holiday where Doh = '$date' ";
	$holiday = mysqli_query($conn,$sql);
	$res_holiday=$holiday->fetch_assoc();



	echo $res_holiday['Doh'];

	echo "<br>";echo "<br>";
	echo "rate: ".$res_holiday['Rate'];
	echo "<br>";echo "<br>";

	echo $date;
	echo "<br>";echo "<br>";


 // $holiday = date('M-d-Y', strtotime($res_holiday['Doh'])); 


$k = "28-1-2023";

$time = strtotime($k);
$last = date('M-d-Y',$time);

if ($date == $last) {
	echo "HELLO";
}else{
	echo "HEI";
}
echo "<br>";


?>