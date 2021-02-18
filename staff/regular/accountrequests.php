<?php
require '../../_include/dbconn.php';
require 'staffauth.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="..\..\js\jquery.js"></script>
    <script src="../../js/popper.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
    <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="..\..\css\style.css">
    <link rel="stylesheet" href="..\..\fontawesome\css\all.css">
    <script src="..\..\fontawesome\js\all.js"></script>
    <title>UNAITAS</title>
</head>
<body>

    <?php include "staffnavbar.php";
        //include "adminsidebar.php";
    ?>
        <?php
        $sql="SELECT * FROM customers WHERE acc_status='PENDING' AND emailverified='verified' AND phoneverified='verified'";
        $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    ?>
    <div class="container mt-5">
           <form action="accountprocess.php" method="POST">

                <?php
                    if (mysqli_num_rows($result) < 1){
                    echo "<h2 class='mt-5 mb-5 d-flex justify-content-center text-danger'>";
                    echo "NO REQUESTS AVAILABLE!";
                    echo "</h2>";
                    }
                    else {
            echo ' <div class="table-responsive">
            <table class="table table-striped mb-5" align="center" >
                <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                </thead>';
                    while($rws=    mysqli_fetch_assoc($result)){
                        echo "<tr><td><input type='radio' name='c_id' value=".$rws['customer_id'];
                        echo ' checked';
                        echo "</td>";
                        echo "<td>".$rws['full_name']."</td>";
                        echo "<td>".$rws['dob']."</td>";
                        echo "<td>".$rws['email']."</td>";
                        echo "<td>".$rws['phone_no']."</td>";
                        echo "<td>".$rws['address'].'-'.$rws['zip'].'&nbsp'.$rws['city']."</td>";
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
