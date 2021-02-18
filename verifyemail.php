<?php
include "_include/dbconn.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM customers WHERE token='$token' LIMIT 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE customers SET emailverified = 'VERIFIED' WHERE token='$token'";

        if (mysqli_query($con, $query)) {
           // $_SESSION['verified'] = true;
           header("location:verifieduser.php");
            exit(0);
        }
    } else {
        echo "<script>alert('User Not Found');";
        echo "window.location = 'login.php';</script>";
    }
} else {
    echo "<script>alert('No Token Provided');";
    echo "window.location = 'login.php';</script>";
}