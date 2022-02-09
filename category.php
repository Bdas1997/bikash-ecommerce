<?php include 'connection.php';
include "include/header.php";
?>


	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	<section>
		<div class="container h-100">
			<div class="blog-banner mt-5">
				<div class="text-center">
					<h1>Shop</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
               
                  <ul>
                    <?php
$query1="select * from pcategory ";
$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
                    <li class="ul" style="margin-right: 10px;">
                      <a href="productcategory.php?id=<?php echo $row['id']?>" style="text-decoration: none;"><?php echo $row['title']; ?></a>
                    </li>
                    <?php } ?>
                  </ul>
               
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">
              Brand
            </div>
            <div class="common-filter">
             
              
                <ul >
                  <?php
$query1="select * from brand ";
$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
                  <li class="ul" style="margin-right: 20px;"> <a href="productbrand.php?id=<?php echo $row['id']?>" style="text-decoration: none;"><?php echo $row['name']; ?></a></li>
                  <?php } ?>
                </ul>
              
            </div>
           
            
          </div>
        </div>

        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            
            
            <div>
              <div class="input-group filter-bar-search">
                <form action="search.php" method="POST">
                <input type="text" placeholder="Search" name="search">
                  <input type="submit" class="widget-search-btn" value='search'>
                 
                </form>

                

              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
               <?php
$query1="select * from product ";
$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="admin/upload/<?php echo $row['image']?>" alt="" style="height:200px; width:200px">
                    <ul class="card-product__imgOverlay">
                  
                  <li><button><a href="single-product.php?id=<?php echo $row['id']?>"><i class="ti-shopping-cart"></i></a></button></li>
                  <li>
                    <form action="wishlist.php" method="post">
                  <input type="hidden" name="wl" id="wl" value="<?php echo $row['id'];?>">
                    <button><i class="ti-heart"></i></button>
                    </form>
                  </li>
                  
                </ul>
                  </div>
                  <div class="card-body">
                    
                    <h4 class="card-product__title"><a href="single-product.php?id=<?php echo $row['id']?>"><?php echo $row['title'];?></a></h4>
                    <p class="card-product__price">₹<?php echo $row['price'];?></p>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->		  

	<!-- ================ top product area start ================= -->	
	<section class="related-product-area">
    <div class="container">
      <div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Top Product</span></h2>
      </div>
      <div class="row mt-30">
        
        <div class="col-sm-6 col-xl-4 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <?php
$query1="select * from product where category='10' order by id desc limit 3 ";
$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
            <div class="single-search-product d-flex">
              <a href="#"><img src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 70px; width: 70px;"></a>
              <div class="desc">
                  <a href="single-product.php?id=<?php echo $row['id']?>" class="title"><?php echo $row['title'];?></a>
                  <div class="price">₹<?php echo $row['price'];?></div>
              </div>
            </div>
          <?php } ?>
            
            
          </div>
        </div>

        <div class="col-sm-6 col-xl-4 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <?php
$query1="select * from product where category='3' order by id desc limit 3";
$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
            <div class="single-search-product d-flex">
              <a href="#"><img src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 70px; width: 70px;"></a>
              <div class="desc">
                  <a href="single-product.php?id=<?php echo $row['id']?>" class="title"><?php echo $row['title'];?></a>
                  <div class="price">₹<?php echo $row['price'];?></div>
              </div>
            </div>
          <?php } ?>
            
            
          </div>
        </div>

        <div class="col-sm-6 col-xl-4 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <?php
$query1="select * from product where category='7' order by id desc limit 3 ";
$result=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($result)){


?>
            <div class="single-search-product d-flex">
              <a href="#"><img src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 70px; width: 70px;"></a>
              <div class="desc">
                  <a href="single-product.php?id=<?php echo $row['id']?>" class="title"><?php echo $row['title'];?></a>
                  <div class="price">₹<?php echo $row['price'];?></div>
              </div>
            </div>
            
            <?php }?>
          </div>
        </div>

        
      </div>
    </div>
  </section>
	<!-- ================ top product area end ================= -->		
 <!-- ================ Best Selling item  carousel ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular in the market</p>
          <h3>Demanding Category</h3>
        </div>

        <div class="owl-carousel owl-theme" id="bestSellerCarousel">
           <?php
 
    $query3="select * from pcategory ";

    $result3=mysqli_query($conn,$query3);
    
     while($row=mysqli_fetch_assoc($result3)){
        ?>
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="admin/upload/<?php echo $row['image']?>" alt="" style="height: 300px;">
              <ul class="card-product__imgOverlay">
                  
                  <li><button><a href="productcategory.php?id=<?php echo $row['id']?>"><i class="ti-shopping-cart"></i></a></button></li>
                  
                </ul>
            </div>
            <div class="card-body">
              <p>Categories</p>
              <h4 class="card-product__title"><a href="productcategory.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></h4>
             
            </div>
          </div>
           <?php } ?>
        </div>
       
      </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->
	<!-- ================ Subscribe section start ================= -->		  
  <section class="subscribe-position">
    <div class="container">
      <div class="subscribe text-center">
        <h3 class="subscribe__title">Get Update From Anywhere</h3>
        <p>Bearing Void gathering light light his eavening unto dont afraid</p>
        <div id="mc_embed_signup">
          <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
            <div class="form-group ml-sm-auto">
              <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
              <div class="info"></div>
            </div>
            <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
            <div style="position: absolute; left: -5000px;">
              <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
            </div>

          </form>
        </div>
        
      </div>
    </div>
  </section>
	<!-- ================ Subscribe section end ================= -->		  
  <?php include "include/footer.php"; ?>