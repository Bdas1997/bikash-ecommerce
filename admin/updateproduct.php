<?php


require_once('connection.php');
error_reporting(0);


	$id=$_POST['gid'];
    $title=$_POST['title'];
	$description=$_POST['description'];

 $price=$_POST['price'];
 


    $simg=$_POST['simg'];
    $image = $_FILES["upd"]["name"];
    $tempname = $_FILES["upd"]["tmp_name"];    
       move_uploaded_file($tempname,"upload/$image");
      
    if($image!=''){
    
   
		$query="update product set title='".$title."',description='".$description."',price='".$price."',image='".$image."' where id='".$id."'";
    
		 
   
		$result=mysqli_query($conn,$query);
        
    
        
		if($result){
			header("location:productlist.php");
		}
		else{
			echo 'Please check query';
		}
    }

else{
	$query="update product set title='".$title."',description='".$description."',price='".$price."',image='".$simg."' where id='".$id."'";
    
		$result=mysqli_query($conn,$query);


}
header("location:productlist.php");





?>