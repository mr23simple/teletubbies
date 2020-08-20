<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

$_SESSION["type"]="";

Print '<script>window.location.assign("../index.php");</script>';//proceeds to home
?>