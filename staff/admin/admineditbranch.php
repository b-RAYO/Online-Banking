<?php
	require ("..\..\_include/dbconn.php");
	require 'adminauth.php';
	if (!isset($_POST['b_id']))
	{
    echo '<script>alert("PLEASE CHOOSE A BRANCH!! ");';
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
		<title>Edit Branch</title>
	</head>
	<body>
		<?php include '..\..\staff\admin\adminnavbar.php';
            $_SESSION['b_id']=$_POST['b_id'];
			$id = $_SESSION['b_id'];
			$query = mysqli_query($con , "SELECT * FROM branches WHERE branch_id = '$id'");
			$result = mysqli_fetch_assoc($query);
		?>
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form class="form-container mt-3" method="post" action="adminalterbranch.php">
							<legend class="text-primary">
								Edit Branch Details
							</legend>
							<p><span class="error">
								* required fields
							</span></p>
							<div class="form-group">
								<label>Branch Code</label><span class = "error">* </span>
								<input type="number" class="form-control" name="branch_id" value="<?php echo $result['branch_id'];?>" required >
							</div>
							<div class="form-group">
								<label>Branch Name</label><span class = "error">* </span><br>
								<input type="text" class="form-control" name="b_name" value="<?php echo $result['branch_name'];?>" required >
							</div>
							<div class="form-group">
								<label>Address</label><span class = "error">*</span><br>
								<input type="number" class="form-control" name="address" value="<?php echo $result['address'];?>" required >
							</div>
							<div class="form-group">
								<label>Zip Code</label><span class = "error"> *</span><br>
								<input type="number" class="form-control" name="zip" value="<?php echo $result['zip'];?>" required>
							</div>
							<div class="form-group">
								<label>City</label><span class="error">*</span><br>
								<input type="text" class="form-control" name="city" value="<?php echo $result['city'];?>" required>
							</div>
							<button type="submit" class="btn btn-success btn-block btn-raised" name="submit">SAVE</button>
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