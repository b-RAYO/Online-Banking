<?php
    require '_include/dbconn.php';

    if (isset($_POST['email_check'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM customers WHERE email='$email'";
        $results = mysqli_query($con, $sql);
        if (mysqli_num_rows($results) > 0) {
          echo "taken";
        }else{
          echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST['phone_check'])) {
        $phone = $_POST['phone'];
        $sql2 = "SELECT * FROM customers WHERE phone_no='$phone'";
        $results2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($results2) > 0) {
          echo "taken";
        }else{
          echo 'not_taken';
        }
        exit();
    }
?>