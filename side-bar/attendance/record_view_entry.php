<?php 

include "../../connection/connection.php";

$id = $_GET['id'];

$select_entry = "SELECT Date_Attendance,Time_Entries_ID,@id:= Employees_ID as Employees_ID,Time_In,Time_Out,Late,Undertime,Hours_Worked,Overtime,Regular_Time,
(SELECT `First_Name` FROM tbl_personal_information Where Employees_ID = @id)
as First_Name,
(SELECT `Last_Name` FROM tbl_personal_information Where Employees_ID = @id)
as Last_Name







 FROM tbl_time_entries WHERE Time_Entries_ID = $id";
$query_entry = mysqli_query($conn,$select_entry);
$res_entry = mysqli_fetch_assoc($query_entry);


$time_in = date('g:i a',strtotime($res_entry['Time_In']));
$time_out = date('g:i a',strtotime($res_entry['Time_Out']));
$late = $res_entry['Late'];
$Undertime = $res_entry['Undertime'] .  "mins";
$regular_time = intval($res_entry['Regular_Time']/60) . "hrs " . floor($res_entry['Regular_Time']%60) . "mins";
$overtime = $res_entry['Overtime'] .  "mins";
$hours_worked = intval($res_entry['Hours_Worked']/60) . "hrs " . floor($res_entry['Hours_Worked']%60) . "mins";


$data = array(
	"id"=>$res_entry['Time_Entries_ID'],
	"firstname"=>$res_entry['First_Name'],
	"lastname"=>$res_entry['Last_Name'],
	"date"=>$res_entry['Date_Attendance'],
	"in"=>$time_in,
	"out"=>$time_out,
	"late"=>$late, 
	"undertime"=>$Undertime,
	"regular"=>$regular_time,
	"overtime"=>$overtime,
	"hours_worked"=>$hours_worked,
	



	
);



echo json_encode($data);


?>