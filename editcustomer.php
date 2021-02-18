<?php
	require ("_include/dbconn.php");
	include 'test_input.php';
	require 'auth.php';
	if(isset($_POST["submit"]))
	{
		$name = $_POST["fullname"];
		$dob = $_POST["dob"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $zip = $_POST["zip"];
        $city = $_POST["city"];
        $id = $_SESSION['customer_id'];

        $name = mysqli_real_escape_string($con, $name);
        $dob = mysqli_real_escape_string($con, $dob);
        $email = mysqli_real_escape_string($con, $email);
        $phone = mysqli_real_escape_string($con, $phone);
        $address = mysqli_real_escape_string($con, $address);
        $zip = mysqli_real_escape_string($con, $zip);
        $city = mysqli_real_escape_string($con, $city);

	}
?>
<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>Edit Profile</title>
	</head>
	<body>
		<?php include "customerheader.php";
			$id = $_SESSION['customer_id'];
			$query = mysqli_query($con , "SELECT * FROM customers WHERE customer_id = '$id'");
			$result = mysqli_fetch_assoc($query);
		?>
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form class="form-container mt-3" method="post" action="altercustomer.php">
							<legend class="text-primary">
								Edit your Personal Details
							</legend>
							<p><span class="error">
								* Not editable fields
							</span></p>

								<?php
									if(isset($_SESSION['profileupdated'])) {
										echo '<p class="alert-success alert alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>SUCCESS.</strong>'.$_SESSION['profileupdated']; '</p>';
									}
								?>
							<div class="form-group">
								<label>Full Name</label><span class = "error">* <br><?php echo $nameErr;?></span>
								<input type="text" class="form-control" name="fullname" value="<?php echo $result['full_name'];?>" readonly>
							</div>
							<div class="form-group">
								<label>Date of Birth</label><span class = "error">* <?php echo $dobErr;?></span><br>
								<input type="date" class="form-control" name="dob" max="2001-12-31" value="<?php echo $result['dob'];?>" readonly>
							</div>
							<div class="form-group">
								<label>Email</label><span><?php echo $emailErr;?></span><br>
								<input type="email" class="form-control" name="email" value="<?php echo $result['email'];?>" readonly>
							</div>
							<div class="form-group">
								<label>Phone No.</label><span> <?php echo $phoneErr;?></span><br>
								<input type="tel" class="form-control" name="phone" value="<?php echo $result['phone_no'];?>"required>
							</div>
							<div class="form-group">
								<label>Address</label><span> <?php echo $addressErr;?></span><br>
								<input type="number" class="form-control" name="address" value="<?php echo $result['address'];?>"required>
							</div>
							<div class="form-group">
								<label>Zip Code</label><span> <?php echo $zipErr;?></span><br>
								<input type="number" class="form-control" name="zip" value="<?php echo $result['zip'];?>" required>
							</div>
							<div class="form-group">
								<label>City</label><span> <?php echo $cityErr;?></span><br>
								<input type="text" class="form-control" name="city" value="<?php echo $result['city'];?>" required>
							</div>
							<button type="submit" class="btn btn-success btn-block btn-raised" name="submit">Save</button>
						</form>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
			<br>
			<br>
			<br>
		<?php
			include "footer.php";
			unset($_SESSION['profileupdated']);
		?>
	</body>
</html>