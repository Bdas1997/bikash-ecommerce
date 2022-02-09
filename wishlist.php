<?php
session_start();
include('connection.php');
if(!isset($_SESSION['id'])){
header("location:login.php");
}else{
    $cid=$_SESSION['id'];
    $wl=$_POST['wl'];
    $date=date("m/d/Y");
 date_default_timezone_set("Asia/Kolkata");
 $time= date('H:i A');

$sql_insert="INSERT INTO `wishlist`(`user_id`,`product`,`date`,`time`) VALUES ('$cid','$wl','$date','$time')";
// print_r($sql_insert);
// die();
$result=mysqli_query($conn,$sql_insert);
header("location:index.php");
}
?>