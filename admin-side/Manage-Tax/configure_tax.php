
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
	<script src="../../jquery/jquery-3.6.3.js"></script>
	<link rel="stylesheet" type="text/css" href="tax.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="tax_layout.php">Regular</a> <img src="../../icons/salary.svg" id="img_salary" > </li>
							<li><a href="configure_layout.php" style="color:#66ff66;" >Configure</a><img id="img_history" src="../../icons/history.svg">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<select id="filter-emp" onchange="filter_tax_table(this);">
										<option value="Regular" 
										<?php if($_SESSION['Emp'] == 'Regular'){
											echo 'Selected';
										} ?> >
										Regular</option>
										<option value="Casual" <?php if($_SESSION['Emp'] == 'Casual'){
											echo 'Selected';
										} ?>>Casual</option>
								</select>
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
							<table class="payroll-table" id="tax-display">
							
								<thead>
									<tr>
										<th>Tax id</th>
										<th>Tax Name</th>
										<th>Action</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										
									</tr>
								</tbody>
								
							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>






		</div>
	</div>
</body>
	<script type="text/javascript" src="manage-tax.js"></script>
</html>