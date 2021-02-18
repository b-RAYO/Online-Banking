<?php
    require "_include/dbconn.php";

    if(isset($_POST['submitBtn'])){
        $name =$_POST['fullname'];
        $phone =$_POST['phone'];
        $pwd1 =md5($_POST['newpwd']);
        $pwd2 = $_POST['confirmnewpwd'];

        if($pwd1 == $pwd2){
            $sql2="UPDATE customers SET password='$pwd1' WHERE phone_no = $phone";
            mysqli_query($con , $sql2) or die( mysqli_error($con));
            header ("location:login.php");
        }
        else{
            $_SESSION['pwd_error'] = "PASSWORDS DON'T MATCH";
            header ("location:verifyforgetotp.php");
        }
    }
?>