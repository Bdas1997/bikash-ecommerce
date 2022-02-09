<?php 
session_start();
include 'connection.php';
include "include/header.php";
$id = $_GET['id'];

if ($id != ""){

    $sql = "delete from cart where id={$id}";  

    mysqli_query($conn,$sql);

    $msg = "Record Deleted Successfully.";

    setcookie("msg", $msg, time() + 3);

    print "<script>";
      print "self.location = 'cart.php'";
      print "</script>";
      exit;
}

?>
	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	
		<div class="container h-100">
			<div class="blog-banner mt-5">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
                              <th scope="col">Quantity</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      	<?php 
				$cid=session_id();
				$sql="SELECT * FROM cart WHERE session_id='$cid'";
				
				$result=mysqli_query($conn,$sql);
				$sum=0;
				while($row=mysqli_fetch_assoc($result)){

					$product=$row['product'];
					$sql1="SELECT * FROM product WHERE id='$product'";
					// print_r($sql1);

					// die();
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
                                  <h5>$<?php echo $row1['price']*$row['quantity'];?></h5>
                              </td>
                              <td>
                                  <div class="product_count">
                                      <h5><?php echo $row['quantity'];?></h5>
                                  </div>
                              </td>
                              <td>
                                 <a href="?id=<?php print $row['id']; ?>" onclick ="return confirm('Are you sure to Remove From cart ?')"><i class="fas fa-times"></i></a>
                              </td>
                          </tr>
                         
                          <?php 
                          	$sum=$sum+($row1['price']*$row['quantity']);
                          $i++;}
                        ?>
                         
                          <tr>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Subtotal</h5>
                              </td>
                              <td>
                                  <h5>$<?php echo $sum;?></h5>
                              </td>
                          </tr>
                          <tr class="shipping_area">
                              <td class="d-none d-md-block">

                              </td>
                              <td>

                              </td>
                              
                             
                          </tr>
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="gray_btn" href="category.php">Continue Shopping</a>
                                      <!-- <a class="primary-btn ml-2" href="confirmation.php?cf='cart'">Confirm Your Product</a> -->
                                      <a class="primary-btn ml-2" href="checkout.php?pg='cart'">Proceed to checkout</a>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

  <?php include "include/footer.php"; ?>