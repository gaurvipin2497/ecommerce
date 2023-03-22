<?php

//try catch require once
require_once("db-connection.php");


if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }


$productid = $_GET['productid']; // get id through query string
$query = "DELETE from favorites where LikedProductId='$productid';"; /*  first query : Notice the 2 semicolons at the end ! */
$query .= "DELETE from bids where ProductId='$productid';"; /* Notice the dot before = and the 2 semicolons at the end ! */
$query .= "DELETE from purchased where ProductId='$productid';"; /* Notice the dot before = and the 2 semicolons at the end ! */
$query .= "DELETE from products where ProductId = '$productid'"; 

$del=$con->multi_query($query);

if($del)
{
    
    header("Location: http://localhost/myprofile.php?content_id=mylistings");
    mysqli_close($con); // Close connection
     // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>