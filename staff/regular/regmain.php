<?php
  include "../../_include/dbconn.php";
  require 'staffauth.php';
?>
<!doctype html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/popper.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-material-design.min.css">
    <script src="../../bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../fontawesome\css\all.css">
    <script src="../../fontawesome\js\all.js"></script>
    <title>Create Account</title>
  </head>
  <body>
  <?php include "staffnavbar.php"?>
    <div class="container">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <form method="post" action="regmainprocess.php" class="form-container mt-3 mb-5">
            <legend class="text-primary">
              Create Account
            </legend>
            <p>
              <span class="error">
                * required fields
              </span>
            </p>
            <div class="form-group">
              <label>Minimum Bal</label><span class = "error">* <br></span>
              <input type="text" class="form-control" name="minbal" value="500" required readonly>
            </div>
            <div class="form-group">
              <label>Account Bal</label><span class = "error">* <br></span>
              <input type="number" class="form-control" id="accbal" name="accbal" onchange= "accBalance()" value="<?php /*echo $accbal;*/?>" required>
              <span id= "lessbal" class="error"></span>
              <script>
                $(document).ready(function () {
                $('#accbal').keyup(function () {
                checkBal ($(this).val());
                function checkBal(){
                  if ($('#accbal').val() < 500){
                    $('#lessbal').text('Please enter an amount greater than Ksh.500');
                  }
                  else {
                    $('#lessbal').text('');
                      }
                    }
                  });
                });
              </script>
            </div>
                <?php
                $bquery = "SELECT * FROM branches";

                $result = mysqli_query ($con, $bquery);
                $options1 = "";
                while($row1 = mysqli_fetch_array($result))
                $options1 .= '<option value="' . $row1[0] . '">' .  $row1[1] . '</option>';
                ?>
              <div class="form-group">
                  <label>Branch</label><span class = "error">* </span><br>
                  <select name="branch_id" class="form-control">
                          <option value=""></option>
                            <?php echo $options1;?>
                    </select>
              </div>
                <?php
                $cquery = "SELECT * FROM customers WHERE acc_status = 'pending'";
                $result = mysqli_query ($con, $cquery);
                $options2 = "";
                while($row2 = mysqli_fetch_array($result))
                $options2 .= '<option value="' . $row2[0] . '">' .  $row2[1] . '</option>';
                ?>
              <div class="form-group">
                  <label>Customer ID</label><span class = "error">* </span><br>
                  <select name="customer_id" class="form-control">
                          <option value=""></option>
                            <?php echo $options2;?>
                    </select>
              </div>
                    <br>
              <button type="submit" class="btn btn-success btn-block btn-raised" name="submit">CREATE</button>
          </form>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </div>
  <?php include "../../footer.php"?>
  </body>
</html>