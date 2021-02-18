<?php
require_once '../../_include/dbconn.php';
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
<?php include "staffnavbar.php";?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="admineditcustomer.php" class="form-container" method="POST">
                    <div class="form-group">
                        <label for="accnumber">Account Number</label>
                        <input type="number" name="c_id" id="c_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">
                        SEARCH
                    </button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <?php include "../../footer.php";?>
</body>
</html>
