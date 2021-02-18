<?php
    require "../../_include/dbconn.php";

    if(!isset($_SESSION['admin_login']))
        header('location:stafflogin.php');
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
        <title>UNAITAS-Account Statement</title>
    </head>
    <body>
        <?php include 'adminnavbar.php';
            $id = $_POST['a_no'];
            $query = mysqli_query($con , "SELECT accounts.account_no,accounts.customer_id,accounts.branch_id,transcations.* FROM accounts INNER JOIN transcations ON accounts.account_no = transcations.account_no WHERE transcations.account_no = '$id'");
            $result = mysqli_fetch_assoc($query);
            $c_id = $result['customer_id'];
            $b_id = $result['branch_id'];
            $sql1 = mysqli_query($con,"SELECT * FROM customers WHERE customer_id = '$c_id'");
            $rws1 = mysqli_fetch_assoc($sql1);

            $sql2 = mysqli_query($con,"SELECT * FROM branches WHERE branch_id = '$b_id'");
            $rws2 = mysqli_fetch_assoc($sql2);

        ?>
            <div class="container mt-5 mb-5">
                <div class=" d-flex ml-auto p-2 justify-content-center"><?php echo "NAME: ".strtoupper($rws1['full_name']);  echo nl2br("\n ACCOUNT NUMBER: ".strtoupper($result['account_no']));?></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-5" align="center">
                            <thead class="thead-dark" align=center >
                                <th scope="col">
                                    DATE
                                </th>
                                <th scope="col">
                                    DESCRIPTION
                                </th scope="col">
                                <th>
                                    DEBIT
                                </th>
                                <th scope="col">
                                    CREDIT
                                </th>
                                <th scope="col">
                                    BALANCE
                                </th>
                            </thead>
                            <?php
                                while($rws= mysqli_fetch_assoc($query)){
                                    echo "<tr>";
                                    echo "<td>".$rws['date']."</td>";
                                    echo "<td>".$rws['description']."</td>";
                                    echo "<td>".$rws['debit']."</td>";
                                    echo "<td>".$rws['credit']."</td>";
                                    echo "<td>".$rws['account_bal']."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php include '../../footer.php';?>
    </body>
</html>