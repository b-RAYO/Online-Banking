<?php
require ("_include/dbconn.php");
include 'test_input.php';

?>
<!doctype html >
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Registration Form</title>
		<script src="js/jquery.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/signupvalidation.js"></script>
		<script src="js/popper.js"></script>
		<link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
		<script src="bootstrap/js/bootstrap-material-design.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://kit.fontawesome.com/16649413da.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include "header.php"?>
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-5">
					<?php
						if(isset($_SESSION["email_error"])){
							echo "<p class='alert alert-danger' role='alert'>".$_SESSION["email_error"]."</p>";
						}
						if(isset($_SESSION["number_error"])){
							echo "<p class='alert alert-danger' role='alert'>".$_SESSION["number_error"]."</p>";
						}
					?>
						<form method="post" action="sendverifyphone.php" id="signupForm" class="form-container mb-5">
							<legend class="w-auto">
								Registration Form
							</legend>
							<p class="error">* required fields </p>
							<div class="form-group">
								<label for="fullname" >Full Name</label><span class = "error">* <br><?php echo $nameErr;?></span>
								<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $name;?>" >
							</div>
							<div class="form-group">
								<label>Date of Birth</label><span class = "error">* <?php echo $dobErr;?></span><br>
								<input type="date" class="form-control" id="dob" name="dob" max="2001-12-31" value="<?php echo $dob;?>">
							</div>
							<div class="form-group">
								<label>Email</label><i class = "error">* <?php echo $emailErr;?></i><br>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" >
								<span></span>
							</div>
							<div class="form-group">
								<label>Phone No.</label><span class = "error">* <?php echo $phoneErr;?></span><br>
									<div>
										<input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>" placeholder="07XXXXXXXX">
										<span></span>
									</div>
							</div>
							<div class="form-group">
								<label>Address</label><span class = "error">* <?php echo $addressErr;?></span><br>
								<input type="number" class="form-control" id="address" name="address" value="<?php echo $address;?>">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Zip Code</label><span class = "error">* <?php echo $zipErr;?></span><br>
									<input type="number" class="form-control" name="zip" id="zip" value="<?php echo $zip;?>">
								</div>
								<div class="form-group col-md-6">
									<label>City</label><span class = "error">* <?php echo $cityErr;?></span><br>
									<input type="text" class="form-control" name="city" value="<?php echo $city;?>">
								</div>
							</div>

							<div class="form-group">
								<label>Gender</label><span class = "error">*</span><br>
								<select class="custom-select" name="gender">
									<option value=""></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="other">Other</option>
								</select>
							</div>
							<div class="form-group ">
								<label>Password</label><span class = "error">*<?php echo $pwd1Err;?></span>
								<div class="input-group pwd" id="show_hide_password">
									<input type="password" class="form-control" name="pwd1" id = "pwd1">
									<div class="input-group-addon">
										<span toggle="#pwd1" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
									</div>
								</div>
							</div>
							<div class="form-group pwd">
								<label>Confirm Password</label><span class = "error">* <?php echo $pwd2Err;?></span><br>
								<div class="input-group" id="show_hide_password">
									<input type="password" class="form-control" name="pwd2" id = "pwd2">
									<div class="input-group-addon">
										<span toggle="#pwd2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
									</div>
								</div>
							</div>
							<br><br>
							<button type="submit" name="submit" id="submit" class="submit btn btn-success btn-raised">Register</button>
							&nbsp
							&nbsp
							<button type="reset" class="btn btn-danger btn-raised">Reset</button>
							<p>
								Already a member? <a href="login.php" class="link">Sign in</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		<script>
			$('document').ready(function(){
				$('.toggle-password1').on('click', function() {
				$(this).toggleClass('fa-eye fa-eye-slash');
				let input = $($(this).attr('toggle'));
				if (input.attr('type') == 'password') {
					input.attr('type', 'text');
				}
				else {
					input.attr('type', 'password');
				}
				});
				});
				$('.toggle-password2').on('click', function() {
				$(this).toggleClass('fa-eye fa-eye-slash');
				let input = $($(this).attr('toggle'));
				if (input.attr('type') == 'password') {
					input.attr('type', 'text');
				}
				else {
					input.attr('type', 'password');
				}
		});
		</script>
		<?php
			include "footer.php";
			unset($_SESSION['email_error']);
			unset($_SESSION['number_error']);
		?>
	</body>
</html>