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

$data=$_POST['userid'];
$query= mysqli_query($conn, "SELECT * FROM user");
$exist = mysqli_num_rows($query);

mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database

foreach($data as $count)
{
	  mysqli_query($conn, "UPDATE `user` SET `user_isActive`= 0 WHERE `userid` = '$count'"); //update record in database
}
Print '<script>alert("User data successfully updated.");</script>'; //Prompts the user
Print '<script>window.location.assign("../views/admin.php");</script>'; // redirect
 ?>
