<?php 

include "../../connection/connection.php";
date_default_timezone_set('Asia/Manila');
// echo " the " .date('M')." is " .date('t'). "\n";
$first_date = date('Y-m-01');
$Last_date = date('Y-m-t');

// days only  star and last days of month
$end_month = date('t');
$starting_month = $end_month - $end_month;
// 


						$sql = "SELECT * FROM (SELECT Employees_ID , First_Name FROM tbl_personal_information) tbl_personal_information
						JOIN (SELECT Employees_ID, Date_Attendance,COUNT(Date_Attendance) as Number_Attendance FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$first_date' AND '$Last_date' GROUP by Employees_ID ) tbl_time_entries 
						ON tbl_time_entries.Employees_ID = tbl_personal_information.Employees_ID 
						JOIN (SELECT Employees_ID, SUM(Basic_Salary) as Basic_Salary , SUM(Ot_Salary) as OT_Salary , SUM(Daily_Salary) as Sum_Daily_Salary  FROM tbl_salary_earning GROUP by Employees_ID) tbl_salary_earning
						ON tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID
							";
						$employees = mysqli_query($conn,$sql);
						$entries=mysqli_fetch_assoc($employees);

							error_reporting(0);




echo "<br>";
// WHOLE DATE first date of month and last date of month
$first_date = date('Y-m-01');
$Last_date = date('Y-m-t');


echo "Date from database";
echo "<br>";
ECHO $entries['First_Name']; 
echo " ";
echo $entries['Date_Attendance'];

echo "<br>";
echo "first date and last date of month";
echo "<br>";
echo "<br>";
echo $first_date;
echo "<br>";
echo $Last_date;

echo "<br>";
echo "<br>";
echo "first day and last day of month";
echo "<br>";
echo "<br>";
echo $starting_month;
echo "<br>";
echo $end_month;


?>