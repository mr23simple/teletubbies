<?php
require_once('partials/header.php');

require_once('partials/nav.php');

?>
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
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
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
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
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
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
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
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
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
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
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
                            <img src="assets/images/bell_pepper.jpg" class="card-img-top product-img mx-auto my-auto" alt="vegetables">
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
                        <h4 class="modal-title" style="float:left;">Sign In</h4>
                        <button type="button" class="close" data-dismiss="modal" style="float:right">&times;</button>
                    </div>

                    <div class="modal-body px-4 py-5">
                        <form action="processlogin.php" method="post">
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
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
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

<?php
require_once('partials/footer.php');
?>