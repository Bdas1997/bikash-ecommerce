<?php

require_once('connection.php');
error_reporting(0);


	$id=$_POST['gid'];
    $title=$_POST['title'];
	
    $simg=$_POST['simg'];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
       move_uploaded_file($tempname,"upload/$image");
      
    if($image!=''){
    
   
		$query="update pcategory set title='".$title."',image='".$image."' where id='".$id."'";
		 
   
		$result=mysqli_query($conn,$query);
        
    
        
		if($result){
			header("location:productcategory.php");
		}
		else{
			echo 'Please check query';
		}
    }

else{
	$query="update pcategory set title='".$title."',image='".$simg."' where id='".$id."'";
    
		$result=mysqli_query($conn,$query);


}
header("location:productcategory.php");





?>