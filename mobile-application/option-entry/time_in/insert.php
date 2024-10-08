<?php 
session_start();
include "../../../connection/connection.php";



if(isset($_POST['submit'])){
			date_default_timezone_set('Asia/Manila');
			$id = $_SESSION['emp_id'];
			$file = $_FILES['file'];
			
			$fileName = $_FILES['file']['name'];
			$fileTmp = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg','jpeg','png', 'svg');

			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = '../image-entry/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
					}
				}

			}


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
	$status = "Outdoor";

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



	$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`,`Shift_Type`,`Late`,`Entry_Types`,`Daily_Status`,`No_Late`,`Image_Time_In`) VALUES ('$id','$time_in','$time_start','$time_end','$shift','$late','$status','$daily_status','$num_late','$fileDestination')";
		$conn->query($test) or die ($conn->error);	


header("location: ../entry_option.php");

}


?>