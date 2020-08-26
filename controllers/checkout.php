<?php
session_start();
$servername = "localhost";
$username = "root";  //your user name for php my admin
$password = "";  //password
$databasename = "hackunamatata"; //db name
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server

if (empty($_SESSION['eMail'])) {
    header('Location: index.php');
    exit;
}

$productId = ($_POST['productId']);// product id from cart
$email=$_SESSION['eMail'];//email of current user

//getting user details from db
$getUser = $conn->prepare("SELECT * FROM user WHERE user_email = '$email'"); // get current user
$getUser->execute(); // actually perform the query
$userResult = $getUser->get_result(); // retrieve the result so it can be used inside PHP
$user = $userResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

$userId = $user['userid'];// id of current user

//getting product details from db
$getProduct = $conn->prepare("SELECT * FROM product WHERE productId = '$productId'"); // get selected product details
$getProduct->execute(); // actually perform the query
$productResult = $getProduct->get_result(); // retrieve the result so it can be used inside PHP
$product = $productResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

//getting order details from db
$getOrder = $conn->prepare("SELECT * FROM orders WHERE userid = '$userId' AND productid = '$productId'"); // get selected order details
$getOrder->execute(); // actually perform the query
$orderResult = $getOrder->get_result(); // retrieve the result so it can be used inside PHP
$order = $orderResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

//assign data to variables
$data1 = $order['orderID'];
$data2 = $user['user_address'];
$data3 = $order['order_quantityOrdered'];
$price = $order['order_pricePerUnit'];
$totalPrice = ($data3 * $price);
$data4 = $totalPrice;

//orderId                       = order db
//transaction_deliveryAddress   = user db
//transaction_totalQuantity     = order db
//transaction_totalPrice        = order db compute price.quantity
//transaction_paymentMethod     = 
//transaction_paymentStatus     = 

//complete transaction query
//INSERT INTO `transaction`(`orderId`, `transaction_deliveryAddress`, `transaction_totalQuantity`, `transaction_totalPrice`, `transaction_paymentMethod`, `transaction_paymentStatus`) 
//VALUES ([value-2],[value-3],[value-4],[value-5],[value-6],[value-7])

//for demo
//INSERT INTO `transaction`(`orderId`, `transaction_deliveryAddress`, `transaction_totalQuantity`, `transaction_totalPrice`) 
//VALUES ('','','','')

//DELETE FROM `orders` WHERE `orders`.`orderID` = '';

//perform the new db entry  
mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database
mysqli_query($conn, "INSERT INTO `transaction`(`userId`,`orderId`, `transaction_deliveryAddress`, `transaction_totalQuantity`, `transaction_totalPrice`) 
VALUES ('$userId','$data1','$data2','$data3','$data4')"); // insert record in transaction db
mysqli_query($conn, "DELETE FROM `orders` WHERE `orders`.`orderID` = '$data1'"); // delete from orders db

Print '<script>alert("Checkout successful.");</script>'; //Prompts the user
Print '<script>window.location.assign("../views/order.php");</script>'; // redirect

/*
$newType = ($_POST['product_name']);
$data=$_POST['userid'];
$query= mysqli_query($conn, "SELECT * FROM user");
$exist = mysqli_num_rows($query);

mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database

foreach($data as $count)
{
	  mysqli_query($conn, "UPDATE `user` SET `user_type`= '$newType' WHERE `userid` = '$count'"); //update record in database
}
Print '<script>alert("User data successfully updated.");</script>'; //Prompts the user
Print '<script>window.location.assign("../views/admin.php");</script>'; // redirect
*/
 ?>
