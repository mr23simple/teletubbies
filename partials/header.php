<?php
    session_start();
    //Expire the session if user is inactive for 10 minutes or more.
    $expireAfter = 10;
    //Check to see if our "last action" session variable has been set.
    if(isset($_SESSION['last_action']))
    {
        //Figure out how many seconds have passed since the user was last active.
        $secondsInactive = time() - $_SESSION['last_action'];
        //Convert our minutes into seconds.
        $expireAfterSeconds = $expireAfter * 60;
        //Check to see if they have been inactive for too long.
        if($secondsInactive >= $expireAfterSeconds)
        {
            //User has been inactive for too long. Kill their session.
            session_unset();
            session_destroy();
        }   
    }
//Assign the current timestamp as the user's latest activity
$_SESSION['last_action'] = time();
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Fontawesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <script>
            function logout() {
            alert("You have been logged out.");
            }
        </script>
    </head>
    <body>
        