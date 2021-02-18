<?php
    require ("../../_include/dbconn.php");

    $customer_acc=mysqli_real_escape_string($con, $_POST["a_no"]);
    $sql2 = "SELECT account_no,account_bal,min_bal,date_opened,branch_id,customers.*
	FROM accounts
	INNER JOIN customers
	ON accounts.customer_id = customers.customer_id
	WHERE accounts.account_no = '$customer_acc'";
	$result2 = mysqli_query($con, $sql2) or die (mysqli_error($con));
	$rws = mysqli_fetch_assoc ($result2);

?>
<!doctype html >
	<head>
		<meta charset="utf-8">
		<title>UNAITAS</title>
		<script src="../../js/jquery.js"></script>
		<script src="../../js/popper.js"></script>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
		<script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="stylesheet" href="../../fontawesome\css\all.css">
		<script src="../../fontawesome\js\all.js"></script>
	</head>
	<body>
		<?php include "adminnavbar.php"?>
			<div class="container">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<form method="POST" action="deletecustomerprocess.php" class="form-container mb-5">
							<legend class="w-auto text-danger" >
								PLEASE CONFIRM THIS IS THE CORRECT ACCOUNT
							</legend>

							<div class="form-group">
								<input type="hidden" name="c_id" value="<?$rws ['customer_id']?>">
							</div>
							<table class="table table-striped">
								<thead class="thead-dark">
									<tr>
									<th scope="col" colspan="2" class="text-center"><h3>Account Details</h3></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><b>Full Name</b></td>
										<td><?php echo $rws['full_name']?></td>
									</tr>
									<tr>
										<td><b>Date of Birth</b></td>
										<td><?php echo $rws['dob']?></td>
									</tr>
									<tr>
										<td><b>Email</b></td>
										<td><?php echo $rws['email']?></td>
									</tr>
									<tr>
										<td><b>Phone Number</b></td>
										<td><?php echo $rws['phone_no']?></td>
									</tr>
									<tr>
										<td><b>Address</b></td>
										<td><?php echo "P.O BOX ".$rws['address']."-".$rws['zip'].'&nbsp'.$rws['city']?></td>
									</tr>
									<tr>
										<td><b>Gender</b></td>
										<td><?php echo $rws['gender']?></td>
									</tr>
									<tr>
										<td><b>Account No.</b></td>
										<td><?php echo $rws['account_no']?></td>
									</tr>
									<tr>
										<td><b>Account_bal</b></td>
										<td><?php echo $rws['account_bal']?></td>
									</tr>
									<tr>
										<td><b>Date Opened</b></td>
										<td><?php echo $rws['date_opened']?></td>
									</tr>
									<tr>
										<td><b>Branch</b></td>
										<td>
											<?php
												$branchid=$rws['branch_id'];
												$slq="SELECT * FROM branches WHERE branch_id = '$branchid'";
												$result = mysqli_query($con, $slq) or die (mysqli_error($con));
												$rws2 = mysqli_fetch_assoc ($result);
												echo $rws2['branch_name'];
											?>
										</td>
									</tr>
									<tr>
										<td colspan="2" class="text-center">
											<button type="submit" name="submitBtn" class="btn btn-success btn-raised">DELETE</button>
										</td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</div>
		<script>
			function showPwd() {
				var x = document.getElementById("pwd1");
				var y = document.getElementById("pwd2");
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
	<?php include '../../footer.php';?>

	</body>
</html>