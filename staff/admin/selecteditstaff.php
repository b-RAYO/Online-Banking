<?php
require '../../_include/dbconn.php';
require 'adminauth.php';
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
    <title>UNAITAS</title>
</head>
<body>
    <?php include "adminnavbar.php"?>
        <?php
        $sql="SELECT * FROM employees";
        $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    ?>
    <div class="container mt-5">
            <form action="admineditstaff.php" method="POST">
                        <?php
                    echo '
                    <table class="table table-striped mb-5 table-hover table-responsive" align="center" >
                        <thead class="thead-dark text-center">
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Role</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date Employed</td>
                        <th scope="col">Branch</td>
                        </thead>';
                            while($rws=    mysqli_fetch_assoc($result)){
                                echo "<tr><td><input type='radio' name='e_id' value=".$rws['employee_id'];
                                echo ' checked';
                                echo "</td>";
                                echo "<td>".$rws['full_name']."</td>";
                                echo "<td>".$rws['dob']."</td>";
                                echo "<td>".$rws['role']."</td>";
                                echo "<td>".$rws['phone_no']."</td>";
                                echo "<td>".$rws['address'].'-'.$rws['zip'].'&nbsp'.$rws['city']."</td>";
                                echo "<td>".$rws['date_employed']."</td>";
                                $branch_id= $rws['branch_id'];
                                $sql3="SELECT * FROM branches WHERE branch_id='$branch_id'";
                                $result3=  mysqli_query($con , $sql3) or die( mysqli_error($con));
                                $rws3= mysqli_fetch_assoc($result3);
                                echo "<td>".$rws3['branch_name']."</td>";
                                echo "</tr>";
                            }
                            echo "<tr>";
                            echo "<td>";
                            echo "</td>";
                            echo '<td colspan = 7 align = "center"><button type="submit" class="btn btn-success btn-raised btn-block" name="submitBtn"><span class="fas fa-check"></span></button></td>';
                                echo "</tr>";
                            echo "</table>";
                    ?>
            </form>
    </div>
    <?php include '../../footer.php' ?>
</body>
</html>
