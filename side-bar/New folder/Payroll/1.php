<?php 
// OPEN IN BROWSER


// READ/OPEM TXT FILE

$current_file = ("HELLO.TXT");

while (!feof($current_file)) {
 	echo fgets($current_file). "<br>";
 }

 // READ/OPEN PDF FILE


$current_file = ("Payslip.php_12.pdf");

header('Content-type:application/pdf');
header('Contebt-Description: inline;filename="' .$current_file.  '"');
header('Content-Transfer-Encoding:binary');
header('Accept-ranges:bytes');
@readfile($current_file);




?>