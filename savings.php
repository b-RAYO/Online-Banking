<?php

include '_include/dbconn.php';
require 'savingsprocess.php';
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
    <title>Savings Account</title>
</head>
<body>
    <?php include 'savingsmenu.php'?>
    <div class="container">
        <?php
            $_SESSION['saccno'] = $savings['account_no'];
            $_SESSION['name'] = $savings['full_name'];
            $branch_code = $savings['branch_id'];
            $sql = "SELECT * FROM branches WHERE branch_id = '$branch_code'";
            $result = mysqli_query($con, $sql);
            $branch = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($rws) < 1) {
                echo "<h4 class='mt-5 mb-5 text-danger d-flex justify-content-center'>SORRY YOU DO NOT HAVE A SAVINGS ACCOUNT. PLEASE &nbsp <A HREF='requestsavings.php'>CLICK HERE</A> &nbsp TO OPEN ONE.</h4>";
            }
            else {
                echo '<div class="card-deck mb-5 mt-5">

                            <div class="card">
                                <div class="card-header text-center bg-secondary text-light">Personal Information</div>
                                <table class="table table-striped">
                                    <tr>
                                        <td>Name</td>
                                        <td>'. $savings['full_name'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Phone No.</td>
                                        <td>'. $savings['phone_no'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>'. $savings['email'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>'. $savings['address'].'-'.$savings['zip'].'&nbsp'.$savings['city'].'</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card">
                            <div class="card-header text-center bg-secondary text-light">Account Information</div>
                            <table class="table table-striped">
                                <tr>
                                    <td>Account Number</td>
                                    <td>'. $savings['account_no'].'</td>
                                </tr>
                                <tr>
                                    <td>Account Balance</td>
                                    <td>'. $savings['account_bal'].'</td>
                                </tr>
                                <tr>
                                    <td>Date Opened</td>
                                    <td>'. $savings['date_opened'].'</td>
                                </tr>
                                <tr>
                                    <td>Branch Name</td>
                                    <td>'. $branch['branch_name'].'</td>
                                </tr>

                            </table>
                            </div>

                    </div>';
                /**echo '<h3 style="text-align:center;color:#2E4372;"><u>Savings Account</u></h3>
                <table class="table table-striped mb-5" align="center">
                    <thead class="thead-dark" align=center>
                        <th colspan=2  scope="col">
                            Personal Info
                        </th>
                    </thead>
                </table>';
                echo "<p>Name:" . $savings['full_name']."</p>";
                echo "<p>Gender: ". $savings['gender']." </p>";
                echo "<p>Mobile:" . $savings['phone_no']."</p>";
                echo "<p>Email:" . $savings['email']."</p>";
                echo "<p>Account No:" .$savings['account_no']."</p>";
                echo "<p>Account Type: Savings &nbsp &nbsp <a href='accountsummary.php'>Main Account</a></p>";
                echo "<p>Account Balance:" . $savings['account_bal']."</p>";
                echo "<p>Minimum Balance:" . $savings['min_bal']."</p>";
                echo "<p>Date Opened:" . $savings['date_opened']."</p>";
                echo "<p>Target Amount:" . $savings['target_amount']."</p>";
                echo "<p>End Date:" . $savings['end_date']."</p>";
                echo "<p>Branch Code:" . $savings['branch_id']."</p>";
                echo "<p>Branch Name:" . $branch['branch_name']."</p>";**/
                }
        ?>

    </div>
    <?php include 'footer.php' ?>
</body>
</html>