
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="/cssfiles/jquery-3.3.1.min.js"></script>
    <script src="/cssfiles/TimeCircles.js"></script>
    <link rel="stylesheet" href="/cssfiles/TimeCircles.css">
    <link rel="stylesheet" href="/cssfiles/card_style.css?v=1">
    <link rel="stylesheet" href="/cssfiles/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
   
    
    
    
    <title>ListingShop.com</title>
    
      
  </head>
  <body  style="background-color:#eee;">
  
<script>

  
$(function () {
   $(".timer").TimeCircles();  
   $(".timer").TimeCircles({count_past_zero: false}); 
    });
    
</script>


    <?php
    session_start();
    require_once("db-connection.php");
 
    require_once("header.php");
    require_once("ProductCards.php");
      
        
    
    require_once("categoryNavbar.php");
        
    function where_is($condition){
 
        return "SELECT ExpiredDate,UserId,Status,ProductImage,CategoryName,ProductAddedTime,ProductName,ProductPrice,Username,Brand,ListingType,ProductCondition,Description,ProductId FROM products 
        INNER JOIN users INNER JOIN categories on products.UserId=users.ID AND products.CategoryId=categories.CategoryId ".$condition;
      }
      
      
      
     function list_bigger_products($con,$condition){
        $products=new ProductCards();
    
        $sql=where_is($condition);
        $result=$con->query($sql);
      if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
             $products->bigger_products($row,$row["ListingType"],$con);
              }
      }
      else{
        echo '<h3 class="h3 ">There is no product.</h3>';
      }
     }


?>

    <div class="container vh-100"> <div class="row py-5">
    <?php if (isset($_POST["search"])) {
      $search=$_POST['searchitem'];
     
  
    echo '
      <h3 class="mb-5">Results for "'.$search.'"</h3>
      <div class="d-flex flex-wrap justify-content-start">';
    
    
     
      
      list_bigger_products($con,"Where products.ProductName LIKE '%$search%'");
  
     echo '</div>
      </div>
            </div>';
  
    }
     



  


      ?>
 
        
 

  
  <!-- Footer -->
  <?php 
  include_once "footer.php";
  ?>
  
















    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>