<?php 

include "../../connection/connection.php";


$select_allowance = "SELECT * FROM tbl_employees_information 
LEFT JOIN tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
INNER JOIN(SELECT Employees_ID,count(Allowance_Emp_ID) as no_allowance ,@aid:= Allowance_ID AS Allowance_ID,(SELECT `Allowance_Value` FROM tbl_allowance_list where Allowance_ID = @aid) AS Allowance_Value FROM tbl_allowance_emp group by Employees_ID ) tbl_allowance_emp on tbl_personal_information.Employees_ID = tbl_allowance_emp.Employees_ID";
$query_allowance = mysqli_query ($conn,$select_allowance);
$result_allowance = mysqli_fetch_assoc($query_allowance);


 

if(isset($_POST['submit'])){

	$name = $_POST['name'];

	$select_allowance = "SELECT * FROM (SELECT * FROM tbl_employees_information) tbl_employees_information
		LEFT JOIN (SELECT * FROM tbl_personal_information WHERE First_Name LIKE '$name%' or Last_Name LIKE '$name%') tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
		INNER JOIN(SELECT Employees_ID,count(Allowance_Emp_ID) as no_allowance ,@aid:= Allowance_ID AS Allowance_ID,(SELECT `Allowance_Value` FROM tbl_allowance_list where Allowance_ID = @aid) AS Allowance_Value FROM tbl_allowance_emp group by Employees_ID ) tbl_allowance_emp on tbl_personal_information.Employees_ID = tbl_allowance_emp.Employees_ID";
	$query_allowance = mysqli_query ($conn,$select_allowance);
	$result_allowance = mysqli_fetch_assoc($query_allowance);



}




// POP UP

if(isset($_GET['id']))
{

$id = $_GET['id'];


$select_allowance_info = "SELECT * FROM (SELECT Employees_ID,Employee_Image , @dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name, @pos_id:= Position_ID AS Position_ID ,(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name FROM tbl_employees_information WHERE Employees_ID = $id) tbl_employees_information INNER JOIN (SELECT Employees_ID , First_Name , Last_Name FROM tbl_personal_information WHERE Employees_ID = $id) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID LEFT JOIN (SELECT Employees_ID,Allowance_Status,Allowance_Emp_ID,@allow_id:= Allowance_ID as id,(SELECT `Allowance_Name` from tbl_allowance_list WHERE Allowance_ID = id) as Allowance_Name,(SELECT `Allowance_Value` from tbl_allowance_list WHERE Allowance_ID = id) as Allowance_Value FROM tbl_allowance_emp WHERE Employees_ID = $id) tbl_allowance_emp ON tbl_personal_information.Employees_ID = tbl_allowance_emp.Employees_ID;"; 
$query_a = mysqli_query($conn,$select_allowance_info);
$result_allowance_info = mysqli_fetch_assoc($query_a); 





error_reporting(0);



}

// GIVE ALLOWANCES


$select_all_allowance = "SELECT * FROM `tbl_allowance_list`";
$query_all_allowance = mysqli_query($conn,$select_all_allowance);
$fetch_all_allowance = mysqli_fetch_assoc($query_all_allowance);


				

?>