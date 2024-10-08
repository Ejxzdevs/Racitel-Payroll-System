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
						<li ><a href="leave_layout.php"  >Daily</a> <img src="../../icons/checklist.png" id="img_salary" > </li>
							<li ><a href="approved_leave_layout.php" >Approved</a> <img src="../../icons/ready.png" id="img_salary" > </li>
							<li><a href="pending_leave_layout.php">Pending</a><img id="img_history" src="../../icons/waiting-list.png">  </li>
							<li><a href="leave_record_layout.php" style="color:#66ff66;"  >Record</a><img id="img_history" src="../../icons/documents.svg">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
							
								
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
										<td><img width="30" height="30" src="../../side-bar/employees/<?php echo $res_query_record['Employee_Image']; ?>"></td>
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
			<div class="container-view-leave">
				<div class="box-record-leave">
					<div class="div-head-record">
						<label>Record</label>
						<a href="leave_record_layout.php"><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="div-view-record">
						<form>
							<div class="left">
								<div class="img-record-leave">
									<img src="../../icons/user1.png">
								</div>
								<div class="profile-record-leave">
									<p>ID: <span><?php echo $res_query_leave_record['Employees_ID']; ?></span></p>
									<p>Name: <span><?php echo $res_query_leave_record['First_Name'] . " " . $res_query_leave_record['Last_Name']; ?></span></p>
									<p>Department: <span><?php echo $res_query_leave_record['Job_Department']; ?></span></p>
									<p>Position: <span><?php echo $res_query_leave_record['Position']; ?></span></p>
									<p>Total Leave: <span><?php echo $total_leave; ?></span></p>
								</div>
							</div>
							<div class="right">
								<table>
									<tr>
										<th>Leave ID</th>
										<th>Leave Name</th>
										<th>Leave Date</th>
										<th>Leave Status</th>
										
									</tr>
									<?php do{ if(isset($res_query_leave_record['Leave_ID'])){ ?>
									<tr>
										<td><?php echo $res_query_leave_record['Leave_ID']; ?></td>
										<td><?php echo $res_query_leave_record['Leave_Types']; ?></td>
										<td><?php echo $res_query_leave_record['Leave_Date']; ?></td>
										<td><?php echo $res_query_leave_record['Leave_Status']; ?></td>
									
									</tr>
								<?php } }while($res_query_leave_record=$query_leave_record->fetch_assoc()); ?>
								</table>
							</div>
						</form>
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