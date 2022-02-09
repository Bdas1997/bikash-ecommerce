<?php
include 'connection.php';
include"include/header.php";
$last_id=$_SESSION['idFor_got'];
			$email=$_SESSION['email'];
			$userid=$_SESSION['userid'];
			$name=$_SESSION['name'];
			$cdate=$_SESSION['cdate'];
if (isset($_POST['submit'])) {
    $otp=$_POST['otp'];
    $password=$_POST['password'];

$sql = "SELECT * FROM forgotpassword WHERE otp='$otp' AND user_id='$userid' AND date='$cdate' ";
// echo $sql;
// exit;
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if($num){
     $sqlupdate="UPDATE user_login set password='$password'  where id='$userid'";
 $result1 = mysqli_query($conn, $sqlupdate);
 header("Location:login.php");
  }else{

echo "Wrong OTP";
  }
}
?>
<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="login_form_inner">

						<h3>Forgot Password</h3>
						<h4>Hii <?php
						echo $name; ?></h4>
						<form class="row login_form" action="otpverify.php" id="contactForm" method="post" >
							
							<div class="col-md-12 form-group">
								<input type="number" class="form-control" id="number" name="otp" placeholder="Enter OTP" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
							</div>
							
							<div class="col-md-12 form-group">
								<!-- <button type="submit" name="submit" value="submit" class="button button-login w-100">Verify</button> -->

								<input type="submit" name="submit" value="Verify" class="btn btn-primary">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
