<?php
    require '_include/dbconn.php';
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
        <title>UNAITAS-Home</title>
    </head>
    <body>
        <?php include "customerheader.php"?>
        <div class="container">
            <div class="row"></div>
                <div class="col d-flex justify-content-end text-success">
                    Welcome <?php echo $_SESSION['name'] ?>
                </div>
                <div class="col mt-5">
                    <h3 style="text-align:center;color:#2E4372;"><u>Account Statement</u></h3>

                    <form action="accountstatement.php" method="POST">
                        <p align="center">Please select the duration</p>
                        <table align="center">
                            <tr><td>Start Date [mm/dd/yyyy] </td><td>
                            <input type="date" name="date1" required></td></tr>

                            <tr><td>End Date [mm/dd/yyyy] </td><td>
                            <input type="date" name="date2" required></td></tr>
                        </table>
                        <br>
                        <table align="center">
                            <tr>
                                <td colspan="2" align='center' >
                                    <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">
                                        Next
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>
