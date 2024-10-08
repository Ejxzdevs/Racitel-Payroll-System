<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include 'connection.php';
require_once "Classes/PHPExcel.php";

if(isset($_POST['upload-time-entry'])){

$filename = $_FILES['file_upload']['name'];

$path=$filename;
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);


$selectedColumns = array(0,1);
//Read Sheet 0
$worksheet=$excel_Obj->getSheet('3'); 
$colomncount = $worksheet->getHighestDataColumn();
// echo "<br> row ";
 $rowcount = $worksheet->getHighestRow();
// echo "<br> column ";
 $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
echo "<br>";
echo "<br>";
echo "<br>";



for ($row = 6; $row <= $rowcount; $row++) {
    $data = array();
    for ($col = 0; $col <=7; $col++) {
        $cell_value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();

        $data[] = $cell_value;
               
    }
 	echo $id = $data[0];
 
 	echo $date = $data[3];
 	
 	echo $in = $data[4];
 	
 	echo $out = $data[5];
 	
 	echo $in_2 = $data[6];
 
 	echo $out_2 = $data[7];

 	// $insert = "INSERT INTO `test1`(`time_in`,`time_out`,`time_in2`,`time_out2`,`date`,`emp_d`) VALUES ('$in','$out','$in_2','$out_2','$date',$id)";
    // $query = mysqli_query($conn,$insert);

   }



header("Location: ../side-bar/attendance/csv_layout.php");


}

?>

<!-- <form action="upload_form.php" method="post" enctype="multipart/form-data">
Select file 
<input type="file" name="file_upload"/>
<input type="submit" value="Upload" name="upload-time-entry" /> -->