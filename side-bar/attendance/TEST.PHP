<?PHP 


						include "../../connection/connection.php";

						date_default_timezone_set('Asia/Manila');
						// Put date("g:i A"); IN VARIABLE
						$time_in = date("g:i A");
						// cannot insert in db the date("g:i A"); wihtout converting
						// convert date("g:i A"); using strtotime; 
						$ctime_in = date("g:i A", strtotime($time_in));

						if(isset($_POST['submit'])){

							$id = $_POST['id'];

							$sql = "SELECT Employees_ID ,Shift_Type FROM tbl_employees_information WHERE Employees_ID = '$id'";
							$id = mysqli_query($conn,$sql);
							$emp_id=mysqli_fetch_assoc($id);
							$schedule_type = $emp_id['Shift_Type']; 

							if($id != NULL ){

							$sql ="SELECT Schedule_ID,Schedule_Name ,Schedule_In ,Schedule_Out FROM tbl_types_schedule WHERE Schedule_Name = '$schedule_type'";
							$time = mysqli_query($conn,$sql);
							$result=mysqli_fetch_array($time);

							$a = $result['Schedule_In'];
							$b = $result['Schedule_Out'];

							$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`) VALUES ('$id','$ctime_in','$a','$b')";
							$conn->query($test) or die ($conn->error);

							

							}
						}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>TIME IN </h1>
	<form method="POST" action="TEST.PHP">
		<label> INPUT UR ID </label>
	<input type="text" name="id"> 
	<input type="submit" name="submit">


	</form>

</body>
</html>