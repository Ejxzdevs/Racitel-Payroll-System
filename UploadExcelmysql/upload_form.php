<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

if(isset($_FILES['file_upload'])){
	$dir='uploads/';
	$file_name=$_FILES['file_upload']['name'];
	$size=$_FILES['file_upload']['size'];
	$tmp_file_name=$_FILES['file_upload']['tmp_name'];
	 echo $tmp_file_name.'<br>';
	 echo $file_name.'<br>';
	 echo $size;
	move_uploaded_file($tmp_file_name,$dir.$file_name);
	echo 'success<br>';
	include 'read_file.php';
}else{
		echo 'File not selected';
}	
?>