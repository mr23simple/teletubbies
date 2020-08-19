<!-- Navbar -->
<nav class="mainNav navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand ml-5" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
          
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item active mx-3">
                <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">Cart</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="#">Orders</a>
            </li>
            <li class="nav-item mx-3">
                <?php if(isset($_SESSION['eMail'])) 
                {?>
                    <a class="nav-link" href="#"> 
                    <i class="far fa-user-circle"></i>
                    <?php echo $_SESSION['eMail']; 
                    echo "</a>";
                }
                else
                { ?>
                    <a class="nav-link" data-toggle="modal" href="#login"> 
                    <i class="far fa-user-circle"></i>
                    <?php echo "login / register";  
                    echo "</a>";
                }?>
            </li>
        </ul>
    </div>
</nav>