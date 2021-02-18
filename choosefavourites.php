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
        <?php include "customerheader.php";?>
        <div class="container bg">
            <?php
                $sender_acc=$_SESSION["account_no"];
                $sql="SELECT * FROM favourites WHERE s_acc='$sender_acc' AND status = 'APPROVED'";
                $result=  mysqli_query($con , $sql) or die( mysqli_error($con));

                echo '<br><br>';
                echo '<form action = "favouritestransfer.php" method = "POST">';

                    if (mysqli_num_rows($result) < 1){
                            echo "<div class='d-flex justify-content-center text-danger'>";
                            echo "NO FAVOURITES ADDED! \n";
                            echo "&nbsp PLEASE &nbsp <A HREF='addfavourites.PHP'>CLICK HERE</A> &nbsp TO ADD.";
                            echo "</div>";
                        }
                    else {
                            echo '<h3 style="text-align:center;color:#2E4372;"><u>Favorites</u></h3>
                                <table class="table table-striped mb-5" align="center">
                                    <thead class="thead-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date Requested</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Approved</th>
                                    </tr>';
                                    while($rws=    mysqli_fetch_assoc($result)){

                                        echo "<tr>";
                                        echo "<tr><td><input type='radio' name='r_acc' value=".$rws['r_acc'];
                                        echo ' checked';
                                        echo "<td></td>";
                                        echo "<td>".$rws['r_name']."</td>";
                                        echo "<td>".$rws['dateadded']."</td>";
                                        echo "<td>".$rws['status']."</td>";
                                        echo "<td>".$rws['dateapproved']."</td>";
                                        echo "</tr>";
                                        echo "<tr align='center'>";
                                        echo "<td colspan=6>";
                                        echo "<button type='submit' class='btn btn-success btn-raised'
                                        name='submitBtn'>NEXT
                                        </button></td>";
                                        echo "</tr> ";
                                echo "</table>";
                            }
                    }
            ?>
            </form>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>