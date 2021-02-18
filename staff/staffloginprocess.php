<?php
    include ("../_include/dbconn.php");


    if(isset($_POST['submitBtn'])){


        $staff_id=$_POST['staff_id'];
        $password= md5($_POST['pwd1']);

        $sql="SELECT * FROM employees WHERE employee_id='$staff_id' AND password='$password' LIMIT 1";
        $result=mysqli_query($con , $sql) or die(mysqli_error($con));

        if (mysqli_num_rows($result) == 1){// user found
            //check if staff is an admin
            $logged_in_staff = mysqli_fetch_assoc($result);
            if($logged_in_staff ['role'] == 'ADMIN'){

                $_SESSION['admin_login'] = 1;
                $_SESSION['staff_id'] = $staff_id;
                header('location: admin/adminhome.php');
            }
            else {
                $_SESSION['staff_login'] = 1;
                $_SESSION['staff_name'] = $logged_in_staff['full_name'];
                $_SESSION['staff_id'] = $staff_id;
                header('location:regular/staffhome.php');
            }
        }
        else{
            $_SESSION['stafferror'] ="Invalid Details!!";
            header('location:stafflogin.php');
        }
        /*$rws=  mysqli_fetch_array($result);

        $user=$rws[0];
        $pwd=$rws[1];

        if($user==$staff_id && $pwd==$password){
            session_start();
            $_SESSION['staff_login']=1;
            $_SESSION['staff_id']=$staff_id;
        header('location:home.php');
        } */
    }
    ?>