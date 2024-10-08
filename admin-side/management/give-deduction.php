<?php 

include "../../connection/connection.php";



if(isset($_POST['btn-sub-deduction'])){

	
	$choice = $_POST['deduction_emp'];

	if($choice == 'All'){

		$arr_deduction_id = $_POST['deductions'];

		$select_id = "SELECT * FROM tbl_employees_information ";
		$query_id= mysqli_query($conn,$select_id);
		$res_query_id = mysqli_fetch_assoc($query_id);


	

			do{
	
				$get_all_id = $res_query_id['Employees_ID'];

				foreach($arr_deduction_id as $deduction_id)
				{
			
					$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($get_all_id,$deduction_id,'Enable')";
					$conn->query($insert_deduction_emp) or die ($conn->error);

				}

			}while($res_query_id=$query_id->fetch_assoc());

		
		echo "success";
	}else if($choice == 'Single'){

		$arr_deduction_id = $_POST['deductions'];

		$id = $_POST['emp_id'];
		
		foreach($arr_deduction_id as $all_id)
		{
				$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($id,$all_id,'Enable')";
				$conn->query($insert_deduction_emp) or die ($conn->error);
		}
		

	}else if($choice == 'Driver'){

		$arr_deduction_id = $_POST['deductions'];

		$select_driver = "SELECT * FROM tbl_accounts WHERE User_Type = 'Driver'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);
		
			do{
				$driver_id = $res_driver_id['Employees_ID'];

				foreach($arr_deduction_id as $all_id)
				{
					$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($driver_id,$all_id,'Enable')";
					$conn->query($insert_deduction_emp) or die ($conn->error);
				}

			}while($res_driver_id=$query_driver->fetch_assoc());

		


	}else if($choice == 'Regular'){

		$arr_deduction_id = $_POST['deductions'];

		$select_regular = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Regular'";
		$query_regular = mysqli_query($conn,$select_regular);
		$res_regular = mysqli_fetch_assoc($query_regular);
		

		
			do{
				$regular_id = $res_regular['Employees_ID'];

				foreach($arr_deduction_id as $all_id)
				{
					$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($regular_id,$all_id,'Enable')";
					$conn->query($insert_deduction_emp) or die ($conn->error);
				}
			}while($res_regular=$query_regular->fetch_assoc());

		


	}else if($choice == 'Casual'){

		$arr_deduction_id = $_POST['deductions'];

		$select_casual = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Casual'";
		$query_casual= mysqli_query($conn,$select_casual);
		$res_casual = mysqli_fetch_assoc($query_casual);
		

			do{
				$casual_id = $res_casual['Employees_ID'];


				foreach($arr_deduction_id as $all_id)
				{
					$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($casual_id,$all_id,'Enable')";
					$conn->query($insert_deduction_emp) or die ($conn->error);
				}

			}while($res_casual=$query_casual->fetch_assoc());

		


	}









}

header("Location: deduction_layout.php");

?>