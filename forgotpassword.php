<?php
include 'connection.php';
include"include/header.php";
session_start();


if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$sql="SELECT * FROM user_login where email='$email'";
	$result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
	if($num){
		while($row = mysqli_fetch_assoc($result))
        { 
           $email= $row["email"];
           $userid=  $row["id"];
           $name=  $row["name"];

		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h:i:s', time());
		$otp=rand(0,999999);
		$sqlquery="INSERT into forgotpassword set email='$email',user_id='$userid',otp='$otp',date='$date'";

		$sqlupdate="UPDATE forgotpassword set email='$email',otp='$otp',date='$date' WHERE user_id='$userid'";

		$sqlC="SELECT * FROM forgotpassword where user_id='$userid'";
		$resultC = mysqli_query($conn,$sqlC);
        $numC = mysqli_num_rows($resultC);
        if($numC){
        	$result1 = mysqli_query($conn,$sqlupdate);
        	$rowC = mysqli_fetch_assoc($resultC);
	        $last_id=  $rowC["id"];
        } else {
        	$result1 = mysqli_query($conn,$sqlquery);
			$last_id = mysqli_insert_id($conn);
        }
		if($result1){
			$_SESSION['idFor_got']=$last_id;
			$_SESSION['email']=$email;
			$_SESSION['userid']=$userid;
			$_SESSION['name']=$name;
			$_SESSION['cdate']=$date;
			 //print_r($_SESSION);
			header("Location:otpverify.php");
		} else {
			echo "Failed To Insert..";exit;
		}

	}
	else
	{
		Echo "UNKNOW EMAIL ID";
	}


}	
?>

<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="login_form_inner">
						<h3>Forgot Password</h3>
						<form class="row login_form" action="forgotpassword.php" id="contactForm" method="post" >
							
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Id" required>
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




