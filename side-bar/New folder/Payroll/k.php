<?php 
session_start();
include "../../connection/connection.php";
require('fpdf.php');

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");
$pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
$pdf->SetFont(family:'arial',style:'',size:'8');
$query=mysqli_query($conn,"SELECT * FROM (SELECT Employees_ID , Job_Department ,Position FROM tbl_employees_information) tbl_employees_information
						JOIN(SELECT Employees_ID, First_Name , Last_Name FROM tbl_personal_information) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
						JOIN (SELECT Employees_ID, COUNT(Date_Attendance) as Number_Attendance FROM tbl_time_entries GROUP by Employees_ID ) tbl_time_entries 
						JOIN (SELECT Employees_ID, SUM(Basic_Salary) as Basic_Salary , SUM(Ot_Salary) as OT_Salary , SUM(Daily_Salary) as Sum_Daily_Salary  FROM tbl_salary_earning GROUP by Employees_ID) tbl_salary_earning
						ON tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID
						JOIN(SELECT Employees_ID,PAGIBIG,PHILHEALTH,SSS,(PAGIBIG + SSS + PHILHEALTH) as Total_Deduction FROM  tbl_salary_deduction)tbl_salary_deduction ON tbl_salary_earning.Employees_ID = tbl_salary_deduction.Employees_ID
						");
					
while ($data=mysqli_fetch_array($query)) {

$pdf->AddPage();
$pdf->cell(180,4,'Paycon Inc.',0,1,'C');
$pdf->cell(180,8,'Prenza Marilao Bulacan',0,1,'C');
$pdf->ln(4);

$pdf->cell(80,4,"Employee Name: " . $data['First_Name'] . " " .$data['Last_Name'] ,0,0,'L');
$pdf->cell(80,4,'Date: ',0,0,'L');
$pdf->cell(40,4,'Leave: ',0,1,'L');

$pdf->cell(80,4,"Employee ID: " . $data['Employees_ID'],0,0,'L');
$pdf->cell(40,4,'Worked Days: ' . $data['Number_Attendance'],0,1,'L');

$pdf->cell(80,4,'Department: ' . $data['Job_Department'],0,0,'L');
$pdf->cell(40,4,'Date Pays: ' . $date,0,1,'L');

$pdf->cell(80,4,'Position: ' . $data['Position'] ,0,1,'L');

$pdf->ln(8);
$pdf->cell(90,6,'Earnings ',1,0,'C');
$pdf->cell(90,6,'Deductions ',1,1,'C');

$pdf->cell(90,6,'Basic Salary ' . $data['Basic_Salary'],1,0,'L');
$pdf->cell(90,6,'GROSS-SALARY: '. $data['Sum_Daily_Salary'],1,0,'L');

$pdf->cell(180,6,'NET-SALARY: ' . $data['Sum_Daily_Salary'] ,1,0,'C');


}
$pdf->Output("payslip.php", "I");



// type of output
// D FOR DOWDLOAD
// I for viewtype also can change the ext. it can be .php for view type , .pdf view in browser

?>



