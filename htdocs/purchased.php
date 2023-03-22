<?php 
require_once("db-connection.php");
require_once("header.php");



$productid=$_GET["productid"];
$buyerid=$_GET["buyerid"];
$sellerid=$_GET["sellerid"];
$price=$_GET["price"];
$expdate=$_GET["expdate"];


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/cssfiles/card_style.css">
    <link rel="stylesheet" href="/cssfiles/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <title>ListingShop.com</title>
    
      
  </head>
  <body>
    

  <?php

if(isset($_POST['Buy'])){

  
  $sql="INSERT INTO purchased (ProductId, SellerId,BuyerId,Price) VALUES ('$productid','$sellerid','$buyerid','$price')";
  $con->query($sql);

  $sql="UPDATE products SET Status=1 WHERE ProductId='$productid'";
  $con->query($sql);

      echo '<div class="container py-5 vh-100 ">
      <div class="row py-5">';
      
     
     
    echo '<div class="col-12 text-center alert alert-success mb-5">Purchased Successfully</div>
      <h3 class="col-12 h3">Redirecting Main Page...</h3>
     
      </div>
      
      </div>'
      
      ;



    header("Refresh:5; url=index.php");
exit();
    
}


?>


<?php
date_default_timezone_set('Europe/Istanbul');
$date = date('Y-m-d H:i:s');


if(isset($_POST['Bid'])){

    $buyerbid=$_POST["buyerbid"];
  if($expdate>$date){

    if(floatval($buyerbid)>$price ){
     
    $sql="INSERT INTO bids (ProductId, BuyerUserId,BuyerPrice,SellerUserId,SellerPrice) Values ('$productid','$buyerid','$buyerbid','$sellerid','$price')";
    $con->query($sql);
    $currentbid="UPDATE products Set ProductPrice='$buyerbid' Where ProductId='$productid'";
    $con->query($currentbid);

    
    echo '<div class="container py-5 vh-100 ">
    <div class="row py-5">';

   
 
    echo '<div class="col-12 text-center alert alert-success mb-5">Bid Successfully</div>
    <h3 class="col-12 h3">Redirecting Main Page...</h3>
    
    
   
    
    
    </div>
    
    </div>';

  header("Refresh:5; url=index.php");
  exit();

    }
    
    else{
      echo '<div class="container py-5 vh-100 ">
    <div class="row py-5">';

   
 
    echo '<div class="col-12 text-center alert alert-warning mb-5">Your Bid must be bigger than Min Bid Price</div>
    <h3 class="col-12 h3">Redirecting Main Page...</h3>
    
    
   
    
    
    </div>
    
    </div>';
    header("Refresh:5; url=index.php");
    exit();
  }

}

else{
  echo '<div class="container py-5 vh-100 ">
    <div class="row py-5">';

    echo '<div class="col-12 text-center alert alert-danger mb-5">Product Closed</div>
    <h3 class="col-12 h3">Redirecting Main Page...</h3>
    
    </div>
    
    </div>';
    header("Refresh:5; url=index.php");
    exit();
}
    
}

?>


<?php 
if(isset($_POST['favorite'])){

  
  $sql="INSERT INTO favorites (LikedProductId, UserId) VALUES ('$productid','$buyerid')";
  $con->query($sql);


  header("location: index.php");
exit();
    
}







?>




  

  <?php require_once("footer.php");?>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>