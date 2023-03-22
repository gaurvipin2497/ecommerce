<?php 
require_once("db-connection.php");
require_once("ProductCards.php");

$categories=$_GET["category"];
$brand=$_GET["brand"];
$condition=$_GET["condition"];
$new=$_GET["new"];
$used=$_GET["used"];

$allBid=$_GET["AllBid"];
$allBuy=$_GET["AllBuy"];
$all=$_GET["All"];
$productid=$_GET["productid"];
$userid=$_GET["userid"];
$categoryname_from_userprofile=$_GET["categoryname"];
$username_from_filter=$_GET["username"];




$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
  }

   
  function where_is($condition){
 
    return "SELECT ExpiredDate,UserId,Status,ProductImage,CategoryName,ProductAddedTime,ProductName,ProductPrice,Username,Brand,ListingType,ProductCondition,Description,ProductId FROM products 
    INNER JOIN users INNER JOIN categories on products.UserId=users.ID AND products.CategoryId=categories.CategoryId ".$condition;
  }
  
  
  
 function list_products($con,$condition){
  $products=new ProductCards();


    $sql=where_is($condition);
    $result=$con->query($sql);
  if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $products->bigger_products($row,$row["ListingType"],$con);
          }
  }
  else{
    echo '<h3 class="h3 text-white">There is no product.</h3>';
  }
}

      








?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/cssfiles/card_style.css?v=1">
    <link rel="stylesheet" href="/cssfiles/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="/cssfiles/TimeCircles.css">
    <script src="/cssfiles/jquery-3.3.1.min.js"></script>
    <script src="/cssfiles/TimeCircles.js"></script>
    <title>ListingShop.com</title>
    
      
  </head>
  <body>
  <?php require_once("header.php");
  require_once("categoryNavbar.php");?>
  <script>
  $(function () {
        $(".timer").TimeCircles();
    });

</script>

  <section style="background-color:cadetblue;">
    <div class="container ">
    
    <div class="py-4"><a class="lead text-white text-decoration-underline"  href="<?= $previous ?>"><i class="bi bi-arrow-left"></i>Back</a></div>
    

     

  <div class="row ">
    <div class="pe-4  col-2">
    <div class="border-bottom mb-4 pb-4 ">     
      
    <h5 class="font-weight-semi-bold mb-4 text-white">Filter by Brand</h5> 
      <div class=" justify-content-center overflow-auto " style="max-height: 180px;" >
           
           <!-- Brand Start -->
        
                 <?php 
                 $sql="SELECT DISTINCT Brand FROM products";
                 $result=$con->query($sql);
                 while($row=$result->fetch_assoc()){
                echo'  <div class="d-flex align-items-center justify-content-start mb-2">
                  
                  <a class="text-white ms" href="categories.php?brand='.$row["Brand"].'"> '.$row["Brand"].'</a>
             
              </div>';
                
                  };
                   ?>

              
      </div>
     
    </div>
     <div class="border-bottom mb-4 pb-4 ">     
      
      <h5 class="font-weight-semi-bold mb-4 text-white">Filter by Price</h5> 
        <div class="justify-content-center "  >
          <form action="" method="POST">
          <div class="d-flex ">
                <input placeholder="Min" name="min" class="form-control form-control-sm w-50 me-1"><span class="align-self-center text-white">-</span>
                <input placeholder="Max" name="max" class="form-control form-control-sm w-50 mx-1">
                <button class="btn btn-outline-secondary btn-sm bg-light border-start-0 border " type="sumbit" name="PriceSearch" >
                            <i class="bi bi-search"></i>
                        </button>
          
          </div>
          </form>
          
  

        </div>
       
    </div>
    <div class="border-bottom mb-4 pb-4 ">     
      
      <h5 class="font-weight-semi-bold mb-4 text-white">Filter by Users</h5> 
        <div class=" justify-content-center overflow-auto " style="max-height: 180px;" >
             
             <!-- Brand Start -->
          
                   <?php 
                   $sql="SELECT DISTINCT ID,Username FROM Users";
                   $result=$con->query($sql);
                   while($row=$result->fetch_assoc()){
                  echo'  <div class=" d-flex align-items-center justify-content-start mb-2">
                   
                    <a class="text-white " href="categories.php?userid='.$row["ID"].'&username='.$row["Username"].'"> '.$row["Username"].'</a>
               
                </div>';
                  
                    };
                     ?>
        
  
                
        </div>
       
      </div>

          
           
      


    </div>

  
   <div class=" col-10">
   <div class="row justify-content-start ms-3 pb-4 ">
        <div class="col-md-8 col-lg-6">
            <div class="header ">
               
                <h3 class="text-white "> <?php echo "Category: " .$all,$categories,$brand,$allBuy,$allBid,$new,$used,$categoryname_from_userprofile,$username_from_filter ?></h3>
                
             
            </div>
           
        </div>
      
    </div>          
  <div class="d-flex flex-wrap  ms-4 justify-content-start">            
  
         
<?php 


          
$min=$_POST["min"];
$max=$_POST["max"];

if(isset($_POST["PriceSearch"]))
{    
 list_products($con,"WHERE ProductPrice Between  ".intval($min)." AND ".intval($max)."") ;
}


else if(isset($productid)){

 list_products($con,"Where ProductId='$productid'");
}



else if(isset($userid)){

  list_products($con,"Where ID='$userid'");
 }
  
   
else if(isset($all)){
  list_products($con," ORDER BY RAND()");
  
}

else if(isset($categories)){

 list_products($con, "WHERE categories.CategoryName='$categories'");
}



// Filter for Brand
else if(isset($brand)){
list_products($con," WHERE products.Brand='$brand'");
}
 

 else if(isset($condition)){
list_products($con," WHERE products.ProductCondition='$condition'");
 }

else if(isset($allBid)){
  list_products($con,"WHERE products.ListingType=1");
}


else if(isset($allBuy)){
  list_products($con,"WHERE products.ListingType=0");
}
else if(isset($new)){
   list_products($con," WHERE products.ProductCondition=0");
}
else if(isset($used)){
  list_products($con," WHERE products.ProductCondition=1");
}



?>

  </div>
  </div>
</div>       
</div>              



  </section>



<?php require_once("footer.php");?>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>