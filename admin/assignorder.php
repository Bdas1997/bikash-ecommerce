<?php 
include 'connection.php';
error_reporting(0);
$id=$_GET['id'];

include "include/header.php";
 include "include/nav.php";


$name=$_POST['name'];
$stage=$_POST['stage'];
if ($stage == 2) {
   
  $sql="update `order_master` set order_status='dispatch',deliveryboy='$name' where id='$id'";

       $result3 = mysqli_query($conn,$sql);
       

      setcookie("msg", $msg, time() + 3);
           
           
    $msg = "Dispatch Successfully.";

    setcookie("msg", $msg, time() + 3);

    print "<script>";

    print "self.location = 'assignorder.php';";

    print "</script>";

    exit;

}
?>
<div class="content-wrapper" style="margin-top: 10%;margin-left: 20%;">
    <div class="container-fluid">
<div class="col-lg-12">
                <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                              Assigned Delivery Boy
                            </h5>
                            <p class="m-b-0 text-muted">
                                 
                            </p>
                        </div>
                    <form name="cms" method="POST" action="" enctype="multipart/form-data" >
                     <input type="hidden" name="stage" value="2">
        
                        
                        <div class="card-body">                   
                        
                            <div class="form-row m-b-20">
                            <label for="heading">Name</label>
                            <select class="form-control"  name="name" required >
                                <?php
                                        $sqlfetch = "SELECT * FROM dboy";

                                        $sqlfetch = mysqli_query($conn,$sqlfetch);

                                        $i = 1;

                                        while ($row = mysqli_fetch_array($sqlfetch))

                                        {

                                            

                                        ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                 <?php }?>
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




                </div>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php";
        include "include/js.php";?> 