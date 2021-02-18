<?php
    require '_include/dbconn.php';
    require 'auth.php';

    if(isset($_POST['submit']))
    {
    $customer_acc=mysqli_real_escape_string($con, $_POST["r_acc"]);
    $sql="DELETE FROM favourites WHERE r_acc ='$customer_acc'";
    $result=  mysqli_query($con , $sql) or die( mysqli_error($con));

    echo '<script>alert("Account successfully deleted from favorites. ");';
                        echo 'window.location= "favourites.php";</script>';

    }
?>