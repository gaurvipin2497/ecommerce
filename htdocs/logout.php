<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
session_unset();
 
// Destroy the session.
session_destroy();

$_SESSION["auth"]=false;
// Redirect to login page
header("location: login.php");
exit();
?>