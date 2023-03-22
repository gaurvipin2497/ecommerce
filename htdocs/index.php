
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
  <body>
  <nav class="navbar navbar-dark navbar-expand p-0 bg-dark   ">
          <div class="container">
              <ul class="navbar-nav ms-auto me-5">
                  <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Cash On Delivery</a></li>
                  <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Free Delivery</a></li>
                  <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Cash Backs</a></li>
              </ul>
            
          </div> <!-- navbar-collapse .// -->
          <!-- container // -->
      </nav> <!-- header-top-light.// -->
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
   
    
   
    $id=$_SESSION["id"];

   
   
    
    require_once("categoryNavbar.php");
    

    if (isset($_POST["search"])) {
      $search=$_POST['searchitem'];
     
  
    echo '
    <div class="container"> <div class="row py-5">
      <div class="d-flex flex-wrap justify-content-start">';
    
    
     
      
      list_bigger_products($con,"Where products.ProductName LIKE '%$search%'");
  
     echo '</div>
      </div>
            </div>';
  
    }
     







      
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



 function list_smaller_products($con,$condition){
  $products=new ProductCards();

  $sql=where_is($condition);
  $result=$con->query($sql);
if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
       $products->smaller_products($row);
        }
}
else{
  echo '<h3 class="h3 ">There is no product.</h3>';
}
}




      ?>
 
        


     
        








 


 <section>


     




   <!-- Carousel wrapper -->
<div class=""> 

 <div class="container pt-4 mt-3">

  <div id="carouselExampleCaptions" class="carousel slide d-sm-none d-md-block d-none d-sm-block  " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/1.jpg" class="d-block w-100"  alt="...">
        
      </div>
      <div class="carousel-item" >
        
        <img src="images/2.jpg" class="d-block w-100"  alt="...">
        
      </div>
      <div class="carousel-item" >
        
        <img src="images/3.jpg" class="d-block w-100"  alt="...">
        
      </div>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


</div>
</div>


</section>
  
    
      <!--CARDS-->

<section class="section-products">

<hr class="m-auto" width="90%">

<div class="container pt-4">
    <div class="row justify-content-center text-center">
        <div class="col-md-8 col-lg-6">
            <div class="header">
                
                <h2> My Listings</h2>
            </div>
        </div>
    
      </div>
      
      <div class="row text-center ">
      

      <?php 
  
   
   
  list_smaller_products($con,"WHERE ID='$id'");
     
        
    
   
 ?>

    </div>
</div>

</section>


<hr class="m-auto" width="90%">


<section class="section-products">

		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Featured Product</h3>
										<h2>Popular Products (Only Buy)</h2>
								</div>
						</div>
				</div>
				<div class="row text-center">
					
          <?php 


      
       list_smaller_products($con,"WHERE categories.CategoryID IN (1,2,3,4) AND ListingType=0  ORDER BY RAND() LIMIT 6 ");
                ?>

				</div>
		</div>
    
</section>
  

  

<section style="background-color:#eee;">
  <div class="container py-5">
    <div class="row justify-content-start ">
      <div class="col-md-8 col-lg-6">
          <div class="header ">
              <h3> The Most Preferred Computer Products </h3>
              
              <a href="categories.php?category=Computers" class="fw-bold see-all" style="color: #0082ca;"> See All</a>
          </div>
         
      </div>
    
  </div>

<!--ITEMS -->

<div class="row py-5">
  <div class="d-flex flex-wrap  justify-content-start">
 <?php

 
     
                
      list_bigger_products($con,"WHERE categories.CategoryID=2");

     
      
    ?>
</div>
      </div>  <!--row py-5-->

    </div> <!--Container-->
  
</section>

  


  <!-- Accessories-->

  <section style="background-color:#eee;">
    <div class="container py-5">
      <div class="row justify-content-start ">
        <div class="col-md-8 col-lg-6">
            <div class="header ">
                <h3> The Most Preferred Fashion Products </h3>
                
                <a href="categories.php?category=Accessories" class="fw-bold see-all" style="color: #0082ca;"> See All</a>
            </div>
           
        </div>
      
    </div>
      <div class="row py-5">
      <div class="d-flex flex-wrap justify-content-start">
      <?php
    
     
      
    list_bigger_products($con,"WHERE categories.CategoryID=3");



    
    ?>
</div>
      </div>
    </div>
  
  </section>
  



  <!-- Bid Products-->

  <section style="background-color:#eee;">
    <div class="container py-5">
      <div class="row justify-content-start ">
        <div class="col-md-8 col-lg-6">
            <div class="header ">
                <h3> The Most Preferred Bids Products </h3>
                
                <a href="categories.php?AllBid=All Bids" class="fw-bold see-all" style="color: #0082ca;"> See All</a>
            </div>
           
        </div>
      
    </div>
      <div class="row py-5">
      <div class="d-flex flex-wrap justify-content-start">
      <?php
     
     $sql="SELECT ExpiredDate,UserId,Status,ProductImage,CategoryName,ProductAddedTime,ProductName,ProductPrice,Username,Brand,ListingType,ProductCondition,Description,ProductId FROM products INNER JOIN users INNER JOIN categories on products.UserId=users.ID AND products.CategoryId=categories.CategoryId  WHERE ListingType=1";
     
      
      list_bigger_products($con,"  WHERE ListingType=1");




    
      
    ?>
        
       
        </div>


      </div>
    </div>
    
  </section>
  

  <!-- Buy Products-->
  <section style="background-color:#eee;">
    <div class="container py-5">
      <div class="row justify-content-start ">
        <div class="col-md-8 col-lg-6">
            <div class="header ">
                <h3> The Most Preferred Buy Products </h3>
                
                <a href="categories.php?AllBuy=All Buys" class="fw-bold see-all" style="color: #0082ca;"> See All</a>
            </div>
           
        </div>
      
    </div>
      <div class="row py-5">
      <div class="d-flex flex-wrap justify-content-start">
      <?php
     
   
     $sql="SELECT ExpiredDate,UserId,Status,ProductImage,CategoryName,ProductAddedTime,ProductName,ProductPrice,Username,Brand,ListingType,ProductCondition,Description,ProductId FROM products INNER JOIN users INNER JOIN categories on products.UserId=users.ID AND products.CategoryId=categories.CategoryId  WHERE ListingType=1";
     
      
      list_bigger_products($con,"  WHERE ListingType=0");



      
      
    ?>
        



        
       



      </div>
    </div>
    </div>
  </section>
  


  






  
  
  
  
  
  
  
  
  
  <!-- Footer -->
  <?php 
  include_once "footer.php";
  ?>
  
















    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>