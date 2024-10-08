<!-- table payroll display -->
<?php 

						include "../../connection/connection.php";
						date_default_timezone_set('Asia/Manila');
						$first_date = date('Y-m-01');
						$Last_date = date('Y-m-t');

						$sql = "
						SELECT * FROM (SELECT Employees_ID , Position  FROM tbl_employees_information) tbl_employees_information
						JOIN (SELECT Employees_ID , First_Name  FROM tbl_personal_information) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
						JOIN (SELECT Employees_ID, COUNT(Date_Attendance) as Number_Attendance FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$first_date' AND '$Last_date' GROUP by Employees_ID ) tbl_time_entries 
						ON tbl_time_entries.Employees_ID = tbl_personal_information.Employees_ID 
						JOIN (SELECT Employees_ID, SUM(Basic_Salary) as Basic_Salary , SUM(Ot_Salary) as OT_Salary , SUM(Daily_Salary) as Sum_Daily_Salary  FROM tbl_salary_earning GROUP by Employees_ID) tbl_salary_earning
						ON tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID
							";
						$employees = mysqli_query($conn,$sql);
						$entries=mysqli_fetch_assoc($employees);

							

						// view salary display

						if(isset($_GET['id'])){

						$first = date('Y-m-01');
						$Last = date('Y-m-t');

						$id = $_GET['id'];

						$sql_view_salary = "
						SELECT * FROM (SELECT Employees_ID,Job_Department, Employee_Image,Position FROM tbl_employees_information where Employees_ID = '$id') tbl_employees_information
						JOIN (SELECT Employees_ID ,Last_Name, First_Name  FROM tbl_personal_information where Employees_ID = '$id') tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
						JOIN (SELECT Employees_ID,sum(Regular_Time) as r, sum(Overtime) as ot ,COUNT(Date_Attendance) as worked_days FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$first' AND '$Last' and Employees_ID = '$id') tbl_time_entries 
						ON tbl_time_entries.Employees_ID = tbl_personal_information.Employees_ID 
						JOIN (SELECT Employees_ID, SUM(Basic_Salary) as Basic_Salary , SUM(Ot_Salary) as OT_Salary , SUM(Daily_Salary) as Sum_Daily_Salary  FROM tbl_salary_earning  where Employees_ID = '$id') tbl_salary_earning
						ON tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID
						JOIN (SELECT Employees_ID,SSS,PHILHEALTH,PAGIBIG ,(PAGIBIG + SSS + PHILHEALTH) as Total_Deduction FROM tbl_salary_deduction where Employees_ID = '$id') tbl_salary_deduction ON
						tbl_salary_deduction.Employees_ID = tbl_salary_earning.Employees_ID  
							";
						$query_salary = mysqli_query($conn,$sql_view_salary);
						$res_salary_view=mysqli_fetch_assoc($query_salary);

					}

					// filter salary

					if(isset($_POST['filter'])){


						$first = $_POST['start'];
						$Last = $_POST['end'];

						$id = $_POST['id'];


						$sql_view_salary1 = "
						SELECT * FROM (SELECT Employees_ID,Job_Department, Employee_Image,Position FROM tbl_employees_information where Employees_ID = '$id') tbl_employees_information
						JOIN (SELECT Employees_ID ,Last_Name, First_Name  FROM tbl_personal_information where Employees_ID = '$id') tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
						JOIN (SELECT Employees_ID,sum(Regular_Time) as r, sum(Overtime) as ot ,COUNT(Date_Attendance) as worked_days FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$first' AND '$Last' and Employees_ID = '$id') tbl_time_entries 
						ON tbl_time_entries.Employees_ID = tbl_personal_information.Employees_ID 
						JOIN (SELECT Employees_ID, SUM(Basic_Salary) as Basic_Salary , SUM(Ot_Salary) as OT_Salary , SUM(Daily_Salary) as Sum_Daily_Salary  FROM tbl_salary_earning  where Employees_ID = '$id') tbl_salary_earning
						ON tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID
						JOIN (SELECT Employees_ID,SSS,PHILHEALTH,PAGIBIG ,(PAGIBIG + SSS + PHILHEALTH) as Total_Deduction FROM tbl_salary_deduction where Employees_ID = '$id') tbl_salary_deduction ON
						tbl_salary_deduction.Employees_ID = tbl_salary_earning.Employees_ID  
							";
						$query_salary1 = mysqli_query($conn,$sql_view_salary1);
						$res_salary_view1=mysqli_fetch_assoc($query_salary1);

						if ($res_salary_view1 == NULL) {
							echo "<script> alert('DATA NOT FOUND PLEASE INPUT ANOTHER DATE') </script>";
						}
						else{
							echo "<script> alert('Success') </script>";
						}

					}


				

						error_reporting(0);


						?>

					

						<?php 

							include "../../connection/connection.php";
							date_default_timezone_set('Asia/Manila');
							$first_date = date('Y-m-01');
							$Last_date = date('Y-m-t');
							if(isset($_GET['salary-search']))
							{
				
							$search = $_GET['salary-search'];

							$sql = "SELECT * FROM (SELECT Employees_ID,First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
							JOIN (SELECT Employees_ID, COUNT(Date_Attendance) as Number_Attendance FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$first_date' AND '$Last_date' GROUP by Employees_ID ) tbl_time_entries 
							ON tbl_time_entries.Employees_ID = tbl_personal_information.Employees_ID 
							JOIN (SELECT Employees_ID, SUM(Basic_Salary) as Basic_Salary , SUM(Ot_Salary) as OT_Salary , SUM(Daily_Salary) as Sum_Daily_Salary  FROM tbl_salary_earning GROUP by Employees_ID) tbl_salary_earning
							ON tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID
							Where First_Name LIKE '$search%' or Last_Name LIKE '$search%'";
						$employees = mysqli_query($conn,$sql);
						$entries=mysqli_fetch_assoc($employees);

}
?>