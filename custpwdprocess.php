<?php
include "_include/dbconn.php";
    $cid=$_SESSION['customer_id'];
    $email=$_SESSION['email'];
    if(isset($_POST['submitBtn'])){
    $sql="SELECT * FROM customers WHERE customer_id='$cid'";
    $result=mysqli_query($con,$sql);
    $rws= mysqli_fetch_assoc($result);
    $sql1="SELECT * FROM login_table WHERE email='$email'";
    $result1=mysqli_query($con,$sql1);

    $old=  md5($_REQUEST['oldpwd']);
    $new=  md5($_REQUEST['newpwd1']);
    $again=md5($_REQUEST['newpwd2']);

    if($rws['password']!=$old){
        echo '<script>alert("Wrong Old password.");';
        echo 'window.location= "changecustpwd.php";</script>';
    }
    elseif($new != $again){
        echo '<script>alert("Please confirm the new password correctly.");';
        echo 'window.location= "changecustpwd.php";</script>';
    }
    elseif($rws['password']==$old && $new==$again){
        $sql2="UPDATE customers SET password='$new' WHERE customer_id='$cid'";
        mysqli_query($con , $sql2) or die( mysqli_error($con));
        $sql3="UPDATE login_table SET password='$new' WHERE email='$email'";
        mysqli_query($con , $sql3) or die( mysqli_error($con));
        header('location:changecustpwd.php');
        $_SESSION['pwdupdated'] ='Password been changed successfully.';
    }
    }
?>