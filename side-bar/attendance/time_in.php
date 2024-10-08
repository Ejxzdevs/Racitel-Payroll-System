<?php 
include "../../connection/connection.php";
include "schedule_layout.php";


session_start();

if(isset($_POST['Submit-time-in'])){
	
	date_default_timezone_set('Asia/Manila');

	$id = trim($_POST['time-in-id']);
	

  	// if id is null 
	if(empty($id)){
		

		unset($id);
		echo"
		<script> Swal.fire({
  				icon: 'warning',
  				position: 'middle',
  				title: 'EMPTY',
  				width: 400,
  				text: 'Please input ID',
  				showConfirmButton: true,
				}).then(okay => {
					if(okay)
					{
						window.location.href='schedule_layout.php';
					}
				});
		</script> 
			";

	}else {
	// if ID is exist in the system
	$Check_Existing_ID = "SELECT Employees_ID FROM tbl_employees_information where Employees_ID = '$id'";
	$query_existing_id = mysqli_query($conn,$Check_Existing_ID);
	$existing=mysqli_fetch_assoc($query_existing_id);

	 if($existing['Employees_ID']  != $id)
	{	
		unset($id);
		echo"
			<script> Swal.fire({
  				icon: 'warning',
  				position: 'middle',
  				title: 'This ID Doesnt Exist',
  				width: 400,
  				text: 'Please input valid ID',
  				showConfirmButton: true,
				}).then(okay => {
					if(okay)
					{
						window.location.href='schedule_layout.php';
					}
				});
				
			</script>
		";
	}}




	// IF ID Exist in Current date
	$current_date = date('Y-m-d');
	$Check_Duplicate_Entry = "SELECT Date_Attendance,Employees_ID FROM tbl_time_entries where Date_Attendance = '$current_date' and Employees_ID = '$id'";
	$query_id = mysqli_query($conn,$Check_Duplicate_Entry);
	$result=mysqli_fetch_assoc($query_id);

	if($result > 0 )
	{	
	unset($id);
	echo"
		<script> Swal.fire({
  				icon: 'error',
  				position: 'middle',
  				title: 'ERROR',
  				width: 400,
  				text: 'This ID is already Logged in',
  				showConfirmButton: true,
				}).then(okay => {
					if(okay)
					{
						window.location.href='schedule_layout.php';
					}
				});
		</script> 
		";
	}
	else
	{
 	if ($id != null ) { 

 	$select_schedule ="SELECT Employees_ID,@sid:= Schedule_ID AS Schedule_ID,
 	(SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_In ,
 	(SELECT `Schedule_Out` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Out,
 	(SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Name  

 	FROM tbl_employees_information WHERE Employees_ID = '$id' ";
	$time = mysqli_query($conn,$select_schedule);
	$schedule=mysqli_fetch_array($time);

	$time_in = date("H:i:s");
	$time_start = $schedule['Schedule_In'];
	$time_end = $schedule['Schedule_Out'];
	$shift = $schedule['Schedule_Name'];
	$status = "Indoor";

	if(strtotime($time_in)-60 < strtotime($time_start)){
		$late = 0;
	}else{
		$get_late = date_diff(date_create($time_in),date_create($time_start));
		$min_late = $get_late->days * 24 * 60;
		$min_late += $get_late->h * 60;
		$min_late += $get_late->i;
		$late = $min_late;
		$num_late = 1;
	}
	if(strtotime($time_in) > strtotime($time_start)+14340){
		$late = 0;
		$daily_status = "Halfday";
	}



	}
	$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`,`Shift_Type`,`Late`,`Entry_Types`,`Daily_Status`,`No_Late`) VALUES ('$id','$time_in','$time_start','$time_end','$shift','$late','$status','$daily_status','$num_late')";
		$conn->query($test) or die ($conn->error);							
		unset($id);
		echo"
			<script> Swal.fire({
  				icon: 'success',
  				title: 'TIME-IN ',
  				text: 'SUCCESS',
  				width: 400,
				}).then(okay => {
					if(okay)
					{
						window.location.href='schedule_layout.php';
					}
				});
			</script>  
			";
	}

	

}


?>
