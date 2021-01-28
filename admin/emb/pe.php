<?php 
ob_start();
include("../../connections/post.php");

$sql = "SELECT arabic_name,english_name,dept_name,degree,email,birthdate,country,address,phone_mobile,id_number,special,grade,grade_year,grad_place FROM all_data where status=1 and dept_id=7"; 
$setRec = mysqli_query($post, $sql); 
$columnHeader = ''; 
$columnHeader = "Arabic Name" . "\t" . "English Name" . "\t" . "Department" . "\t" . "Degree" . "\t" . "Email" . "\t" . "birthdate" . "\t". "country" . "\t". "address" . "\t". "phone_mobile" . "\t". "id_number" . "\t". "special" . "\t". "grade" . "\t". "grade_year" . "\t". "grad_place" . "\t"; 
$setData = ''; 

while ($rec = mysqli_fetch_row($setRec)) { 
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=User_records.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n";
	
	