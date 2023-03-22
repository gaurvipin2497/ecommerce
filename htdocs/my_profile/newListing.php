<?php
require_once("db-connection.php");

session_start();




$id=$_SESSION["id"];

if(isset($_POST['Add']))
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

   $startDate = time();
    $date=date('Y-m-d H:i:s', strtotime('+5 day', $startDate));


    

   

     
      $query="INSERT INTO products (ProductName, ProductPrice,ExpiredDate,ProductImage, ListingType, ProductCondition,Brand,Status,Description,UserId,CategoryId) 
      
       VALUES ('$pname',$price,'$date','$target_file',$Lt,$condition,'$brand',0,'$descr',$id,$cate)";
      
      $con->query($query);
      
     header("Location:myprofile.php?content_id=createnewlisting&success=success");


      exit();
   
      
      
   
 }

     





?>




<div class="col-md-8">
     <div class="card mb-3">
       <div class="card-body">
        
                    <div class="card-body p-0 p-lg-3 text-black">
      
                    <?php
                      if(isset($_GET['success'])){
                $message=$_GET['success'];
                $message="New Listing Added Successfully!";
              
              echo '<div class="alert alert-success">'.$message.'</div>';

              
              }
              
?>
              
           
                       <form  action="" method="POST" enctype="multipart/form-data" >
      
                        <div class="d-flex mb-2 ">
                         
                          <span class="h2 fw-bold ">Create New Listing</span>
                        </div>   
                         
                        <div class="form-outline mb-3 d-flex">
                      <input type="file" name="item_pic" class="form-control" >
                    
                  </div>


                        <div class="form-outline mb-3 d-flex">
                            <label for="form2Example17">Listing Type</label>
                            <select class="form-control" name="ListingType">
                              <option>Buy</option>
                              <option>Bid</option>
                            </select>
                          </div>

                          <div class="form-outline mb-3">

                           <input type="text" name="Price"  placeholder="Item Price / Initial Bid" class="form-control " />
                   
                        </div>
      

                          

                        <div class="form-outline mb-3 d-flex">
                          <label class="align-self-center">Category</label>

                          <select class="form-control ms-2" name="Category">
                          <?php 
                          $read_categories= "SELECT * FROM categories";
                          $cate_result=$con->query($read_categories);
                          while($cate_row=$cate_result->fetch_assoc()){
                          
                            echo '<option>'.$cate_row["CategoryId"]." | ".$cate_row["CategoryName"].'</option>';
                          }


                          ?>
                          </select>
                        </div>

                        <div class="form-outline mb-3">
                            <input type="text" name="PName" placeholder="ProductName" class="form-control" />
                            
                          </div>

                        <div class="form-outline mb-3 d-flex">
                          <label class="align-self-center">Condition</label>
                          <select class="form-control ms-2" name="Condition">
                            <option>New</option>
                            <option>Used</option>
                          </select>
                        </div>

                        <div class="form-outline mb-3">
                            <input type="text" name="Brand" placeholder="Brand" class="form-control" />
                            
                          </div>
      
                        <div class="form-outline mb-3">
                          <input type="text" name="Description" placeholder="Description" class="form-control" />
                        
                        </div>
      
                        <div class="pt-1 mb-2 text-center d-grid">
                        <button class="btn btn-success" type="submit" name="Add" >Create New listing</button>
                        </div>          
                      </form>
      
                    </div>
                  </div>
                </div>

              </div>