<?php
	require ("_include/dbconn.php");	
    include 'test_input.php';
    if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php'); 
?>
<!doctype html>
<?php

$id =  mysqli_real_escape_string($con , $_POST['employee_id']);
$sql="SELECT * FROM `employees` WHERE employee_id = '$id'";
$result=  mysqli_query($con , $sql) or die( mysqli_error($con));
$rws=    mysqli_fetch_assoc($result);
?>
<head>
<meta charset="utf-8">
<title>Edit Staff</title>
</head>
<body>
<?php include "header.php";
?>

<form method="POST" action="alterstaff.php">

<legend>Edit Staff</legend>
<p><span class="error">* required fields </span></p>
<input type="hidden" name="current_id" value="<?php echo $id;?>">
<div class="form-group">
  	  <label>Full Name</label><span class = "error">* <br><?php echo $nameErr;?></span>
  	</div>
  	  <input type="text" name="fullname" value="<?php echo $rws['full_name'];?>" required>
  	<div class="form-group">
  	  <label>Date of Birth</label><span class = "error">* <?php echo $dobErr;?></span><br>
  	  <input type="date" name="dob" max="2001-12-31" value="<?php echo $rws['dob'];?>" required>
  	<div class="form-group">
  	  <label>Role</label><span class = "error">* <?php echo $roleErr;?></span><br>
  	   <select name="role">
         <option <?php if($rws['role']=="regular") echo "selected";?>>Regular</option>
        <option <?php if($rws['role']=="admin") echo "selected";?>>Admin</option>
         </select>
  	</div>
  	<div class="form-group">
  	  <label>Phone No.</label><span class = "error">* <?php echo $phoneErr;?></span><br>
  	  <input type="tel" name="phone" value="<?php echo $rws['phone_no'];?>"required>
  	</div>
      <div class="form-group">
  	  <label>Address</label><span class = "error">* <?php echo $addressErr;?></span><br>
  	  <input type="number" name="address" value="<?php echo $rws['address'];?>"required>
  	</div>
      <div class="form-group">
  	  <label>Zip Code</label><span class = "error">* <?php echo $zipErr;?></span><br>
  	  <input type="number" name="zip" value="<?php echo $rws['zipcode'];?>" required>
  	</div>
      <div class="form-group">
  	  <label>City</label><span class = "error">* <?php echo $cityErr;?></span><br>
  	  <input type="text" name="city" value="<?php echo $rws['city'];?>" required>
  	</div>
	  <?php
    $bquery = "SELECT * FROM branches";

    $result = mysqli_query ($con, $bquery);
    $options1 = "";
    while($row1 = mysqli_fetch_array($result))
    $options1 .= '<option value="' . $row1[0] . '">' .  $row1[1] . '</option>';
    ?>
  	<div class="form-group">
  	  <label>Branch</label><span class = "error">* <?php echo $dobErr;?></span><br>
  	  <select name="branch_id">
                <?php echo $options1;?>
    </select>
  	</div>
        <br>
  <input type="submit" name="submit" value="Save!" />
  <p>

  	</p>
</form>
<?php include "footer.php"?>
</body>
</html>