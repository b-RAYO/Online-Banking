<?php
   include ("../_include/dbconn.php");
   $stafferror = "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="../js/jquery.js"></script>
        <script src="../js/popper.js"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-material-design.min.css">
        <script src="../bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../fontawesome\css\all.css">
        <script src="../fontawesome\js\all.js"></script>
        <title>UNAITAS - Login</title>
    </head>
    <body>
        <?php include "regular/staffheader.php";
        ?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                <?php
                    if(isset($_SESSION["stafferror"])){
                        $stafferror = $_SESSION["stafferror"];
                        echo "<p class='alert alert-danger' role='alert'>$stafferror</p>";
                    }
                ?>
                    <form class="form-container" action='staffloginprocess.php' method='POST'>
                        <h3 class="text-primary">Secure Login</h3>
                        <p><span class="error">* required field</span></p>
                        <div class="form-group">
                            <label>Employee Number:</label><span class = "error">*</span><br>
                            <input type="number" name="staff_id" class="form-control" required><br>
                        </div>
                        <div class="form-group">
                            <label>Password:</label><span class = "error">*</span><br>
                            <input type="password" name="pwd1" class="form-control" id = 'pwd1' required>
                            <input type = "checkbox" onclick = "showPwd()"> Show Password
                        </div>
                        <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">Login</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php include "../footer.php";
            unset( $_SESSION['stafferror']);
        ?>
        <script>
            function showPwd() {
            var x = document.getElementById("pwd1");

            if (x.type == "password") {
                x.type  = "text";
            }
            else {
                x.type = "password";
                }
            }
        </script>
    </body>
</html>