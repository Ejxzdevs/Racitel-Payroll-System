<?php include "read.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="salary.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">	
	<div class="div-background">
			<div class="home-navigation-bar">
				<ul>
					<li><p><span>P</span>ay-<span>C</span>on</p></li>
					<li><a href="../dashboard/admin-home.php" ><img src="../../icons/dashboard.svg">Dashboard</a></li>
					<li><a href="../create-schedule/schedule.php"><img src="../../icons/documents.svg" id="img_manage">Schedule</a></li>
					<li><a href="../create-leave/leave.php"><img src="../../icons/documents.svg" id="img_manage">Leave</a></li>
					<li><a href="../create-holiday/holiday.php"><img src="../../icons/documents.svg" id="img_manage">Holiday</a></li>
					<li style="transition: 2s ease;" ><a  href="#" id="sub-down"><img  src="../../icons/nav-management.svg" id="img_manage">Management <img class="img_down" id="arr-right" src="../../icons/arrow-right.svg" style="filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(101deg) brightness(111%) contrast(101%);"> </a></li>
						<div id="sub-nav" class="sub-nav">
							<div id="nav"><img src="../../icons/nav_salary.svg"><a id="salary" href="salary.php">Salary</a></div>
							<div id="nav"><img id="shift" src="../../icons/shift.svg"><a href="shift.php">Shift</a></div>
							<div id="nav"><a href="#" id="sub-up"><img id="arr-up" src="../../icons/arrow-up.svg" style="filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(101deg) brightness(111%) contrast(101%);"> </a></div>
						</div>
						<li><a href="../create-user/user.php"><img src="../../icons/user-nav.svg" id="img_manage">
						Users</a></li>
					<li><a href="../../user-entry/log-out.php"><img src="../../icons/log-out.svg">Log out</a></li>
				</ul>
			</div>
			

			<div class="home-content">
				<div class="system-logo">
					<h1 class="logo">Payroll Management System</h1>
				</div>
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>Schedule LIST</label>
						</div>
						<div class="right">
							<form method="POST" action="schedule.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="" class="input" placeholder="Type text:">
										<input type="submit" name=""  value="Search" class="search">
										</div>
									</div>
								</form>
						</div>
					</div>	
					<div class="body-salary">
						<div class="box-table">
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Employee Name</th>
									<th>Department</th>
									<th>Position</th>
									<th>Salary</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{?>
							<tbody>
								<tr>
									<td><?php echo $res_salary['Employees_ID']; ?></td>
									<td><?php echo $res_salary['First_Name']; ?> <?php echo $accounts['Last_Name']; ?></td>
									<td><?php echo $res_salary['Job_Department']; ?></td>
									<td><?php echo $res_salary['Position']; ?></td>
									<td><?php echo $res_salary['Salary']; ?></td>
									<td><a href="salary.php?=<?php echo $res_salary['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
								</tr>
							</tbody>
						<?php }while($res_salary=$salary->fetch_assoc());  ?>
						</table>

					</div>
					</div>

				</div>	
				
			</div>
			<div class="pop-edit-salary">
				<form id="form" method="post" action="salary_update.php">
				<?php do{ ?>
				<div class="box-salary">

					<div class="label">
						<p>Salary rate<a id="close" href="salary.php"><img id="img_close_salary" for="close" src="../../icons/close.svg"></a></p>
					</div>
					<div class="b-salary">
						<div class="div-frame">
							<img src="../../side-bar/employees/<?php echo $res_edit_salary['Employee_Image'] ?> ">
						</div>
						<div class="div-name">
							<div class="l-name">
								<label>Name</label>
							</div>
							<div class="i-name">
								<input type="hidden" name="id"value="<?php echo $res_edit_salary['Employees_ID']; ?>">
								<p><?php echo $res_edit_salary['First_Name']; ?>  <?php echo $res_edit_salary['Last_Name']; ?></p>
							</div>
						</div>
						<div class="salary_rate">
							<div class="l-salary">
								<label>Salary Rate</label>
							</div>
							<div class="i-salary">
								<input type="text" name="salary" value="<?php echo $res_edit_salary['Salary'];?>">
							</div>
						</div>
						<div class="Action">
							<a href="#" onclick="submit()"><img src="../../icons/save.svg">Save</a>
						</div>

					</div>
				</div>
				<?php }while($res_edit_salary=$edit_salary->fetch_assoc()); ?>
				</form>
			</div>
			



	</div>	
	</div>


</body>
<script type="text/javascript">
		function submit(){
			let form = document.getElementById("form");
			form.submit();
		}
	</script>

</html>