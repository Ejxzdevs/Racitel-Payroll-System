<?php 
include "../../connection/connection.php";
date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');

$id = $_GET['id'];

$select_entry_info = "SELECT * FROM
(SELECT Employees_ID,Employee_Image,
@sid:= Schedule_ID AS Schedule_ID,
(SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_In,
(SELECT `Schedule_Out` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Out,
(SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate,
(SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Name,
@did:= Department_ID AS Department_ID,
(SELECT `Department_Name` from tbl_department WHERE Department_ID = @did) as Department_Name,
@pid:= Position_ID AS Position_ID,
(SELECT `Position_Name` from tbl_position WHERE Position_ID = @pid) as Position_Name
FROM tbl_employees_information WHERE Employees_ID = '$id') 
tbl_employees_information 
INNER JOIN
(SELECT * FROM tbl_personal_information WHERE Employees_ID = '$id') tbl_personal_information 
ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
INNER JOIN
(SELECT * FROM tbl_time_entries WHERE Date_Attendance = '$current_date' AND Employees_ID = '$id') tbl_time_entries 
ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID ";
$query_entry_info = mysqli_query($conn,$select_entry_info);
$res_entry_info = mysqli_fetch_assoc($query_entry_info);


$time_start = date('g:i A',strtotime($res_entry_info['Time_Start']));
$time_end = date('g:i A',strtotime($res_entry_info['Time_End']));
$time_in = date('g:i A',strtotime($res_entry_info['Time_In']));
// LATE
if($res_entry_info['Late'] == 0){
	$late = 0;
}
if($res_entry_info['Late'] == 1){
	$late = $res_entry_info['Late'] . "min";
}


if($res_entry_info['Late'] > 1 && $res_entry_info['Late'] < 60){
	$late = $res_entry_info['Late'] . "mins";
}

if($res_entry_info['Late']/60 == 1){
	$late = $res_entry_info['Late']/60 . "hr";
}


if($res_entry_info['Late'] > 60 && $res_entry_info['Late'] < 120){
	$late = floor($res_entry_info['Late']/60) . "hr" . " " . $res_entry_info['Late']%60 . "mins";
}
if($res_entry_info['Late'] > 120){
	$late = floor($res_entry_info['Late']/60) . "hrs" . " " . $res_entry_info['Late']%60 . "mins";
}



// TIME OUT

if($res_entry_info['Time_Out'] == "00:00:00.000000"){
	$time_out = "";
}else{
	$time_out = date('g:i A',strtotime($res_entry_info['Time_Out']));
}

// UNDERTIME
if($res_entry_info['Undertime'] == 0){
	$undertime = "0";
}

if($res_entry_info['Undertime']/60 == 1){
	$undertime = $res_entry_info['Undertime']/60 . "hr";
}

if($res_entry_info['Undertime'] > 1 && $res_entry_info['Undertime'] < 60){
	$undertime = $res_entry_info['Undertime'] . "mins";
}
if($res_entry_info['Undertime'] > 60 && $res_entry_info['Undertime'] < 120){
	$undertime  = floor($res_entry_info['Undertime']/60) . "hr" . " " . $res_entry_info['Undertime']%60 . "mins";
}
if($res_entry_info['Undertime'] > 119 ){
	$undertime  = floor($res_entry_info['Undertime']/60) . "hrs" . " " . $res_entry_info['Undertime']%60 . "mins";
}



// computation of hours

$breaktime = 1;

if($res_entry_info['Regular_Time'] == 0 ){
	$regular_hours = "0";
}
if($res_entry_info['Regular_Time'] == 60 ){
	$regular_hours = floor($res_entry_info['Regular_Time']/60) ."hr";
}
if($res_entry_info['Regular_Time'] > 60 ){
	if($res_entry_info['Regular_Time']%60 == 0){
		$regular_hours = $res_entry_info['Regular_Time']/60 . "hrs";
	}else{
		$over_mins_in_hr = $res_entry_info['Regular_Time']%60;
		$regular_hours = floor($res_entry_info['Regular_Time']/60) ."hr". " " . $over_mins_in_hr ."mins";
	}
}

// OVERTIME



if(floor($res_entry_info['Overtime']/60) == 0 ){
	$overtime = "0";
}
if(floor($res_entry_info['Overtime']/60) == 1 ){
	$overtime = floor($res_entry_info['Overtime']/60) . "hr";
}
if(floor($res_entry_info['Overtime']/60) > 1 ){
	$overtime = floor($res_entry_info['Overtime']/60) . "hrs";
}


//  TOTAL HOURS

if($res_entry_info['Regular_Time'] == 0 && $overtime == 0){
	$total_hours = "0";
}else{
	if($res_entry_info['Regular_Time']%60 == 0 )
	{
		$total_hours = $res_entry_info['Regular_Time']/60 + floor($res_entry_info['Overtime']/60) . "hrs"; 
	}else{
		$total_hours = ((floor($res_entry_info['Regular_Time']/60) + floor($res_entry_info['Overtime']/60))) . "hrs" . " " .$res_entry_info['Regular_Time']%60 . "mins";
	}
}



if($res_entry_info['Regular_Time'] == 0){
	$total_hours = "0";
}else{
	if($res_entry_info['Regular_Time']%60 == 0 )
	{
		$total_hours = $res_entry_info['Regular_Time']/60 + floor($res_entry_info['Overtime']/60). "hrs"; 
	}else{
		$total_hours = ((floor($res_entry_info['Regular_Time']/60) + floor($res_entry_info['Overtime']/60))) . "hrs" . " " .$res_entry_info['Regular_Time']%60 . "mins";
	}
}

if($res_entry_info['Daily_Status'] == NULL){
	$status = "On Working";
}else{
	$status = $res_entry_info['Daily_Status'];
}

$data = array(
	"id"=>$res_entry_info['Employees_ID'],
	"image"=>$res_entry_info['Employee_Image'],
	"firstname"=>$res_entry_info['First_Name'],
	"lastname"=>$res_entry_info['Last_Name'],
	"department"=>$res_entry_info['Department_Name'],
	"position"=>$res_entry_info['Position_Name'],
	"schedule"=>$res_entry_info['Schedule_Name'],
	"time_start"=>$time_start,
	"time_end"=>$time_end,
	"time_in"=>$time_in,
	"late"=>$late,
	"time_out"=>$time_out,
	"undertime"=>$undertime,
	"regular_hours"=>$regular_hours,
	"overtime"=>$overtime,
	"total_hours"=>$total_hours,
	"status"=>$status

	
);



echo json_encode($data);





?>