<?php 
	include"../../connection/connection.php";
	if(isset($_POST['btnupload']))
	{
	
	$filename = $_FILES['upload']['tmp_name'];
	if($_FILES['upload']['size'] > 0)
	{
		$file = fopen($filename,"r");

		$row = 0;
		while(($getData = fgetcsv($file, 10000, ",")) !== FALSE) {

			if($row == 0) {

				$row++;
				continue;
			}

			echo $id = $getData[0]; 	echo " ";
			echo $excel_time_in = $getData[1]; echo " ";
			echo $excel_time_out = $getData[2]; echo " ";
			echo $ot = $getData[3]; echo " ";
				

			echo "<br>";

			


			
		}

	}
}
?>