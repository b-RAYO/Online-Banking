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
        <script src="..\..\js\popper.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
        <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="..\..\css\style.css">
        <link rel="stylesheet" href="..\..\fontawesome\css\all.css">
        <script src="..\..\fontawesome\js\all.js"></script>
        <title>UNAITAS</title>
    </head>
    <body>
    <?php include "staffnavbar.php";
        echo '<div class="container mt-5">';
                $sql="SELECT * FROM favourites WHERE status='PENDING'";
                $result=  mysqli_query($con , $sql) or die( mysqli_error($con));

            echo '<form action="approvefavouritesprocess.php" method="POST">';
                if (mysqli_num_rows($result) < 1){
                    echo "<div class='d-flex justify-content-center text-danger'>";
                    echo "NO REQUESTS AVAILABLE!";
                    echo "</div>";
                }
                else {
                    echo' <div class="table-responsive">
                    <table class="table table-striped mb-5" align="center">
                    <thead class="thead-dark">
                    <th scope="col">id</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Sender Account No:</th>
                    <th scope="col">Reciever</th>
                    <th scope="col">Reciever Account No:</th>
                    <th scope="col">Status</th>
                    </thead>';
                    while($rws=    mysqli_fetch_assoc($result)){
                        echo "<tr><td><input type='radio' name='customer_id' value=".$rws['id'];
                        echo ' checked';
                        echo " /></td>";
                        echo "<td>".$rws['s_name']."</td>";
                        echo "<td>".$rws['s_acc']."</td>";
                        echo "<td>".$rws['r_name']."</td>";
                        echo "<td>".$rws['r_acc']."</td>";
                        echo "<td>".$rws['status']."</td>";
                        echo "</tr>";
                }
                    echo "<tr>";
                    echo "<td colspan=3>";
                    echo "<button type='submit' class='btn btn-success btn-raised' name='submit_id'>APPROVE</button></td>";
                    echo "<td colspan=3>";
                    echo "<button type='submit' class='btn btn-success btn-raised' name='reject_id'>REJECT</button></td>";
                    echo "</table>";
                    echo "</div>";
                }
            echo '</form>';
            ?>
        </div>
        <?php include '../../footer.php' ?>
    </body>
</html>
