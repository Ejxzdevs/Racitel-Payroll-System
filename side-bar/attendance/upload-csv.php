<?php 
	include"../../connection/connection.php";
	if(isset($_POST['btnupload']))
	{
	
	$filename = $_FILES['upload']['tmp_name'];
	if($_FILES['upload']['size'] > 0)
	{
		$file = fopen($filename, "r");

		$row = 0;
		while(($getData = fgetcsv($file, 10000, ",")) !== FALSE) {

			if($row == 0) {

				$row++;
				continue;
			}

			$id = $getData[0];
			$excel_time_in = $getData[1];
			$excel_time_out = $getData[2];
			$ot = $getData[3];

			$time_in = strtotime($excel_time_in);
			$time_out = strtotime($excel_time_out);


			$hours_regular_time = ($time_out - $time_in)/60/60;
			$hours_worked = $ot + $hours_regular_time;
			$marked = "regular";
			

			$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Hours_Worked`,`Regular_Time`,`Overtime`) VALUES ('$id',  '$excel_time_in','$excel_time_out','$hours_worked','$hours_regular_time','$ot' ) ";
			$conn->query($test) or die ($conn->error);



			
		}

	}else
	{
		echo " nothing";
	}

	date_default_timezone_set('Asia/Manila');

	$uploaded = "Uploaded";
	$time = date("m-d-Y");
	$current_time = $time;

	$test = "INSERT INTO `tbl_csv`(`Status`) VALUES ('$uploaded')";
			$conn->query($test) or die ($conn->error);

	echo header("Location: attendance.php");

	

	


	}	
?>