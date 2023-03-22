
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/cssfiles/myprofilestyle.css">
    <link rel="stylesheet" href="/cssfiles/header.css">
    <link rel="stylesheet" href="/cssfiles/profilepicture.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
 
    
    <title>Document</title>

</head>
<body class="bg-white">
<?php
  
    require_once("db-connection.php");
    require_once("header.php");
   
  
    $username=$_GET["username"];

    function where_is($condition){
      return "SELECT ExpiredDate,UserId,Status,ProductImage,CategoryName,ProductAddedTime,ProductName,ProductPrice,Username,Brand,ListingType,ProductCondition,ProductId FROM products 
        INNER JOIN users INNER JOIN categories on products.UserId=users.ID AND products.CategoryId=categories.CategoryId ".$condition;
        
      }

        function control($cond,$first,$second){
          if ($cond==0){
            return $first;
          }
          else return $second;
            
          

        }
function list_products($con,$condition){   
$sql=where_is($condition);
$result=$con->query($sql);
if($result->num_rows>0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Image</th>
      <th scope="col">Brand</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Condition</th>
      <th scope="col">Listing Type</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Added Time</th>
      <th scope="col">Expired Date</th>

      <th scope="col">Go to Product</th>
    </tr>
  </thead>';
      while($row=$result->fetch_assoc()){
     
       echo '<tbody >
          <tr >
            <td scope="row"> <div width="25px;" height="25px;"">
            <a href="" class="text-center ">
            <img
              src="'.$row["ProductImage"].'"
              class="product-image "
              alt=""
            />
          </a></td>
          </div>
            <th>'.$row["Brand"].'</th>
            <td>'.$row["ProductName"].'</td>
            <td>'.control($row["ProductCondition"],"New","Used").'</td>
            <td>'.control($row["ListingType"],"Buy","Bid").'</td>
           
            <td>'.control($row["Status"],"Available","Sold").'</td>
            <td>'.$row["ProductAddedTime"].'</td>
            <td>'.$row["ExpiredDate"].'</td>
            <th>$'.$row["ProductPrice"].'</th>
            <td><a class="btn btn-primary" href="categories.php?productid='.$row["ProductId"].'&categoryname='.$row["CategoryName"].'">Go to product</a></td>
          </tr>';




        }
      }
}




    ?>

<div class="container-fluid vh-100">
        <div class="main-body">
        
      
     
     
              <div class="row gutters-sm py-2">
                <div class="col-3">
               
                  <div class="card">
                    <div class="card-body picture-container">
               
                      <div class=" d-flex flex-column align-items-center text-center picture">
                       <?php 

                        $sql="SELECT Picture,Username FROM users WHERE Username='$username'";
                        $query=$con->query($sql);
                         $user_info=$query->fetch_assoc();  ?>
                      

                       <?php echo '<img  class="picture-src" id="output_image" src="'.$user_info['Picture'].'" alt="image" >'; 
                        
                       
                       ?>
                        
                      

                    
                        
                      </div>
                 
                    </div>
                    <div class="mb-3 align-items-center text-center">
                          <h4><?php echo  $username ?></h4>
                          
                 
                     
                          
                        </div>

                     

                  
                  </div>
                  
                  
                  <div class="col-md d-md-block py-2">
                    <div class="card ">
                      <div class="card-body">
                        <nav class="nav flex-column nav-pills nav-gap-y-1">
                          <div class="text-center d-grid">
                              <h4 class="mb-0">Listings</h4>
                              <hr>
                              

                           <?php  $count_userProducts=$con->query("SELECT Count(ProductId) as total from products INNER JOIN users on products.UserId=users.ID Where Username='$username'");
                           $count_all=$count_userProducts->fetch_assoc();
                           ?>  


                          <a class="button" href="userprofile.php?username=<?= $username?>&user_products=All" >All (<?= $count_all["total"] ?>)  </a>
                        
                          <?php  $count_userProducts=$con->query("SELECT Count(ProductId) as total_bids from products INNER JOIN users on products.UserId=users.ID Where Username='$username' AND ListingType=1");
                           $count_bids=$count_userProducts->fetch_assoc();
                           ?>
                          <div class="text-center d-grid">
                            <a class="button" href="userprofile.php?username=<?= $username?>&user_products=Bids" >Bids (<?= $count_bids["total_bids"]?>)</a>
                          </div>
                      
                         
                          <?php  $count_userProducts=$con->query("SELECT Count(ProductId) as total_buys from products INNER JOIN users on products.UserId=users.ID Where Username='$username' AND ListingType=0");
                           $count_buys=$count_userProducts->fetch_assoc();
                           ?>
                        
                         <div class="text-center d-grid">
                          <a class="button" href="userprofile.php?username=<?= $username?>&user_products=Buys" >Buys (<?= $count_buys["total_buys"]?>)</a>
                         </div>
                         
                                        
                        </nav>
                      </div>
                    </div>
                  </div>
                
            </div>






<div class="col-9 ">
<div class="d-flex justify-content-between">
<h2 class="h2"><?= $username ?>'s Listings</h2>
<a class="btn btn-secondary" href="myprofile.php?content_id=messages&username=<?=$username?>">Contact with Seller</a>
   </div>
  <div class="d-flex flex-wrap  justify-content-center py-3">
   
<?php
$user_products=$_GET["user_products"];


if($user_products=="All" || is_null($user_products)){

  list_products($con,"Where Username='$username'");
}

else if($user_products=="Bids"){

  list_products($con,"WHERE Username='$username' AND ListingType=1");
}
else if($user_products=="Buys"){

  list_products($con,"WHERE Username='$username' AND ListingType=0");
  }

else{
  echo '<h3 class="h3 ">There is no product.</h3>';
}







    ?>
    </tbody>
    </table>
            </div>
            </div>
        </div>
        </div>
</div>
    </section>


   



    <?php require_once("footer.php")?>








</body>
</html>