<?php
error_reporting(0);
include 'connection.php';
include"include/header.php";
    
    $name = $_POST["name"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];

    $password = $_POST["password"];
    $confirmPassword =$_POST["confirmPassword"];
    $flat= $_POST["flat"];
    $area= $_POST["area"];
    $landmark= $_POST["landmark"];
    $city= $_POST["city"];
    $state= $_POST["state"];
    $pin= $_POST["pin"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `user_login` WHERE name = '$name'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
         // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
         // $exists = false; 
        if(($password == $confirmPassword)){
            
            $sql = "INSERT INTO `user_login` ( `name`,`email`,`phone`, `password`,`confirmPassword`,`flat`,`area`,`landmark`,`city`,`state`,`pin`) VALUES ('$name','$email','$phone', '$password','$confirmPassword','$flat','$area','$landmark','$city','$state','$pin') ";
            // print_r($sql);
            // die();

            $result = mysqli_query($conn, $sql);
            // print_r($result);
            // die();
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError ="Password do not match";
        }
    }

    
?>


	<!--================ End Header Menu Area =================-->
  
  <!-- ================ start banner area ================= -->	
	<!-- <section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Register</li>
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
				<div class="col-lg-6 mt-5 mb-5">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb-5">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						<form class="row login_form" action="" id="register_form" method="post" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = 'Username'" onblur="this.placeholder = 'Username'" autocomplete="off" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = 'Email Address'" onblur="this.placeholder = 'Email Address'" autocomplete="off" required>
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Mobile Number" onfocus="this.placeholder = 'Enter Mobile Number'" onkeypress="return /[0-9.]/i.test(event.key)" maxlength="10" minlength="10"  required>
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = 'Password'" onblur="this.placeholder = 'Password'" autocomplete="off" required>
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" onfocus="this.placeholder = 'Confirm Password'" onblur="this.placeholder = 'Confirm Password'" required>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="flat" name="flat" placeholder="Flat No." required>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="area" name="area" placeholder="Location" required>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="landmark" name="landmark" placeholder="Nearest Landmark" required >
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="city" name="city" placeholder="City" required>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="state" name="state" placeholder="State" required>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="pin" name="pin" placeholder="Zip/Pin Code" onkeypress="return /[0-9.]/i.test(event.key)" maxlength="6" minlength="6" required>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-register w-100">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<?php include "include/footer.php"; ?>