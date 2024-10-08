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
								
							</div>
							<div class="salary-header-right">
								<div class="container">
								<form method="POST" action="leave_layout.php" class="form">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="leave_search"  value="Search" class="search">
										</div>
									</div>
								</form>
								</div>
							</div>	
						</div>
						
						<div class="salary-body">
							<table class="payroll-table">
						
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Employee Name</th>
										<th>Leave</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php do{ if(isset($res_file_leave['Employees_ID'])){ ?>
									<tr>
										<td><?php echo $res_file_leave['Employees_ID']; ?></td>
										<td><?php echo $res_file_leave['First_Name']; ?> <?php echo $res_file_leave['Last_Name']; ?></td>
										<td><?php echo $res_file_leave['Leave_Types']; ?></td>
										<td><?php echo date('M. d Y',strtotime($res_file_leave['Leave_Date'])); ?></td>
										<td><a href="leave_view_layout.php?id=<?php echo $res_file_leave['Leave_ID']; ?>" ><img src="../../icons/email.svg" id="img_leave_view"></a></td>
									</tr>
										
								</tbody>
								<?php }}while($res_file_leave=$file_leave->fetch_assoc()); ?>
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
									<a href="#" id="open-leave" class="btn_payroll" >
									File Leave</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>	
		
			</div>
			<div class="pop-up-leave">
				<div class="leave-container">
					<form method="post" action="insert.php">
						<div class="header">
							<p>Leave of Absence</p>
							<a href="#" id="close-leave"><img id="leave-close" src="../../icons/close.svg"></a>
						</div>
						<div class="body">
							<div class="input-container"> 
								<div class="input-label">
									<label>Emp-ID:</label>
								</div>
								<div class="input-box">
									<input class="input-format" type="text" name="id" placeholder="Type ID:">
								</div>
							</div>
							<div class="input-container">
								<div class="input-label">
									<label>Types</label>
								</div>
								<div class="input-box">
									<select name="leave" class="input-format">
										<option disabled>Choose Leave</option>
										<?php do{ ?>
										
										<option value="<?php echo $res_leave['Leave_Name']; ?>"><?php echo $res_leave['Leave_Name']; ?></option>
									<?php }while($res_leave=mysqli_fetch_assoc($leave));?>
									</select>
								</div>
								
								

							</div>
							<div class="input-container">
								<div class="input-label">
									<label>Date</label>
								</div>
								<div class="input-box">
									<input class="input-format" type="date" name="date">
								</div>
								
								

							</div>
							<div class="input-container">
								<div class="input-label">
									<label>Message</label>
								</div>
								<div class="input-box">
									<textarea  class="input-format input-textarea" type="text" name="message" placeholder="Type Message:"></textarea>
								</div>
							</div>
							<div class="input-container"> 
								<button type="submit" name="submit">Submit</button>
							</div>
							
						</div>
					</form>
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