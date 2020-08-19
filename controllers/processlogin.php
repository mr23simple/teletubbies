<?php
session_start();

//trim < > from inputs
$trim = str_replace('<', '', $_POST['eMail']);
$eMail = str_replace('>', '', $trim);

$trim = str_replace('<', '', $_POST['pWord']);
$pWord = str_replace('>', '', $trim);

//encrypt password
$enpWord = base64_encode($pWord);

$_SESSION["eMail"]="$eMail";

mysqli_select_db($conn,"teletubbies") or die("Cannot connect to database"); //Connect to database
$query= mysqli_query($conn, "SELECT * FROM users WHERE email = '$eMail' and pass = '$enpWord'"); //select record in database that has eMail and pword content
$exist = mysqli_num_rows($query);
$table_username = "";
$table_password = "";
$query2 = $conn->prepare("SELECT * FROM users WHERE email='$eMail'"); // prepate a query
          $query2->execute(); // actually perform the query
          $result2 = $query2->get_result(); // retrieve the result so it can be used inside PHP
          $r2 = $result2->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
if($exist > 0)
{
    $table_username = $_POST['eMail'];
    $table_password = $_POST['pWord'];
    $pass_encrypt = base64_encode($table_password);

    if(($eMail == $table_username)&&($enpWord == $pass_encrypt))
    {
        if($enpWord == $pass_encrypt)
        {
            $_SESSION["type"]=$r2['type'];
            $_SESSION["eMail"]=$r2['email'];
            Print '<script>window.location.assign("index.php");</script>';//proceeds to home
        }
    }
    else
    {
        Print '<script>alert("Incorrect input. Try again.");</script>'; //Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to login
    }
}
else
{
    Print '<script>alert("Incorrect input. Try again.");</script>'; //Prompts the user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
}
mysqli_close($conn);
?>