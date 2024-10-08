<?php 
include "../../connection/connection.php";

$select_all_list = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_Status = 'Paid'";
$query_list = mysqli_query($conn,$select_all_list);
$fetch_list = mysqli_fetch_assoc($query_list);




?>


<!DOCTYPE html>
<html>
<style type="text/css">
		.payroll-nav-bar ul li:nth-child(1){
	border-left: solid 2PX black;
}

#view{
	position: relative;
	height: 2em;
	width: 2em;
	right: 2em;
	text-decoration: none;

}



#rollback
{
	text-decoration: none;

}
</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="payroll.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
		


			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="payroll_layout.php"  >Payroll</a> <img src="../../icons/checklist.png" id="img_salary" > </li>
							<li ><a href="record_layout.php" style="color:#66ff66;" >Record</a> <img src="../../icons/ready.png" id="img_salary" > </li>
							

						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<!-- <a href="javascript: open();">Generate Payroll</a> -->
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
										<th style="width: 100px;">ID</th>
										<th>Interval</th>
										<th>Date Generated</th>
										<th style="width:100px;"  >Status</th>
										<th colspan="2" style="width: 320px;">Action</th>
									</tr>
								</thead>
								<?php do{ if(isset($fetch_list['Payroll_ID'])){ ?>
								<tbody>
									<tr>
										<td><?php echo $fetch_list['Payroll_ID']; ?></td>
										<td><?php echo $fetch_list['Payroll_Start'] . " " . $fetch_list['Payroll_End']; ?></td>
										<td><?php echo $fetch_list['Payroll_Date']; ?></td>
										<td><?php echo $fetch_list['Payroll_Status']; ?></td>
										<td><a id="rollback" href="rollback.php?id=<?php echo $fetch_list['Payroll_ID']; ?>" >Rollback</a> </td>
										<td><a id="view" href="view.php?id=<?php echo $fetch_list['Payroll_ID']; ?>" >view</a></td>
									</tr>
								</tbody>
							<?php } }while($fetch_list=$query_list->fetch_assoc());?>
							
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
								
								</div>
							</div>
						</div>
					</div>
					
				</div>	
		
			</div>
			<div class="pop-up-leave">
				<div class="leave-container">
					<div class="head-payroll">
						<label>Generate Payroll</label>
						<a href="javascript: close();"><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="content-payroll">
						<form method="POST" action="generate-payroll.php">
							<input type="date" name="from">
							<input type="date" name="to">
							<select name="Type">
								<option value="Regular">Regular</option>
								<option value="Casual">Casual</option>
							</select>
							<input id="btn-payroll" type="submit" name="btnsub">
						</form>
					</div>
				</div>
				
			</div>




		</div>
		
	</div>
</body>
<script type="text/javascript">
		function open(){
			document.querySelector('.pop-up-leave').style.display="FLEX";
		}
		function close(){
				document.querySelector('.pop-up-leave').style.display="NONE";
		}
	</script>
</html>