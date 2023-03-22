<?php
  
    require_once("db-connection.php");
    require_once("header.php");
   
  
    $id=$_SESSION["id"];

    function where_is($condition){
      return "SELECT ExpiredDate,UserId,Status,ProductImage,categories.CategoryId,CategoryName,ProductAddedTime,ProductName,ProductPrice,Username,Brand,ListingType,ProductCondition,ProductId FROM products 
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
  echo '
  <form action="" method="POST"></form>
  <table class="table text-center">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Brand</th>
      <th scope="col">Name</th>
      <th scope="col">Condition</th>
      <th scope="col">Type</th>
     
      <th scope="col">Status</th>
      <th scope="col">Added Time</th>
      <th scope="col">Expired Date</th>
      <th scope="col">Price</th>
      <th scope="col">Add/Update/Delete</th>
 
    </tr>
  </thead>';
      while($row=$result->fetch_assoc()){
     
       echo '<tbody class="align-middle ">
          <tr >
            <td scope="row"> <div width="25px;" height="25px;"">
            <a href="" class="text-center ">
            <img
              src="'.$row["ProductImage"].'"
              class="product-image"
              alt=""
            />
          </a></td>
          </div>
            <th>'.$row["Brand"].'</th>
            <td>'.$row["ProductName"].'</td>
            <td>'.control($row["ProductCondition"],"New","Used").'</td>
            <th>'.control($row["ListingType"],"Buy","Bid").'</th>
           
            <td>'.control($row["Status"],"Available","Sold").'</td>
         
            <td>'.$row["ProductAddedTime"].'</td>
            <td>'.$row["ExpiredDate"].'</td>
            <th>$'.$row["ProductPrice"].'</th>
            <td><div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-primary align-self-center" href="categories.php?productid='.$row["ProductId"].'&categoryname='.$row["CategoryName"].'"> Go </a>
            <a class="btn btn-warning  align-self-center" href="update_product.php?productid='.$row["ProductId"].'">Update</a>
            <button class="btn btn-danger btn-sm" type="button1" data-row_id="'.$row['ProductId'].'">Delete </a></div></td>
           
          </tr>';




        }
      }
}











    ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-danger').click(function() {
      // go delete php page
      location.href = "deleteproduct.php?productid=" + $(this).data('row_id');
    });
  });
</script>


<div class="d-flex justify-content-between">
<h2 class="h2"><?= $username ?>'s Listings</h2>

   </div>
  <div class="d-flex flex-wrap  justify-content-center py-3">
   
<?php


if($user_products=="All" || is_null($user_products)){

  list_products($con,"Where ID='$id' ORDER BY ProductId DESC");
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

    </section>


   



    <?php require_once("footer.php")?>