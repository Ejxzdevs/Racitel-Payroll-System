<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="allowance.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">	
	<div class="div-background">
		
			

			<div class="home-content">
				
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label></label>
						</div>
						<div class="right">
							<form method="POST" action="deduction.php">			
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
					<div class="body-salary">
						<div class="box-table">
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Employee Name</th>
									<th>Deductions</th>
							
									<th>Action</th>
								</tr>
							</thead>
							<?php do{  ?>
							<tbody>
								<tr>
									<td><?php echo $result_deduction['Employees_ID']; ?></td>
									<td> <?php echo $result_deduction['First_Name'] ." ".$result_deduction['Last_Name']; ?></td>
									<td><?php echo $result_deduction['no_deduction']; ?></td>
								
									<td><a href="edit_deduction_layout.php?id=<?php echo $result_deduction['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
								</tr>
							</tbody>
						<?php }while($result_deduction=$query_deduction->fetch_assoc()); ?>
					
						</table>

					</div>
					</div>

				</div>	
				
			</div>
			<div class="container-deduction">
				<div class="box">
					<div class="title">
						<label>Deduction</label>
						<a href="deduction_layout.php" id=""><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body">
						<div class="profile">
							<div class="a-div">
								<img 
								<?php if($result_query_deduction['Employee_Image'] == ''){ ?>
								src="../../side-bar/employees/<?php echo $result_query_deduction['Employee_Image']; ?>"
							<?php }else{ ?>
								src="../../icons/user1.png"
							<?php } ?>
								 >
							</div>
							<div class="b-div">
								<p>ID: <span id="id"><?php echo $result_query_deduction['Employees_ID']; ?> </span></p>
								<p>Name: <span><?php echo $result_query_deduction['First_Name'] . " " . $result_query_deduction['Last_Name']; ?></span></p>
								<p>Position: <span><?php echo $result_query_deduction['Position_Name']; ?> </span></p>
								<p>Job Department: <span><?php echo $result_query_deduction['Department_Name']; ?></span></p>

							</div>
							
						</div>
						<div class="info">
						
							<div class="b">
								<div class="data">
									<table>
										<thead>
											<tr>
											
												<th>Name</th>
												<th>Amount</th>
												<th>Status</th>
											
											</tr>
										</thead>
										<?php do{ ?>
										<tbody id="exampleid">
											<tr> 
												
												<td><?php echo $result_query_deduction['Deduction_Name']; ?></td>
											
										
												<td><?php echo $result_query_deduction['Deduction_Value']; ?></td>
												<td>
													<a <?php if($result_query_deduction['Deduction_Status'] == 'Enable') { ?>
														class = "ON";
													<?php }else{ ?>
													class="OFF";
												<?php } ?> href="update_deduction.php?id=<?php echo $result_query_deduction['Deduction_List_ID']; ?>&Emp_id=<?php echo $result_query_deduction['Employees_ID']; ?>" >

												<?php echo $result_query_deduction['Deduction_Status']; ?></a>
												</td>
											
													

															
														
													
											
											</tr>
										
										</tbody>
									<?php }while($result_query_deduction=$query_deductions->fetch_assoc()); ?>
									</table>
								</div>
							</div>
							
							</form>
						</div>
					</div>
					
				</div>
			</div>
			

	</div>
	</div>
</body>

	
</html>