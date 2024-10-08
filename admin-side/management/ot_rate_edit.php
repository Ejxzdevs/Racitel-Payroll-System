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
							<li ><a href="basic_salary_layout.php" >Daily Rate</a> <img src="../../icons/setting.png" id="img_salary" > </li>
							<li><a href="ot_layout.php" style="color:#66ff66"; >Overtime Rate</a><img id="img_history" src="../../icons/time-is-money.png"></li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<div class="salary-header-left">
								<label><?php echo$res_rate['Ot_Rate'] . "%"; ?></label>
								<a href="edit_ot_rate_layout.php"> <img id="ot_edit" src="../../icons/edit.svg" ></a>
							</div>
							</div>
							<div class="salary-header-right">
									<form method="POST" action="ot_layout.php">			
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
										<th>Daily Rate</th>
										<th>Overtime Rate</th>
										
										
								</thead>
								<tbody>
									<?php do { ?>
									<tr>
										<td><?php echo $res_ot_rate['Employees_ID']; ?></td>
										<td><?php echo $res_ot_rate['First_Name']; ?> <?php echo $res_ot_rate['Last_Name']; ?></td>
										<td><?PHP echo $res_ot_rate['Daily_Rate']; ?></td>					
										<td><?PHP echo ((($res_ot_rate['Daily_Rate']/8)/100)*$ot); ?></td>
										<td></td>
									
										
									</tr>
								
								</tbody>
									<?php }while($res_ot_rate=$ot_rate->fetch_assoc());  ?>

							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>
			<div class="pop-up-edit">
				<div class="box-salary">
					<form method="post" action="update_ot_rate.php">
						<div class="header">
							<label>Over Time</label>
							<a href="ot_layout.php"><img id="close-id" src="../../icons/close.svg"></a>
						</div>
						<div class="body">
				
							<div class="name">
						
									<label>Overtime Rate</label>
								
							
									<input type="text" name="ot_rate" value="<?php echo$res_rate['Ot_Rate'] . "%"; ?>">
								
							</div>
							
							<div class="button">
								<button type="submit" name="submit">Save</button>
							</div>

						</div>
					</form>
				</div>
			</div>
			
		</div>
		
	</div>
	
</html>