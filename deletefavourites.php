<?php
require '_include/dbconn.php';
require 'accounts.php';
require 'auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js\jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>UNAITAS</title>
</head>
<body>
    <?php include "customerheader.php"?>
    <div class="container">
       <div class="text-success d-flex justify-content-end">Welcome <?php echo $_SESSION['name']?></div>
            <?php
        $sender_acc=$_SESSION["accno"];
        $sql="SELECT * FROM favourites WHERE s_acc='$sender_acc'";
        $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
        ?>
    <form class="mt-5" action = 'deletefavouritesprocess.php' method = 'POST'>

                        <?php
                            if (mysqli_num_rows($result) < 1){
                            echo "<div class='d-flex justify-content-center text-danger'>";
                            echo "NO FAVOURITES ADDED!";
                            echo "</div>";
                            }
                            else {
                    echo '<h3 style="text-align:center;color:#2E4372;"><u>Favorites</u></h3>
                    <table class="table table-striped mb-5" align="center">
                        <thead class="thead-dark">
                        <th scope="col">Account No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                       <th scope="col">Date Approved</th>
                        </thead>';
                        while($rws=    mysqli_fetch_assoc($result)){

                            echo "<tr><td><input type='radio' name='r_acc' value=".$rws['r_acc'];
                            echo ' checked';
                            echo "<td>".$rws['r_acc']."</td>";
                            echo "<td>".$rws['r_name']."</td>";
                            echo "<td>".$rws['status']."</td>";
                            echo "<td>".$rws['dateapproved']."</td>";
                            echo "</tr>";

                        }
                        echo "<tr>";
                            echo '<td colspan = 4 align = "center"> <button type="submit" class="btn btn-success btn-raised" name="submit">DELETE BENEFICIARY</button> </td>';
                            echo "</tr>";

                        echo '</table>';
                    }
                        ?>

</div>
    </form>


        <?php include 'footer.php' ?>
    </div>

</body>
</html>