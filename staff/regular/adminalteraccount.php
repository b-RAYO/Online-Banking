<?php
include '../../_include/dbconn.php';
require 'staffauth.php';

$accno = mysqli_real_escape_string($con, $_POST['a_no']);
$minbal = mysqli_real_escape_string($con, $_POST['minbal']);
$accbal = mysqli_real_escape_string($con, $_POST['accbal']);
$b_id = mysqli_real_escape_string($con, $_POST['branch']);
$customer = mysqli_real_escape_string($con, $_POST['customer']);
$acc_status =mysqli_real_escape_string($con,$_POST['status']);

$sql="SELECT * FROM branches WHERE branch_name='$b_id'";
$result=  mysqli_query($con , $sql) or die( mysqli_error($con));
$rws= mysqli_fetch_assoc($result);

$sql2="SELECT * FROM accounts WHERE account_no='$accno'";
$result2=  mysqli_query($con , $sql2) or die( mysqli_error($con));
$rws2= mysqli_fetch_assoc($result2);

$branch=$rws['branch_id'];
$c_id = $rws2['customer_id'];

$query="UPDATE accounts SET min_bal='$minbal', account_bal='$accbal', branch_id='$branch'
        WHERE account_no= $accno";
mysqli_query($con , $query) or die( mysqli_error($con));

$query2="UPDATE customers SET full_name='$customer', acc_status='$acc_status'
        WHERE customer_id= $c_id";
mysqli_query($con , $query2) or die( mysqli_error($con));

echo '<script>alert("ACCOUNT UPDATED ");';
echo 'window.location= "selecteditaccount.php";</script>';
?>