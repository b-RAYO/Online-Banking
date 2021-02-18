<?php
    include ("_include/dbconn.php");
    require '_include/SMS/vendor/autoload.php';
	use AfricasTalking\SDK\AfricasTalking;

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);

	$sql = "SELECT * FROM customers WHERE email = '$email'";
	$result = mysqli_query($con, $sql);
	$rws = mysqli_fetch_assoc($result);

	$sql2 = "SELECT * FROM customers WHERE phone_no = '$phone'";
	$result2 = mysqli_query($con, $sql2);
	$rws2 = mysqli_fetch_assoc($result2);

	if (mysqli_num_rows($result) == 1){
		$_SESSION['email_error'] = "USER ALREADY EXISTS";
		header("location:register.php");
	}
	elseif (mysqli_num_rows($result2) == 1){
		$_SESSION['number_error'] = "USER ALREADY EXISTS";
		header("location:register.php");
	}
	else{
		if(!isset($_SESSION["wrong_otp"])){
			$wrong_otp="";
			$name = $_POST["fullname"];
			$dob = $_POST["dob"];
			$address = $_POST["address"];
			$zip = $_POST["zip"];
			$city = $_POST["city"];
			$gender = $_POST["gender"];
			$password = $_POST["pwd1"];
			$otp = mt_rand(10000,99999);
			setcookie ("otp",$otp,time()+300);

			// Set your app credentials
			$username   = "brayo";
			$apiKey     = "c2dccb37be43956089ed18f7de82db2ec40f2ed9f661f1a97c69859ddbeaf7e9";

			// Initialize the SDK
			$AT         = new AfricasTalking($username, $apiKey);

			// Get the SMS service
			$sms        = $AT->sms();

			// Set the numbers you want to send to in international format
			$recipients = "+254".$phone;

			// Set your message
			$message    = "[UNAITAS] \n Your OTP is $otp. Expires in 5 minutes";

			// Set your shortCode or senderId


			try {
				// Thats it, hit send and we'll take care of the rest
				$result = $sms->send([
					'to'      => $recipients,
					'message' => $message,

				]);
				$encoded = json_encode($result);
				$decoded = json_decode($encoded,true);
				$statusCode = $decoded['data']['SMSMessageData']['Recipients']['0']['statusCode'];
				if($statusCode == 403){
					$no_error = "INVALID PHONE NUMBER!!";
				}
				elseif($statusCode == 101){
					$otp_success = "SUCCESS.A One-Time-Pin has been sent to your number.";
				}
				else{
					$send_error = "PLEASE TRY AGAIN!!";
				}
			} catch (Exception $e) {
				$msg_error = "PLEASE TRY AGAIN!!";
			}
		}
	}
?>
<!doctype html >
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Registration Form</title>
		<script src="js/jquery.js"></script>
		<script src="js/popper.js"></script>
		<link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
		<script src="bootstrap/js/bootstrap-material-design.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="fontawesome\css\all.css">
		<script src="fontawesome\js\all.js"></script>
	</head>
	<body>
		<?php include "header.php"?>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-4 col-xs-3">

						<form method="post" action="verifyphone.php" class="form-container mb-5">
							<legend class="w-auto text-primary">
								Verify Phone Number
                            </legend>
							<?php
								if(isset($_SESSION["wrong_otp"])){
								echo "<p class='alert alert-danger' role='alert'>$wrong_otp</p>";
								}
								elseif(isset($otp_success)){
									echo "<p class='alert alert-success' role='alert'>$otp_success</p>";
								}
								elseif (isset($msg_error)) {
									echo "<p class='text-danger'>$msg_error</p>";
								}
								elseif (isset($phone_error)) {
									echo "<p class='text-danger'>$phone_error</p>";
								}
							?>
                            <p>
                                Please enter the OTP sent to the phone number you provided
                            </p>
                            <div class="form-group w-50">
                                <label for="otp" >Enter OTP</label>
                                <input type="number" class="form-control" name="otp" value="XXXXX" id="otp" required>
                            </div>
							<div class="form-group">

								<input type="hidden" class="form-control" name="fullname" value="<?php echo $name;?>" required>
							</div>

							<div class="form-group">
								<input type="hidden" class="form-control" name="dob" max="2001-12-31" value="<?php echo $dob;?>" required>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="email" value="<?php echo $email;?>" required>
							</div>
							<div class="form-group">
								<div class="input-group-prepend">

									<input type="hidden" class="form-control" name="phone" value="<?php echo $phone;?>"required>
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="address" value="<?php echo $address;?>"required>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="hidden" class="form-control" name="zip" value="<?php echo $zip;?>" required>
								</div>
								<div class="form-group col-md-6">
									<input type="hidden" class="form-control" name="city" value="<?php echo $city;?>" required>
								</div>
							</div>

							<div class="form-group">

								<select class="custom-select" name="gender" hidden>
									<option value=""></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="other">Other</option>
								</select>
							</div>
							<div class="form-group">
								<br>
								<input type="hidden" class="form-control" name="pwd1" value="<?php echo $password;?>" id = "pwd1" required autocomplete = "on">

							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="pwd2"  value="<?php echo $password;?>" id = "pwd2" required autocomplete = "off">
                            </div>
                            <div class="form-group">
                            <button type="submit" name="verifyotp" class="btn btn-success btn-raised">Verify</button>
                            </div>
						</form>
					</div>
				</div>
			</div>
			<?php
        		include "footer.php";
        		unset($_SESSION['wrong_otp']);
			?>

	</body>
</html>