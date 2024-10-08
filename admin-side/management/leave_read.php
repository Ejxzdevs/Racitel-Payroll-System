<?php 
include "../../connection/connection.php";

// display in table
date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

// daily leave


$sql = "SELECT * FROM tbl_file_leave inner join tbl_personal_information ON tbl_file_leave.Employees_ID = tbl_personal_information.Employees_ID where tbl_file_leave.Leave_Date = '$date' AND Leave_Status = 'Accepted'";
$file_leave= mysqli_query($conn,$sql);
$res_file_leave=mysqli_fetch_assoc($file_leave);


// search daily
if(isset($_POST['leave_search'])){


$name = $_POST['name'];

$sql = "SELECT * FROM tbl_file_leave inner join tbl_personal_information ON tbl_file_leave.Employees_ID = tbl_personal_information.Employees_ID where tbl_personal_information.First_Name LIKE '$name%' AND tbl_file_leave.Leave_Date = '$date' AND Leave_Status = 'Accepted' OR tbl_personal_information.Last_Name LIKE '$name%' AND tbl_file_leave.Leave_Date = '$date' AND Leave_Status = 'Accepted' ";
$file_leave= mysqli_query($conn,$sql);
$res_file_leave=mysqli_fetch_assoc($file_leave);

}
// pending leave


$sql1 = "SELECT * FROM (SELECT Employees_ID, First_Name,Last_Name From tbl_personal_information) tbl_personal_information INNER JOIN (SELECT Leave_ID,Employees_ID,Leave_Types,Leave_Messages,Leave_Date,Leave_Status from tbl_file_leave) tbl_file_leave on tbl_personal_information.Employees_ID = tbl_file_leave.Employees_ID WHERE tbl_file_leave.Leave_Status = 'Pending'";
$file_leave1= mysqli_query($conn,$sql1);
$res_file_leave1=mysqli_fetch_assoc($file_leave1);


if(isset($_POST['pending_search'])){


$name = $_POST['name'];

$sql1 = "SELECT * FROM (SELECT Employees_ID, First_Name,Last_Name From tbl_personal_information) tbl_personal_information INNER JOIN (SELECT Leave_ID,Employees_ID,Leave_Types,Leave_Messages,Leave_Date,Leave_Status from tbl_file_leave) tbl_file_leave on tbl_personal_information.Employees_ID = tbl_file_leave.Employees_ID WHERE tbl_file_leave.Leave_Status = 'Pending' AND tbl_personal_information.First_Name LIKE '$name%' OR tbl_file_leave.Leave_Status = 'Pending' AND tbl_personal_information.Last_Name LIKE '$name%' ";
$file_leave1= mysqli_query($conn,$sql1);
$res_file_leave1=mysqli_fetch_assoc($file_leave1);

}
// APPROVED

$sql2 = "SELECT * FROM (SELECT Employees_ID, First_Name,Last_Name From tbl_personal_information) tbl_personal_information INNER JOIN (SELECT Leave_ID,Employees_ID,Leave_Types,Leave_Messages,Leave_Date,Leave_Status from tbl_file_leave) tbl_file_leave on tbl_personal_information.Employees_ID = tbl_file_leave.Employees_ID WHERE tbl_file_leave.Leave_Status = 'Accepted' AND Leave_Date > '$date' ";
$file_leave2= mysqli_query($conn,$sql2);
$res_file_leave2=mysqli_fetch_assoc($file_leave2);

if(isset($_POST['Approved_Search'])){

$name = $_POST['name'];

$sql2 = "SELECT * FROM (SELECT Employees_ID, First_Name,Last_Name From tbl_personal_information) tbl_personal_information INNER JOIN (SELECT Leave_ID,Employees_ID,Leave_Types,Leave_Messages,Leave_Date,Leave_Status from tbl_file_leave) tbl_file_leave on tbl_personal_information.Employees_ID = tbl_file_leave.Employees_ID WHERE tbl_file_leave.Leave_Status = 'Accepted' AND Leave_Date > '$date' AND tbl_personal_information.First_Name LIKE '$name%' OR tbl_file_leave.Leave_Status = 'Accepted' AND Leave_Date > '$date' AND tbl_personal_information.Last_Name LIKE '$name%'";
$file_leave2= mysqli_query($conn,$sql2);
$res_file_leave2=mysqli_fetch_assoc($file_leave2);



}











 // view message


	if(isset($_GET['id'])){

	$id = $_GET['id'];


 	$leave_message = "SELECT * FROM tbl_employees_information INNER JOIN tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID INNER JOIN tbl_file_leave ON tbl_employees_information.Employees_ID = tbl_file_leave.Employees_ID where tbl_file_leave.Leave_ID = '$id'"; 
 	$query_leave = mysqli_query($conn,$leave_message);
 	$res_query_leave=mysqli_fetch_assoc($query_leave);

 }

// record

	$record = "SELECT * FROM tbl_employees_information INNER JOIN 
	tbl_personal_information ON tbl_employees_information.Employees_ID = 
	tbl_personal_information.Employees_ID INNER JOIN tbl_file_leave ON tbl_personal_information.Employees_ID = tbl_file_leave.Employees_ID GROUP BY tbl_file_leave.Employees_ID "; 

 	$query_record = mysqli_query($conn,$record);
 	$res_query_record=mysqli_fetch_assoc($query_record);

 	if(isset($_POST['submit'])){

 		$name = $_POST['name'];


 	$record = "SELECT * FROM tbl_employees_information INNER JOIN 
	tbl_personal_information ON tbl_employees_information.Employees_ID = 
	tbl_personal_information.Employees_ID WHERE First_Name Like '$name%' or Last_Name Like '$name%'"; 

 	$query_record = mysqli_query($conn,$record);
 	$res_query_record=mysqli_fetch_assoc($query_record);


 	}




// leave record

 	if(isset($_GET['id']))
 	{

 	
	$year = date("Y");
	$first_date = "{$year}-01-01";
	$Last_date = "{$year}-12-01";

 	$ids = $_GET['id'];

 	$count_leave = "SELECT Employees_ID,sum(Leave_Count) as total_leave FROM tbl_file_leave WHERE Employees_ID = $id AND Leave_Status = 'Accepted'";
 	$query_count = mysqli_query($conn,$count_leave);
 	$fetch_leave = mysqli_fetch_assoc($query_count);

 	if($fetch_leave['total_leave'] == 0){
 		$total_leave = 0;
 	}else{
 		$total_leave = $fetch_leave['total_leave'];
 	}



 	$sql = "SELECT * FROM(SELECT Employees_ID,Employee_Image,@dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Job_Department, @pos_id:= Position_ID AS Position_ID ,(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position FROM tbl_employees_information where Employees_ID = '$id') tbl_employees_information
	JOIN (SELECT Employees_ID, First_Name, Last_Name from tbl_personal_information where Employees_ID = '$id') tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
			INNER JOIN (SELECT Employees_ID , Leave_ID , Leave_Types , Leave_Date ,Leave_Status from tbl_file_leave Where Employees_ID = '$id' ) tbl_file_leave ON tbl_personal_information.Employees_ID = tbl_file_leave.Employees_ID";
 	$query_leave_record = mysqli_query($conn,$sql);
 	$rows = mysqli_num_rows($query_leave_record);
 	$res_query_leave_record=mysqli_fetch_assoc($query_leave_record);


 	if(empty($res_query_leave_record['Limit_Leave'])){
 		$leave_limit = 0;
 	}ELSE{
 		$leave_limit = $res_query_leave_record['Limit_Leave'];
 	}

 	if(empty($rows)){
 		$rows = 0;
 	}ELSE{
 		$rows;
 	}

 
	}







// select

$sql = "SELECT * FROM tbl_leave ";
$leave = mysqli_query($conn,$sql);
$res_leave=mysqli_fetch_assoc($leave);



error_reporting(0);
?>


