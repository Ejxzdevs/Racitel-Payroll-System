<html>
<body>
<center> 
<?php
include 'db.php';
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
require_once "Classes/PHPExcel.php";
$path="uploads/Records.xlsx";
//$path="uploads/".$file_name;
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);


//Read Sheet 0
$worksheet=$excel_Obj->getSheet('0');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery='INSERT INTO `sheet1` (`employee_id`, `pay_slip_name`, `net_salary`) VALUES ';
$subquery='';
	for($row=1;$row<=100;$row++){
		$subquery=$subquery.' (';
		for($col=0;$col<$colomncount_number;$col++){
		 	$subquery=$subquery.'\''.$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue().'\',';
		}
		 $subquery = substr($subquery, 0, strlen($subquery) - 1);
		 $subquery=$subquery.')'.' , ';
	}
	$insertquery=$insertquery.$subquery;	
	$insertquery= substr($insertquery,0,strlen($insertquery)-2);
 if (mysqli_query($conn, $insertquery)) {
  echo "Sheet 1 Uploaded <br>";
} else {
  echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
}



//Read Sheet 1
$worksheet=$excel_Obj->getSheet('1');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery='INSERT INTO `sheet2` (`serialno`, `fcamount`, `costrate`, `rate`, `charges`, `fxprofit`, `chargeprofit`, `netprofit`, `lcamount`) VALUES ';
$subquery='';
	for($row=1;$row<=100;$row++){
		$subquery=$subquery.' (';
		for($col=0;$col<$colomncount_number;$col++){
		 	$subquery=$subquery.'\''.$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue().'\',';
		}
		 $subquery = substr($subquery, 0, strlen($subquery) - 1);
		 $subquery=$subquery.')'.' , ';
	}
	$insertquery=$insertquery.$subquery;	
	$insertquery= substr($insertquery,0,strlen($insertquery)-2);
 if (mysqli_query($conn, $insertquery)) {
   echo "Sheet 2 Uploaded <br>";
} else {
  echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>
</center>
</body>
</html>