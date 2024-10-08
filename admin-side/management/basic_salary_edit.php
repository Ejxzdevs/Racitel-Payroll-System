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
	<link rel="stylesheet" type="text/css" href="basic_salary.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">



			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="basic_salary_layout.php" style="color:#66ff66;"   >Daily Rate</a> <img src="../../icons/setting.png" id="img_salary" > </li>
							<li><a href="ot_layout.php" >Overtime Rate</a><img id="img_history" src="../../icons/time-is-money.png"></li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								
							</div>
							<div class="salary-header-right">
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
						
						<div class="salary-body">
							<table class="payroll-table">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Employee Name</th>
										<th>Department</th>
										<th>Basic Salary</th>
										<th>Action </th>
								</thead>
								<tbody>
									<?php do { ?>
									<tr>
										<td><?php echo $res_salary['Employees_ID']; ?></td>
										<td><?php echo $res_salary['First_Name']; ?> <?php echo $res_salary['Last_Name']; ?></td>
										<td><?php echo $res_salary['Department_Name']; ?></td>					
										<td><?php echo $res_salary['Daily_Rate']; ?></td>
										<td><a href="basic_salary_edit.php?id=<?php echo $res_salary['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
										
									</tr>
								
								</tbody>
									<?php }while($res_salary=$salary->fetch_assoc());  ?>

							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>
			<div class="pop-salary-edit">
				<div class="pop-box">
					<form method="post" action="basic_salary_update.php">
						<div class="header">
							<label>Basic Salary</label>
							<a href="basic_salary_layout.php"><img id="edit-close" src="../../icons/close.svg"></a>
						</div>
						<?php do{ ?>
						<div class="body">
							<div class="input-label">
								<img id="img-emp" 
								<?php if($res_edit_salary['Employee_Image'] == ''){ ?>
									src = "../../user1.png";

								<?php }else{ ?>
								src="../../side-bar/employees/emp-image/<?php echo $res_edit_salary['Employee_Image'] ?> ">
							<?php } ?>
							</div>
							<div class="input-label-basic-salary" id="namee">
								<div class="div-input">
									<label>Name</label>
								</div>
								<div class="div-input" id="name">
									<p ><?php echo $res_edit_salary['First_Name']; ?>  <?php echo $res_edit_salary['Last_Name']; ?></p>
								</div>
								
							</div>
							
							<div class="input-label-hourly-salary">
								<div class="div-input">
									<label>Daily Salary</label>
								</div>
								<div class="div-input">
									<input type="hidden" value="<?php echo $res_edit_salary['Employees_ID'];?>" name="id">
								<input type="text" name="salary" value="<?php echo $res_edit_salary['Daily_Rate'];?>">
								</div>
								
								
							</div>
							
							<div class="input-label-basic-salary">
								<div class="div-input">
									<label>Hourly Salary</label>
								</div>
								<div class="div-input">
								<p> <?php echo $res_edit_salary['Daily_Rate']/8;?></p>
								</div>
								
							</div>
							<div class="input-label-button">
								<button type="submit" name="save">SAVE</button>
							</div>

						</div>
					<?php }while($res_edit_salary=$edit_salary->fetch_assoc());  ?>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</html>