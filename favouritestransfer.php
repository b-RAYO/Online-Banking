<?php
    require '_include/dbconn.php';
    //require 'accounts.php';
    require 'auth.php'
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <script src="fontawesome\js\all.js"></script>
        <title>UNAITAS</title>
        <style>
            .mycontainer{
                border:10px solid green;
                
            }
            .myrow{
                border:5px solid red;
            }
            .mycol{
                border: 3px dotted blue;
            }
        </style>
    </head>
    <body>
    <?php
        $accno =mysqli_real_escape_string($con , $_POST['r_acc']);
        $sql = "SELECT * FROM favourites WHERE r_acc = '$accno'";
        $result = mysqli_query ($con, $sql) or die (mysqli_error($con));
        $rws = mysqli_fetch_assoc ($result);
        $accname = $rws['r_name'];
        include "customerheader.php";
    ?>
        <div class="container  mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="transferprocess.php" class="form-container" method = "POST" id="transferform">
                        <div class="form-group">
                            <label for="account_no"> Account Number </label>
                            <input type="number" class= "form-control" name='a_no' id = 'accountnumber' required value = "<?php echo $accno?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Account Holder </label>
                            <input type="text"  class= "form-control" name='receiver_name' id = 'accountname' value = "<?php echo $accname?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="amount"> Amount </label>
                            <input type="number"  class= "form-control" name = 'amount' required>
                        </div>
                        <button type='submit' class='btn btn-success btn-raised' 
                        name='submitBtn'>NEXT
                        </button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>
