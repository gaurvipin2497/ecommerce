 

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
    <title>Create New Listing</title>
   



    </script>

</head>

<body>

<?php

require_once("db-connection.php");

session_start();
$id=$_SESSION["id"];
$productId=$_GET["productid"];




if(isset($_POST['UpdateProduct']))
{


   $Lt=$_POST['ListingType'];
   $price=$_POST['Price'];
   $cate=$_POST['Category'];
   $condition=$_POST['Condition'];
   $pname=$_POST['PName'];
   $descr=$_POST['Description'];
   $brand=$_POST['Brand'];
   
   
   $target_dir = "uploads/users/";
   $target_file = $target_dir .time(). basename($_FILES["item_pic"]["name"]);

   move_uploaded_file($_FILES["item_pic"]["tmp_name"], $target_file);

    if ($_POST["Condition"]=="New"){
     $condition=0;
    }
    else{
      $condition=1;
    }

    if ($_POST["ListingType"]=="Buy"){
      $Lt=0;
    }
    else{
     $Lt=1;
    }


    $cate=$cate[0];

    

   

    
    $updatequery="UPDATE products SET ProductName='$pname', ProductPrice=$price,ProductImage='$target_file', ListingType=$Lt, ProductCondition=$condition,Brand='$brand',Status=0,Description='$descr',UserId=$id,CategoryId=$cate Where ProductId='$productId'"; 
    
     
    
    $con->query($updatequery);
      
     header("Location:myprofile.php?content_id=mylistings");


      exit();
   
      
      
   
 }



?>


<div class="col-md-8">
     <div class="card mb-3">
       <div class="card-body">
      <?php $sql = "SELECT * FROM products WHERE ProductId = '$productId'";

$result = $con->query($sql);

  while($row = $result->fetch_assoc()){
    
  ?>
                        <div class="card-body p-0 p-lg-3 text-black">
      
                       <form  action="" method="POST" enctype="multipart/form-data" >
      
                        <div class="d-flex mb-2 ">
                         
                          <span class="h2 fw-bold ">Update Listing</span>
                        </div>   
                         
                        <div class="form-outline mb-3 d-flex">
                        <?php echo '<img  width="150px;" height="120px;" id="output_image" src="'.$row['ProductImage'].'" alt="image" >';?>
                   
                    
                  </div>
                  <div class="form-outline mb-3 d-flex">
                  
                        
                  <input type="file" name="item_pic"  class="form-control" >
                    
                  </div>
             

                        <div class="form-outline mb-3 d-flex">
                            <label for="form2Example17">Listing Type</label>
                            <select class="form-control" name="ListingType">
                            <option <?=($row["ListingType"]=='0')?'selected':'';?> >Buy</option>
<option  <?=($row["ListingType"]=='1')?'selected':'';?> >Bid</option>


                            </select>
                          </div>

                          <div class="form-outline mb-3">

                           <input type="text" name="Price"  placeholder="Item Price / Initial Bid"  value="<?=$row["ProductPrice"]?>" class="form-control " />

                        </div>

                        <div class="form-outline mb-3">

                        <div class="form-outline mb-3 d-flex">
                          <label class="align-self-center">Category</label>
                          <select class="form-control ms-2" name="Category">
                          <option <?=($row["CategoryId"]=='1')?'selected':'';?> >1 | Phones</option>
                          <option <?=($row["CategoryId"]=='2')?'selected':'';?> >2 | Computers</option>
                          <option <?=($row["CategoryId"]=='3')?'selected':'';?> >3 | Accessories</option>
                          <option <?=($row["CategoryId"]=='4')?'selected':'';?> >4 | Clothes</option>
                     
                          </select>
                        </div>

                        <div class="form-outline mb-3">
                            <input type="text" name="PName" placeholder="ProductName" value="<?=$row["ProductName"]?>" class="form-control" />
                            
                          </div>

                        <div class="form-outline mb-3 d-flex">
                          <label class="align-self-center">Condition</label>
                          <select class="form-control ms-2" name="Condition">
                          <option <?=($row["ProductCondition"]=='0')?'selected':'';?> >New</option>
                          <option <?=($row["ProductCondition"]=='1')?'selected':'';?> >Used</option>
                          </select>
                        </div>

                        <div class="form-outline mb-3">
                            <input type="text" name="Brand" placeholder="Brand"  value="<?=$row["Brand"]?>" class="form-control" />
                            
                          </div>
      
                        <div class="form-outline mb-3">
                          <input type="text" name="Description" placeholder="Description"  value="<?=$row["Description"]?>" class="form-control" />
                        
                        </div>
      
                        <div class="pt-1 mb-2 text-center d-grid">
                        <button class="btn btn-warning" type="submit" name="UpdateProduct" >Update Product</button>
                        </div>          
                      </form>
      
                    </div>
                  </div>
                </div>
              </div><?php }
              
              ?>