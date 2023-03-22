<?php

//try catch require once
require_once("../db-connection.php");


if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }


$FavoriteId = $_GET['FavoriteId']; // get id through query string

$del = mysqli_query($con,"delete from favorites where FavoriteId = '$FavoriteId'"); // delete query

if($del)
{
    echo "Deleted Successfully";
    header("Location: http://localhost/myprofile.php?content_id=myfavlist");
    mysqli_close($con); // Close connection
     // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>