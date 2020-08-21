<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "mySQLp@ssword127";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$trim1= str_replace('<', '', $_POST['prodName']);
$prodName = str_replace('>', '', $trim1);

$trim2 = str_replace('<', '', $_POST['price']);
$price = str_replace('>', '', $trim2);

$trim3 = str_replace('<', '', $_POST['unit']);
$unit = str_replace('>', '', $trim3);

$trim4= str_replace('<', '', $_POST['quantity']);
$quantity = str_replace('>', '', $trim4);

$trim5 = str_replace('<', '', $_POST['desc']);
$desc = str_replace('>', '', $trim5);

$local = $_SESSION['eMail'];

$query = $conn->prepare("SELECT * FROM user WHERE user_email='$local'"); // get current user
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$userid = $r['userid']; //assign current user's user id to local variable

try{
    $sql = "INSERT INTO `product`(`userid`, `product_name`, `product_price`, `product_unitOfMeasure`, `product_quantity`, `product_description`)  
    VALUES ('$userid','$prodName','$price','$unit','$quantity','$desc')";
    $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);

    if($result){
        Print '<script>alert("Successfully added product.");</script>'; // prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../user.php
    } 
    else {
    Print '<script>alert("Failed to add product.");</script>'; // prompts the user
    Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../user.php
    }
} catch (Exception $e){
    Print '<script>alert("Caught Exception. Try again.");</script>'; //Prompts the user
    echo $e->getMessage(), "\n";
}        
 ?>