<?php 
include 'connection.php';
error_reporting(0);

include "include/header.php";
 include "include/nav.php";

$product_id=$_POST['product_id'];
$offerproductname=mysqli_real_escape_string($conn,$_POST['offerproductname']);

$price=$_POST['price'];


$allowed_extensions = array('gif', 'jpg','jpeg', 'png','bmp', 'GIF', 'JPG', 'PNG', 'JPEG','BMP');
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
            print "self.location = 'offer.php';";
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
  $sql="INSERT INTO `offer`( `product_id`,`offerproductname`,`price`,`image`) VALUES ('$product_id','$offerproductname','$price','$image')";
// print_r($sql);
// die();
       $result3 = mysqli_query($conn,$sql);
      
    $msg = "Offer Added Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'offer.php';";
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
            print "self.location = 'offer.php';";
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

    $sql="UPDATE `offer` SET `product_id`='$product_id',`offerproductname`='$offerproductname',`price`='$price',`image`='$image' WHERE id=" . $_POST['rid'] . "";

  $result3 = mysqli_query($conn,$sql);
  //include('pagemanipulate.php');
    $msg = "Offer Updated Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'offer.php';";
    print "</script>";
    exit;
}



if ($_GET['id'] != "") {
    $sql = "select * from offer where id=" . $_GET['id'] . "";
    
    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  
  $eid = $row['id'];
}

$page="offer";




?>




<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Add Offer
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="pwd" method="POST" action="offer.php" enctype="multipart/form-data" >
    
         <?php if ($eid == "") { ?>
    <input type="hidden" name="stage" value="2">
    <?php } else { ?>
    <input type="hidden" name="stage" value="3">
    <input type="hidden" name="rid" value="<?php print $eid; ?>">
    <?php } ?>
                        
                        <div class="card-body">                   
                        
            <div class="form-row form-group">

        <label for="heading">Product Name</label>
        <select class="form-control" name="product_id" id="product_id">
           <?php  
                $sql2 = "select * from product";
                $res1=mysqli_query($conn,$sql2);
                while($row12 = mysqli_fetch_assoc($res1)){
                  
                  if($row['product_id']==$row12['id']){
                ?>
           
            <option value="<?php echo $row12['id'];?>" selected><?php echo $row12['title'];?></option>
                <?php }
                else{
              ?>
                    <option value="<?php echo $row12['id'];?>" ><?php echo $row12['title'];?></option>
                              <?php }}?> 
</select>

</div>
 <div class="form-row m-b-20">
                            <label for="heading" >Free Product Name</label>
                            <input type="text" class="form-control" id="offerproductname" name="offerproductname" value="<?php print $row['offerproductname'];?>"required >
                            </div>
                            
                            <div class="form-row m-b-20">
                            <label for="heading" >Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php print $row['price'];?>" required >
                            </div>



                           
                            <div class="form-row form-group">
                            <label for="category">Image</label>
                            <input type="file" class="form-control" id="image" name="pimg" placeholder="">
                             
                            </div>
                            <?php if ($row['image'] != "") { ?>

                            <div class="clearfix"></div>

                            <div class="form-row">

                            <img src="upload/<?php print $row['image']; ?>" style="width: 200px;height:200px; " class="img-responsive" />  

                            </div>

                            <?php } ?>

                            <input type="hidden" name="T2" value="<?php print $row['image']; ?>">
                          
                              
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