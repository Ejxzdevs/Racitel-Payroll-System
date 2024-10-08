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
									<th>Contributios</th>
								
									<th>Action</th>
								</tr>
							</thead>
						<?php do{  ?>
							<tbody>
								<tr>
									<td><?php echo $result_allowance['Employees_ID']; ?></td>
									<td> <?php echo $result_allowance['First_Name'] ." ".$result_allowance['Last_Name']; ?></td>
									<td><?php echo $result_allowance['no_allowance']; ?></td>
									
									<td><a href="edit_allowance_layout.php?id=<?php echo $result_allowance['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
								</tr>
							</tbody>
						<?php }while($result_allowance=$query_allowance->fetch_assoc()); ?>
					
						</table>

					</div>
					</div>

				</div>	
				
			</div>
			<div class="container-deduction">
				<div class="box">
					<div class="title">
						<label>Allowance</label>
						<a href="allowance_layout.php" id=""><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body">
						<div class="profile">
							<div class="a-div">
								<img

								<?php if($result_allowance_info['Employee_Image'] == ''){ ?>
								 src="../../side-bar/employees/emp-image/<?php echo $result_allowance_info['Employee_Image']; ?>" 
								<?php }else{ ?>
								 src = "../../icons/user1.png"
								 <?php } ?> >
							</div>
							<div class="b-div">
								<p>ID: <span id="id"><?php echo $result_allowance_info['Employees_ID']; ?> </span></p>
								<p>Name: <span><?php echo $result_allowance_info['First_Name'] . " " . $result_allowance_info['Last_Name']; ?></span></p>
								<p>Position: <span><?php echo $result_allowance_info['Position_Name']; ?> </span></p>
								<p>Job Department: <span><?php echo $result_allowance_info['Department_Name']; ?></span></p>

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
												
												<td><?php echo $result_allowance_info['Allowance_Name']; ?></td>
											
										
												<td><?php echo $result_allowance_info['Allowance_Value']; ?></td>
												<td>
													<a 
													<?php if($result_allowance_info['Allowance_Status'] == 'Enable') { ?>
														class = "ON";
													<?php }else{ ?>
													class="OFF";
												<?php } ?>

													href="Allowance_update.php?id=<?php echo $result_allowance_info['Allowance_Emp_ID']; ?>&Emp_id=<?php echo $result_allowance_info['Employees_ID']; ?>" >

													<?php echo $result_allowance_info['Allowance_Status']; ?>
														
													</a>
												</td>
											
													

															
														
													
											
											</tr>
										
										</tbody>
									<?php }while($result_allowance_info=$query_a->fetch_assoc()); ?>
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
<script type="text/javascript">
		function submit(){

			document.querySelector('#update').submit();
		}

</script>
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