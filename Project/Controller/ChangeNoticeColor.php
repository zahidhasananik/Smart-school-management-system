<?php
include "../model/DatabaseConnection.php";
$hasError=false;
$error=""; 

$notice_id=$_POST["notice_id"];
$color=$_POST["color"];

if($notice_id)
{
$connection = new DatabaseConnection();
$conobj=$connection->OpenCon();

$userQuery=$connection->UpdateNoticeColor($conobj,"notices",$notice_id, $color);
echo 'Notice color set to importent';
}
?>
