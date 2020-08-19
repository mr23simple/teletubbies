<?php
session_start();
//Expire the session if user is inactive for 10 minutes or more.
$expireAfter = 10;
//Check to see if our "last action" session variable has been set.
if(isset($_SESSION['last_action'])){
    //Figure out how many seconds have passed since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long. Kill their session.
        session_unset();
        session_destroy();
    }
}
//Assign the current timestamp as the user's latest activity
$_SESSION['last_action'] = time();

//check if a user is logged in
if (isset($_SESSION['uName']))
{
    //user is already logged in
}
else
{
    $_SESSION['uName'] = "";
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Project Name Goes Here</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        
        <!-- Fontawesome -->
        <link rel="stylesheet" type="text/css" href="htts://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
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
                        <a class="nav-link" data-toggle="modal" href="#login"> 
                            <i class="far fa-user-circle"></i>
                            <?php
                                if ($_SESSION['uName'] == NULL)
                                {
                                    echo "login / register";    
                                }
                                else
                                {
                                    echo $_SESSION['uName'];
                                }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <div class="container-fluid">
            <!-- Search Bar -->
            <div class="container">
                <div class="row mt-5 pt-5 mx-auto">
                    <div class="col mx-auto">
                        <form class="form-inline my-2 my-lg-0 align-items-center justify-content-center">
                            <input class="form-control mr-sm-2 input-srch" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 btn-srch" type="submit">
                                <i class="fas fa-search" id="srch"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="divider mt-5 mb-5">
                <hr>
            </div>

            <!-- Produce -->
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
                            <div class="card-body">
                                <h5 class="card-title">Bell Pepper</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh bell peppers from local farmers. </p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
                            <div class="card-body">
                                <h5 class="card-title">Bell Pepper</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh bell peppers from local farmers. </p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
                            <div class="card-body">
                                <h5 class="card-title">Bell Pepper</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh bell peppers from local farmers. </p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
                            <div class="card-body">
                                <h5 class="card-title">Bell Pepper</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh bell peppers from local farmers. </p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
                            <div class="card-body">
                                <h5 class="card-title">Bell Pepper</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh bell peppers from local farmers. </p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
                            <div class="card-body">
                                <h5 class="card-title">Bell Pepper</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh bell peppers from local farmers. </p>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success btn-block">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- login modal -->
        <div class="modal fade" id="login">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float:left;">Log in</h4>
                        <button type="button" class="close" data-dismiss="modal" style="float:right">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="processlogin.php" method="post">
                            <div class="form-group">
                                <label for="uName">Username:</label> <input type="text"
                                class="form-control" id="uName" placeholder="Enter username"
                                name="uName" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                            <label for="pWord">Password:</label> <input type="password"
                                class="form-control" id="pWord" placeholder="Enter password"
                                name="pWord" required="required" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Log-in</button><br>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                    data-dismiss="modal" data-toggle="modal"
                                    data-target="#register">Register
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <p>Copyright Copyright Copyright Copyright Copyright</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- register modal -->
        <div class="modal fade" id="register">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float:left;">Register</h4>
                        <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                        data-target="#login" style="float:right">&times;</button>
                    </div>

                    <div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
                        <form action="register.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="eMail">Enter email address:</label> <input type="text"
                                class="form-control" id="eMail" placeholder="Enter email address"
                                name="eMail" required="required" autocomplete="off" autofocus>
                            </div>

                            <!-- password complexity -->
                            <b><p>Password must contain the following:</p></b>
                            <p>-at least one upper case letter</p>
                            <p>-at least one lower case letter</p>
                            <p>-at least one number</p>
                            <p>-at least eight(8) characters long</p>

                            <div class="form-group">
                                <label for="pWord">Enter password:</label> <input type="password"
                                class="form-control" id="pWord" placeholder="Enter password"
                                name="pWord" required="required" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <label for="pwd">Confirm Password:</label> <input type="password"
                                class="form-control" id="cpWord" placeholder="Confirm Password"
                                name="cpWord" required="required" autocomplete="off">
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Submit</button><br>
                            </div>
                            <div class="form-group">
                            <button type="button" class="btn btn-primary"
                            data-dismiss="modal" data-toggle="modal"
                            data-target="#login" >Previous
                            </button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <p>Copyright Copyright Copyright Copyright Copyright</p>
                    </div>
                </div>
            </div>
        </div>

        <script src="" async defer></script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>