<?php include 'connection.php';
include "include/header.php";
$id=$_GET['id'];
if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email= $_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        
       
        $sql = "INSERT INTO `review` (`name`, `email`,`subject`, `message`,`prod`) VALUES ('$name', '$email','$subject','$message','$id')";


        // print_r($sql);
        // die();
        $result = mysqli_query($conn, $sql);
      }






?>

<style>
	.image-responsive:hover{
transform: scale(1.2);
transition: all 0.5s;

}
</style>
	<!--================ End Header Menu Area =================-->
	
	<!-- ================ start banner area ================= -->	
	<section>
		<div class="container h-100">
			<div class="blog-banner mt-5">
				<div class="text-center">
					<h1>Shop Single</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


  <!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<?php
 
    $query1="select * from product where id='$id' ";

    $result=mysqli_query($conn,$query1);
     $row=mysqli_fetch_assoc($result);
        ?>
			<div class="row s_product_inner">
				 
				<div class="col-lg-6">
					
						<div class="single-prd-item">
							<img class="image-responsive" src="admin/upload/<?php echo $row['image']?>" alt ="" style="height: 400px; width:400px;"  >
							
						

					</div>
					<!-- <ul style="display: flex; margin-top:5px;">
						<li style="margin-right:2px;">
							<img  src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 120px; width: 120px;">
						</li>
						<li style="margin-right:2px;">
							<img  src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 120px; width: 120px;">
						</li>
						<li >
							<img  src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 120px; width: 120px;">
						</li>
						</ul> -->
						
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h1><?php echo $row['title']?></h1><hr/>
						<h3> Price ₹ <?php echo $row['price']?></h3><hr/>
					
						<?php
 
    $query1="select * from offer where product_id='$id' ";

    $result=mysqli_query($conn,$query1);
     $row1=mysqli_fetch_assoc($result);
        ?>
        <h5>If You Buy this product You Get an <?php echo $row1['offerproductname']?> Free</h5>
						
						<!-- <ul class="list">
							
							<li><a class="active" href="category.php"><span>Category</span>: Electronics</a></li>

							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul> -->
						<h6><?php echo $row['description']?></h6>
						<div class="product_count">
							 <form action="cart1.php" method="POST">
              <p>Quantity:<i class="fa fa-minus" style="font-size:20px;margin-right:5px;margin-left:5px;" onclick="minus()" ></i><span id='qua'>1</span><i class="fa fa-plus" style="font-size:20px;margin-right:15px;margin-left:5px" onclick="plus()" ></i>
      <input type="hidden" id="q" name="q" value="1"></p>
      
						<input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
							<button class="btn btn-primary mt-2" type="submit" value="submit">Add to Cart</button> 
							  </form>           
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Comments</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<?php 
				$query1="select * from product where id='$id'";
// print_r($query1);
// die();

$result56=mysqli_query($conn,$query1);
$row1=mysqli_fetch_assoc($result56); ?>
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p><?php echo $row1['description'];?></p>
					<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
						more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
						the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
						more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
						streamlined plan of cooking that is more efficient for one person creating less</p>
				</div>
			
				
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<!-- <div class="box_total">
										<h5>Overall</h5>
										<h4>4.0</h4>
										<h6>(03 Reviews)</h6>
									</div> -->
								</div>
								<div class="col-6">
									<!-- <div class="rating_list">
										<h3>Based on 3 Reviews</h3>
										<ul class="list">
											<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										</ul>
									</div> -->
								</div>
							</div>
							<div class="review_list">
								<div class="review_item">
									<?php



$query1="select * from review where prod='$row[id]'";
// print_r($query1);
// die();

$result56=mysqli_query($conn,$query1);
while($row12=mysqli_fetch_assoc($result56)){


?>
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-1.png" alt="">
										</div>
										<div class="media-body">
											<!-- <h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i> -->
										</div>
									</div>
									<p><?php echo $row12['name']; ?></p>
									<p><?php echo $row12['message']; ?></p>
								<?php } ?>
								</div>
								
								
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								<!-- <p>Your Rating:</p>
								<ul class="list">
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
								</ul>
								<p>Outstanding</p> -->
                <form action="" method="post" class="form-contact form-review mt-3">
                  <div class="form-group">
                    <input class="form-control" name="name" type="text" placeholder="Enter your name" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Enter email address" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
                  </div>
                  <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" name="submit"  class="button button--active button-review">Submit Now</button>
                  </div>
                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	 	

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
								<!-- <li><a href="#">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li> -->
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>
					<!-- </div>
					<div class="col-lg-2 col-md-6 col-sm-6">
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
								<p>Odisha,Cuttack</p>
	
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
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
  
 


  <script>
  	function plus(){
			var q=document.getElementById('qua').innerHTML;
			var p=parseFloat(q);
			var s=p+1;
			document.getElementById('qua').innerHTML=s;
			document.getElementById('q').value=s;
		}
		function minus(){
			
			var q=document.getElementById('qua').innerHTML;
			var p=parseFloat(q);
			if(p<=1){
				document.getElementById('qua').innerHTML=q;
				document.getElementById('q').value=p;
				
			}
			else{
			
			var s=p-1;
			document.getElementById('qua').innerHTML=s;
			document.getElementById('q').value=s;
			}
		}


  </script>

</body>
</html>

