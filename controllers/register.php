<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "teletubbies";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$trim2a = str_replace('<', '', $_POST['eMail']);
$trim1a = str_replace('>', '', $trim2a);
$email = str_replace(' ', '', $trim1a);

$trim2b = str_replace('<', '', $_POST['pNum']);
$trim1b = str_replace('>', '', $trim2b);
$pnum = str_replace(' ', '', $trim1b);

$trim2c = str_replace('<', '', $_POST['pWord']);
$trim1c = str_replace('>', '', $trim2c);
$pword = str_replace(' ', '', $trim1c);

$trim2d = str_replace('<', '', $_POST['cpWord']);
$trim1d = str_replace('>', '', $trim2d);
$cpword = str_replace(' ', '', $trim1d);

$trim2e = str_replace('<', '', $_POST['loc']);
$trim1e = str_replace('>', '', $trim2e);
$loc = str_replace(' ', '', $trim1e);

date_default_timezone_set("Asia/Manila");
$date=date("M/d/Y");
$time=date("H:i:s");

$enpWord = base64_encode($pWord);

$query= mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"); //check if same email exists in the db
$exist = mysqli_num_rows($query); // get number of results

if($exist <= 0) //if 0 matches proceed
{
  if($pword == $cpword) //if password matches confirm password
  {
    if(!preg_match("#[0-9]+#",$pword)) 
    { //checks password if it has numbers
        Print '<script>alert("Your Password Must Contain At Least 1 Number!");</script>'; //Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
    }
    elseif(!preg_match("#[A-Z]+#",$pword)) 
    { //checks password if it has uppercase letter
        Print '<script>alert("Your Password Must Contain At Least 1 Capital Letter!");</script>'; //Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
    }
    elseif(!preg_match("#[a-z]+#",$pword)) 
    { //checks password if it has lowercase letter
        Print '<script>alert("Your Password Must Contain At Least 1 Lowercase Letter!");</script>'; //Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
    }
    elseif(strlen($pword)<8) 
    { //checks password if it is at least 8 characters long
        Print '<script>alert("Your Password Must Be at Least 8 Characters!");</script>'; //Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
    }
    else //every condition is satisfied
    {
        mysqli_select_db($conn,"teletubbies") or die("Cannot connect to database"); //Connect to database
        mysqli_query($conn, "INSERT INTO `users`(`type`, `email`, `pass`, `number`, `location`, `date`, `time`) 
        VALUES (`Customer`,`$email`,`$enpWord`,`$pnum`,`$loc`,`$date`,`$time`)"); //insert record into database
        Print '<script>alert("Registration successful.");</script>'; // prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
    }
  }
  else 
  {
    Print '<script>alert("Please make sure the passwords match!");</script>'; //Prompts the user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
  }
}
else {
    Print '<script>alert("User Already Exists!");</script>'; //Prompts the user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to index.php
}
 ?>