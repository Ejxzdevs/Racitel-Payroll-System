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
	<link rel="stylesheet" type="text/css" href="Attendance.css">
	<script src="../../jquery/jquery-3.6.3.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>

	<div class="background">
		
		

		<div class="div-background">

			<div class="home-content">
				
				<div class="box-attendance">
					<div class="attendance-nav-bar">
						<ul  >
							<li ><a href="schedule_layout.php"  class="schedule1" >INDOOR</a><img src="../../icons/workplace.png"> </li>
							<li><a href="driver_layout.php" style="color:#66ff66;">OUTDOOR</a><img src="../../icons/driver.png"> </li>
							<li><a href="attendance_layout.php" class="Attendance1">CSV FILE</a><img id="csv" src="../../icons/csv.png"></li>
							<li><a href="time_record_layout.php">Records</a><img src="../../icons/worksheet.png"> </li>
						</ul>
					</div>
					<div class="schedule">
						<div class="schedule-header">
							<div class="sched-header-left" >
								<div class="frame-date">
								<label class="date-display"><?php $date = date('M. d Y l'); echo $date  ?><img id="calendar" src="../../icons/calendar.svg"></label>
								</div>
							</div>
							<div class="sched-header-right">
								<form method="POST" action="driver.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit"  value="Search" class="search">
										</div>
									</div>
								</form>
							</div>		
						</div>
						<div class="sched-table" style="height: 420px;">
								<table class="sched-info"  >
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>shift </th>
											<th>Time In</th>
											<th>Time Out</th>
											<th>OT</th>
											<th>Late</th>
											<th>Image</th>
											<!-- <th>Date</th> -->
										</tr>
									</thead>
									<tbody>
										<?php do { if(isset($entries['Employees_ID'])){ ?>
										<tr>
											<td> <?php echo $entries['Employees_ID']; ?>
											
											</td>
											<td><?php echo $entries['First_Name']; ?> <?php echo $entries['Last_Name']; ?></td>
										<td><?php echo $entries['Time_Start']; ?> - <?php echo $entries['Time_End'];?> </td>
										<td><?php echo $entries['Time_In']; ?> </td>
										<td><?php echo $entries['Time_Out']; ?> </td>
										<td> <?php echo $entries['Overtime']; ?></td>
										<td> <?php $late = $entries['Late'];
							if ($late < 60) {
							echo "0hr & " .$late. " Minutes";
							}
							elseif($late >= 60 && $late <= 120 ){
								$total = $late % 60;
								echo "1hrs & " .$total . "Mins";
								
							}
							elseif($late >= 120 && $late <= 180 ){

								$total = $late % 60;
								echo "2hrs & " .$total . "Mins";
								
							}
							elseif($late >= 180 && $late <= 240 ){

								$total = $late % 60;
								echo "3hrs & " .$total . "Mins";
								
							}
							elseif($late >= 240 && $late <= 300 ){

								$total = $late % 60;
								echo "4hrs & " .$total . "Mins";
							}
								
							 ?></td>
							 	<td><a href="javascript: time_in_img(<?php echo $entries['Employees_ID'];  ?>); ">IN</a>
							 		<a href="javascript: time_out_img(<?php echo $entries['Employees_ID'];  ?>); ">OUT</a>
							 		<a  href="javascript: time_ot_img(<?php echo $entries['Employees_ID'];  ?>);">OT</a> </td>
										<?php } }while($entries=$query->fetch_assoc());  ?>
										</tr>
									</tbody>
								</table>
							</div>
							
					</div>
				</div>


		</div>
		<!--  POP UP START HERE -->
		<!-- time in image -->
		<div class="container-time-in">
			<div class="container-image-time-in">
				<div class="header">
					<p>TIME IN IMAGE</p>
					<a href=""><img id="close" src="../../icons/close.svg">
					</a>
				</div>
				<div class="body">
					<img id="img-in" src="" >
				</div>
			</div>
		</div>

		<!--  TIME OUT IMAGE -->


		<div class="container-time-in" id="Time_Out">
			<div class="container-image-time-in">
				<div class="header">
					<p>TIME OUT IMAGE</p>
					<a href=""><img id="close" src="../../icons/close.svg">
					</a>
				</div>
				<div class="body">
					<img id="img-out" src="" >
				</div>
			</div>
		</div>

		<!-- OVERTIME -->

		<div class="container-time-in" id="Time_OT">
			<div class="container-image-time-in">
				<div class="header">
					<p>Overtime IMAGE</p>
					<a href=""><img id="close" src="../../icons/close.svg">
					</a>
				</div>
				<div class="body">
					<img id="img-ot" src="" >
				</div>
			</div>
		</div>



		
		
	</div>
	</div>
	

<script type="text/javascript" src="driver.js"></script>
</body>
</html>

