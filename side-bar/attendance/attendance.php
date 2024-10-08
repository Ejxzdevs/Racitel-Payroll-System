<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		

		.attendance-nav-bar ul li:nth-child(1){
	border-left: solid 2PX black;
	

}



	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="attendance.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">		
		<div class="div-background">
			<div class="home-navigation-bar">
				<ul>
					<li><p><span>P</span>ay-<span>C</span>on</p></li>
				
					<li><a href="../home../home.php" ><img src="../../icons/nav-dashboard.svg">Dashboard</a></li>
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
				<div class="box-attendance">
					<div class="attendance-nav-bar">
						<ul  >
							<li ><a href="schedule.php"  class="schedule1" >Schedule</a><img src="../../icons/schedule1.svg"> </li>
							<li><a href="time_record.php" >Records</a><img src="../../icons/time_record.svg"> </li>
							<li><a href="attendance.php"style="color:#66ff66;" class="Attendance1">CSV FILE</a><img id="csv" src="../../icons/csv.svg"></li>
						</ul>
					</div>
					<div class="csv">
						<div class="csv-option">
							<div class="csv-filter-date">
							<form action="attendance.php" method="get">
								<div class="grp-date">
								<label>From Date</label>
								<input type="date" name="fr-date" class="fr-date">
								</div>
								<div class="grp-date">
								<label>To Date</label>
								<input type="date" name="to-date" class="to-date">
								</div>
								<div class="filter-date">
								<input type="submit" name="submit-date-filter" value="FILTER">
								</div>
							</form>
							</div>
							<div class="upload-csv">
							<form method="post"	enctype="multipart/form-data" action="upload-csv.php">
								<div>
								<input type="file" name="upload" class="find-file" required>
								</div>
								<div>
								<input type="submit" name="btnupload" class="csv-button-upload" value="Upload Time Entry">
								</div>
							</form>
							</div>
						</div>
						<div class="csv-table">
							<table class="csv-table-content">
							<?php
							include "../../connection/connection.php";


							$sql = "SELECT * FROM tbl_csv limit 10 ";
							$query = mysqli_query($conn,$sql);
							$attendance=$query->fetch_assoc();

							error_reporting(0);

							if(isset($_GET['fr-date']) && isset($_GET['to-date']))
							{

							$fr_date = $_GET['fr-date'];
							$to_date = $_GET['to-date'];

							$sql = "SELECT *From tbl_csv WHERE Date_upload BETWEEN '$fr_date' AND '$to_date' limit 10 ";
							$query = mysqli_query($conn,$sql);
							$attendance=$query->fetch_assoc();

							error_reporting(0);
							}	

							?>
								<thead>
									<tr>
										<th>CSV ID</th>
										<th>DATE</th>
										<th>Status</th>

									</tr>
								</thead>
								<tbody>
								<?php do { ?>
									<tr>
										<td> <?php echo $attendance['Csv_ID']; ?> </td>
										<td><?php echo $attendance['Date_Upload']; ?></td>
										<td> <?php echo $attendance['Status']; ?></td>
									</tr>
								<?php }while($attendance=$query->fetch_assoc());  ?>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>