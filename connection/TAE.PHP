<?PHP 

INCLUDE "Connection.php";
date_default_timezone_set('Asia/Manila');

	echo "<br>";
// echo strtotime($date);
// echo "<br>";
// // echo date("M-d-Y",strtotime($date));
// echo "<br>";
// $b = "30 day";
// echo "<br>";
// // echo $lastdate = date("M-d-Y ",strtotime("+{$b}"));
// echo $lastdate = date("Y-m-d",strtotime($date."-30 days"));
// echo "<br>";
// // echo strtotime($a);
// echo "<br>";

// $c = "30 days";

// if($date > $lastdate){

// 	echo $start = date("Y-m-d");
// 	echo "<br>";

// 	echo $last = date("Y-m-d",strtotime($start."+{$c}"));
// 	// $insert = "INSERT INTO `test`(`date_start`, `date_end`) VALUES ('$start','$last')";
// 	// $query = mysqli_query($conn,$insert);
// }else{
// 	echo "failed";
// }


$select_date = "SELECT * FROM `test` where types = 'Regular' order by ID desc ";
$query = mysqli_query($conn,$select_date);
$fetch = mysqli_fetch_assoc($query);

// echo $fetch['id'];
// echo "<br>";
echo "fist date";
echo "<br>";
echo $fetch['date_start'];
echo "<br>";
echo "last date";
echo "<br>";
echo $lastdate = $fetch['date_end'];
// echo "<br>";
// echo $fetch['Types'];


echo "<br>";
$date = date("Y-m-d");
echo "<br>";

$select_payroll_interval = "SELECT * FROM `tbl_payroll_set_date` WHERE Type_Employees = 'Regular' ";
$query_interval = mysqli_query($conn,$select_payroll_interval);
$fetch_interval = mysqli_fetch_assoc($query_interval);


echo $c = $fetch_interval['Payroll_Date_Interval'];

if($date > $lastdate){
	echo "start";
	$start_date = $date;
	echo "<br>";
	echo "end";
	echo "<br>";
	$end_date = date("Y-m-d",strtotime($start_date."+{$c}"));
	$Types = "Regular";

	$insert = "INSERT INTO `test`(`date_start`, `date_end`,`Types`) VALUES ('$start_date','$end_date','$Types')";
	$query = mysqli_query($conn,$insert);
	

}else{
	echo "<br>";
	echo "error";
}


// echo strtotime($dateTimeObject1);
// echo "<br>";
// echo strtotime($dateTimeObject2);
// echo "<br>";


// if(strtotime($dateTimeObject1) < strtotime($dateTimeObject2))
// {
//     echo " undertime";
// }else{
//     echo " no undertime";
// }






?>

<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<a href="in.php">in</a>
	<a href="out.php">out</a>

</body>
</html> -->