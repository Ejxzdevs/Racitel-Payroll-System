
<?php include "read.php"; ?>
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
					<div class="body-salary">
						<div class="box-table">
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Employee Name</th>
									<th>Department</th>
									<th>Position</th>
									<th>Salary</th>
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
			<div class="pop-edit-salary">
				<form id="form" method="post" action="shift_update.php">
				<?php do{ ?>
				<div class="box-salary">

					<div class="label">
						<p>Schedule<a id="close" href="shift_layout.php"><img id="img_close_salary" for="close" src="../../icons/close.svg"></a></p>
					</div>
					<div class="b-salary">
						<div class="div-frame">
							<img 

							<?php if($res_edit_shift['Employee_Image'] == ''){ ?>
							src="../../side-bar/employees/<?php echo $res_edit_shift['Employee_Image'] ?> "
						<?php }else{ ?>
							src = "../../icons/user1.png"
						<?php } ?>>
						</div>
						<div class="div-name">
							<div class="l-name">
								<label>Name</label>
							</div>
							<div class="i-name">
								<input type="hidden" name="id"value="<?php echo $res_edit_shift['Employees_ID']; ?>" >
								<p><?php echo $res_edit_shift['First_Name'] . " " . $res_edit_shift['Last_Name']; ?></p>
							</div> 
						</div>
						<div class="salary_rate">
							<div class="l-salary">
								<label>Shift Type</label>
							</div>
							<div class="i-salary">
								<select id="shift-edit" name="shift">
									
								 <option value="<?php echo $res_edit_shift['Schedule_ID']; ?>"><?php echo $res_edit_shift['Schedule_Name']; ?>
								 </option>
								 <?php do{ ?>
								 	<option value="<?php echo $res_schedule_type['Schedule_ID'] ?>" ><?php echo $res_schedule_type['Schedule_Name'] ?></option>
									<?php }while($res_schedule_type=$query_schedule_type->fetch_assoc()); ?>
				
								 </select>
							</div>
						</div>
						<div class="Action">
							<a href="#" onclick="submit()">Save</a>
						</div>

					</div>
				</div>
				<?php }while($res_edit_shift=$edit_shift->fetch_assoc()); ?>
				</form>
			</div>
			



	</div>	
	</div>


</body>
<script type="text/javascript">
		function submit(){
			let form = document.getElementById("form");
			form.submit();
		}
	</script>

</html>