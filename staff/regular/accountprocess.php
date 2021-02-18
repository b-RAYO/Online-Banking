<?php
require '../../_include/dbconn.php';
require 'staffauth.php';


$c_id=mysqli_real_escape_string($con, $_POST['c_id']);

if (!isset($_POST['c_id']))
{
    echo '<script>alert("PLEASE CHOOSE A REQUEST ");';
    echo 'window.location= "accountrequests.php";</script>';
}
if(isset($_POST['submitBtn']))
{
    $sql="UPDATE customers SET acc_status='Active' WHERE customer_id='$c_id'";
    mysqli_query($con , $sql) or die( mysqli_error($con));

   echo '<script>alert("Account successfully ACTIVED ");';
   echo 'window.location= "accountrequests.php";</script>';
}
elseif (isset($_POST['rejectBtn'])){
    $sql="UPDATE customers SET acc_status='REJECTED' WHERE customer_id='$c_id'";
    mysqli_query($con , $sql) or die( mysqli_error($con));

   echo '<script>alert("Account REJECTED ");';
   echo 'window.location= "accountrequests.php";</script>';
}
?>