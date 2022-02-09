<?php 

session_start();
include 'connection.php'; 
include "include/header.php";
if (!isset($_SESSION['id'])):
    header("location:login.php?pg=$pg");
endif;

$id=$_SESSION['id'];
$cid=session_id();
$pg=$_GET['pg'];
if(isset($_POST['submit'])){


  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $pin=$_POST['pin'];
  $flat=$_POST['flat'];
  $area=$_POST['area'];
  $landmark=$_POST['landmark'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $pymode=$_POST['pymode'];
  $tp=$_POST['totalprice'];
  //OrderId
  $tid=rand();
  $lb="BS";
  $oid=$lb.rand(10,100000);
  $date=date("m/d/Y");
 date_default_timezone_set("Asia/Kolkata");
 $time= date('H:i A');
  $sql="UPDATE `register` SET `name`='$name',`email`='$email',`phone`='$phone',`flat`='$flat',`area`='$area',`landmark`='$landmark',`city`='$city',`state`='$state',`pin`='$pin' WHERE `id`='$id'";
  $result3 = mysqli_query($conn,$sql); 
  $sql1="INSERT INTO `order_master`(`order_id`, `user_id`, `session_id`, `payment_status`, `order_status`, `transaction_id`, `payment_type`, `date`, `time`, `totalprice`) VALUES ('$oid','$id','$cid','success','ordered','$tid','$pymode','$date','$time','$tp')";
  // print_r($sql1);
  // die();  
  $result4 = mysqli_query($conn,$sql1); 
  session_regenerate_id();  
  $msg = "Order Placed..";
      setcookie("msg", $msg, time() + 3);
      print "<script>";
      print "self.location = 'myorder.php'";
      print "</script>";
      exit;
  }
?>

	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Checkout</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container">
        
        
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><h4>Product <span style="margin-left:60px;">Quantity</span><span style="margin-left:60px;">Total</span></h4></li>
                            <?php 
                
                $sql="SELECT * FROM cart WHERE session_id='$cid'";
       // print_r($sql);
       // die();
                $res=mysqli_query($conn,$sql);
                $sum=0;
                while($row=mysqli_fetch_assoc($res)){
                    $product=$row['product'];
                    $sql1="SELECT * FROM product WHERE id='$product'";
                    // print_r($sql1);
                    // die();
                    $res1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($res1);
          $sum=$sum+($row1['price']*$row['quantity']);
                    ?>
                            <li><?php echo $row1['title'];?><span style="margin-left:20px;"><?php echo $row['quantity'];?></span> <span style="margin-left: 20px;"><?php echo round($row1['price']*$row['quantity']);?></span></li>
                        <?php } ?>
                            
                        </ul>
                        <ul class="list list_2">
                           
                            <li>Total <span>$<?php echo round($sum);?>.00</span></li>
                        </ul>
                      
                        
                        
                    
                    </div>
                </div>
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                   <?php
$sql = "SELECT * FROM `user_login` WHERE id='$id'";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>
                    <form class="row contact_form" action="checkout.php" method="post" >
                        <input type="hidden" name='totalprice' value="<?php echo round($sum);?>">
                        <?php if ($_COOKIE['msg']) { ?>

<div class="clearfix">
    
</div>

<div class="col-lg-8">        

<div class="alert alert-success">

  <a href="#" class="close" data-dismiss="alert" onClick="$('.alert').hide('slow');">&times;</a>

  <?php print str_replace("+", " ", $_COOKIE['msg']); ?>

</div>

</div>
                    <?php } ?>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value='<?php echo $row['name']?>'>
                           
                        </div>
                        
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Mobile Number" value='<?php echo $row['phone']?>' onkeypress="return /[0-9.]/i.test(event.key)" maxlength="10" minlength="10">
                            <span class="placeholder" data-placeholder="Phone number"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value='<?php echo $row['email']?>'>
                            <span class="placeholder" data-placeholder="Email Address"></span>
                        </div>
                        
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="flat" name="flat" placeholder="Flatno" value='<?php echo $row['flat']?>'>
                            <span class="placeholder" data-placeholder="Address line 01"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark" value='<?php echo $row['landmark']?>'>
                            <span class="placeholder" data-placeholder="Address line 02"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city" placeholder="city" value='<?php echo $row['city']?>'>
                            <span class="placeholder" data-placeholder="Town/City"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <select  class="country_select" id="state" name="state" placeholder="State">
                                <option>State</option>
                                <option value="Andhra Pradesh"<?php echo $row['state'] == 'Andhra Pradesh' ? 'selected':'';?>>Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands"<?php echo $row['state'] == 'Andaman and Nicobar Islands' ? 'selected':'';?>>Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh"<?php echo $row['state'] == 'Arunachal Pradesh' ? 'selected':'';?>>Arunachal Pradesh</option>
<option value="Assam"<?php echo $row['state'] == 'Assam' ? 'selected':'';?>>Assam</option>
<option value="Bihar"<?php echo $row['state'] == 'Bihar' ? 'selected':'';?>>Bihar</option>
<option value="Chandigarh"<?php echo $row['state'] == 'Chandigarh' ? 'selected':'';?>>Chandigarh</option>
<option value="Chhattisgarh"<?php echo $row['state'] == 'Chhattisgarh' ? 'selected':'';?>>Chhattisgarh</option>
<option value="Dadar and Nagar Haveli"<?php echo $row['state'] == 'Dadar and Nagar Haveli' ? 'selected':'';?>>Dadar and Nagar Haveli</option>
<option value="Daman and Diu"<?php echo $row['state'] == 'Daman and Diu' ? 'selected':'';?>>Daman and Diu</option>
<option value="Delhi"<?php echo $row['state'] == 'Delhi' ? 'selected':'';?>>Delhi</option>
<option value="Lakshadweep"<?php echo $row['state'] == 'Lakshadweep' ? 'selected':'';?>>Lakshadweep</option>
<option value="Puducherry"<?php echo $row['state'] == 'Puducherry' ? 'selected':'';?>>Puducherry</option>
<option value="Goa"<?php echo $row['state'] == 'Goa' ? 'selected':'';?>>Goa</option>
<option value="Gujarat"<?php echo $row['state'] == 'Gujarat' ? 'selected':'';?>>Gujarat</option>
<option value="Haryana"<?php echo $row['state'] == 'Haryana' ? 'selected':'';?>>Haryana</option>
<option value="Himachal Pradesh"<?php echo $row['state'] == 'Himachal Pradesh' ? 'selected':'';?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir"<?php echo $row['state'] == 'Jammu and Kashmir' ? 'selected':'';?>>Jammu and Kashmir</option>
<option value="Jharkhand"<?php echo $row['state'] == 'Jharkhand' ? 'selected':'';?>>Jharkhand</option>
<option value="Karnataka"<?php echo $row['state'] == 'Karnataka' ? 'selected':'';?>>Karnataka</option>
<option value="Kerala"<?php echo $row['state'] == 'Kerala' ? 'selected':'';?>>Kerala</option>
<option value="Madhya Pradesh"<?php echo $row['state'] == 'Madhya Pradesh' ? 'selected':'';?>>Madhya Pradesh</option>
<option value="Maharashtra"<?php echo $row['state'] == 'Maharashtra' ? 'selected':'';?>>Maharashtra</option>
<option value="Manipur"<?php echo $row['state'] == 'Manipur' ? 'selected':'';?>>Manipur</option>
<option value="Meghalaya"<?php echo $row['state'] == 'Meghalaya' ? 'selected':'';?>>Meghalaya</option>
<option value="Mizoram"<?php echo $row['state'] == 'Mizoram' ? 'selected':'';?>>Mizoram</option>
<option value="Nagaland"<?php echo $row['state'] == 'Nagaland' ? 'selected':'';?>>Nagaland</option>
<option value="Odisha"<?php echo $row['state'] == 'Odisha' ? 'selected':'';?>>Odisha</option>
<option value="Punjab"<?php echo $row['state'] == 'Punjab' ? 'selected':'';?>>Punjab</option>
<option value="Rajasthan"<?php echo $row['state'] == 'Rajasthan' ? 'selected':'';?>>Rajasthan</option>
<option value="Sikkim"<?php echo $row['state'] == 'Sikkim' ? 'selected':'';?>>Sikkim</option>
<option value="Tamil Nadu"<?php echo $row['state'] == 'Tamil Nadu' ? 'selected':'';?>>Tamil Nadu</option>
<option value="Telangana"<?php echo $row['state'] == 'Telangana' ? 'selected':'';?>>Telangana</option>
<option value="Tripura"<?php echo $row['state'] == 'Tripura' ? 'selected':'';?>>Tripura</option>
<option value="Uttar Pradesh"<?php echo $row['state'] == 'Uttar Pradesh' ? 'selected':'';?>>Uttar Pradesh</option>
<option value="Uttarakhand"<?php echo $row['state'] == 'Uttarakhand' ? 'selected':'';?>>Uttarakhand</option>
<option value="West Bengal"<?php echo $row['state'] == 'West Bengal' ? 'selected':'';?>>West Bengal</option>
</select>
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Postcode/ZIP" value='<?php echo $row['pin']?>' onkeypress="return /[0-9.]/i.test(event.key)" maxlength="6" minlength="6">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" name='pymode' id='pymode' onchange="payMode()">
                                <option >Select Payment Method</option>
                                <option >COD</option>
                                <option>ONLINE</option>
                            </select>
                        </div>
                        <?php } ?>
<div class="col-md-12 form-group">
<input type="submit" id='s1' class="btn btn-success" value="Submit" name='submit' >
<input type="button" id='s2' value="Submit" class="btn btn-success" onclick="payNow();" style='display:none'>
</div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->



  <?php include "include/footer.php"; ?>