<?php
    session_start();
    //Expire the session if user is inactive for 10 minutes or more.
    $expireAfter = 10;
    //Check to see if our "last action" session variable has been set.
    if(isset($_SESSION['last_action']))
    {
        //Figure out how many seconds have passed since the user was last active.
        $secondsInactive = time() - $_SESSION['last_action'];
        //Convert our minutes into seconds.
        $expireAfterSeconds = $expireAfter * 60;
        //Check to see if they have been inactive for too long.
        if($secondsInactive >= $expireAfterSeconds)
        {
            //User has been inactive for too long. Kill their session.
            session_unset();
            session_destroy();
            Print '<script>alert("Session expired due to inactivity.");</script>';
        }   
    }
//Assign the current timestamp as the user's latest activity
$_SESSION['last_action'] = time();

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Fontawesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <script>
            function logout() {
            alert("You have been logged out.");
            }
        </script>
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
                    <?php if(isset($_SESSION["type"])) //get user type
                    {
                        $role = $_SESSION["type"];
                        if($role=="Admin")
                        { ?>
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="views/admin.php">Admin</a>
                            </li>
                        <?php } ?> 
                        <li class="nav-item mx-3">
                        <a class="nav-link " href="#">Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="views/cart.php">Cart</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="views/order.php">Orders</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item mx-3">
                        <?php if(isset($_SESSION['eMail'])) 
                        {?>
                        <div class="dropdown show">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['eMail'];?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="views/user.php">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="controllers/logout.php" onclick="logout()">Logout</a>
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

            <!-- Products -->
            <?php
            $query = $conn->prepare("SELECT * FROM product"); // displays all products
            $query->execute(); // actually perform the query
            $result = $query->get_result(); // retrieve the result so it can be used inside PHP
            $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

            if ($result -> num_rows > 0)
            {
                echo '<div class="container">
                <div class="row row-cols-1 row-cols-md-3">';
                do
                {
                    echo '
                    <div class="col mb-4">
                        <div class="card">
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="product">
                            <div class="card-body">
                                <h5 class="card-title">'.$r["product_name"].'</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>'.$r["product_price"].'</h6>
                                <p class="card-text">'.$r["product_description"].'</p>
                            </div>
                            <div class="card-body">';
                                //echo $r['productId'];
                                echo "<a href='#' onclick='javascript:setval(".$r['productId'].")' class='editProduct btn btn-success btn-block' data-toggle='modal' data-id='".$r['productId']."' 
                                data-target='#editModal' type='submit' name='selectedProduct' Value='".$r['productId']."'>".$r['productId']."</a>";                  
                                echo '
                            </div>
                        </div>
                    </div>';
                }
                while ($r = $result -> fetch_assoc());
                echo '</div>
                </div>';
            }
            else
            {
                echo 'No products found.';
            }
            ?>
        </div>

       <!-- login modal -->
        <div class="modal fade" id="login">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float:left;">Sign In</h4>
                        <button type="button" class="close" data-dismiss="modal" style="float:right">&times;</button>
                    </div>

                    <div class="modal-body px-4 py-5">
                        <form action="controllers/login.php" method="post">
                            <div class="form-group">
                                <label for="eMail">Email:</label> <input type="text"
                                class="form-control" id="eMail" placeholder="Enter email address"
                                name="eMail" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                            <label for="pWord">Password:</label> <input type="password"
                                class="form-control" id="pWord" placeholder="Enter password"
                                name="pWord" required="required" autocomplete="off">
                            </div>

                            <div class="form-group row mt-5">
                            <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Proceed
                                    </button>
                                    <span class="register-link text-muted text-center">
                                        I want to 
                                        <a href="#"
                                        data-dismiss="modal" data-toggle="modal"
                                        data-target="#register">
                                            register
                                        </a>
                                         .
                                    </span>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer align-items-center justify-content-center">
                        <p class="text-muted text-center">Copyright &copy; Telebubbies 2020</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- register modal -->
        <div class="modal fade" id="register">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float:left;">Sign Up</h4>
                        <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                        data-target="#login" style="float:right">&times;</button>
                    </div>

                    <div class="modal-body px-4 py-5" style="max-height: calc(100vh - 210px); overflow-y: auto;">
                        <form action="controllers/register.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="name">Organization's / Person's Name :</label> <input type="text"
                                class="form-control" id="name" placeholder="Please enter name"
                                name="name" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="custom-control custom-switch mb-3">
                                <input type="hidden" name="customSwitch1" value=0 />
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="customSwitch1" value=1>
                                <label class="custom-control-label" for="customSwitch1">A Corporate Client?</label>
                            </div>

                            <div class="form-group">
                                <label for="eMail">Email Address</label> <input type="text"
                                class="form-control" id="eMail" placeholder="Please enter email address"
                                name="eMail" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="pNum">Mobile Number</label> <input type="text"
                                class="form-control" id="pNum" placeholder="Please enter mobile number"
                                name="pNum" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="loc">Address</label> <input type="text"
                                class="form-control" id="loc" placeholder="Please enter address"
                                name="loc" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="pWord">Password</label> <input type="password"
                                class="form-control" id="pWord" placeholder="Please enter password"
                                name="pWord" required="required" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <label for="pwd">Confirm Password</label> <input type="password"
                                class="form-control" id="cpWord" placeholder="Please confirm Password"
                                name="cpWord" required="required" autocomplete="off">
                            </div>

                            <!-- password complexity -->
                            <b>
                                <p class="text-muted">
                                    Password requirements:
                                </p>
                            </b>
                            
                            <ul>
                                <li class="text-muted font-italic">
                                    At least one upper case letter.
                                </li>
                                <li class="text-muted font-italic">
                                    At least one lower case letter.
                                </li>
                                <li class="text-muted font-italic">
                                    At least one number.
                                </li>
                                <li class="text-muted font-italic">
                                    At least eight(8) characters in length.
                                </li>
                            </ul>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-secondary btn-block"
                                    data-dismiss="modal" data-toggle="modal"
                                    data-target="#login">
                                        Previous
                                    </button>                               
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Submit
                                    </button>                                
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer align-items-center justify-content-center">
                        <p class="text-muted text-center">Copyright &copy; Telebubbies 2020</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- update product modal -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float:left;">Update</h4>
                        <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                         style="float:right">&times;</button>
                    </div>

                    <div class="modal-body px-4 py-5 checkout-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
                        <form action="controllers/checkout.php" method="post" autocomplete="off">
                            <!-- 
                                display product details here
                            -->

                            <input type="hidden" name="selectedProduct" id="selectedProduct" value=""/>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer align-items-center justify-content-center">
                        <p class="text-muted text-center">Copyright &copy; Telebubbies 2020</p>
                    </div>
                </div>
            </div>
        </div>

        <script>//pass value to modal
        var mysample = '';
        function setval(varval)
        {
            mysample= varval;//get parameter from js func call
            //alert(mysample);
            $('input[name="selectedProduct"]').val(mysample);
        }

        </script>
        
        <script src="" async defer></script>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>