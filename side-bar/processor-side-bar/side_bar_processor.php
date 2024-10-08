<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<a href="../dashboard/dashboard_layout.php"><img src="../../icons/DASHBOARD.PNG">Dash Board</a>
	<a href="../employees/employee_layout.php"><img src="../../icons/Employees-nav.svg" >Employee</a>
	<a href="../attendance/time_record_layout.php"><img src="../../icons/time_record.svg">Record</a>
		<a href="../Payroll/payroll_layout.php"><img src="../../icons/time_record.svg">Payroll</a>
	<!-- <a href="javascript: open_side();"><img src="../../icons/accounting.png">Payroll -->
	<!-- <div class="sub-payroll">
		<a href="../payroll/payroll.php">Payroll</a>
		<a href="../payroll/record_layout.php">Record</a>
		<a href="javascript: close_side();">Close</a>
	</div> -->
	</a>
	<a href="../leave/leave_layout.php"><img src="../../icons/LEAVED.PNG">Leave</a>
	<a href="../../user-entry/log-out.php"><img src="../../icons/LOG-OUT.SVG">LOGOUT</a>
	

	


</body>
<script type="text/javascript">
	function open_side(){
		document.querySelector('.sub-payroll').style.display="FLEX";
	}
	function close_side(){
		document.querySelector('.sub-payroll').style.display="NONE";
	}
</script>
</html>