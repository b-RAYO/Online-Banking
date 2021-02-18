<?php
    include ("_include/dbconn.php");
    if (isset($_POST['verifyotp'])) {
        $login_otp =$_POST['login_otp'];
        if($_COOKIE['login_otp'] == $login_otp){
            $email=mysqli_real_escape_string($con, $_POST['email']);
            $password= ($_POST['pwd1']);
            $date = date('Y-m-d H:i:s');

            $sql="SELECT * FROM login_table WHERE email='$email' AND password='$password'";
            $result=mysqli_query($con , $sql) or die(mysqli_error($con));
            $login = mysqli_fetch_assoc ($result);
            $sql1 = "SELECT * FROM customers WHERE email='$email'";
            $result1 = mysqli_query($con, $sql1) or die (mysqli_error($con));
            $logged_in = mysqli_fetch_assoc ($result1);
            $emailverified = $logged_in['emailverified'];
            $phoneverified = $logged_in['phoneverified'];

           if(mysqli_num_rows ($result) == 1 and $emailverified == 'VERIFIED' and $phoneverified == 'VERIFIED'){
                $_SESSION ['customer_login'] = 1;
                $name = $logged_in['full_name'];
                $customer_id = $logged_in['customer_id'];
                $_SESSION ['email'] = $logged_in['email'];
                $_SESSION ['customer_id'] = $customer_id;
                $_SESSION ['login'] = $login['last_login'];
                header('location:accountsummary.php');
                $query = "UPDATE login_table SET last_login = '$date' WHERE email = '$email'";
                $rws = mysqli_query($con,$query) or die(mysqli_error($con));
           }
            elseif ($logged_in['emailverified'] =='PENDING'){
                echo '<script>alert("Please verify your email by clicking the link in your inbox.");';
                echo 'window.location= "login.php";</script>';
            }
            elseif ($logged_in['phoneverified'] =='PENDING'){
                echo '<script>alert("Please verify your phone number.");';
                echo 'window.location= "login.php";</script>';
            }
            elseif(mysqli_num_rows ($result) == 0 ){
            header('location:login.php');
            }
        }
        else {
            echo "<p class='alert alert-danger' role='alert'> PLEASE ENTER THE CORRECT OTP!!</p>";
            header('location:otplogin.php');
        }
    }
?>