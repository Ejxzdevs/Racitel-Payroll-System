<?php 
include "../../connection/connection.php";

							if(isset($_GET['fr-date']) && isset($_GET['to-date']))
							{

							$fr_date = $_GET['fr-date'];
							$to_date = $_GET['to-date'];

							$sql = "SELECT *From tbl_csv WHERE Date_upload BETWEEN '$fr_date' AND '$to_date'";
							$query = mysqli_query($conn,$sql);
							$attendance=$query->fetch_assoc();
						

							error_reporting(0);

echo header("Location: attendance.php");

}





?>