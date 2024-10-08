<?php 

include "../connection/connection.php";


if(isset($_POST['submit'])){

$id = $_POST['id'];
$date = $_POST['date'];
echo $time_in = $_POST['time_in'];
echo "<br>";
echo $time_out = $_POST['time_out'];
echo "<br>";
$choice = $_POST['select_entry'];
$rate = $_POST['rate'];

$select_salary = "SELECT `Employees_ID`,`Daily_Rate`FROM `tbl_employees_information` WHERE Employees_ID = $id ";
$query_salary = mysqli_query($conn,$select_salary);
$fetch_salary = mysqli_fetch_assoc($query_salary);

echo $sr = $fetch_salary['Daily_Rate'];
echo "<br>";


if($choice == 'a'){


$time_start = "06:00:00";
$time_end = "14:00:00";

// regular time
$regular_time = date_diff(date_create($time_in),date_create($time_out));
$min_regular_time = $regular_time->days * 24 * 60;
$min_regular_time += $regular_time->h * 60;
 $min_regular_time += $regular_time->i;
echo "<br>";
// late time


$late_time = date_diff(date_create($time_in),date_create($time_start));
$min_late = $late_time->days * 24 * 60;
$min_late += $late_time->h * 60;
$min_late += $late_time->i;


// Undetime

if(strtotime($time_out) < strtotime($time_end)){
$under_time = date_diff(date_create($time_end),date_create($time_out));
$min_undertime= $under_time->days * 24 * 60;
$min_undertime += $under_time->h * 60;
$min_undertime += $under_time->i;
$min_overtime = 0;

// Overtime 

}else{
$over_time = date_diff(date_create($time_end),date_create($time_out));
$min_overtime= $over_time->days * 24 * 60;
$min_overtime += $over_time->h * 60;
$min_overtime += $over_time->i;
$min_undertime = 0;

}

echo $total_worked_hrs = $min_overtime + $min_regular_time;
echo "<br>";

$insert_entry ="INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Hours_Worked`,`Regular_Time`,`Overtime`,`Date_Attendance`,`Late`,`Undertime`,`No_Late`) VALUES ($id,'$time_in','$time_out',$total_worked_hrs,$min_regular_time,$min_overtime,'$date',$min_late,$min_undertime,1)";
$query = mysqli_query($conn,$insert_entry); 


if($rate == 'sp'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}else if($rate == 'r'){
	$salary = ((($sr/8)/60)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*125)*$min_overtime);
}else if($rate == 'do'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}

$undertime_d = ((($sr/8)/60)*$min_undertime);
$late_d = ((($sr/8)/60)*$min_late);


$salary = mysqli_query($conn,"INSERT INTO `tbl_salary_earning`(`Employees_ID`,`Ot_Salary`,`Regular_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`) VALUES ($id,$ot_salary,$salary,'$date',$undertime_d,$late_d)");


}elseif($choice == 'b'){
	$time_start = "14:00:00";
$time_end = "22:00:00";

// regular time
$regular_time = date_diff(date_create($time_in),date_create($time_out));
$min_regular_time = $regular_time->days * 24 * 60;
$min_regular_time += $regular_time->h * 60;
$min_regular_time += $regular_time->i;
// late time


$late_time = date_diff(date_create($time_in),date_create($time_start));
$min_late = $late_time->days * 24 * 60;
$min_late += $late_time->h * 60;
$min_late += $late_time->i;


// Undetime

if(strtotime($time_out) < strtotime($time_end)){
$under_time = date_diff(date_create($time_end),date_create($time_out));
$min_undertime= $under_time->days * 24 * 60;
$min_undertime += $under_time->h * 60;
$min_undertime += $under_time->i;
$min_overtime = 0;

// Overtime 

}else{
$over_time = date_diff(date_create($time_end),date_create($time_out));
$min_overtime= $over_time->days * 24 * 60;
$min_overtime += $over_time->h * 60;
$min_overtime += $over_time->i;
$min_undertime = 0;

}

$total_worked_hrs = $min_overtime + $min_regular_time;



$insert_entry ="INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Hours_Worked`,`Regular_Time`,`Overtime`,`Date_Attendance`,`Late`,`Undertime`,`No_Late`) VALUES ($id,'$time_in','$time_out',$total_worked_hrs,$min_regular_time,$min_overtime,'$date',$min_late,$min_undertime,1)";
$query = mysqli_query($conn,$insert_entry); 




// computation

if($rate == 'sp'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}else if($rate == 'r'){
	$salary = ((($sr/8)/60)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*125)*$min_overtime);
}else if($rate == 'do'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}

$undertime_d = ((($sr/8)/60)*$min_undertime);
$late_d = ((($sr/8)/60)*$min_late);


$salary = mysqli_query($conn,"INSERT INTO `tbl_salary_earning`(`Employees_ID`,`Ot_Salary`,`Regular_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`) VALUES ($id,$ot_salary,$salary,'$date',$undertime_d,$late_d)");



}elseif($choice == 'c'){
$time_start = "22:00:00";
$time_end = "6:00:00";

// regular time
$regular_time = date_diff(date_create($time_in),date_create($time_out)->modify('+ 1day'));
$min_regular_time = $regular_time->days * 24 * 60;
$min_regular_time += $regular_time->h * 60;
echo $min_regular_time += $regular_time->i;
echo "<br>";
// late time


$late_time = date_diff(date_create($time_in),date_create($time_start));
$min_late = $late_time->days * 24 * 60;
$min_late += $late_time->h * 60;
$min_late += $late_time->i;


// Undetime

if(strtotime($time_out) < strtotime($time_end)){
$under_time = date_diff(date_create($time_end),date_create($time_out));
$min_undertime= $under_time->days * 24 * 60;
$min_undertime += $under_time->h * 60;
$min_undertime += $under_time->i;
$min_overtime = 0;

// Overtime 

}else{
$over_time = date_diff(date_create($time_end),date_create($time_out));
$min_overtime= $over_time->days * 24 * 60;
$min_overtime += $over_time->h * 60;
$min_overtime += $over_time->i;
$min_undertime = 0;

}

$total_worked_hrs = $min_overtime + $min_regular_time;



$insert_entry ="INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Hours_Worked`,`Regular_Time`,`Overtime`,`Date_Attendance`,`Late`,`Undertime`,`No_Late`) VALUES ($id,'$time_in','$time_out',$total_worked_hrs,$min_regular_time,$min_overtime,'$date',$min_late,$min_undertime,1)";
$query = mysqli_query($conn,$insert_entry); 

// computation

if($rate == 'sp'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}else if($rate == 'r'){
	$salary = ((($sr/8)/60)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*125)*$min_overtime);
}else if($rate == 'do'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}

$undertime_d = ((($sr/8)/60)*$min_undertime);
$late_d = ((($sr/8)/60)*$min_late);


$salary = mysqli_query($conn,"INSERT INTO `tbl_salary_earning`(`Employees_ID`,`Ot_Salary`,`Regular_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`) VALUES ($id,$ot_salary,$salary,'$date',$undertime_d,$late_d)");



}elseif($choice == 'd'){
// EDP

$time_start = "08:00:00";
$time_end = "17:00:00";

// regular time
$regular_time = date_diff(date_create($time_in),date_create($time_out));
$min_regular_time = $regular_time->days * 24 * 60;
$min_regular_time += $regular_time->h * 60;
$min_regular_time += $regular_time->i;
// late time


$late_time = date_diff(date_create($time_in),date_create($time_start));
$min_late = $late_time->days * 24 * 60;
$min_late += $late_time->h * 60;
$min_late += $late_time->i;


// Undetime

if(strtotime($time_out) < strtotime($time_end)){
$under_time = date_diff(date_create($time_end),date_create($time_out));
$min_undertime= $under_time->days * 24 * 60;
$min_undertime += $under_time->h * 60;
$min_undertime += $under_time->i;
$min_overtime = 0;

// Overtime 

}else{
$over_time = date_diff(date_create($time_end),date_create($time_out));
$min_overtime= $over_time->days * 24 * 60;
$min_overtime += $over_time->h * 60;
$min_overtime += $over_time->i;
$min_undertime = 0;

}

$total_worked_hrs = $min_overtime + $min_regular_time;



$insert_entry ="INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Hours_Worked`,`Regular_Time`,`Overtime`,`Date_Attendance`,`Late`,`Undertime`,`No_Late`) VALUES ($id,'$time_in','$time_out',$total_worked_hrs,$min_regular_time,$min_overtime,'$date',$min_late,$min_undertime,1)";
$query = mysqli_query($conn,$insert_entry); 




// computation

if($rate == 'sp'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}else if($rate == 'r'){
	$salary = ((($sr/8)/60)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*125)*$min_overtime);
}else if($rate == 'do'){
	$salary = ((((($sr/8)/60)/100)*130)*$min_regular_time);
	$ot_salary = ((((($sr/8)/60)/100)*130)*$min_overtime);
}

$undertime_d = ((($sr/8)/60)*$min_undertime);
$late_d = ((($sr/8)/60)*$min_late);


$salary = mysqli_query($conn,"INSERT INTO `tbl_salary_earning`(`Employees_ID`,`Ot_Salary`,`Regular_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`) VALUES ($id,$ot_salary,$salary,'$date',$undertime_d,$late_d)");





}



header("Location: selected_entry.php");



}




?>