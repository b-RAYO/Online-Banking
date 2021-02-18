<?php
include ("_include/dbconn.php");
    if (isset($_POST['verifyotp'])) {
        $otp =$_POST['otp'];
        if($_COOKIE['otp'] == $otp){
            $name = $_POST["fullname"];
            $dob = $_POST["dob"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $zip = $_POST["zip"];
            $city = $_POST["city"];
            $gender = $_POST["gender"];
            $password = $_POST["pwd1"];
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['name'] = $_POST["fullname"];

            $name = mysqli_real_escape_string($con, $name);
            $dob = mysqli_real_escape_string($con, $dob);
            $email = mysqli_real_escape_string($con, $email);
            $phone = mysqli_real_escape_string($con, $phone);
            $address = mysqli_real_escape_string($con, $address);
            $zip = mysqli_real_escape_string($con, $zip);
            $city = mysqli_real_escape_string($con, $city);
            $gender = mysqli_real_escape_string($con, $gender);
            $password = md5($password);
            $date = date('Y-m-d H:i:s');
            $token = bin2hex(random_bytes(50));


           $query = mysqli_query($con, "INSERT INTO customers VALUES('','$name','$dob','$email','$phone','$address', '$zip','$city','$gender',
            '$password','$token','pending','VERIFIED','pending')") or die(mysqli_error($con));

            $query1 = mysqli_query($con , "INSERT INTO login_table VALUES ('$email' , '$password','','','','')");
            $_SESSION['verifiedphone'] = "PHONE NUMBER VERIFIED";

            require_once 'sendverifyemail.php';
            //header("verifyemailsent.php");
        }
        else {
            $_SESSION['wrong_otp'] = "PLEASE ENTER THE CORRECT OTP";
            header('location:sendverifyphone.php');
        }
    }
?>