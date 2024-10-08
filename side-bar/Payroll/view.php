<?php 
session_start();
include "../../connection/connection.php";
require('pdf/fpdf.php');
date_default_timezone_set('Asia/Manila');
$current_date = date("F d Y");


$payroll_id = $_GET['id'];

$salary_id = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_ID = $payroll_id ";
$query_id = mysqli_query($conn,$salary_id);
$result_salary = mysqli_fetch_assoc($query_id);

$result_salary['Payroll_ID'];
$pstart =  date("M d Y",strtotime($result_salary['Payroll_Start']));
$pend = date("M d Y",strtotime($result_salary['Payroll_End']));

// computation earnings
$select_salary = "SELECT * FROM (SELECT * FROM tbl_personal_information) tbl_personal_information INNER JOIN (SELECT Employees_ID,sum(Ot_Salary) as OS , sum(Regular_Salary) as RS FROM tbl_salary_earning) tbl_salary_earning ON tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID ";
$query_earning = mysqli_query($conn,$select_salary);
$result_earning = mysqli_fetch_assoc($query_earning);
// Computation deductions




$pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
$pdf->SetFont(family:'arial',style:'',size:'8');

do {

$id = $result_earning['Employees_ID'];

$select_deduction = "SELECT * FROM (SELECT Employees_ID,@did:= Deduction_ID as Deduction_ID,
		(SELECT `Deduction_Name` from tbl_deductions_list Where Deduction_ID = @did ) as Deduction_Name,
		(SELECT `Deduction_Value` from tbl_deductions_list Where Deduction_ID = @did) as Deduction_Value 
			FROM tbl_deduction_emp WHERE Employees_ID = $id AND Deduction_Status = 'Enable') tbl_deduction_emp ";
$query_deduction = mysqli_query($conn,$select_deduction);


// total deducton
		$select_total_deduction = "SELECT * FROM (SELECT Employees_ID,@did:= Deduction_ID as Deduction_ID,
		(SELECT `Deduction_Name` from tbl_deductions_list Where Deduction_ID = @did ) as Deduction_Name,
		(SELECT `Deduction_Value` from tbl_deductions_list Where Deduction_ID = @did) as Deduction_Value 
			FROM tbl_deduction_emp WHERE Employees_ID = $id AND Deduction_Status = 'Enable') tbl_deduction_emp ";
		$query_total_deduction = mysqli_query($conn,$select_total_deduction);
		$total_d = 0; 
			WHILE($result_total_deduction=mysqli_fetch_assoc($query_total_deduction)){
		$total_d += $result_total_deduction['Deduction_Value'];
	}


$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->cell(190,10,'Racitelcom Inc',0,1,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->cell(190,6,'McArthur Highway Villarica Rd',0,1,'C');
$pdf->SetFont('Arial', '', 12);
$pdf->cell(190,10,"Name: " . $result_earning['First_Name'] . " " . $result_earning['Last_Name'],0,'C');
$pdf->cell(190,10,"Date Run: " . $current_date,0,'C');
$pdf->cell(190,10,"From " . $pstart . " To " .  $pend,0,'C');
$pdf->ln(20);


$pdf->SetFont('Arial', 'B', 12);
$pdf->cell(190,12,"Earnings"  ,1,1,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->cell(95,10,"Basic Salary: "  ,1,0,'C');
$pdf->cell(95,10, $result_earning['RS']  ,1,1,'C');
$pdf->cell(95,8,"Overtime Pay: "  ,1,0,'C');
$pdf->cell(95,8,$result_earning['OS'],1,1,'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(95,8,"Gross Salary "  ,1,0,'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(95,8,$gross = $result_earning['OS'] + $result_earning['RS'] ,1,1,'C');
$pdf->ln(8);

$pdf->SetFont('Arial', 'B', 12);
$pdf->cell(190,12,"Deductions"  ,1,1,'C');
$pdf->SetFont('Arial', '', 10);
WHILE($res_duduction = mysqli_fetch_assoc($query_deduction)){ 
$pdf->SetFont('Arial', '', 10);
$pdf->cell(95,10,$res_duduction['Deduction_Name']  ,1,0,'C');
$pdf->cell(95,10,$res_duduction['Deduction_Value']  ,1,1,'C');
}





$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(95,8,"Total Deductions"  ,1,0,'C');
$pdf->cell(95,8,$total_d  ,1,1,'C');



$pdf->ln(10);

$pdf->SetFont('Arial', 'B', 15);
$pdf->cell(95,8,""  ,0,0,'C');
$pdf->cell(50,8,"Net Salary: "  ,0,0,'R');
$pdf->cell(40,8, $gross - $total_d  ,0,1,'L');


}while($result_earning=$query_earning->fetch_assoc());

$filename = "payslip.pdf";
$pdf->output('F' , $filename, TRUE);



header('Content-type:application/pdf');
header('Contebt-Description: inline;filename="' .$filename.  '"');
header('Content-Transfer-Encoding:binary');
header('Accept-ranges:bytes');
@readfile($filename);

?>