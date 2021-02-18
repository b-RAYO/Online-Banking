<?php
include "_include/dbconn.php";

date_default_timezone_set('Africa/Nairobi');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $date = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM login_table WHERE token='$token'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    if($user['used'] == 'YES'){
        echo "<script>alert('LOGIN LINK HAS ALREADY BEEN USED');";
        echo "window.location = 'login.php';</script>";
        //echo $user['token'];
    }
    else{
        if($user['token_expires'] >= $date){
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                $email = $_SESSION['email'];
                $password= $_SESSION['password'];
                $sql2 = "UPDATE login_table SET used = 'YES' WHERE email = '$email' ";
                $result2 = mysqli_query($con, $sql2);
                header('location: otplogin.php');
                exit(0);
            } else {
                echo "<script>alert('USER NOT FOUND');";
                echo "window.location = 'login.php';</script>";
            }
        }
        else{
            echo "<script>alert('LOGIN LINK HAS EXPIRED');";
            echo "window.location = 'login.php';</script>";
        }
    }
} else {
    echo "<script>alert('NO TOKEN PROVIDED');";
    echo "window.location = 'login.php';</script>";
}