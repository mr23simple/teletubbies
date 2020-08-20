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
                                <h5 class="card-title">Admin Power</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh Admin Powers from local farmers. </p>
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
                                <h5 class="card-title">Admin Power</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh Admin Powers from local farmers. </p>
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
                                <h5 class="card-title">Admin Power</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh Admin Powers from local farmers. </p>
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
                                <h5 class="card-title">Admin Power</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh Admin Powers from local farmers. </p>
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
                                <h5 class="card-title">Admin Power</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh Admin Powers from local farmers. </p>
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
                                <h5 class="card-title">Admin Power</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><span>PHP </span>250</h6>
                                <p class="card-text">Fresh Admin Powers from local farmers. </p>
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
                        <form action="controllers/login.php" method="post">
                            <div class="form-group">
                                <label for="eMail">Email:</label> <input type="text"
                                class="form-control" id="eMail" placeholder="Enter username"
                                name="eMail" required="required" autocomplete="off" autofocus>
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
                                <label for="uName">Enter username:</label> <input type="text"
                                class="form-control" id="uName" placeholder="username"
                                name="uName" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="eMail">Enter email address:</label> <input type="text"
                                class="form-control" id="eMail" placeholder="email address"
                                name="eMail" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="pNum">Enter phone number:</label> <input type="text"
                                class="form-control" id="pNum" placeholder="phone number"
                                name="pNum" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="cName">Enter company name:</label> <input type="text"
                                class="form-control" id="cName" placeholder="company name"
                                name="cName" required="required" autocomplete="off" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="loc">Enter location:</label> <input type="text"
                                class="form-control" id="loc" placeholder="Enter location"
                                name="loc" required="required" autocomplete="off" autofocus>
                            </div>

                            <!-- password complexity -->
                            <b><p>Password must contain the following:</p></b>
                            <p>-at least one upper case letter</p>
                            <p>-at least one lower case letter</p>
                            <p>-at least one number</p>
                            <p>-at least eight(8) characters long</p>

                            <div class="form-group">
                                <label for="pWord">Enter password:</label> <input type="password"
                                class="form-control" id="pWord" placeholder="password"
                                name="pWord" required="required" autocomplete="off" >
                            </div>

                            <div class="form-group">
                                <label for="pwd">Confirm Password:</label> <input type="password"
                                class="form-control" id="cpWord" placeholder="confirm Password"
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

                    <div class="modal-footer text-center">
                        <p>Copyright</p>
                    </div>
                </div>
            </div>
        </div>

<?php
require_once('partials/footer.php');
?>