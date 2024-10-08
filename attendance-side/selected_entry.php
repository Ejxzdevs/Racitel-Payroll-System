<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="attendance.css">
	<title>Attendance</title>
</head>
<style type="text/css">
	#new_entry{
		height: 2.5em;
		width: 11em;
		text-decoration: none;
		background-color: green;
	}


</style>
<body>
	<div class="container">
		<div class="side-option">
			<div class="container-image">
				<div class="box-image">
					<img class="image-logoo" src="racitel.png" >
				</div>
			</div>
		
			<a id="new_entry"  href="javascript: open_entry();">New Entry</a>
			<a id="new_entry"  href="../user-entry/login.php">Log Out</a>
		</div>
		<div class="display-entry">
			<div class="date">
				<div class="date-info">
				
				</div>
				<div class="page">
		
					
			
				</div>
			</div>
		
			<div class="data-entry">
				<div class="table-time">
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Department</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						include "../connection/connection.php";
						$sql = "SELECT * FROM(SELECT Employees_ID, @dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name, @pos_id:= Position_ID AS Position_ID ,(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name from tbl_employees_information) tbl_employees_information 
							JOIN (SELECT Employees_ID,First_Name, Last_Name FROM tbl_personal_information) tbl_personal_information on tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID";
	$query = mysqli_query($conn,$sql);
	$employee=$query->fetch_assoc();

				
						?>		
						<tbody>
							<tr>
								<td><?php echo $employee['Employees_ID']; ?></td>
								<td><?php echo $employee['First_Name'] . " " . $employee['First_Name']; ?></td>
								
								<td><?php echo $employee['Department_Name']; ?></td>
								<td><?php echo $employee['Position_Name']; ?></td> 
								<td><a href="view-record.php?id=<?php echo $employee['Employees_ID']; ?>" ><img style="width: 2em; height: 2em;" id="view" src="../icons/view-action.svg" ></a></td>
							</tr>
						</tbody>
					
					</table>

				</div>
			</div>
			<div class="entry-pop">
				<div class="box-pop">
					<form method="POST" action="insert_entry.php">
						<div class="header">

							<label>Time Entry</label>
							<a href="javascript: close_entry();"><img id="close" src="../icons/close.svg" ></a>
						</div>
						<div class="body">
							<div class="col-input-data">
								<p style="margin-left:6.2em;">ID</p>
								<input type="text" name="id" placeholder="Employees ID">
							</div>
							<div class="col-input-data">
								<p style="margin-left:5.4em;" >Date</p>
								<input type="date" name="date">
							</div>
							<div class="col-input-data">
								<p>Time In</p>
								<input type="time" name="time_in">
							</div>
							<div class="col-input-data">
								<p style="margin-left:3.4em;" >Time Out</p>
								<input  type="time" name="time_out">
							</div>
							<div class="col-input-data">
								<p style="margin-left:3.7em;">Schedule</p>
								<select name="select_entry" >
									<option value="a" >Tech 6am-2pm</option>
									<option value="b">Tech 2pm-10pm</option>
									<option value="c">Tech 10pm-6am</option>
									<option value="d">EDP 8am-5pm</option>
								</select>
							</div>
							<div class="col-input-data">
								<p style="margin-right:2em;">Rate</p>
								<select name="rate" >
									<option value="sp">Special Holiday</option>
									<option value="r">Regular</option>
									<option value="do">Dayoff</option>
								
								</select>
							</div>
							<div class="col-input-data" id="btn-submit">
								<button type="submit" name="submit" >SAVE</button>
							</div>
						</div>

					</form>
				</div>
			</div>

			<!--  -->

			

			


		</div>
	</div>
</body>
	<script type="text/javascript">
		function open_entry(){
			document.querySelector('.entry-pop').style.display="FLEX";
		}
		function close_entry(){
			document.querySelector('.entry-pop').style.display="NONE";
		}

	</script>
</html>