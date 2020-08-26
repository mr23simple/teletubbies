<!-- Navbar -->
<nav class="mainNav navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand ml-5" href="../index.php">Farmers Connect</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
          
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-5">
            <?php if(isset($_SESSION["type"])) //get user type
            {
                $role = $_SESSION["type"];
                if($role=="Admin")
                { ?>
                    <li class="nav-item mx-3">
                        <a class="nav-link " href="admin.php">Admin</a>
                    </li>
                <?php }
            } ?>
            <li class="nav-item mx-3">
                <a class="nav-link " href="../index.php">Home</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="order.php">Orders</a>
            </li>
            <li class="nav-item mx-3">
                <?php if(isset($_SESSION['eMail'])) 
                {?>
                <div class="dropdown show">
                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['eMail'];?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="user.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controllers/logout.php" onclick="logout()">Logout</a>
                    </div>
                </div>
                    <?php }
                else
                { ?>
                    <a class="nav-link" data-toggle="modal" href="#login"> 
                    <i class="far fa-user-circle"></i>
                    <?php echo "login / register";  
                    echo "</a>";
                } ?>
            </li>
        </ul>
    </div>
</nav>