<?php
  include "../../_include/dbconn.php";
  if(!isset($_SESSION['admin_login']))
    header('location:stafflogin.php');
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
    <title>Edit Account</title>
  </head>
  <body>
    <?php include '..\..\staff\admin\adminnavbar.php';
        $id = $_POST['a_no'];
        $query = mysqli_query($con , "SELECT * FROM accounts WHERE account_no = '$id'");
        $result = mysqli_fetch_assoc($query);
    ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <form method="post" action="adminalteraccount.php" class="form-container mt-3 mb-5">
            <legend class="text-primary">
              Edit Account
            </legend>
            <p>
              <span class="error">
                * required fields
              </span>
            </p>
            <div class="form-group">
                <label for="account_no">Account Number</label><span class="error">*</span>
                <input type="number" class="form-control" name="a_no" id="a_no" value="<?php echo $result['account_no']?>" readonly>
            </div>
            <div class="form-group">
              <label>Minimum Bal</label><span class = "error">* <br></span>
              <input type="text" class="form-control" name="minbal" value="500" required readonly>
            </div>
            <div class="form-group">
              <label>Account Bal</label><span class = "error">* <br></span>
              <input type="number" class="form-control" id="accbal" name="accbal" onchange= "accBalance()" value="<?php echo $result['account_bal']?>" required>
              <span id= "lessbal"></span>
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
                $result2 = mysqli_query ($con, $bquery);
                $options1 = "";
                while($row1 = mysqli_fetch_array($result2))
                $options1 .= '<option value="' . $row1[0] . '">' .  $row1[1] . '</option>';

                $branch_id= $result['branch_id'];
                $customer_id=$result['customer_id'];
                $sql2="SELECT * FROM customers WHERE customer_id='$customer_id'";
                $result2=  mysqli_query($con , $sql2) or die( mysqli_error($con));
                $rws2= mysqli_fetch_assoc($result2);
                $sql3="SELECT * FROM branches WHERE branch_id='$branch_id'";
                $result3=  mysqli_query($con , $sql3) or die( mysqli_error($con));
                $rws3= mysqli_fetch_assoc($result3);
                $branch_name=$rws3['branch_name'];
              ?>
            <div class="form-group">
              <label>Branch</label><span class = "error">* </span><br>
              <select name="branch" class="form-control">
              <?php echo "<option value='$branch_name' selected='selected'>$branch_name</option>?>";
                echo $options1;?>
              </select>
            </div>
            <div class="form-group">
              <label>Customer</label><span class = "error">* </span><br>
              <input type="text" class="form-control" name="customer" value="<?php echo $rws2['full_name']?>"required>
            </div>
            <div class="form-group">
              <label>Account Status</label><span class = "error">* </span><br>
              <select class="form-control" name="status">
                <option value=""><?php echo $rws2['acc_status']?></option>
								<option value="ACTIVE">ACTIVE</option>
								<option value="PENDING">PENDING</option>
                <option value="DISABLED">DISABLED</option>
                <option value="CLOSED">CLOSED</option>
                <option value="REJECTED">REJECTED</option>
							</select>
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-block btn-raised" name="submit">SAVE</button>
          </form>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </div>
  <?php include "../../footer.php"?>
  </body>
</html>