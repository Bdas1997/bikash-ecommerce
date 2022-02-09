<?php
session_start(); 
include('connection.php');
$id=$_POST['id'];
$q=$_POST['q'];
$cid=session_id();
$date=date("m/d/Y");


 date_default_timezone_set("Asia/Kolkata");
 $time= date('H:i A');
$sql_insert="INSERT INTO `cart`(`session_id`,`product`,`date`,`time`,quantity) VALUES ('$cid','$id','$date','$time','$q')";
// print_r($sql_insert);
// die();
$result=mysqli_query($conn,$sql_insert);

header('Location:index.php');

?>