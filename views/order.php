<?php
require_once('../partials/header.php');
require_once('../partials/nav.php');
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

            <div class="container mt-5">
                <h3>Transaction History</h3>  
           </div>

            <!-- Divider -->
            <div class="divider mb-5">
                <hr>
            </div>

            <!-- Transaction History Table -->
            <div class="container">
                <table class="table table-hover text-center">
                    <thead class="thead-dark"> 
                        <th>Transaction Code</th>
                        <th>Particulars</th>
                        <th>Transaction Date</th>
                        <th>Total Costs</th>
                        <th>View Details</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1kg garlic, 1kg onions</td>
                            <td>2020.04.12</td>
                            <td>1500</td>
                            <td><a href="#"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>1kg potatoes</td>
                            <td>2020.04.12</td>
                            <td>2000</td>
                            <td><a href="#"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>1kg tomatoes</td>
                            <td>2020.04.12</td>
                            <td>3000</td>
                            <td><a href="#"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>1kg kalamansi</td>
                            <td>2020.04.12</td>
                            <td>4000</td>
                            <td><a href="#"><i class="fas fa-eye"></i></a></td>
                        </tr>
                    </tbody>
                </table>       
            </div>
        </div>
<?php
require_once('../partials/footer.php');
?>