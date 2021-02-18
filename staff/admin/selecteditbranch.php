<?php
    include "../../_include/dbconn.php";
    require 'adminauth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/popper.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
    <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../fontawesome\css\all.css">
    <script src="../../fontawesome\js\all.js"></script>
    <title>UNAITAS</title>
</head>
<body>
    <?php include "adminnavbar.php";
    $sql="SELECT * FROM branches";
    $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-md-8">
                <form action="admineditbranch.php" method="POST">
                    <?php
                        echo '
                        <table class="table table-striped mb-5 table-hover table-responsive" align="center" >
                            <thead class="thead-dark text-center">
                            <th scope="col">#</th>
                            <th scope="col">BranchID</th>
                            <th scope="col">Branch Name</th>
                            <th scope="col">Address</th>

                            </thead>';
                                while($rws=    mysqli_fetch_assoc($result)){
                                    echo "<tr><td><input type='radio' name='b_id' value=".$rws['branch_id'];
                                    echo ' checked';
                                    echo "</td>";
                                    echo "<td class='text-center'>".$rws['branch_id']."</td>";
                                    echo "<td>".$rws['branch_name']."</td>";
                                    echo "<td>".$rws['address'].'-'.$rws['zip'].'&nbsp'.$rws['city']."</td>";
                                    /*$mngr_id= $rws['mngr_id'];
                                    $sql3="SELECT * FROM employees WHERE employee_id='$mngr_id'";
                                    $result3=  mysqli_query($con , $sql3) or die( mysqli_error($con));
                                    $rws3= mysqli_fetch_assoc($result3);
                                    echo "<td>".$rws3['full_name']."</td>";*/
                                    echo "</tr>";
                                }
                                echo "<tr>";
                                echo "<td>";
                                echo "</td>";
                                echo '<td colspan = 6 align = "center"><button type="submit" class="btn btn-success btn-raised btn-block" name="submitBtn"><span class="fas fa-check"></span></button></td>';
                                    echo "</tr>";
                                echo "</table>";
                    ?>
                </form>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
    <?php include '../../footer.php' ?>
</body>
</html>