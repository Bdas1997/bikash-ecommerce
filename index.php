<?php 


 include 'connection.php';
 include "include/header.php";

?>

	<!--================ End Header Menu Area =================-->

  <main class="site-main">
    
    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/front.jpg" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4 >Gagets are Love</h4>
              <h1>Browse Our Premium Electronics Product</h1>
              <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
              <a class="button button-hero" href="category.php">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
         <?php
 
    $query1="select * from pcategory order by id asc limit 3";

    $result=mysqli_query($conn,$query1);
     while($row=mysqli_fetch_assoc($result)){
        ?>
        <div class="hero-carousel__slide">
          
         
          <img src="admin/upload/<?php echo $row['image']?>" alt="" class="img-fluid" style="height:300px; width:400px;">
          <a href="productcategory.php?id=<?php echo $row['id']?>" class="hero-carousel__slideOverlay">
            <h3><?php echo $row['title']?></h3>
            
          </a>
         
        </div>
        
        <?php }
        ?>
        
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h3>Trending Items</h3>
        </div>
        <div class="row">
          <?php
 
    $query2="select * from product order by id desc limit 20";

    $result2=mysqli_query($conn,$query2);
     while($row=mysqli_fetch_assoc($result2)){
        ?>
          <div class="col-6 col-md-3">
             
            <div class="card text-center card-product">
             
              <div class="card-product__img">
                <img class="card-img" src="admin/upload/<?php echo $row['image']?>" alt="" style="height:200px; width:200px;">
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
                
                <h4 class="card-product__title"><a href="single-product.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></h4>
                <p class="card-product__price">₹<?php echo $row['price']?></p>
              </div>

            </div>
            
          </div>
        
        <?php } ?> 
          </div>
        </div>
      
    </section>
    <!-- ================ trending product section end ================= -->  


    <!-- ================ offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3 style="color:#fff;">You want To Buy Electronics Product</h3>
              <h4 style="color:#fff;">Hurry Up</h4>
              <p style="color:#fff;">Let's Come To AROMA</p>
              <a class="button button--active mt-3 mt-xl-4" href="category.php">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= --> 

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

    <!-- ================ Blog section start ================= -->  
    <section class="blog">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog1.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">The Richland Center Shooping News and weekly shooper</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog2.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">The Shopping News also offers top-quality printing services</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog3.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">Professional design staff and efficient equipment you’ll find we offer</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ Blog section end ================= -->  

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

    

  </main>
  <?php include "include/footer.php"; ?>