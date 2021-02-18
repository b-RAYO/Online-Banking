<?php
require '../../_include/dbconn.php';
require 'adminauth.php';
//require '../staff/staffauth.php';
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
        $sql="SELECT * FROM savings WHERE status='PENDING'";
        $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    ?>
    <div class="container bg">
           <form action="approvesavingsprocess.php" method="POST">

                        <?php
                            if (mysqli_num_rows($result) < 1){
                            echo "<div class='mt-5 mb-5 d-flex justify-content-center text-danger'>";

                            echo "<h2>NO REQUESTS AVAILABLE!</h2>";
                            echo "</div>";
                            }
                            else {
                    echo ' <div class="table-responsive">
                    <table class="table table-striped mb-5" align="center" >
                        <thead class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Date Opened</th>
                        <th scope="col">Target Amount</th>
                        <th scope="col">End Date</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col">Branch Name</th>
                        </thead>';
                            while($rws=    mysqli_fetch_assoc($result)){
                                echo "<tr><td><input type='radio' name='account_no' value=".$rws['account_no'];
                                echo ' checked';
                                echo "</td>";
                                echo "<td>".$rws['account_no']."</td>";
                                echo "<td>".$rws['date_opened']."</td>";
                                echo "<td>".$rws['target_amount']."</td>";
                                echo "<td>".$rws['end_date']."</td>";
                                $c_id = $rws['customer_id'];
                                $b_id = $rws['branch_id'];
                                $sql2 = "SELECT * FROM customers WHERE customer_id = '$c_id'";
                                $result2 = mysqli_query($con , $sql2) or die (mysqli_error($con));
                                $rws2 = mysqli_fetch_assoc($result2);
                                $sql3 = "SELECT * FROM branches WHERE branch_id = '$b_id'";
                                $result3 = mysqli_query($con , $sql3) or die (mysqli_error($con));
                                $rws3 = mysqli_fetch_assoc($result3);
                                echo "<td>".$rws2['full_name']."</td>";
                                echo "<td>".$rws3['branch_name']."</td>";
                                echo "</tr>";

                            }
                            echo "<tr>";
                            echo "<td>";
                            echo "</td>";
                            echo '<td colspan = 3 align = "center"><button type="submit" class="btn btn-success btn-raised btn-block" name="submitBtn"><span class="fas fa-check"></span></button></td>';
                            echo '<td colspan = 3 align = "center"><button type="submit" class="btn btn-danger btn-raised btn-block" name="rejectBtn"><span class="fas fa-times"></span></button></td>';
                                echo "</tr>";
                            echo "</table>";
                            echo "</div>";
                        }

                    ?>

               </form>
    </div>
    <?php include '../../footer.php' ?>
</body>
</html>
