<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();
Print '<script>alert("You have been logged out.");</script>'; // prompts the user
Print '<script>window.location.assign("../index.php");</script>';//proceeds to home
?>