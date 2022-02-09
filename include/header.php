
<?php 
error_reporting(0);

session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ecom</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/css/order.css">
   
  <link rel="stylesheet" href="css/style.css">
  
  <style>
  #u{
    font-size:20px;
    font-weight:bold;
    color:#000;
  }
</style>
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item "><a class="nav-link" href="category.php">Shop</a></li>
              
              <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><button><a href="cart.php"><i class="ti-shopping-cart"></i><span class="nav-shop__circle"><?php
                  $cid=session_id();
                  $sql="SELECT COUNT(`session_id`) AS tid FROM cart WHERE session_id='$cid'";
                  $ress=mysqli_query($conn,$sql);
                  $rows=mysqli_fetch_assoc($ress);
                  echo $rows['tid'];
                  ?></span></a></button> </li>
                  <li class="nav-item"><button><a href="wishlist1.php"><i class="far fa-heart"></i><span class="nav-shop__circle"><?php
                  $cid=$_SESSION['id'];
                  $sql="SELECT COUNT(`id`) AS tid FROM wishlist WHERE user_id='$cid'";
                  // print_r($sql);
                  // die();
                  $res=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_assoc($res);
                  echo $row['tid'];
                  ?></span></a></button> </li>
            </ul>
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto hd-icon">
              <?php 
              $id2=$_SESSION['id'];
              $sql="SELECT * FROM user_login where id='$id2'";
             $result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if(isset($id2)){

?>
            <li>

           <p id="u" style="color:blue; text-transform: capitalize;" ><?php echo $row['name'];?></p>
            <ul class="dropdown">
        <li><a href="myorder.php"><i class="fa fa-user"> My Profile</i></a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"> Log Out</i></a></li>
       </ul>
          </li>
           <?php }else{
            ?>
          <li><a href="login.php">
            <i class="fas fa-user-circle"> <b>Login</b></i></a>
           
          </li>
           <?php }?>
            
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>