<?php 

include "../../connection/connection.php";

$select_all_emp ="SELECT * FROM tbl_employees_information";
$query_all_emp = mysqli_query($conn,$select_all_emp);
$count_emp = mysqli_num_rows($query_all_emp);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="container">
		<div class="sub-container">
			<div class="dashboard-box" id="no_employees">
				<div class="box-emp">
					<div class="top-emp">
						<div class="num_label">
							<p><?php echo $count_emp; ?></p>
						</div>
						<div class="num_image">
							<img src="../../icons/employee.png">
						</div>
					</div>
					<div class="bot-emp">
						<label>Employees</label>
					</div>
				</div>
			</div>
			<div class="dashboard-box">
				<p>s</p>
			</div>
			<div class="dashboard-box">
				<p>s</p>
			</div>
			<div class="dashboard-box">
				<p>s</p>
			</div>
			<div class="dashboard-box">
				<p>s</p>
			</div>
		</div>
	</div>
</body>
</html>