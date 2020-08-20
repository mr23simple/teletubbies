<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
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




$enpWord = base64_encode($pWord);

$query= mysqli_query($conn, "SELECT * FROM user WHERE user_email = '$eMail'"); //check if same email exists in the db
$exist = mysqli_num_rows($query); // get number of results

if($exist <= 0) //if 0 matches proceed
{
  if($pWord == $cpWord) //if password matches confirm password
  {
    if(!preg_match("#[0-9]+#",$pWord)) 
    { //checks password if it has numbers
        Print '<script>alert("Your Password Must Contain At Least 1 Number!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
    }
    elseif(!preg_match("#[A-Z]+#",$pWord)) 
    { //checks password if it has uppercase letter
        Print '<script>alert("Your Password Must Contain At Least 1 Capital Letter!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
    }
    elseif(!preg_match("#[a-z]+#",$pWord)) 
    { //checks password if it has lowercase letter
        Print '<script>alert("Your Password Must Contain At Least 1 Lowercase Letter!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
    }
    elseif(strlen($pWord)<8) 
    { //checks password if it is at least 8 characters long
        Print '<script>alert("Your Password Must Be at Least 8 Characters!");</script>'; //Prompts the user
        Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
    }
    else //every condition is satisfied
    {   

        try{
         $sql = "INSERT INTO user(`user_organization`, `user_individual`, `user_email`, `user_password`, `user_phoneNumber`, `user_address` )
          VALUES ('".$organization."','".$individual."','".$eMail."','".$pWord."','".$pNum."','".$loc."')";
         $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);

         if($result){
               Print '<script>alert("Registration successful.");</script>'; // prompts the user
               Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
          } //insert record into database
          else {
            Print '<script>alert("Registration failed.");</script>'; // prompts the user
            Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
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
    Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
  }
}
else {
    Print '<script>alert("User Already Exists!");</script>'; //Prompts the user
    Print '<script>window.location.assign("../index.php");</script>'; // redirects to ../index.php
}
 ?>