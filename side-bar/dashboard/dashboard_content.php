<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="dashboard.css">

	<title>dashboard</title>
</head>
<body>
	<div class="container">
		<div class="left">
			<div class="number">
				<div class="num_emp">
					<div class="main">
						<p><?php echo $row; ?></p>
						<img id="dash_icon" src="../../icons/employee.png">
					</div>
					<div class="label">
						<a href="../employees/employee_list_layout.php">Employees</a>
					</div>
				</div>
					<div class="num_emp">
					<div class="main">
						<p><?php echo $row; ?></p>
						<img id="dash_icon" src="../../icons/employee.png">
					</div>
					<div class="label">
						<!-- <a href="../employees/employee_list_layout.php">Employees</a> -->
					</div>
				</div>
					<div class="num_emp">
					<div class="main">
						<p><?php echo $row; ?></p>
						<img id="dash_icon" src="../../icons/employee.png">
					</div>
					<div class="label">
						<!-- <a href="../employees/employee_list_layout.php">Employees</a> -->
					</div>
				</div>
			</div>
			<div class="graph">
					<p>s</p>
			</div>
		</div>
		<div class="right">
			
		</div>
	</div>
</body>
</html>