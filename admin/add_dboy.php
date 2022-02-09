<?php include "include/header.php";
 include "include/nav.php";
include 'connection.php';

error_reporting(0);
if(isset($_POST['submit'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
 $password=$_POST['password'];
$location=$_POST['location'];
$image = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];    
     move_uploaded_file($tempname,"upload/$image");
     


$sql="INSERT INTO `dboy`(name,phone,email,password,location,image)
         VALUES ('$name','$phone','$email','$password','$location','$image')";


 $result = mysqli_query($conn, $sql);
 

if($result){
        ?>
        <script>
        alert('Submitted successfully');
        </script>
<?php

}else{
        ?>
        <script>
        alert('Submit unsuccessfully');
        </script>
        <?php
}
 
        

      }
  

?>


<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Add Delivery Boy
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="" enctype="multipart/form-data" >
    
        <input type="hidden" name="stage" value="2" required >
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading" >Name</label>
                            <input type="text" class="form-control" id="Name" name="name" required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading">Phone Number</label>
                            <input type="number" class="form-control" id="phone" name="phone" required autocomplete="off" >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Email</label>
                            <input type="email" class="form-control" id="email" name="email" required  autocomplete="off">
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Password</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                            </div>
                            <div class="form-row form-group">

        <label for="heading">Location</label>
        <select class="form-control" name="location" id="location">
            
            <option>Select....</option>
            <option>Cuttack</option>
            <option>Bhubaneswar</option>
            <option>Other</option>
          
</select>

</div>


                           
                            <div class="form-row form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="">
                             <img src="upload/<?php echo $image;?>" style="height:150px;width:200px">
                            </div>
                              
                            <div class="form-group">
                               
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            
                            </div>
                        </div>
                    </div>
                        </form>

                    </div>
                </div>
            </div>

<?php include "include/footer.php";
        include "include/js.php";?>  
