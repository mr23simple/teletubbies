<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$id = $_POST['submit']; //product id
$email = $_SESSION['eMail']; //user email

//getting user details from db
$getUser = $conn->prepare("SELECT * FROM user WHERE user_email = '$email'"); // get current user
$getUser->execute(); // actually perform the query
$userResult = $getUser->get_result(); // retrieve the result so it can be used inside PHP
$user = $userResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

$getId = $user['userid'];

//getting product details from db
$getProduct = $conn->prepare("SELECT * FROM product WHERE productId = '$id'"); // get selected product details
$getProduct->execute(); // actually perform the query
$productResult = $getProduct->get_result(); // retrieve the result so it can be used inside PHP
$product = $productResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

$getPId  = $product['productId'];
$getPPrice  = $product['product_price'];
//$getPId  = $product['productId'];

//perform the new db entry
mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database
mysqli_query($conn, "INSERT INTO `orders`(`userid`, `productid`, `order_pricePerUnit`, `order_quantityOrdered`) 
VALUES ('$getId','$getPId','$getPPrice','1')"); // insert record in database

Print '<script>alert("Successfully added to cart.");</script>'; //Prompts the user
Print '<script>window.location.assign("../index.php");</script>'; // redirect
?>