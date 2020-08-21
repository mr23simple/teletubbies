<?php
session_start();
$servername = "localhost";
$username = "root";  //your user name for php my admin
$password = "mySQLp@ssword127";  //password
$databasename = "hackunamatata"; //db name
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server

if (empty($_SESSION['eMail'])) {
    header('Location: index.php');
    exit;
}

$data=$_POST['userid'];





mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database

foreach($data as $count)
{     
        $sql= "UPDATE `user` SET `user_type`= CASE `user_type`
        when 'Farmer' Then 'Customer'
        when 'Customer' Then 'Farmer'
        END
        WHERE userid = '".$count."'";
        mysqli_query($conn, $sql ) ; //update record in database

     
}
Print '<script>alert("User data successfully updated.");</script>'; //Prompts the user
Print '<script>window.location.assign("../views/admin.php");</script>'; // redirect
 ?>
