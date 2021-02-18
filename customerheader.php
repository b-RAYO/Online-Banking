<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top mb-5">
        <a href="accountsummary.php" class="navbar-brand"><img src="logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MAIN ACCOUNT
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="transferfunds1.php">TRANSFER FUNDS</a>
                <a class="dropdown-item" href="deposit.php">DEPOSIT FUNDS</a>
                <a class="dropdown-item" href="withdraw.php">WITHDRAW FUNDS</a>
                <a class="dropdown-item" href="selectdatestatement.php">ACCOUNT STATEMENT</a>
                <a class="dropdown-item" href="ministatement.php">MINI STATEMENT</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="tosavings.php">TRANSFER TO SAVINGS</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                SAVINGS ACCOUNT
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="savings.php">ACCOUNT</a>
                <a class="dropdown-item" href="requestsavings.php">OPEN SAVINGS ACCOUNT</a>
                <a class="dropdown-item" href="savingsselectdate.php">ACCOUNT STATEMENT</a>
                <a class="dropdown-item" href="savingsministatement.php">MINI STATEMENT</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="tomain.php">TRANSFER TO MAIN</a>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  FAVORITES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="favourites.php">VIEW FAVORITES</a>
                  <a class="dropdown-item" href="addfavourites.php">ADD FAVORITES</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="deletefavourites.php">DELETE FAVORITES</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  PROFILE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="editcustomer.php">EDIT PROFILE</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="changecustpwd.php">CHANGE PASSWORD</a>
                </div>
                <li class="nav-item">
                  <a class="nav-link" href="customerlogout.php">LOGOUT</a>
                </li>
              </li>
          </ul>
        </div>
      </nav>
</body>
</html>