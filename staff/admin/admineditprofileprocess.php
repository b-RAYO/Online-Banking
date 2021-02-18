<?php
include '../../_include/dbconn.php';
include 'adminauth.php';
?>

<?php
    $id = $_SESSION['staff_id'];
    $name = $_POST["fullname"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];

    /*$sql="SELECT * FROM branches WHERE branch_name='$branch'";
    $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    $rws= mysqli_fetch_assoc($result);*/

    //$b_id=$rws['branch_id'];

    $name = mysqli_real_escape_string($con, $name);
    $dob = mysqli_real_escape_string($con, $dob);
    $phone = mysqli_real_escape_string($con, $phone);
    $address = mysqli_real_escape_string($con, $address);
    $zip = mysqli_real_escape_string($con, $zip);
    $city = mysqli_real_escape_string($con, $city);



$query="UPDATE employees SET  full_name='$name', dob='$dob', phone_no='$phone',
     address='$address', zip='$zip', city = '$city' WHERE employee_id= $id";
mysqli_query($con , $query) or die( mysqli_error($con));
//unset ($_SESSION['e_id']);
echo '<script>alert("PROFILE UPDATED ");';
echo 'window.location= "admineditprofile.php";</script>';
?>