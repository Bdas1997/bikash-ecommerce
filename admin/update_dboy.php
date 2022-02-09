<?php


require_once('connection.php');
error_reporting(0);


	$id=$_POST['gid'];
    $name=$_POST['name'];
	$phone=$_POST['phone'];

 $email=$_POST['email'];
 $password=$_POST['password'];
    $location=$_POST['location'];


    $simg=$_POST['simg'];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
       move_uploaded_file($tempname,"upload/$image");
      
    if($image!=''){
    
   
		$query="update dboy set name='".$name."',phone='".$phone."',email='".$email."',password='".$password."',location='".$location."',image='".$image."' where id='".$id."'";
		 
   
		$result=mysqli_query($conn,$query);
        
    
        
		if($result){
			header("location:viewdboy.php");
		}
		else{
			echo 'Please check query';
		}
    }

else{
	$query="update dboy set name='".$name."',phone='".$phone."',email='".$email."',password='".$password."',location='".$location."',image='".$simg."' where id='".$id."'";
    
		$result=mysqli_query($conn,$query);


}
header("location:viewdboy.php");





?>