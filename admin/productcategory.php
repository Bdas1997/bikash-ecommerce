<?php 
include 'connection.php';
include "include/header.php";
 include "include/nav.php";

if(isset($_POST['submit'])){
$title=mysqli_real_escape_string($conn,$_POST['title']);
$image = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];    
     move_uploaded_file($tempname,"upload/$image");
    


$sql="INSERT INTO `pcategory`(title,image)
         VALUES ('$title','$image')";


 $result = mysqli_query($conn, $sql);
 
        

 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show " role="alert" style="margin-left:300px">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left:300px">
          <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

?>
<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Product Category
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="" enctype="multipart/form-data" >
    
        
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Category</label>
                            <input type="text" class="form-control" id="title" name="title" required >
                            </div>
                            
                           
                            <div class="form-row form-group">
                            <label for="category">Product Image</label>
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



<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
             <div class="col-lg-12" >
                              <div class="card m-b-30">
                                <div class="card-header">
                                    <h5 class="m-b-0">
                                       Category Details
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                
                                                <th>Category</th>
                                              
                                                <th>Image</th>
                                                
                                                
                                                <th class="text-center" style="width:240px;">Action</th> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php


$query1="select * from pcategory";
//  print_r($query);
//  die();

$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
                                            <tr>
                                                
                                                <td><?php echo $row['title']; ?></td>
                                                
                                                
                                                <td><img src="upload/<?php echo $row["image"];?>" style="max-width: 150px"></td>
                                                
                                                                                                
                                                <td class="text-center">
                                                        
                                                        
                <a href="edit_pcategory.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a> |
                <a href="delete_pcategory.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                                        
                                                    </td>
                                                
                                            </tr>
                                            <?php 
                                        }
                                            
                                             ?> 
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php";
        include "include/js.php";?>  
