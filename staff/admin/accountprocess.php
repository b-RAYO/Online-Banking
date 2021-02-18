<?php
    require '../../_include/dbconn.php';
    require 'adminauth.php';

    $c_id=mysqli_real_escape_string($con, $_POST['c_id']);

    if (!isset($_POST['c_id']))
    {
        echo '<script>alert("PLEASE CHOOSE A REQUEST ");';
        echo 'window.location= "accountrequests.php";</script>';
    }
    if(isset($_POST['submitBtn']))
    {
        $sql="UPDATE customers SET acc_status='ACTIVE' WHERE customer_id='$c_id'";
        $query=mysqli_query($con , $sql) or die( mysqli_error($con));
        $sql2="SELECT * FROM customers WHERE customer_id = '$c_id'";
        $query2=mysqli_query($con,$sql2)or die(mysqli_error($con));
        $result = mysqli_fetch_assoc ($query2);
        $status= $result['acc_status'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['name'] = $result['full_name'];

    echo '<script>alert("Account successfully ACTIVED ");';
    echo 'window.location= "accountrequests.php";</script>';
    }
    elseif (isset($_POST['rejectBtn'])){
        $sql="UPDATE customers SET acc_status='REJECTED' WHERE customer_id='$c_id'";
        mysqli_query($con , $sql) or die( mysqli_error($con));
    echo '<script>alert("Account REJECTED ");';
    echo 'window.location= "accountrequests.php";</script>';
    }
    if($status == 'ACTIVE'){
        require_once "accountapprovedemail.php";
    }
    else{
        require_once "accountrejectedemail.php";
    }
?>