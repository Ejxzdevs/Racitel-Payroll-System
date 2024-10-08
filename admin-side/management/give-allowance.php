<?php
include "../../connection/connection.php";


if(isset($_POST['btn-sub-allowance'])){

	
	$choice = $_POST['allowance_emp'];

	if($choice == 'All'){

		$arr_allowances_id = $_POST['Allowances'];

		$select_id = "SELECT * FROM tbl_employees_information ";
		$query_id= mysqli_query($conn,$select_id);
		$res_query_id = mysqli_fetch_assoc($query_id);


	

			do{
	
				$get_all_id = $res_query_id['Employees_ID'];

				foreach($arr_allowances_id as $all_id)
				{
			
					$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($get_all_id,$all_id,'Enable')";
					$conn->query($insert_allowance_emp) or die ($conn->error);

				}

			}while($res_query_id=$query_id->fetch_assoc());

		
		echo "success";
	}else if($choice == 'Single'){

		$arr_allowances_id = $_POST['Allowances'];

		$id = $_POST['emp_id'];
		
		foreach($arr_allowances_id as $all_id)
		{
				$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($id,$all_id,'Enable')";
				$conn->query($insert_allowance_emp) or die ($conn->error);
		}
		

	}else if($choice == 'Driver'){

		$arr_allowances_id = $_POST['Allowances'];

		$select_driver = "SELECT * FROM tbl_accounts WHERE User_Type = 'Driver'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);

		

		
			do{
				$driver_id = $res_driver_id['Employees_ID'];

				foreach($arr_allowances_id as $all_id)
				{

				$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($driver_id,$all_id,'Enable')";
				$conn->query($insert_allowance_emp) or die ($conn->error);

				}

			}while($res_driver_id=$query_driver->fetch_assoc());

		


	}else if($choice == 'Regular'){

		$arr_allowances_id = $_POST['Allowances'];

		$select_driver = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Regular'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);
		

		
			do{
				$regular_id = $res_driver_id['Employees_ID'];

				foreach($arr_allowances_id as $all_id)
				{
				
				$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($regular_id,$all_id,'Enable')";
				$conn->query($insert_allowance_emp) or die ($conn->error);

				}

			}while($res_driver_id=$query_driver->fetch_assoc());

		


	}else if($choice == 'Casual'){

		$arr_allowances_id = $_POST['Allowances'];

		$select_driver = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Casual'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);
		

			do{
				$regular_id = $res_driver_id['Employees_ID'];


				foreach($arr_allowances_id as $all_id)
				{
				
				$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($regular_id,$all_id,'Enable')";
				$conn->query($insert_allowance_emp) or die ($conn->error);

				}

			}while($res_driver_id=$query_driver->fetch_assoc());

		


	}









}
header("Location: allowance_layout.php");

?>