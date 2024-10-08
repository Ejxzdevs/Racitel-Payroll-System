<!--BASIC SALARY -->

<?php 

	include "../../connection/connection.php";
	// salary
	// display

	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID ,@did:=Department_ID as Department_ID,(SELECT `Department_Name` FROM `tbl_department` WHERE `Department_ID` = @did) as Department_Name,Daily_Rate FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
	"; 
	$salary = mysqli_query($conn,$sql);
	$res_salary=mysqli_fetch_assoc($salary);


	// search

	if(isset($_POST['submit-basic-salary']))
	{

	$name = $_POST['name'];

	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information WHERE First_Name LIKE '$name%' or Last_Name LIKE '$name%') tbl_personal_information
	JOIN (SELECT Employees_ID ,@did:=Department_ID as Department_ID,(SELECT `Department_Name` FROM `tbl_department` WHERE `Department_ID` = @did) as Department_Name,Daily_Rate,Daily_Rate FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
	"; 
	$salary = mysqli_query($conn,$sql);
	$res_salary=mysqli_fetch_assoc($salary);


}

	// edit salary




	if(isset($_GET['id_edit'])){

	$id = $_GET['id_edit'];

	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID ,Employee_Image,Daily_Rate FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID where tbl_employees_information.Employees_ID = '$id' "; 
	$edit_salary = mysqli_query($conn,$sql);
	$res_edit_salary=mysqli_fetch_assoc($edit_salary);

	error_reporting(0);
}
//  SHIFT
// display



	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID,@pid:=Position_ID as Position_ID,(SELECT `Position_Name` FROM `tbl_position` WHERE `Position_ID` = @pid) as Position_Name,@did:=Department_ID as Department_ID,(SELECT `Department_Name` FROM `tbl_department` WHERE `Department_ID` = @did) as Department_Name,@sid:=Schedule_ID as Schedule_ID,(SELECT `Schedule_Name` FROM `tbl_types_schedule` WHERE `Schedule_ID` = @sid) as Schedule_Name FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID"; 
	$shift = mysqli_query($conn,$sql);
	$res_shift=mysqli_fetch_assoc($shift);


// search  

	



// edit shift display


	

	
// POP UP EDIT SHIFT


	if(isset($_GET['id'])){

	$id = $_GET['id'];

	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID ,Employee_Image,@sid:= Schedule_ID as Schedule_ID,(SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid and Employees_ID = $id ) as Schedule_Name FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID where tbl_employees_information.Employees_ID = '$id' "; 
	$edit_shift = mysqli_query($conn,$sql);
	$res_edit_shift=mysqli_fetch_assoc($edit_shift);
	
	

	error_reporting(0);
}



// OT RATE DISPLAY


	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID,Daily_Rate FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
	"; 
	$ot_rate = mysqli_query($conn,$sql);
	$res_ot_rate=mysqli_fetch_assoc($ot_rate);



// OT RATE SEARCH BAR


	if(isset($_POST['search']))
	{

	$name = $_POST['name'];

	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information WHERE First_Name LIKE '$name%' OR Last_Name LIKE '$name%') tbl_personal_information
	JOIN (SELECT Employees_ID FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
	"; 
	$ot_rate = mysqli_query($conn,$sql);
	$res_ot_rate=mysqli_fetch_assoc($ot_rate);
	
}
	// OT RATE EDIT


	if(isset($_GET['id'])){

	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID , Employee_Image FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID where tbl_employees_information.Employees_ID = '$id'
	"; 
	$ot_rate_edit = mysqli_query($conn,$sql);
	$res_ot_rate_edit=mysqli_fetch_assoc($ot_rate_edit);




	error_reporting(0);

	}

	error_reporting(0);

	// ot rate

								$select_rate = "SELECT id,Ot_Rate FROM `tbl_rate` where id = 1 "; 
								$query_rate = mysqli_query($conn,$select_rate);
								$res_rate = mysqli_fetch_assoc($query_rate);


								$ot = $res_rate['Ot_Rate'];
								
?>