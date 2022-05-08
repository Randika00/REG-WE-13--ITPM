<?php

require_once "conn.php";

$filename = 'List of employee Records-'.date('Y-m-d').'.csv';

$sql = "SELECT * FROM momentsadmin";
$result =mysqli_query($conn,$sql);

$array = array();

$file = fopen($filename,'w');
$array = array("ID","FIRST NAME","LAST NAME","MOBILE NUMBER","EMAIL","ADDRESS","EMP ID");
fputcsv($file,$array);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $mobile = $row['mobilenumber'];
    $email = $row['email'];
    $address = $row['address'];
    $empid = $row['empid'];

    $array = array($id,$firstname,$lastname,$mobile,$email,$address,$empid);
    fputcsv($file,$array);
}


fclose($file);

header("Content-Description: File Transfer");
header("Content-Description: Attachment; filename=$filename");
header("Content-Type: application/csv;");
readfile($filename);
unlink($filename);
exit();




?>