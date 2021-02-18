<?php
    require ("../../_include/dbconn.php");
    require ("adminauth.php");
    
    if(isset($_POST["submit"]))
        {
            $name = $_POST["fullname"];
            $dob = $_POST["dob"];
            $role = $_POST["role"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $zip = $_POST["zip"];
            $city = $_POST["city"];
            $gender = $_POST["gender"];
            $password = $_POST["pwd1"];
            $branch_id = $_POST ["branch_id"];

            $name = mysqli_real_escape_string($con, $name);
            $dob = mysqli_real_escape_string($con, $dob);
            $role = mysqli_real_escape_string($con, $role);
            $phone = mysqli_real_escape_string($con, $phone);
            $address = mysqli_real_escape_string($con, $address);
            $zip = mysqli_real_escape_string($con, $zip);
            $city = mysqli_real_escape_string($con, $city);
            $gender = mysqli_real_escape_string($con, $gender);
            $password = md5($password);
            $date=date("Y-m-d");


            $query = mysqli_query($con, "INSERT INTO employees VALUES('','$name','$dob','$role','$phone','$address','$zip', '$city','$gender',
                '$date','$password','$branch_id')");
            echo '<script>alert("STAFF REGISTERED ");';
            echo 'window.location= "staffreg.php";</script>';

        }

?>