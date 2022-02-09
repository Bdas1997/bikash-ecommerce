
<?php
// ob_start();

include 'connection.php'; 
include "include/header.php";

if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

$sql = "SELECT * FROM user_login WHERE email='$email' AND password='$password'";

  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if ($num > 0) 
  {
      $row = mysqli_fetch_assoc($result);
	  session_start();
        $_SESSION['id']=$row["id"]; 

$pg=$_GET['pg'];
              
if($pg !=''){
  header("location:payment.php");
}else{
header("location:index.php");
     }            
    }else {
      $msg1 = "Incorrect Username Or Password.";

      setcookie("msg1", $msg1, time() + 3);

    print "<script>";

    print "self.location = 'login.php';";

    print "</script>";

    exit;
}
}
?>



	<!--================ End Header Menu Area =================-->
  
  <!-- ================ start banner area ================= -->	
	<!-- <section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Login / Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section> -->
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="register.php">Create an Account</a>

						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form action="login.php" method="post" >
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email ID'" autocomplete="off">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							
							<div class="col-md-12 form-group">
								<input type="submit" name="submit" value="Log in" class="button button-login w-100">
								<!-- Log In</button> -->
								<a href="forgotpassword.php">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<?php include "include/footer.php"; ?>