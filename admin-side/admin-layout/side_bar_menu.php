<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<a href="../dashboard/dashboard_layout.php"><img src="../../icons/DASHBOARD.PNG">Dash Board</a>
	<a id="maintinance" href="javascript: open_main_sub_nav();"><img  style="filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(101deg) brightness(111%) contrast(101%);" src="../../icons/MAINTINANCE.PNG">Maintenance<img id="maintinance-arrow-right" src="../../icons/ARROW-RIGHT.PNG"></a>
	<div class="maintinance-sub-nav">
		<a href="../create-schedule/schedule_layout.php"><img src="../../icons/scheduled.PNG">Schedule</a>
		<a href="../create-leave/leave_layout.php"><img src="../../icons/LEAVEd.PNG">Leave</a>
		<a href="../create-holiday/holiday_layout.php"><img src="../../icons/HOLIDAYy.PNG">Holiday</a>
		<a href="../create-department/department_layout.php"><img src="../../icons/supermaket.PNG">Department</a>

		<!-- <a href="../create-allowance/allowance_layout.php"><img src="../../icons/dollar.PNG">Allowance</a> -->
		<a href="../create-deduction/deduction_layout.php"><img src="../../icons/deduction-emp.png">Deduction</a>
	
		
		<a class="maintinance-up" href="javascript: close_main_sub_nav();"><img id="maintinance-arrow-up" src="../../icons/ARROW-UP.PNG"></a>
	</div>

	<a id="management" href="javascript: open_emp_sub_nav();"><img src="../../icons/MANAGEMENT.PNG">Management<img id="management-arrow-right" src="../../icons/ARROW-RIGHT.PNG"></a>
	<div class="management-emp">
		<a href="../management/shift_layout.php"><img src="../../icons/scheduled.PNG">Schedule</a>
		<a href="../management/basic_salary_layout.php"><img src="../../icons/worker_salary.PNG">Salary Rate</a>
		<!-- <a href="../management/allowance_layout.php"><img src="../../icons/dollar.PNG">Allowance</a> -->
		<a href="../management/deduction_layout.php"><img src="../../icons/deduction-emp.png">Deductions</a>

	
		
	
		<a class="management-up" href="javascript: close_emp_sub_nav();"><img id="management-arrow-up" src="../../icons/ARROW-UP.PNG"></a>
	</div>
	<a href="../management/pending_leave_layout.php"><img src="../../icons/leaved.PNG">Leave</a>

	<a href="../create-user/user_layout.php"><img src="../../icons/USER-NAV.SVG">Users</a>
	<a href="../../user-entry/log-out.php"><img src="../../icons/LOG-OUT.SVG">LOGOUT</a>
	

	


</body>
<script type="text/javascript" src="side_bar.js"></script>
</html>