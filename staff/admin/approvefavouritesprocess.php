<?php
require '../../_include/dbconn.php';
//require 'staffauth.php';
require 'adminauth.php';

$id=mysqli_real_escape_string($con, $_POST['customer_id']);
$date = date('Y-m-d H:i:s');
if(isset($_POST['submit_id']))
{
    $sql="UPDATE favourites SET status='APPROVED', dateapproved='$date' WHERE id='$id'";
    mysqli_query($con , $sql) or die( mysqli_error($con));

   echo '<script>alert("Favorite APPROVED");';
   echo 'window.location= "approvefavourites.php";</script>';
}
elseif (isset($_POST['reject_id'])){
    $sql="UPDATE favourites SET status='REJECTED' WHERE id='$id'";
    mysqli_query($con , $sql) or die( mysqli_error($con));

   echo '<script>alert("Favorite successfully REJECTED ");';
   echo 'window.location= "approvefavourites.php";</script>';
}
else {
    header('location:approvefavourites.php');
}
?>