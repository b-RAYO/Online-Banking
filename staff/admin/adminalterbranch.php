<?php
include '../../_include/dbconn.php';
//include 'adminauth.php';

    $branch_id = mysqli_real_escape_string($con, $_POST['branch_id']);
    $branch_name = mysqli_real_escape_string($con, $_POST['b_name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $zip = mysqli_real_escape_string($con, $_POST['zip']);
    $city= mysqli_real_escape_string($con,$_POST['city']);

    /*$sql="SELECT * FROM branches WHERE branch_name='$zip'";
    $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    $rws= mysqli_fetch_assoc($result);
    $c_id = mysqli_real_escape_string($con, $POST_['customer']);

    $branch=$rws['branch_id'];*/

    $query="UPDATE branches SET branch_name='$branch_name', address='$address', zip='$zip', city='$city'
            WHERE branch_id= $branch_id";
    mysqli_query($con , $query) or die( mysqli_error($con));
    echo '<script>alert("BRANCH INFO HAS BEEN UPDATED ");';
    echo 'window.location= "selecteditbranch.php";</script>';
?>