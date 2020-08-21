<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$trim1 = str_replace('<', '', $_POST['prodName']);
$prodName = str_replace('>', '', $trim1);

$price = $_POST['price'];

$trim3 = str_replace('<', '', $_POST['unit']);
$unit = str_replace('>', '', $trim3);

$quantity = $_POST['quantity'];

$trim5 = str_replace('<', '', $_POST['desc']);
$desc = str_replace('>', '', $trim5);

$productId = $_POST['productId'];

mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database
mysqli_query($conn, "UPDATE `product` SET `product_name`='$prodName',`product_price`='$price',`product_unitOfMeasure`='$unit',
`product_quantity`='$quantity',`product_description`='$desc' WHERE `productId` = '$productId'"); //update record in database

Print '<script>alert("Product data successfully updated.");</script>'; //Prompts the user
Print '<script>window.location.assign("../views/user.php");</script>'; // redirect

/*try
{
    $sql = "UPDATE User set 
    user_organization = '".$name."',
    user_email = '".$eMail."',
    user_password ='".$pWord."',
    user_phoneNumber = '".$pNum."',
    user_address = '".$loc."',
    user_isCorporate = '".$isCorporate."'
    WHERE userid = '".$sessionUserid."'";

    $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    
    if($result)
    {
        
        Print '<script>alert("Update successful.");</script>'; // prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
    } //insert record into database
    else 
    {
    Print '<script>alert("Update failed.");</script>'; // prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
    }
} catch (Exception $e)
{
    Print '<script>alert("Caught Exception. Try again.");</script>'; //Prompts the user
    echo $e->getMessage(), "\n";
}       */ 
?>