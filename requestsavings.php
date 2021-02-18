<?php
	require ("_include/dbconn.php");
	include 'test_input.php';
	require 'auth.php';
	require 'accounts.php'
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
	<title>Open Savings</title>
</head>
<body>
	<?php include "savingsmenu.php";
	$id = $_SESSION['customer_id'];
	$query = mysqli_query($con , "SELECT * FROM customers WHERE customer_id = '$id'");
			$result = mysqli_fetch_assoc($query);?>
	<div class="container bg">
		<div class="row mt-5">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 col-md-8">
			<form method="post" action="regsavings.php" class="justify-content-center">
			<fieldset>
				<legend>
					Create a Savings Account
				</legend>
					<p><span class="error">* required fields </span></p>
					<div class="form-group">
						<label>Full Name</label><span class = "error">* <br><?php echo $nameErr;?></span>
						<input type="text" class="form-control" name="fullname" value="<?php echo $result['full_name'];?>" readonly>
					</div>
					<div class="form-group">
						<label>Date of Birth</label><span class = "error">* <?php echo $dobErr;?></span><br>
						<input type="date" class="form-control" name="dob" max="2001-12-31" value="<?php echo $result['dob'];?>" readonly>
					</div>
					<div class="form-group">
						<label>Email</label><span class = "error">* <?php echo $emailErr;?></span><br>
						<input type="email" class="form-control" name="email" value="<?php echo $result['email'];?>" readonly>
					</div>
					<div class="form-group">
					<label>Phone No.</label><span class = "error">* <?php echo $phoneErr;?></span><br>
					<input type="tel" class="form-control" name="phone" value="<?php echo $result['phone_no'];?>"readonly>
					</div>
					<div class="form-group">
					<label>Target Amount</label><span class = "error">* <?php echo $addressErr;?></span><br>
					<input type="number" class="form-control" name="target" id = "targetamount" value="" required>
					</div>
					<span class="text-danger" id="lesstarget"></span>
					<div class="form-group">
						<label>Duration in Months</label><span class = "error">* <?php echo $zipErr;?></span><br>
						<input type="number" class="form-control" name="duration" value="" required>
					</div>
					<button type="submit" class="btn btn-success btn-block btn-raised" name="submit">Submit Request</button>
					<br><br>
			</fieldset>
		</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>

<?php include "footer.php"?>
<script>

</script>
</body>
</html>