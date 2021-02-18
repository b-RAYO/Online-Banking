<?php
	require ("..\..\_include/dbconn.php");
	require 'adminauth.php';
	if (!isset($_POST['e_id']))
	{
    echo '<script>alert("PLEASE CHOOSE AN EMPLOYEE ");';
    echo 'window.location= "selecteditstaff.php";</script>';
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="..\..\js\jquery.js"></script>
		<script src="..\..\js\popper.js"></script>
		<link rel="stylesheet" href="..\..\bootstrap/css/bootstrap-material-design.min.css">
		<script src="..\..\bootstrap/js/bootstrap-material-design.min.js"></script>
		<link rel="stylesheet" href="..\..\css\style.css">
		<link rel="stylesheet" href="..\..\fontawesome\css\all.css">
		<script src="..\..\fontawesome\js\all.js"></script>
		<title>Edit Profile</title>
	</head>
	<body>
		<?php include '..\..\staff\admin\adminnavbar.php';
            $_SESSION['e_id']=$_POST['e_id'];
			$id = $_SESSION['e_id'];
			$query = mysqli_query($con , "SELECT * FROM employees WHERE employee_id = '$id'");
			$result = mysqli_fetch_assoc($query);
		?>
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form class="form-container mt-3" method="post" action="adminalterstaff.php">
							<legend class="text-primary">
								Edit Customer Details
							</legend>
							<p><span class="error">
								* required fields
							</span></p>
							<div class="form-group">
								<label>Full Name</label><span class = "error">* </span>
								<input type="text" class="form-control" name="fullname" value="<?php echo $result['full_name'];?>" required >
							</div>
							<div class="form-group">
								<label>Date of Birth</label><span class = "error">* </span><br>
								<input type="date" class="form-control" name="dob" max="2001-12-31" value="<?php echo $result['dob'];?>" required >
							</div>
							<div class="form-group">
								<label>Role</label><span class = "error">*</span><br>
								<input type="text" class="form-control" name="role" value="<?php echo $result['role'];?>" required >
							</div>
							<div class="form-group">
								<label>Phone No.</label><span class = "error"> *</span><br>
								<input type="tel" class="form-control" name="phone" value="<?php echo $result['phone_no'];?>" required>
							</div>
							<div class="form-group">
								<label>Address</label><span class = "error">* </span><br>
								<input type="number" class="form-control" name="address" value="<?php echo $result['address'];?>" required>
							</div>
							<div class="form-group">
								<label>Zip Code</label><span class = "error"> *</span><br>
								<input type="number" class="form-control" name="zip" value="<?php echo $result['zip'];?>" required>
							</div>
							<div class="form-group">
								<label>City</label><span class="error">*</span><br>
								<input type="text" class="form-control" name="city" value="<?php echo $result['city'];?>" required>
							</div>
							<?php
							$branch_id= $result['branch_id'];
							$sql3="SELECT * FROM branches WHERE branch_id='$branch_id'";
							$result3=  mysqli_query($con , $sql3) or die( mysqli_error($con));
							$rws3= mysqli_fetch_assoc($result3);
							?>
							<div class="form-group">
								<label for="branch">Branch</label><span class="error">*</span><br>
								<input type="text" class="form-control" name="branch" value="<?php echo $rws3['branch_name']?>" required>
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
		<?php include "..\../footer.php"?>
	</body>
</html>