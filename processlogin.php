<?php
session_start();

$trim = str_replace('<', '', $_POST['uName']);
$uName = str_replace('>', '', $trim);

$trim = str_replace('<', '', $_POST['pWord']);
$pWord = str_replace('>', '', $trim);

$enpWord = base64_encode($pWord);
$_SESSION["uName"]="$uName"; // assign current user name as name in app
$_SESSION["access"]="role goes here"; // assign role to current session
Print '<script>window.location.assign("index.php");</script>';// proceeds to home
?>
