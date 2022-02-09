<?php 

include "include/header.php";
 include "include/nav.php";
 require_once('connection.php');
$id=$_GET['id'];
$query="select * from product where id='$id'";


$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
  $id=$row['id'];
  $title=$row['title'];
  $description=$row['description'];
  $price=$row['price'];
  $image=$row['image'];  
  
}

?>


<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Update Product
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="updateproduct.php" enctype="multipart/form-data" >
    <input type="hidden" name="gid" value="<?php echo $id;?>">
        
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title;?>" required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $description;?>" required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $price;?>" required >
                            </div>

                           
                            <div class="form-row form-group">
                            <label for="category">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="<?php echo $image?>" placeholder="">
                            <img src="upload/<?php echo $image;?>" style="height:150px;width:200px">
                            <input type="hidden" name="simg" value="<?php echo $image;?>">
                            </div>
                                
                           
                          

                
                            
                            <div class="form-group">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                        </form>

                    </div>
                </div>
            </div>


<?php include "include/footer.php";
        include "include/js.php";?>  