<?php include "read_payroll.php" ?>

<!DOCTYPE html>
<html>
<style type="text/css">
	
		.payroll-nav-bar ul li:nth-child(1){
	border-left: solid 2PX black;
}

</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="payroll.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			<div class="home-navigation-bar">
				<ul>
					<li><p><span>P</span>ay-<span>C</span>on</p></li>
					<li><a href="../home/home.php" ><img src="../../icons/nav-dashboard.svg" style="">Dashboard</a></li>
					<li><a href="../employees/employees.php"><img src="../../icons/nav-emp.svg">Employees</a></li>
					<li><a href="../attendance/schedule.php"><img src="../../icons/nav-attendance.svg">Attendance</a></li>
					<li><a href="../payroll/payroll.php"><img src="../../icons/nav-payroll.svg">Payroll</a></li>
					<li><a href="../leave/leave.php"><img src="../../icons/folder.svg">File Leave</a></li>
					<li><a href="../../user-entry/log-out.php"><img src="../../icons/log-out.svg">Log out</a></li>
				</ul>
			</div>


			<div class="home-content">
				<div class="system-logo">
					<h1 class="logo">Payroll Management System</h1>
				</div>
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="payroll.php" style="color:#66ff66;"   >Salary</a> <img src="../../icons/salary.svg" id="img_salary" > </li>
							<li><a href="deduction.php" >History</a><img id="img_history" src="../../icons/history.svg">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<!-- <h1></h1> -->
							</div>
							<div class="salary-header-right">
								<form method="GET" action="payroll.php">			
									<input type="text" name="salary-search" class="salary-search" placeholder="Search Employee">
									<button class="submit"><i class="bi bi-search"></i></button>
								</form>
							</div>	
						</div>
						
						<div class="salary-body">
							<table class="payroll-table">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Employee Name</th>
										<th>Position</th>
										<th>Worked Days</th>
										<th>Gross Salary </th>
										<th>Action </th>
									</tr>
								</thead>
								<tbody>
									<?php do { ?>
									<tr>
										<td><?php echo $entries['Employees_ID']; ?></td>
										<td><?php echo $entries['First_Name']; ?></td>
													
										<td><?php echo $entries['Position']; ?></td>
										<td><?php echo $entries['Number_Attendance']; ?></td>	
										<td><?php echo $entries['Sum_Daily_Salary']; ?></td>
										<td><a href="salary_view.php?id=<?php echo $entries['Employees_ID']; ?> "><img id="view-icon" src="../../icons/view-action.svg"></a></td>
									</tr>
								
								</tbody>
									<?php }while($entries=$employees->fetch_assoc());  ?>

							</table>
						</div>
						<div class="salary-lower">
							<div class="salary-lower-left">
								
							</div>
							<div class="salary-lower-right">
								<div class="right-1">
									<!-- <h1>right1</h1> -->
								</div>
								<div class="right-2">
									<a href="sub-payroll.php" id="create-payroll" class="btn_payroll" >
									<!-- <img src="../../icons/create.svg" class="img_create"> -->Run Payroll</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>	
		
			</div>
		</div>
		
	</div>
</html>