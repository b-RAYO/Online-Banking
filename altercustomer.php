<?php
include '_include/dbconn.php';

if(!isset($_SESSION['customer_login']))
    header('location:login.php');
?>

<?php
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



$query="UPDATE customers SET  full_name='$name', dob='$dob', email='$email', phone_no='$phone',
     address='$address', zip='$zip', city = '$city' WHERE customer_id= '$id'";
mysqli_query($con , $query) or die( mysqli_error($con));
header('location:editcustomer.php');
$_SESSION['profileupdated'] ='Profile has been updated';
echo 'Profile updated';
?>