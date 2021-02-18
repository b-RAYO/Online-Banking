<?php
require '_include/dbconn.php';
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php'); 
        $id = $_POST['current_id'];
		$name = $_POST["fullname"];
		$dob = $_POST["dob"];
        $role = $_POST["role"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $zip = $_POST["zip"];
        $city = $_POST["city"];
		$branch_id = $_POST ["branch_id"];

        $id=  mysqli_real_escape_string($con , $_REQUEST['current_id']);
        $name = mysqli_real_escape_string($con, $name);
        $dob = mysqli_real_escape_string($con, $dob);
        $role = mysqli_real_escape_string($con, $role);
        $phone = mysqli_real_escape_string($con, $phone);
        $address = mysqli_real_escape_string($con, $address);
        $zip = mysqli_real_escape_string($con, $zip);
        $city = mysqli_real_escape_string($con, $city);
		$branch_id = mysqli_real_escape_string($con, $branch_id);
		

$query="UPDATE employees SET  full_name='$name', dob='$dob', role='$role', phone_no='$phone', 
     address='$address', zipcode='$zip', city = '$city', branch_id = '$branch_id' WHERE employee_id= '$id'";
mysqli_query($con , $query) or die( mysqli_error($con));
header('location:adminhome.php');
//echo $id;
?>