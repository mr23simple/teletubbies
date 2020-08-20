<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "mySQLp@ssword127";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$trimorg = str_replace('<', '', $_POST['name']);
$name = str_replace('>', '', $trimorg);

$trimemail = str_replace('<', '', $_POST['eMail']);
$eMail = str_replace('>', '', $trimemail);

$trimPnum = str_replace('<', '', $_POST['pNum']);
$pNum = str_replace('>', '', $trimPnum);

$trimpWord = str_replace('<', '', $_POST['pWord']);
$pWord = str_replace('>', '', $trimpWord);

$trimcpWord = str_replace('<', '', $_POST['cpWord']);
$cpWord = str_replace('>', '', $trimcpWord);

$trimloc = str_replace('<', '', $_POST['loc']);
$loc = str_replace('>', '', $trimloc);

$isCorporate = $_POST['customSwitch1'] == 1 ? 1 : 0;


$enpWord = base64_encode($pWord);



  if($pWord == $cpWord) //if password matches confirm password
  {
    if(!preg_match("#[0-9]+#",$pWord)) 
    { //checks password if it has numbers
        Print '<script>alert("Your Password Must Contain At Least 1 Number!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
    }
    elseif(!preg_match("#[A-Z]+#",$pWord)) 
    { //checks password if it has uppercase letter
        Print '<script>alert("Your Password Must Contain At Least 1 Capital Letter!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
    }
    elseif(!preg_match("#[a-z]+#",$pWord)) 
    { //checks password if it has lowercase letter
        Print '<script>alert("Your Password Must Contain At Least 1 Lowercase Letter!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
    }
    elseif(strlen($pWord)<8) 
    { //checks password if it is at least 8 characters long
        Print '<script>alert("Your Password Must Be at Least 8 Characters!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
    }
    else //every condition is satisfied
    {   
      $sessionUserid = $_SESSION['userId'];
        try{
        $sql = "UPDATE User set 
        user_organization = '".$name."',
        user_email = '".$eMail."',
        user_password ='".$pWord."',
        user_phoneNumber = '".$pNum."',
        user_address = '".$loc."',
        user_isCorporate = '".$isCorporate."'
        WHERE userid = '".$sessionUserid."'";

         $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
         
         if($result){
              
               Print '<script>alert("Update successful.");</script>'; // prompts the user
              Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
          } //insert record into database
          else {
            Print '<script>alert("Update failed.");</script>'; // prompts the user
               Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php
          }
        } catch (Exception $e){
          Print '<script>alert("Caught Exception. Try again.");</script>'; //Prompts the user
          echo $e->getMessage(), "\n";
        }        
        
    }
  }
  else
  {
    Print '<script>alert("Please make sure the passwords match!");</script>'; //Prompts the user
    Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../views/user.php

  }

 ?>