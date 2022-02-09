<?php
session_start();
include 'connection.php';
error_reporting(0);
if (!isset($_SESSION['email'])){
    header("location:index.php");
}
include "include/header.php";

include "include/nav.php";

$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);

$price=$_POST['price'];

$category=$_POST['category'];
$brand=$_POST['brand'];

$status=$_POST['status'];

$allowed_extensions = array('gif', 'jpg','jpeg', 'png','bmp', 'GIF', 'JPG', 'PNG', 'JPEG','BMP','jfif');
$stage = $_POST['stage'];

if ($stage == 2) {

    if ($_FILES['pimg']['name'] != "") {

        $filenamenew = $_FILES['pimg']['name'];

        $path_info = pathinfo($filenamenew);

        $is_valid = in_array($path_info['extension'], $allowed_extensions);

        if (empty($is_valid)) {
            $msg = "Incorrent file extension, Please upload a valid image file";
            setcookie("msg", $msg, time() + 3);
            print "<script>";
            print "self.location = 'productadd.php';";
            print "</script>";
            exit;
        } else {

            $path2 = "upload";
             $s1 = rand();
            $realname = $_FILES['pimg']['name'];
            $realname = $s1 . "_" . $realname;
            $dest = $path2 . "/" . $realname;
            copy($_FILES['pimg']['tmp_name'], $dest);
            $image = trim($realname);
            $path3 = "upload";
            $delpath1 = $path3 . "/" . $_POST['T2'];
            @unlink($delpath1);

        }

    } else {
        
        $image =$_POST['T2'];

    }


   
// print_r($stage);
// die();
  $sql="INSERT INTO `product`( `title`,`description`,`category`,`brand`,`price`,`status`,`image`) VALUES ('$title','$description','$category','$brand','$price','$status','$image')";
// print_r($sql);
// die();
       $result3 = mysqli_query($conn,$sql);
      
    $msg = "Product Added Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'productadd.php';";
    print "</script>";
    exit;
}
/* EDIT Template */

if ($_POST['stage'] == 3 && $_POST['rid'] != "") {
    
    if ($_FILES['pimg']['name'] != "") {
        $filenamenew = $_FILES['pimg']['name'];
        $path_info = pathinfo($filenamenew);
        $is_valid = in_array($path_info['extension'], $allowed_extensions);
        if (empty($is_valid)) {
          $msg = "Incorrent file extension, Please upload a valid image file";
            setcookie("msg", $msg, time() + 3);
            print "<script>";
            print "self.location = 'productadd.php';";
            print "</script>";
            exit;
        } else {

    $path2 = "upload";
            $s1 = rand();
            $realname = $_FILES['pimg']['name'];
            $realname = $s1 . "_" . $realname;
            $dest = $path2 . "/" . $realname;
            copy($_FILES['pimg']['tmp_name'], $dest);
            $image = trim($realname);
            $path3 = "upload";
            $delpath1 = $path3 . "/" . $_POST['T2'];
            @unlink($delpath1);
        }



    } else {



        $image =$_POST['T2'];

    }
    
   

    $sql="UPDATE `product` SET `title`='$title',`image`='$image',`brand`='$brand',`category`='$category',`description`='$description',`price`='$price',`status`='$status' WHERE id=" . $_POST['rid'] . "";
// print_r($sql);
// die();
  $result3 = mysqli_query($conn,$sql);
  //include('pagemanipulate.php');
    $msg = "Product Updated Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'pro_list.php';";
    print "</script>";
    exit;
}

if ($_GET['id'] != "") {
    $sql = "select * from product where id=" . $_GET['id'] . "";
    
    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  
  $eid = $row['id'];
}

$page="product";


?>

<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Add Product
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="productadd.php" enctype="multipart/form-data" >
    
         <?php if ($eid == "") { ?>
    <input type="hidden" name="stage" value="2">
    <?php } else { ?>
    <input type="hidden" name="stage" value="3">
    <input type="hidden" name="rid" value="<?php print $eid; ?>">
    <?php } ?>
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php print $row['title'];?>"required >
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Description</label>
                            <textarea class="form-control" id="description" name="description" required ><?php print $row['description'];?></textarea>
                            </div>
                            <div class="form-row m-b-20">
                            <label for="heading" >Product Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php print $row['price'];?>" required >
                            </div>
                            <div class="form-row form-group">

        <label for="heading">Category</label>
        <select class="form-control" name="category" id="category">
           <?php  
                $sql2 = "select * from pcategory";
                $res1=mysqli_query($conn,$sql2);
                while($row12 = mysqli_fetch_assoc($res1)){
                  
                  if($row['category']==$row12['id']){
                ?>
           
            <option value="<?php echo $row12['id'];?>" selected><?php echo $row12['title'];?></option>
                <?php }
                else{
              ?>
                    <option value="<?php echo $row12['id'];?>" ><?php echo $row12['title'];?></option>
                              <?php }}?> 
</select>

</div>
<div class="form-row form-group">

        <label for="heading">Brand</label>
        <select class="form-control" name="brand" id="brand">
                            <?php  
                $sql34 = "select * from brand";
                $res=mysqli_query($conn,$sql34);
                while($row154 = mysqli_fetch_assoc($res)){
                 
                  if($row['brand']==$row154['id']){
                ?>
           
            <option value="<?php echo $row154['id']; ?>" selected><?php echo $row154['name']; ?></option>
   <?php }
                else{
              ?>
                              <option value="<?php echo $row154['id'];?>" ><?php echo $row154['name'];?></option>
                              <?php }}?>        
</select>

</div>

                           
                            <div class="form-row form-group">
                            <label for="category">Product Image</label>
                            <input type="file" class="form-control" id="image" name="pimg" placeholder="">
                             
                            </div>
                            <?php if ($row['image'] != "") { ?>

                            <div class="clearfix"></div>

                            <div class="form-row">

                            <img src="upload/<?php print $row['image']; ?>" style="width: 200px;height:200px; " class="img-responsive" />  

                            </div>

                            <?php } ?>

                            <input type="hidden" name="T2" value="<?php print $row['image']; ?>">
                            <div class=" form-row form-group">

                                <label for="heading" >Availability</label>
                          <select class="form-control" name="status" id="status"   required>
                       <option>Select One....</option>
   
                       <option  value="Yes"<?php echo $row['status'] == 'Yes' ? 'selected':'';?>>Yes</option>
                       <option  value="No"<?php echo $row['status'] == 'No' ? 'selected':'';?>>No</option>
                     </select>

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
