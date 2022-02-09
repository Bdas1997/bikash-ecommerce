<?php 

session_start();

include 'connection.php';
include "include/header.php";

$id=$_SESSION['id'];
$cid=session_id();
$cf=$_GET['cf'];
?>



	<!--================ End Header Menu Area =================-->
  
	<!-- ================ start banner area ================= -->	
	
		<div class="container h-100">
			<div class="blog-banner mt-5">
				<div class="text-center">
					<h1>Order Confirmation</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>

	<!-- ================ end banner area ================= -->
  
  <!--================Order Details Area =================-->
  <section class="order_details section-margin--small">
    <div class="container">
      <p class="text-center billing-alert">Thank you. Your order has been received.</p>
      <div class="row mb-5">
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Order Info</h3>
            <?php
  $sql1 = "SELECT * FROM order_master WHERE user_id=" . $_SESSION['id'] . " and order_status='ordered'";
  $result1 = mysqli_query($conn,$sql1);
  $sl=1;
  while($row1 = mysqli_fetch_assoc($result1)){
  ?>
            <table class="order-rable">
              <tr>
                <td>Order number</td>
                <td>: <?php echo $row1['order_id'];?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>: <?php echo $row1['order_status'];?></td>
              </tr>
              <tr>
                <td>Total</td>
                <td>: ₹<?php echo $row1['totalprice'];?>.00</td>
              </tr>
              <tr>
                <td>Payment method</td>
                <td>: <?php echo $row1['payment_type'];?></td>
              </tr>
            </table>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Billing Address</h3>
            <?php
$sql = "SELECT * FROM user_login WHERE id=" . $_SESSION['id'] . "";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>
            <table class="order-rable">
              <tr>
                <td>Street</td>
                <td>: <?php echo $row['flat']?>/<?php echo $row['landmark']?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>: <?php echo $row['city']?></td>
              </tr>
              <tr>
                <td>State</td>
                <td>: <?php echo $row['state']?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>:<?php echo $row['pin']?></td>
              </tr>
            </table>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Shipping Address</h3>
            <?php
$sql = "SELECT * FROM user_login WHERE id=" . $_SESSION['id'] . "";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>
            <table class="order-rable">
              <tr>
                <td>Street</td>
                <td>: <?php echo $row['flat']?>/<?php echo $row['landmark']?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>: <?php echo $row['city']?></td>
              </tr>
              <tr>
                <td>State</td>
                <td>: <?php echo $row['state']?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>: <?php echo $row['pin']?></td>
              </tr>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="order_details_table">
        <h2>Order Details</h2>
        <div class="table-responsive">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            
                
               
            <tbody>
              <tr>
                <td>
                  <p><?php echo $row1['title'];?></p>
                </td>
                <td>
                  <h5>x <?php echo $row['quantity'];?></h5>
                </td>
                <td>
                  <p>$<?php echo round($row1['price']*$row['quantity']);?></p>
                </td>
              </tr>
          
              
              
              
              <tr>
                <td>
                  <h4>Total</h4>
                </td>
                <td>
                  <h5></h5>
                </td>
                <td>
                  <h4>$<?php echo round($sum);?>.00</h4>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!--================End Order Details Area =================-->


  <?php include "include/footer.php"; ?>