<?php 
session_start();
include 'connection.php';

include "include/header.php";

if (!isset($_SESSION['id'])):
  header("location:index.php");
endif;
$stage=$_POST['stage'];
if($stage==5){
  $id=$_GET['oid'];
  $update="update order_master set order_status='cancel' where id='$id'";
   mysqli_query($conn,$update);      
    $msg = "Order Cancelled.";
  
    setcookie("msg", $msg, time() + 3);

    print "<script>";

    print "self.location = 'myorder.php';";

    print "</script>";

    exit;

}
?>


		<div class="container h-100">
			<div class="blog-banner mt-5">
				<div class="text-center">
					<h1>My Profile</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	
	<section class="checkout_area section-margin--small">
    <div class="container">
<div class="row clearfix">
<div class="col-sm-12">
<h2>User Dashbord</h2>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-3">
<div class="user-tab">
  <button class="tablinks" onclick="openCity(event, 'myprofile')" id="defaultOpen">My Profile</button> 
  <button class="tablinks" onclick="openCity(event, 'ro')" id="defaultOpen">Recent Order</button> 
  <button class="tablinks" onclick="openCity(event, 'od')" id="defaultOpen">Out Of Delivery</button> 
  <button class="tablinks" onclick="openCity(event, 'co')" id="defaultOpen">Complete Order</button>
  <button class="tablinks" onclick="openCity(event, 'cao')" id="defaultOpen">Cancel Order</button>      
  <button class="tablinks"><a href="logout.php">Log Out</a></button>
</div>
</div>
<div class="col-sm-9">
<div id="myprofile" class="user-tabcontent" style="display: block;">
<div class="row">
<div class="col-lg-3 text-center">
<div class="mypro">
<?php
  $sql = "SELECT * FROM user_login WHERE id=" . $_SESSION['id'] . "";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  ?>
<i class="fas fa-user"></i>
<h3><?php echo $row['name'];
?></h3>
</div>
</div>
<div class="col-sm-9">
<div class="mypro-dtls">
 
<ul>
<li><strong>Name:</strong> <?php echo $row['name'];
?></li>
<li><strong>Phone Number:</strong> <?php echo $row['phone'];
?></li>
<li><strong>Email:</strong> <?php echo $row['email'];
?></li>
<li><strong>Address:</strong><?php echo $row['city'];
?>/<?php echo $row['pin'];
?> </li>
</ul>
</div>
</div>
</div>
</div>
<?php if ($_COOKIE['msg']) { ?>

<div class="clearfix"></div>

<div class="col-lg-8">        

<div class="alert alert-success">

  <a href="#" class="close" data-dismiss="alert" onClick="$('.alert').hide('slow');">&times;</a>

  <?php print str_replace("+", " ", $_COOKIE['msg']); ?>

</div>

</div>

<?php } ?>
<div id="ro" class="user-tabcontent">
<table class="table-user table table-hover">
  <thead>
    <tr>
      <th scope="col">Slno</th>
      <th scope="col">Order Id</th>
      <th scope="col">Status</th>
      <th scope="col">Total Price</th>
          <th scope="col">Action</th>
          <th scope="col">Invoice</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1 = "SELECT * FROM order_master WHERE user_id=" . $_SESSION['id'] . " and order_status='ordered'";
  $result1 = mysqli_query($conn,$sql1);
  $sl=1;
  while($row1 = mysqli_fetch_assoc($result1)){
  ?>
    <tr>
      <td scope="col"><?php echo $sl;?></td>
      <td scope="col"><?php echo $row1['order_id'];?></td>
      <td scope="col"><?php echo $row1['order_status'];?></td>
      <td scope="col">₹<?php echo $row1['totalprice'];?>.00</td>
          <td scope="col"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row1['id'];?>">
  Cancel
</button>
</td>
          <td scope="col"><i class="fa fa-print" style="font-size:24px"></i></td>
    </tr>
    <?php 
  $sl++;
  }?>
  </tbody>
  
</table>

 
</div>
<?php
  $sql35 = "SELECT * FROM order_master WHERE user_id=" . $_SESSION['id'] . " and order_status='ordered'";
  $result25 = mysqli_query($conn,$sql35);
  
  while($row25 =mysqli_fetch_assoc($result25)){
  ?>
<div class="modal fade" id="exampleModalCenter<?php echo $row25['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cancel Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to cancel this order.
      </div>
      <div class="modal-footer">
        <form action='myorder.php?oid=<?php echo $row25['id'];?>' method='post'>
        <input type='hidden' name='stage' value='5'>
        <button type="submit" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-primary">No</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>
<div id="od" class="user-tabcontent">
<table class="table-user table table-hover">
  <thead>
    <tr>
      <th scope="col">Slno</th>
      <th scope="col">Order Id</th>
      <th scope="col">Status</th>
      <th scope="col">Total Price</th>
          
         
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1 = "SELECT * FROM order_master WHERE user_id=" . $_SESSION['id'] . " and order_status='dispatch'";
  $result1 = mysqli_query($conn,$sql1);
  $sl=1;
  while($row1 = mysqli_fetch_assoc($result1)){
  ?>
    <tr>
      <td scope="col"><?php echo $sl;?></td>
      <td scope="col"><?php echo $row1['order_id'];?></td>
      <td scope="col">Out Of Delivery</td>
      <td scope="col">₹<?php echo $row1['totalprice'];?>.00</td>
          
          
    </tr>
    <?php 
  $sl++;
  }?>
  </tbody>
  
</table>

 
</div>
<div id="co" class="user-tabcontent">
<table class="table-user table table-hover">
  <thead>
    <tr>
      <th scope="col">Slno</th>
      <th scope="col">Order Id</th>
      <th scope="col">Status</th>
      <th scope="col">Total Price</th>
          
          <th scope="col">Invoice</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1 = "SELECT * FROM order_master WHERE user_id=" . $_SESSION['id'] . " and order_status='Delivered'";
  $result1 = mysqli_query($conn,$sql1);
  $sl=1;
  while($row1 = mysqli_fetch_assoc($result1)){
  ?>
    <tr>
      <td scope="col"><?php echo $sl;?></td>
      <td scope="col"><?php echo $row1['order_id'];?></td>
      <td scope="col"><?php echo $row1['order_status'];?></td>
      <td scope="col">₹<?php echo $row1['totalprice'];?>.00</td>
          
          <th scope="col"><i class="fa fa-print" style="font-size:24px"></i></th>
    </tr>
    <?php 
  $sl++;
  }?>
  </tbody>
  
</table>
 
</div>
<div id="cao" class="user-tabcontent">
<table class="table-user table table-hover">
  <thead>
    <tr>
      <th scope="col">Slno</th>
      <th scope="col">Order Id</th>
      <th scope="col">Status</th>
      <th scope="col">Total Price</th> 
          <th scope="col">Invoice</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1 = "SELECT * FROM order_master WHERE user_id=" . $_SESSION['id'] . " and order_status='cancel'";
  $result1 = mysqli_query($conn,$sql1);
  $sl=1;
  while($row1 = mysqli_fetch_assoc($result1)){
  ?>
    <tr>
      <td scope="col"><?php echo $sl;?></td>
      <td scope="col"><?php echo $row1['order_id'];?></td>
      <td scope="col"><?php echo $row1['order_status'];?></td>
      <td scope="col">₹<?php echo $row1['totalprice'];?>.00</td> 
          <th scope="col"><i class="fa fa-print" style="font-size:24px"></i></th>
    </tr>
    <?php 
  $sl++;
  }?>
  </tbody>
  
</table>
 
</div>

</div>
     

</div>
</div>
</div>


    </div>
</section>

  <!--================ Start footer Area  =================-->	
	<footer>
		<div class="footer-area footer-only">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets ">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no 
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="index.php">Home</a></li>
								<li><a href="category.php">Shop</a></li>
								<li><a href="#">Blog</a></li>
								<!-- <li><a href="#">Product</a></li> -->
								<!-- <li><a href="#">Brand</a></li> -->
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Gallery</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="img/gallery/r1.jpg" alt=""></li>
								<li><img src="img/gallery/r2.jpg" alt=""></li>
								<li><img src="img/gallery/r3.jpg" alt=""></li>
								<li><img src="img/gallery/r5.jpg" alt=""></li>
								<li><img src="img/gallery/r7.jpg" alt=""></li>
								<li><img src="img/gallery/r8.jpg" alt=""></li>
							</ul>
						</div>
					</div> -->
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>Cuttack,Odisha</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Bikash</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.form.js"></script>
  <script src="vendors/jquery.validate.min.js"></script>
  <script src="vendors/contact.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
  <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("user-tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
  
<script>
  $(document).ready(function(){
    $('.counter').counterUp({
      delay: 10,
      time: 1200,
  
     });
  });
  </script>
<script>
 $(window).scroll(function(){
  $('.navbar').toggleClass('scrolled',$(this).scrollTop()>25);
 })

 </script>
</body>
</html>