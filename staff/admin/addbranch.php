<?php
  include "../../_include/dbconn.php";
?>
<!doctype html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="../../js/jquery.js"></script>
        <script src="..\..\js\popper.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
        <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../fontawesome\css\all.css">
        <script src="../../fontawesome\js\all.js"></script>
        <title>Add Branch</title>
    </head>
    <body>
    <?php include '..\..\staff\admin\adminnavbar.php'?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <legend class="text-primary">
                        Add Branch
                </legend>
                <form action="addbranchprocess.php" class="form-container" method="post">
                    <div class="form-group">
                        <label for="b_name">Branch Name</label><span class="error">*</span>
                        <input type="text" name="b_name"class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label><span class="error">*</span>
                        <input type="number" name="address"class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Zip</label><span class="error">*</span>
                        <input type="number" name="zip"class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label><span class="error">*</span>
                        <input type="text" name="city"class="form-control" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block btn-raised" name="submit">CREATE</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
    <?php include '../../footer.php' ?>
    </body>
</html>
