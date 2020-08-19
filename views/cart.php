<?php

// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');

?>
        <!-- Content -->
        <div class="container-fluid">
            
            <!-- Title -->
            <div class="container mt-5">
                <h1>My Cart</h1>  
           </div>

            <!-- Divider -->
            <div class="divider  mb-5">
                <hr>
            </div>
            
            <!-- Produce -->
            <div class="container">
                <table class="table table-hover text-center">
                    <thead class="thead-dark"> 
                        <th>Item #</th>
                        <th>Product</th>
                        <th>Quantity</th>

                        <th>Price</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1kg garlic, 1kg onions</td>
                            <td>
                                <button class="btn btn-outline-danger btn-minus text-center">
                                    -
                                </button>
                                <span class="mx-4"> 1 </span>
                                <button class="btn btn-outline-primary btn-add text-center">
                                    +
                                </button>
                            </td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1kg garlic, 1kg onions</td>
                            <td>
                                <button class="btn btn-outline-danger btn-minus text-center">
                                    -
                                </button>
                                <span class="mx-4"> 1 </span>
                                <button class="btn btn-outline-primary btn-add text-center">
                                    +
                                </button>
                            </td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1kg garlic, 1kg onions</td>
                            <td>
                                <button class="btn btn-outline-danger btn-minus text-center">
                                    -
                                </button>
                                <span class="mx-4"> 1 </span>
                                <button class="btn btn-outline-primary btn-add text-center">
                                    +
                                </button>
                            </td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1kg garlic, 1kg onions</td>
                            <td>
                                <button class="btn btn-outline-danger btn-minus text-center">
                                    -
                                </button>
                                <span class="mx-4"> 1 </span>
                                <button class="btn btn-outline-primary btn-add text-center">
                                    +
                                </button>
                            </td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-left pl-5">
                                Grand Total
                            </td>
                            <td>
                                5000
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="container mt-5">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">
                        <button class="btn btn-outline-dark btn-block">
                                Cancel
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-success btn-block">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
require_once('../partials/footer.php');
?>