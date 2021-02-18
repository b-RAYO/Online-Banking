<?php
include '../../_include/dbconn.php';
require 'staffauth.php';
?>

<?php
     $id = $_SESSION['c_id'];
	$name = $_POST["fullname"];
	$dob = $_POST["dob"];
     $email = $_POST["email"];
     $phone = $_POST["phone"];
     $address = $_POST["address"];
     $zip = $_POST["zip"];
     $city = $_POST["city"];
     //$status = $_POST["status"];

     $name = mysqli_real_escape_string($con, $name);
     $dob = mysqli_real_escape_string($con, $dob);
     $email = mysqli_real_escape_string($con, $email);
     $phone = mysqli_real_escape_string($con, $phone);
     $address = mysqli_real_escape_string($con, $address);
     $zip = mysqli_real_escape_string($con, $zip);
     $city = mysqli_real_escape_string($con, $city);
     //$status = mysqli_real_escape_string($con, $status);


$query="UPDATE customers SET  full_name='$name', dob='$dob', email='$email', phone_no='$phone',
     address='$address', zip='$zip', city = '$city' WHERE customer_id= $id";
mysqli_query($con , $query) or die( mysqli_error($con));
unset ($_SESSION['c_id']);
echo '<script>alert("PROFILE UPDATED ");';
echo 'window.location= "selecteditcustomer.php";</script>';
?>