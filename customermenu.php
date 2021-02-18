<nav class="navbar navbar-expand-md navbar-dark bg-dark top_nav">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class=" navbar-nav ">
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" data-toggle="collapse"aria-expanded="false" href="#summary">Accounts</a>
                <div class="dropdown-menu" id="summary">
                    <div class="dropdown-item">
                        <a href="#main" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Main Account</a>
                        <div class="dropdown-menu" id="main">

                            <a class="dropdown-item" href="transferfunds1.php">Transfer Funds</a>

                            <a class="dropdown-item" href="selectdatestatement.php">Account Statement</a>

                            <a class="dropdown-item" href="ministatement.php">Mini statement</a>

                            <a class="dropdown-item" href="tosavings.php">Tranfer to Savings Account</a>

                        </div>
                    </div>

                    <a href="#savings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Savings Account</a>
                    <div class="dropdown-menu" id="savings">

                            <a class="dropdown-item" href="savings.php">Savings Account</a>

                            <a class="dropdown-item" href="requestsavings.php">Open Savings Account</a>

                            <a class="dropdown-item" href="savingsaccountstatement.php">Account Statement</a>

                            <a class="dropdown-item" href="savingsministatement">Mini Statement</a>

                            <a class="dropdown-item" href="tomain.php">Transfer to Main Account</a>

                    </div>
                </div>
            </li>
            <li>
                <a class= "dropdown-toggle" data-toggle="collapse"aria-expanded="false" href="#favourites">Favorites</a>
                <div class="dropdown-menu" id="favourites">

                    <a class="dropdown-item" href="favourites.php">Favorites</a>

                    <a class="dropdown-item" href="addfavourites.php">Add Favorites</a>
                
                    <a class="dropdown-item" href="editfavourites.php">Edit Favorites</a>
                
                    <a class="dropdown-item" href="deletefavourites.php">Delete Favorites</a>
                
                </div>
            </li>
            <li>
                <a class=" dropdown-toggle" data-toggle="collapse"aria-expanded="false" href="#profile">Profile</a>
                <div class="dropdown-menu" id="profile">
                    
                        <a class="dropdown-item" href="editcustomer.php">Edit Profile</a>
                    
                        <a class="dropdown-item" href="changepassword.php">Change Password</a>
                    
                </div>
            </li>
            <li>
                <a class="nav-item" href="customerlogout.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>