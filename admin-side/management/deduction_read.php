<?php 

include "../../connection/connection.php";


$select_deduction = "SELECT * FROM tbl_employees_information 
INNER JOIN tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
INNER JOIN(SELECT Employees_ID, count(Deduction_List_ID) as no_deduction FROM tbl_deduction_emp group by Employees_ID ) tbl_deduction_emp on tbl_personal_information.Employees_ID = tbl_deduction_emp.Employees_ID";
$query_deduction = mysqli_query ($conn,$select_deduction);
$result_deduction = mysqli_fetch_assoc($query_deduction);

if(isset($_POST['submit'])){

	$name = $_POST['name'];

		$select_deduction = "SELECT * FROM tbl_employees_information 
INNER JOIN (SELECT * FROM tbl_personal_information WHERE First_Name LIKE '$name%' or Last_Name LIKE '$name%') tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
LEFT JOIN(SELECT Employees_ID, count(Deduction_List_ID) as no_deduction FROM tbl_deduction_emp group by Employees_ID ) tbl_deduction_emp on tbl_personal_information.Employees_ID = tbl_deduction_emp.Employees_ID";
$query_deduction = mysqli_query ($conn,$select_deduction);
$result_deduction= mysqli_fetch_assoc($query_deduction);

}




// POP UP

if(isset($_GET['id']))
{

$id = $_GET['id'];


$select_deduction_info = "SELECT * FROM (SELECT Employees_ID,Employee_Image , @dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name, @pos_id:= Position_ID AS Position_ID ,(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name FROM tbl_employees_information WHERE Employees_ID = '$id') tbl_employees_information INNER JOIN
	(SELECT Employees_ID , First_Name , Last_Name FROM tbl_personal_information WHERE Employees_ID = '$id') tbl_personal_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
	LEFT JOIN (SELECT Employees_ID,Deduction_List_ID,Deduction_Status,@deduction_id:= Deduction_ID as Deduction_ID,(SELECT `Deduction_Name` from tbl_deductions_list WHERE Deduction_ID = @deduction_id) as Deduction_Name,(SELECT `Deduction_Value` from tbl_deductions_list WHERE Deduction_ID = @deduction_id) as Deduction_Value FROM tbl_deduction_emp WHERE Employees_ID = '$id') tbl_deduction_emp ON tbl_personal_information.Employees_ID = tbl_deduction_emp.Employees_ID "; 
$query_deductions = mysqli_query($conn,$select_deduction_info);
$result_query_deduction = mysqli_fetch_assoc($query_deductions); 






error_reporting(0);



}
// deduction display

$select_all_deduction = "SELECT * FROM `tbl_deductions_list`";
$query_all_deduction = mysqli_query($conn,$select_all_deduction);
$fetch_all_deduction = mysqli_fetch_assoc($query_all_deduction);

?>