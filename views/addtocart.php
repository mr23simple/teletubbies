<?php

// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$id = $_POST['submit']; //product id

$query = $conn->prepare("SELECT * FROM product WHERE productId = '$id'"); // displays selected product
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

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

            <!-- Details -->
            <div class="container mt-5">
                <form action="../controllers/addtocart.php" method="post" autocomplete="off">
                    <input type="hidden" name="selectedProduct" id="selectedProduct" value=""/>
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <h5>Product Name:</h5>
                        </div>
                        <div class="col-md-6">
                            <p name="prodName" id="prodName" value=""><?php echo $r['product_name']; ?></p>             
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <h5>Product Price:</h5>
                        </div>
                        <div class="col-md-6">
                            <p name="prodPrice" id="prodPrice" value=""><?php echo $r['product_price']; ?></p>     
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <h5>Unit of Measurement:</h5>
                        </div>
                        <div class="col-md-6">
                            <p name="prodUnit" id="prodUnit" value=""><?php echo $r['product_unitOfMeasure']; ?></p>   
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <h5>Product Quantity:</h5>
                        </div>
                        <div class="col-md-6">
                            <p name="prodQuan" id="prodQuan" value=""><?php echo $r['product_quantity']; ?></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <h5>Product Description:</h5>
                        </div>
                        <div class="col-md-6">
                            <p name="prodDesc" id="prodDesc" value=""><?php echo $r['product_description']; ?></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                        <button type="submit" name="submit" value="<?php echo $id ?>" class="btn btn-success" id="checkBtn" >Add to cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    require_once('../partials/footer.php');
    ?>