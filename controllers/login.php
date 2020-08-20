<?php
session_start();

//trim < > from inputs
$trim = str_replace('<', '', $_POST['eMail']);
$eMail = str_replace('>', '', $trim);

$trim = str_replace('<', '', $_POST['pWord']);
$pWord = str_replace('>', '', $trim);

$servername = "localhost";
$username = "root";  //your user name for php my admin
$password = "";  //password
$databasename = "hackunamatata"; //db name
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server

//encrypt password
$enpWord = base64_encode($pWord);

mysqli_select_db($conn,"hackunamatata") or die("Cannot connect to database"); //Connect to database
$query= mysqli_query($conn, "SELECT * FROM user WHERE user_email = '$eMail' AND user_password = '$pWord'"); //select record in database that has eMail and pword content
$exist = mysqli_num_rows($query);
$table_username = "";
$table_password = "";
$query2 = $conn->prepare("SELECT * FROM user WHERE user_email='$eMail'"); // prepare a query
          $query2->execute(); // actually perform the query
          $result2 = $query2->get_result(); // retrieve the result so it can be used inside PHP
          $r2 = $result2->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r2
if($exist > 0)
{
    $table_username = $_POST['eMail'];
    $table_password = $_POST['pWord'];
    $pass_encrypt = base64_encode($table_password);

    if(($eMail == $table_username)&&($enpWord == $pass_encrypt))
    {
        if($enpWord == $pass_encrypt)
        {
            $_SESSION["type"]=$r2['user_type'];
            $_SESSION["eMail"]=$r2['user_email'];
            $_SESSION["userId"]=$r2['userid'];
            Print '<script>window.location.assign("../index.php");</script>';//proceeds to home
        }
    }
    else
    {
        session_unset();
        Print '<script>alert("Incorrect input. Try again.");</script>'; //Prompts the user
        Print '<script>window.location.assign("../index.php");</script>'; // redirects to login
    }
}
else
{
    session_unset();
    Print '<script>alert("Incorrect input. Try again.");</script>'; //Prompts the user
    Print '<script>window.location.assign("../index.php");</script>'; // redirects to login.php
}
mysqli_close($conn);
?>