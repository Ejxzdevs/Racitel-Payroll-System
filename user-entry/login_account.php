<?php 
include "../connection/connection.php";
session_start();
isset($_POST['submit']);

if(empty($_POST['user']) && empty($_POST['pass']))
{


}else{

	$username = trim($_POST['user']);
	$password = trim($_POST['pass']);


	$sql = "SELECT User_Type,Status,Username,Password,Employees_ID FROM tbl_accounts WHERE Username = '$username' AND Password = '$password' ";
	$query = mysqli_query($conn,$sql);
	$users=mysqli_fetch_array($query);

	$id = $users['Employees_ID'];

	$_SESSION['Emp'] = 'Regular';
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['password'] = $_POST['pass'];
	$_SESSION['id_user'] = $users['Employees_ID'];
	$_SESSION['type'] = $users['User_Type'];
	$_SESSION['status'] = 'Enable';

	if($_SESSION['type'] == "Admin")
	{
		if ($_SESSION['status'] == "Enable") {
			echo header("Location: ../admin-side/create-allowance/allowance_layout.php");
			exit();
		}else{
			echo header("location: login.php");
			exit();
		}
	}

	if($_SESSION['type'] == "Payroll")
	{
		if ($_SESSION['status'] == "Enable") {
			echo header("location: ../side-bar/employees/employee_layout.php");
			exit();
		}else{
			echo header("location: login.php");
			exit();
		}
	}

	if($_SESSION['type'] == "Checker")
	{
		if ($_SESSION['status'] == "Enable") {
			echo header("location: ../side-bar/employees/employee_layout.php");
			exit();
		}else{
			echo header("location: login.php");
			exit();
		}
	}

	if($_SESSION['type'] == "Attendance")
	{
		if ($_SESSION['status'] == "Enable") {
			echo header("location: ../attendance-side/selected_entry.php");
			exit();
		}else{
			echo header("location: login.php");
			exit();
		}
	}
 }

?>