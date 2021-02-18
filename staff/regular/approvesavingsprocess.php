<?php
require '../../_include/dbconn.php';
require 'staffauth.php';


$id=mysqli_real_escape_string($con, $_POST['account_no']);
$date = date('Y-m-d H:i:s');


if (!isset($_POST['account_no']))
{
    echo '<script>alert("PLEASE CHOOSE A REQUEST ");';
    echo 'window.location= "approvesavings.php";</script>';
}
if(isset($_POST['submitBtn']))
{
    $sql="UPDATE savings SET status='APPROVED' WHERE account_no='$id'";
    mysqli_query($con , $sql) or die( mysqli_error($con));
    $sql1="INSERT INTO savings_transcations VALUES ('','$date','Account Opened','0','0','0','$id')";
    mysqli_query($con , $sql1) or die( mysqli_error($con));

   echo '<script>alert("Savings Account APPROVED");';
   echo 'window.location= "approvesavings.php";</script>';
}
elseif (isset($_POST['rejectBtn'])){
    $sql="UPDATE savings SET status='REJECTED' WHERE account_no='$id'";
    mysqli_query($con , $sql) or die( mysqli_error($con));

   echo '<script>alert("Savings Account REJECTED");';
   echo 'window.location= "approvesavings.php";</script>';
}
?>