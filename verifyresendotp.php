<?php
    include ("_include/dbconn.php");
    if (isset($_POST['verifyotp'])) {
        $otp =$_POST['otp'];
        $phone= $_SESSION['phone'];
        if($_COOKIE['otp'] == $otp){
            $sql3="UPDATE customers SET phoneverified = 'VERIFIED' WHERE phone_no = '$phone'";
            $result3 =mysqli_query($con,$sql3) or die (mysqli_error($con));
            echo '<script>alert("Phone Number Verified.");';
            echo 'window.location= "login.php";</script>';
        }
    }
?>