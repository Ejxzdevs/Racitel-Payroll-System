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
	<link rel="stylesheet" type="text/css" href="leave.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			

			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
						<li ><a href="leave_layout.php" style="color:#66ff66;"   >Daily</a> <img src="../../icons/checklist.png" id="img_salary" > </li>
							<li ><a href="approved_leave_layout.php" >Approved</a> <img src="../../icons/ready.png" id="img_salary" > </li>
							<li><a href="pending_leave_layout.php" >Pending</a><img id="img_history" src="../../icons/waiting-list.png">  </li>
							<li><a href="leave_record_layout.php" >Record</a><img id="img_history" src="../../icons/documents.svg">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<div class="frame-date">
								<label class="date-display"><?php $date = date('M. d Y l'); echo $date  ?><img for="datee" id="calendar" src="../../icons/calendar.svg"></label>
								</div>
								
							</div>
							<div class="salary-header-right">
								<div class="container">
								<form method="POST" action="schedule.php" class="form">			
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
						</div>
						
						<div class="salary-body" style="height: 450px;">
							<table class="payroll-table">
						
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Employee Image</th>
										<th>Employee Name</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php do{ ?>
									<tr>
										<td><?php  echo $res_query_record['Employees_ID']; ?></td>
										<td><img width="30" height="30" src="../employees/<?php echo $res_query_record['Employee_Image']; ?>"></td>
										<td><?php echo $res_query_record['First_Name']; ?> <?php echo $res_query_record['Last_Name']; ?></td>
										<td><a href="record_view.php?id=<?php  echo $res_query_record['Employees_ID'];  ?>" ><img id="view-icon" src="../../icons/view-action.svg"></a></td>
									</tr>
										
								</tbody>
								<?php }while($res_query_record=$query_record->fetch_assoc()); ?>
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
									<!-- <a href="#" id="open-leave" class="btn_payroll" >
									<img src="../../icons/create.svg" class="img_create">File Leave</a> -->
								</div>
							</div>
						</div>
					</div>
					
				</div>	
		
			</div>
			<div class="pop-record-view">
				<div class="container-view">
					<div class="title-record">
						<label>Leave Record</label>
						<a href="leave_record_layout.php">
							<img id="close-leave-record" src="../../icons/close.svg">
						</a>
					</div>
					
					<div class="body-record-leave">
						
						<div class="img-record-leave">

							<div class="personal-date">
								<form method="POST" ACTION="record_view_filter_layout.php">
								<input type="number" min="2023" max="2099" name="fil-yrs" class="year" value="2023" >
								<input type="hidden" name="id" value="<?php echo $ids; ?>">
								<input type="submit" name="filter" value="Filter">
								</form>
							</div>
							<div class="personal-img">
							
							<img id="record-img" src="../employees/<?php echo $res_query_leave_record['Employee_Image']; ?>">
							</div>

							<div class="personal-data">
							<p>Emp-ID: <span><?php echo $id; ?></span></p>
							<p>Name: <span><?php echo $res_query_leave_record['First_Name']; ?> <?php echo $res_query_leave_record['Last_Name']; ?></span></p>
							<p>Dept: <span><?php echo $res_query_leave_record['Job_Department']; ?></p>
							<p>Pos: <span><?php echo $res_query_leave_record['Position']; ?></span></p>
							<p>Leave Used: <span><?php echo $rows;?></span></p>
							<p>Leave Limit: <span><?php echo $leave_limit; ?></span></p>


							
							
							 </div>
						</div>
						
						<div class="record-leave">
							<table class="rec">
								<thead>
									<tr>
										<th>Leave</th>
										<th>Date</th>
									</tr>
								</thead>
								<?php do{ if(isset($res_query_leave_record['Employees_ID'])) { ?>
								<tbody>		
									<tr>
								<td>
										<p><?php echo $res_query_leave_record['Leave_Types']; ?></p>
								</td>
								<td>
									<p><?php echo date('M. d Y',strtotime($res_query_leave_record['Leave_Date'])); ?>
										
									</p>

								</td>
									</tr>
								</tbody>
								<?php } }while($res_query_leave_record=$query_leave_record->fetch_assoc()); ?>
									
							</table>
						</div>
						
					</div>
				
				</div>

			</div>
		</div>
		
	</div>
</body>
<script type="text/javascript">
		document.getElementById("open-leave").addEventListener("click", function(){
		document.querySelector(".pop-up-leave").style.display="flex";
		})
		document.getElementById("close-leave").addEventListener("click",function(){
		document.querySelector(".pop-up-leave").style.display="none";
		})
	</script>
</html>