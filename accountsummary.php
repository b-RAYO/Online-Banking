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
    <title>Account Summary</title>
</head>
<body>
    <?php include "customerheader.php"?>
        <div class="container mt-5 mb-5">
            <div class="wrapper">
                <?php
                    $_SESSION['accno'] = $accounts['account_no'];
                    $_SESSION['name'] = $accounts['full_name'];
                    $branch_code = $accounts['branch_id'];
                    $sql = "SELECT * FROM branches WHERE branch_id = '$branch_code'";
                    $result = mysqli_query($con, $sql);
                    $branch = mysqli_fetch_assoc($result);
                ?>
                <p class="alert-success alert alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>SUCCESS.</strong>You last logged in on : <?php echo $_SESSION["login"]?> EAT
                </p>
                <div class="card-deck mb-5 mt-5">
                    <div class="card">
                        <table class="table table-striped mb-5" align="center">

                            <thead class="thead-dark" align=center>
                                <th colspan=2  scope="col">
                                    Personal Information
                                </th>
                            </thead>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $accounts['full_name'];?></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $accounts['email'];?></td>
                                </tr>
                                    <td>Phone No.</td>
                                    <td><?php echo $accounts['phone_no'];?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo  $accounts['address'].'-'.$accounts['zip'].'&nbsp'.$accounts['city']?></td>
                                </tr>
                                <tr>
                                    <td>Branch Name</td>
                                    <td><?php echo $branch['branch_name'];?></td>
                                </tr>
                        </table>
                    </div>

                    <div class="card">
                        <table class="table table-striped mb-5" align="center">
                            <thead class="thead-dark" align=center>
                                <th colspan=2  scope="col">
                                    Account Information
                                </th>
                            </thead>
                                <tr>
                                    <td>Account No</td>
                                    <td><?php echo $accounts['account_no'];?></td>
                                </tr>
                                <tr>
                                    <td>Account Balance</td>
                                    <td><?php echo $accounts['account_bal'];?></td>
                                </tr>
                                <tr>
                                    <td>Minimum Balance</td>
                                    <td><?php echo $accounts['min_bal'];?></td>
                                </tr>
                                <tr>
                                    <td>Branch Name</td>
                                    <td><?php echo $branch['branch_name'];?></td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php include "footer.php"?>
</body>
</html>