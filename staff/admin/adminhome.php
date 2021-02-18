<?php
require "../../_include/dbconn.php";

if(!isset($_SESSION['admin_login']))
    header('location:stafflogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="..\..\js\jquery.js"></script>
    <script src="..\..\js\popper.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
    <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="..\..\css\style.css">
    <link rel="stylesheet" href="..\..\fontawesome\css\all.css">
    <script src="..\..\fontawesome\js\all.js"></script>
    <title>UNAITAS-Admin Home Page</title>
</head>
<body>
<?php include '..\..\staff\admin\adminnavbar.php';
    $staff_id =$_SESSION['staff_id'];
    $sql ="SELECT * FROM employees WHERE employee_id = $staff_id";
    $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    $rws = mysqli_fetch_assoc($result);
?>
    <div class='container mt-5'>

            <table class="table table-striped table-bordered mb-5" align="center">
                <thead class="thead-dark" align=center >
                    <th colspan=2  scope="col">
                        EMPLOYEE DETAILS
                    </th>
                </thead>
                <tr>
                    <td>FULL NAME</td>
                    <td><?php echo $rws['full_name'];?></td>
                </tr>
                <tr>
                    <td>ROLE</td>
                    <td><?php echo $rws['role'];?></td>
                </tr>
                <tr>
                    <td>PHONE NUMBER</td>
                    <td><?php echo $rws['phone_no'];?></td>
                </tr>
                <tr>
                    <td>ADDRESS</td>
                    <td><?php echo $rws['address'].'-'.$rws['zip'].''.''.$rws['city'];?></td>
                </tr>
                <tr>
                    <td>DATE JOINED</td>
                    <td><?php echo date ("d-m-Y",strtotime($rws['date_employed']));?></td>
                </tr>
                <?php
                    $branch_id =$rws['branch_id'];
                    $sql1 ="SELECT * FROM branches WHERE branch_id = $branch_id";
                    $result1=  mysqli_query($con , $sql1) or die( mysqli_error($con));
                    $rws1 = mysqli_fetch_assoc($result1);
                ?>
                <tr>
                    <td>BRANCH</td>
                    <td><?php echo $rws1['branch_name'];?></td>
                </tr>
            </table>

    </div>
<?php include "../../footer.php"?>
</body>
</html>