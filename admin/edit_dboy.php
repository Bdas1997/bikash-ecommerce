<?php include "include/header.php";
 include "include/nav.php";

require_once('connection.php');
$id=$_GET['id'];
$query="select * from dboy where id='$id'";


$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
  $id=$row['id'];
  $name=$row['name'];
  $phone=$row['phone'];
  $email=$row['email'];
 
  $password=$row['password'];
  $location=$row['location'];
  $image=$row['image'];
  
}


?>



<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Update Delivery Boy
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="update_dboy.php" enctype="multipart/form-data" >
    
        <input type="hidden" name="gid" value="<?php echo $id;?>">
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading" >Name</label>
                            <input type="text" class="form-control" id="Name" name="name" value="<?php echo $name;?>" required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading">Phone Number</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>" required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>" required >
                            </div>
                            <div class="form-row form-group">

        <label for="heading">Location</label>
        <select class="form-control" name="location" id="location">
            <option><?php echo $location;?></option>
            <option>Select....</option>
            
            <option>Cuttack</option>
            <option>Bhubaneswar</option>
            <option>Other</option>
          
</select>

</div>


                           
                            <div class="form-row form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" id="image" name="image" <?php echo $image;?> placeholder="">
                             <img src="upload/<?php echo $image;?>" style="height:150px;width:200px">
                              <input type="hidden" name="simg" value="<?php echo $image;?>">
                            </div>
                              
                            <div class="form-group">
                               
                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                            
                            </div>
                        </div>
                    </div>
                        </form>

                    </div>
                </div>
            </div>

<?php include "include/footer.php";
        include "include/js.php";?>  
