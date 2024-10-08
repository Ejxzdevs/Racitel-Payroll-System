
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="shift.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">	
	<div class="div-background">
			<div class="home-content">
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>Employee Shift</label>
						</div>
						<div class="right">
							<form method="POST" action="shift_layout.php">			
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
									<th>Department</th>
									<th>Position</th>
									<th>Shift</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($res_shift['Employees_ID'])) {?>
							<tbody>
								<tr>
									<td><?php echo $res_shift['Employees_ID']; ?></td>
									<td><?php echo $res_shift['First_Name']; ?> <?php echo $res_shift['Last_Name']; ?></td>
									<td><?php echo $res_shift['Department_Name']; ?></td>
									<td><?php echo $res_shift['Position_Name']; ?></td>
									<td><?php echo $res_shift['Schedule_Name']; ?></td>
									<td><a href="edit_shift_layout.php?id=<?php echo $res_shift['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
								</tr>
							</tbody>
						<?php }}while($res_shift=$shift->fetch_assoc());  ?>
						</table>

					</div>
					</div>

				</div>	
				
			</div>
			

	</div>
	</div>
</body>
<script type="text/javascript">
		document.getElementById("sub-down").addEventListener("click", function(){
		document.querySelector(".sub-nav").style.display="block";
		document.querySelector(".img_down").style.display="none";

		
		})
		document.getElementById("sub-up").addEventListener("click",function(){
		document.querySelector(".sub-nav").style.display="none";
		document.querySelector(".img_down").style.display="inline";
		})
	</script>
	
</html>