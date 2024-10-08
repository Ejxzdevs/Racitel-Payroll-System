
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
									<form method="POST" action="basic_salary_layout.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit-basic-salary"  value="Search" class="search">
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
										<th>Basic Daily Salary</th>
										<th>Action </th>
								</thead>
								<tbody>
									<?php do { if(isset($res_salary['Employees_ID'])){ ?>
									<tr>
										<td><?php echo $res_salary['Employees_ID']; ?></td>
										<td><?php echo $res_salary['First_Name']; ?> <?php echo $res_salary['Last_Name']; ?></td>
										<td><?php echo $res_salary['Department_Name']; ?></td>					
										<td><?php echo $res_salary['Daily_Rate']; ?></td>
										<td><a href="edit_basic_salary_layout.php?id_edit=<?php echo $res_salary['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
										
									</tr>
								
								</tbody>
									<?php } }while($res_salary=$salary->fetch_assoc());  ?>

							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>
		</div>
		
	</div>
</html>