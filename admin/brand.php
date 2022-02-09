<?php 
include 'connection.php';
error_reporting(0);
include "include/header.php";
 include "include/nav.php";

$name=$_POST['name'];
$stage = $_POST['stage'];

if ($stage == 2) {

  $sql="INSERT INTO `brand`( `name`) VALUES ('$name')";

       $result3 = mysqli_query($conn,$sql);
      
    $msg = "Brand Added Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'brand.php';";
    print "</script>";
    exit;
}
/* EDIT Template */

if ($_POST['stage'] == 3 && $_POST['rid'] != "") {
    
  
    $sql="UPDATE `brand` SET `name`='$name' WHERE id=" . $_POST['rid'] . "";

  $result3 = mysqli_query($conn,$sql);
  //include('pagemanipulate.php');
    $msg = "Product Updated Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'brand.php';";
    print "</script>";
    exit;
}

/*Delete Template */
$delid = $_GET['delid'];
if ($delid != ""){
  $upsql = "delete from brand where id={$delid}";            
    mysqli_query($conn,$upsql);
    $msg = "Record Deleted Successfully.";
    setcookie("msg", $msg, time() + 3);
  header("Location: brand.php");
}

if ($_GET['id'] != "") {
    $sql = "select * from brand where id=" . $_GET['id'] . "";
    
    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  
  $eid = $row['id'];
}

$page="product";
?>

?>
<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Brand
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="" enctype="multipart/form-data" >
    <?php if ($eid == "") { ?>
    <input type="hidden" name="stage" value="2">
    <?php } else { ?>
    <input type="hidden" name="stage" value="3">
    <input type="hidden" name="rid" value="<?php print $eid; ?>">
    <?php } ?>
        
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading" >Brand Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php print $row['name'];?>"required >
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
                                       Brand Details
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                
                                                <th>Brand Name</th>
                                              
                                                <th class="text-center" style="width:240px;">Action</th> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sqlfetch = "SELECT * FROM brand";

                                                $sqlfetch = mysqli_query($conn,$sqlfetch);

                                                $i = 1;

                                                while ($row = mysqli_fetch_array($sqlfetch))

                                                {

                                                    $id=$row['id'];

                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $row['name']; ?></td>
                                                
                                                
                                                
                                                
                                                                                                
                                                <td class="text-center">
                                                        
                                                        
                <a href="brand.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a> |
                <a href="?delid=<?php print $row['id']; ?>" onclick ="return confirm('Are you sure to delete ?')"><i class="fas fa-trash-alt"></i></a></td>
                                                        
                                                    </td>
                                                
                                            </tr>
                                            <?php 

                                            $i++;

                                            } ?> 
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