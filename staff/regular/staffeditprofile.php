<?php
	require ("../../_include/dbconn.php");
	require 'staffauth.php';
?>
<!doctype html>
<html>
	<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="../../js/jquery.js"></script>
		<script src="../../js/popper.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
        <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../fontawesome\css\all.css">
        <script src="../../fontawesome\js\all.js"></script>
		<title>Edit Profile</title>
	</head>
	<body>
		<?php include "staffnavbar.php";
			$staff_id = $_SESSION['staff_id'];
			$query = mysqli_query($con , "SELECT * FROM employees WHERE employee_id = '$staff_id'");
			$result = mysqli_fetch_assoc($query);
		?>
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form class="form-container mt-3" method="post" action="staffeditprofileprocess.php">
							<legend class="text-primary">
								Edit your Personal Details
							</legend>
							<p><span class="error">
								* required
							</span></p>
                            <div class="form-group">
								<label>Employee Number</label><span class = "error">* </span>
								<input type="number" class="form-control" name="e_id" value="<?php echo $result['employee_id'];?>" readonly>
							</div>
							<div class="form-group">
								<label>Full Name</label><span class = "error">* </span>
								<input type="text" class="form-control" name="fullname" value="<?php echo $result['full_name'];?>" required>
							</div>
							<div class="form-group">
								<label>Date of Birth</label><span class = "error">* </span><br>
								<input type="date" class="form-control" name="dob" max="2001-12-31" value="<?php echo $result['dob'];?>" required>
							</div>
							<div class="form-group">
								<label>Phone No.</label><span></span><br>
								<input type="tel" class="form-control" name="phone" value="<?php echo $result['phone_no'];?>"required>
							</div>
							<div class="form-group">
								<label>Address</label><span></span><br>
								<input type="number" class="form-control" name="address" value="<?php echo $result['address'];?>"required>
							</div>
							<div class="form-group">
								<label>Zip Code</label><span></span><br>
								<input type="number" class="form-control" name="zip" value="<?php echo $result['zip'];?>" required>
							</div>
							<div class="form-group">
								<label>City</label><span></span><br>
								<input type="text" class="form-control" name="city" value="<?php echo $result['city'];?>" required>
							</div>
                            <div class="form-group">
                                <label>Date Employed</label><span></span><br>
								<input type="date" class="form-control" name="dateemployed" value="<?php echo $result['date_employed'];?>" required readonly>
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
		<?php include "../../footer.php"?>
	</body>
</html>