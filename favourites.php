<?php
include '_include/dbconn.php';
require 'accounts.php';
require 'auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>UNAITAS</title>
</head>
<body>
        <?php include "customerheader.php";
            $sender_acc=$_SESSION["accno"];
            $sql="SELECT * FROM favourites WHERE s_acc='$sender_acc'";
            $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
        ?>
    <div class="container bg">
        <div class=" d-flex ml-auto p-2 justify-content-end text-success">Welcome <?php echo $_SESSION['name']?></div>
                        <?php
                         if (mysqli_num_rows($result) < 1){
                            echo "<div class='d-flex justify-content-center text-danger'>";
                            echo "<h2>NO FAVOURITES ADDED! \n";
                            echo "&nbsp PLEASE &nbsp <A HREF='addfavourites.PHP'>CLICK HERE</A> &nbsp TO ADD.</h2>";
                            echo "</div>";
                        }
                        else {
                            echo '<h3 style="text-align:center;color:#2E4372;"><u>Favorites</u></h3>
                            <table class="table table-striped mb-5" align="center">
                                <thead class="thead-dark">
                                <th scope="col">Account No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date Requested</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date Approved</th>
                                </thead>';
                        while($rws=    mysqli_fetch_assoc($result)){

                            echo "<tr>";
                            echo "<td>".$rws['r_acc']."</td>";
                            echo "<td>".$rws['r_name']."</td>";
                            echo "<td>".$rws['dateadded']."</td>";
                            echo "<td>".$rws['status']."</td>";
                            echo "<td>".$rws['dateapproved']."</td>";
                            echo "</tr>";

                        }
                        echo "</table>";
                    }
                        ?>
            <br>
            <br>
            <br>
            <br>
            <br>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>