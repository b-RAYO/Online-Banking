<?php
	require ("../../_include/dbconn.php");
	require ("adminauth.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="../../js/jquery.js"></script>
		<script src="..\..\js\popper.js"></script>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
		<script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="stylesheet" href="../../fontawesome\css\all.css">
		<script src="../../fontawesome\js\all.js"></script>
		<title>UNAITAS</title>
	</head>
	<body>
		<?php include "adminnavbar.php"?>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<form method="POST" action="staffregprocess.php" class="form-container mt-5 mb-5">
						<legend class="text-primary">Staff Registration Form</legend>
						<p>
							<span class="error">* required fields </span>
						</p>
						<div class="form-group">
							<label>Full Name</label><span class = "error">* <br></span>
							<input type="text" class="form-control" name="fullname" value="" required>
						</div>
						<div class="form-group">
							<label>Date of Birth</label><span class = "error">* </span><br>
							<input type="date" class="form-control" name="dob" max="2001-12-31" value="" required>
						</div>
						<div class="form-group">
							<label>Role</label><span class = "error">*</span><br>
							<select class="form-control" name="role">
								<option value="Admin">Admin</option>
								<option value="Regular">Regular</option>
							</select>
						</div>
						<div class="form-group">
							<label>Phone No.</label><span class = "error">*</span><br>
							<input type="tel" class="form-control" name="phone" value=""required>
						</div>
						<div class="form-group">
							<label>Address</label><span class = "error">*</span><br>
							<input type="number" class="form-control" name="address" value=""required>
						</div>
						<div class="form-group">
							<label>Zip Code</label><span class = "error">*</span><br>
							<input type="number" class="form-control" name="zip" value="" required>
						</div>
						<div class="form-group">
							<label>City</label><span class = "error">*</span><br>
							<input type="text" class="form-control" name="city" value="" required>
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
						<?php
							$bquery = "SELECT * FROM branches";
							$result = mysqli_query ($con, $bquery);
							$options1 = "";
							while($row1 = mysqli_fetch_array($result))
							$options1 .= '<option value="' . $row1[0] . '">' .  $row1[1] . '</option>';
						?>
						<div class="form-group">
							<label>Branch</label><span class = "error">*</span><br>
							<select class="custom-select" name="branch_id">
								<option value=""></option>
								<?php echo $options1;?>
							</select>
						</div>
						<div class="form-group">
							<label>Password</label><span class = "error">*</span><br>
							<input type="password" class="form-control" name="pwd1" id="pwd1" required>
							&nbsp &nbsp
							<div class="custom-control custom-checkbox">
								<input type = "checkbox" class="custom-control-input pwd1" onclick = "showPwd()">
								<label class="custom-control-label" for="showpwd"> Show Password </label>
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-success btn-block btn-raised" name="submit">REGISTER</button>
					</form>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		<?php include "../../footer.php"?>
		<script>
			$('.pwd1').prop('indeterminate', true)
			function showPwd() {
				var x = document.getElementById("pwd1");
					if (x.type == "password" && y.type == "password") {
						x.type  = "text";
						y.type = "text";
					}
					else {
						x.type = "password"
						y.type = "password";
					}
					}
		</script>
	</body>
</html>