<?php 
session_start();
include 'connection.php';
include "include/header.php";
$id = $_GET['id'];
if ($id != ""){

    $sql = "delete from wishlist where id={$id}";  

    mysqli_query($conn,$sql);

    $msg = "Record Deleted Successfully.";

    setcookie("msg", $msg, time() + 3);

    print "<script>";
      print "self.location = 'wishlist1.php'";
      print "</script>";
      exit;
}



?>
	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	
		<div class="container h-100">
			<div class="blog-banner mt-5">
				<div class="text-center">
					<h1>Shopping Wishlist</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Wishlist</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	
	<!-- ================ end banner area ================= -->
  
  

  <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              
                              <th scope="col">Add to Cart</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      	<?php 
				$cid=$_SESSION['id'];
				$sql="SELECT * FROM wishlist WHERE user_id='$cid'";
				
				$result=mysqli_query($conn,$sql);
				$sum=0;
				while($row=mysqli_fetch_assoc($result)){

					$product=$row['product'];
					$sql1="SELECT * FROM product WHERE id='$product'";
					$res1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($res1);
                    ?>
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="admin/upload/<?php echo $row1['image']?>" width="50" height="50" alt="">
                                      </div>
                                      <div class="media-body">
                                          <p><?php echo $row1['title']?></p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5>$<?php echo $row1['price']?></h5>
                              </td>
                             
                              <td>

                              	
                                 <a href="single-product.php?id=<?php echo $row['product']?>"><i class="ti-shopping-cart"></i></a>
                              </td>
                               <td>
                                 <a href="?id=<?php print $row['id']; ?>" onclick ="return confirm('Are you sure to Remove From Wishlist ?')"><i class="fas fa-times"></i></a>
                              </td>
                          </tr>
                         
                          <?php 
                          	$sum=$sum+($row1['price']);
                          $i++;}
                        ?>
                         
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

  <?php include "include/footer.php"; ?>