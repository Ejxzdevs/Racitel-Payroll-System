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
							<div class="btn-add-allowance">
								<a href="javascript: give_allowance();">Set Allowance</a>
							</div>
							<div class="label-allowance">
								<!-- <p>Allowance</p> -->
							</div>
						</div>
						<div class="right">
							<form method="POST" action="allowance_layout.php">			
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
									<th>Allowances</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($result_allowance['Employees_ID'])){  ?>
							<tbody>
								<tr>
									<td><?php echo $result_allowance['Employees_ID']; ?></td>
									<td> <?php echo $result_allowance['First_Name'] ." ".$result_allowance['Last_Name']; ?></td>
									<td><?php echo $result_allowance['no_allowance']; ?></td>
									<td><a href="edit_allowance_layout.php?id=<?php echo $result_allowance['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
								</tr>
							</tbody>
						<?php }}while($result_allowance=$query_allowance->fetch_assoc()); ?>
					
						</table>

					</div>
					</div>

				</div>	
				
			</div>
				
			<div class="pop-up-give-allowance">
				<div class="box-give-allowance">
				<form method="POST" action="give-allowance.php">
					<div class="header-give">
						<p>Give Allowance</p>
						<a href="javascript: close_allowance();"><img id="img-close-allowance" src="../../icons/close.svg"></a>
					</div>
					<div class="body-give">
						<div class="top-give">
							<div class="give-left">
								<?php do{ if(isset($fetch_all_allowance['Allowance_ID'])){ ?>
								<div class="col-allow">
									<p><?PHP echo $fetch_all_allowance['Allowance_Name']; ?></p><input type="checkbox" name="Allowances[]" value="<?PHP ECHO $fetch_all_allowance['Allowance_ID']; ?>">
								</div>
								<?php }else{
									echo "no items";
								} }while($fetch_all_allowance=$query_all_allowance->fetch_assoc()); ?>
							</div>
							<div class="give-right">
								<label>Select Employees</label>
								<select id="select_emp" name="allowance_emp" onchange="single_employee();">
									<option value="All">ALL</option>
									<option value="Regular">Regular</option>
									<option value="Casual">Casual</option>
									<option value="Driver">Driver</option>
									<option value="Single">Select Employee</option>
								</select>
								<input id="emp_id" type="text" name="emp_id" placeholder="Employee ID:">
									<button type="submit" name="btn-sub-allowance">Submit</button>
							</div>
						</div>
						
						
						
					</div>
				</form>
				</div>
				
			</div>

			

	</div>
	</div>
</body>
	<script type="text/javascript" src="allowances.js"></script>

</html>