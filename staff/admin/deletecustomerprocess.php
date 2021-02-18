<?php
    require '../../_include/dbconn.php';
    require 'adminauth.php';

    $customer_acc=mysqli_real_escape_string($con, $_POST["c_id"]);
    $sql="UPDATE customer SET acc_status='CLOSED' WHERE customer_id='$customer_acc''";
    $result=  mysqli_query($con , $sql) or die( mysqli_error($con));

    echo '<script>alert("ACCOUNT SUCCESSFULLY DELETED. ");';
    echo '</script>';

?>