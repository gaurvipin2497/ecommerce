<?php

use function PHPSTORM_META\elementType;
session_start();

class ProductCards{


    public function bigger_products($row,$type,$con){
      
      date_default_timezone_set('Europe/Istanbul');
      $date = date('Y-m-d H:i:s');
        
        
        $condition="";
        if($row["ProductCondition"]==1){
            $condition="Used";
            $condType='used=Used';
          }
          else{
            $condition="New";
            $condType='new=New';
          }

        

        echo '
        
        <div class="mb-3">
        ';
        if (!is_null($row["ExpiredDate"]) && $row["ExpiredDate"]>$date){
          echo '<div class="timer timer-div"  data-date="'.$row["ExpiredDate"].'" ></div>';
        }
        else{
          echo '<div class="non-div" ></div>';
        }
       
      
        echo
        '<form action="purchased.php?productid='.$row["ProductId"].'&buyerid='.$_SESSION["id"].'&sellerid='.$row["UserId"].'&price='.$row["ProductPrice"].'&expdate='.$row["ExpiredDate"].'" method="POST" ;>
       
        <div class="card">
     
            <div class="d-flex justify-content-between px-3 py-2">
            <p class="fw-bold align-self-center mb-0">ID:'.$row["ProductId"].' | Combo Offer</p>
               
             
               <button class="favbg rounded-circle border-0"  name="favorite" type="submit"><i class="fav bi-heart-fill "></i></button>
         
           
            
            </div>
            <div class="image_div">
            <a href="" class="text-center ">
            <img
              src="'.$row["ProductImage"].'"
              class="card-img-top"
              alt=""
            />
          </a>
          </div>
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="small"><a href="categories.php?category='.$row["CategoryName"].'" class="text-muted">'.$row["CategoryName"].'</a></p>
                <p class="small text-muted">'.date("d/m/Y", strtotime($row["ProductAddedTime"])).'</p>
              </div>
  
  
              <div class="d-flex justify-content-between mb-3">
                <p class="text-muted small mb-0">Seller: <a href="userprofile.php?username='.$row["Username"].'" class="fw-bold">'.$row["Username"].'</a></p>
                <div class="ms-auto text-warning">
                <p class="small mb-0"><a href="categories.php?condition='.$row["ProductCondition"].'&'.$condType.'" class="fw-bold">'.$condition.'</a></p>
                </div>
              </div>
  
              <div class="d-flex justify-content-between mb-1">
              <div class="d-flex"> <a href="categories.php?brand='.$row["Brand"].'"> <p class="mb-0 fw-bold align-self-start ">'.$row["Brand"].'</p></a> <p class="mx-1 small  mb-0 align-self-center">'.$row["ProductName"].'</p></div>
               
              </div>
              <div style="height:50px;">
              <p class="small  mb-2 align-self-center">'.$row["Description"].'</p></div>';
             
              
              if($type==0){
          
                echo '  <div class="d-flex justify-content-end gap-2 ">
                <h6 class="lead fw-bold p-2 ">$'.$row["ProductPrice"].'</h6></div>'?>
           <?php  if($row["Status"]==0 && $_SESSION["id"]!=$row["UserId"]) { 
               echo '<div class="d-flex justify-content-center gap-2">
              
                 <div class="col px-2 pb-2">
                   <button  class="btn btn-warning w-100 confirm" name="Buy" type="submit" > Buy</button>
                 </div>
               
     
               </div>  <!--dflex gap-2-->'; 
           }

               else{
                 if( $_SESSION["id"]==$row["UserId"]){
                  echo '<div class="d-flex justify-content-center gap-2">
              
                  <div class="col px-2 pb-2">
                    <button  class="btn btn-primary w-100 disabled" name="Buy" type="submit"> Your Product</button>
                  </div>
                
      
                </div>  <!--dflex gap-2-->';
                 }
                 else{
                  echo '<div class="d-flex justify-content-center gap-2">
              
                  <div class="col px-2 pb-2">
                    <button  class="btn btn-danger w-100 disabled " name="Buy" type="submit"> Purchased for $'.$row["ProductPrice"].'</button>
                  </div>
                
      
                </div>  <!--dflex gap-2-->';
                 }
                  
               }
               
              }

               else if($type==1){
                if( $_SESSION["id"]==$row["UserId"]){

                  echo  '<div class="input-group input-group-sm p-2">
                  <span class="input-group-text" id="basic-addon1">Min: $'.$row["ProductPrice"].'</span>
                  <input type="text" name="buyerbid" class="form-control" placeholder="Enter Bid" readonly aria-label="Bid" aria-describedby="basic-addon1">
                </div>
                  
              
          
                    <div class="col px-2 pb-2  ">
                      <button  class="btn btn-primary w-100 disabled" name="Bid"  type="submit" >Your Product</button>
                    </div>
                    ';

                 }
                 
                else if($row["Status"]==0 && $row["ExpiredDate"]>$date) { 
         
               echo  '<div class="input-group input-group-sm p-2">
                 <span class="input-group-text" id="basic-addon1">Min: $'.$row["ProductPrice"].'</span>
                 <input type="text" name="buyerbid" class="form-control" placeholder="Enter Bid" aria-label="Bid" aria-describedby="basic-addon1">
               </div>
                 
             
         
                   <div class="col px-2 pb-2  ">
                     <button  class="btn btn-success w-100" name="Bid" type="submit" >Bid</button>
                   </div>
                   ';}
               

                   else{
                     
                                      
                     
                      $updateStatus="UPDATE products set Status=1 Where ProductId=".$row['ProductId']."";
                      $con->query($updateStatus);

                  echo  '<div class="input-group input-group-sm p-2">
                 <span class="input-group-text" id="basic-addon1">Min: $'.$row["ProductPrice"].'</span>
                 <input type="text" name="buyerbid" class="form-control " readonly placeholder="Enter Bid" aria-label="Bid" aria-describedby="basic-addon1">
               </div>
                 
             
         
                   <div class="col px-2 pb-2  ">
                     <button  class="btn btn-danger disabled w-100" name="Bid" type="submit" >Purchased for $'.$row["ProductPrice"].'</button>
                   </div>';

                     }
             }   
              
           echo '
           
      
           </div> <!--Card body-->
            
            
            </div> <!--card-->
  
            </form>
  
        </div> <!--Col xxl-->
       
        
        ';
        
  
      }





    public function smaller_products($row){
      echo  '<div class="col-md-4 col-lg-3 col-xl-2 col-sm-6">
      <form action="purchased.php?productid='.$row["ProductId"].'&buyerid='.$_SESSION["id"].'&sellerid='.$row["UserId"].'&price='.$row["ProductPrice"].'" method="POST" ;>
       
      <div id="product-1" class="single-product">
          <div class="part-1">
            <img src="'.$row["ProductImage"].'" class="card-img-top2 " alt="">
         
            <ul class="d-flex ">
              ';
              if($_SESSION["id"]==$row["UserId"]){
                echo ' <div class="your">Your Product</div>';
              }
             else if($row["Status"]==0){
              echo  '
                <li><a class="" href="categories.php?productid='.$row["ProductId"].'&categoryname='.$row["CategoryName"].'"><i class="bi-arrow-right-square-fill"></i></a></li>
                <li><button name="Buy" type="submit"><i class="bi-cart-fill"></i></button></li>
               
                <li><button  name="favorite" type="submit"><i class="bi-heart-fill"></i></button></li>';

              }
              

              else{
               echo ' <div class="sold">Product Purchased</div>';
              }
             
              
          echo ' </ul>
          </div>
          <div class="part-2">
              <div class="d-flex justify-content-evenly">
                <p class="small"><a href="categories.php?category='.$row["CategoryName"].'" class="text-muted">'.$row["CategoryName"].'</a></p>
                <p class="small text-muted">'.date("d/m/Y", strtotime($row["ProductAddedTime"])).'</p>

              </div>
              <div class="d-flex justify-content-center">
              <p class="mb-0 fw-bold align-self-start "><a href="categories.php?brand='.$row["Brand"].'">'.$row["Brand"].'</a></p>
              <p class="ps-1">'.$row["ProductName"].'</a></p></div>
              <div style="height:35px;"> <p class="mb-0 small align-self-start">'.$row["Description"].'</p></div>
             
              </div>
              <p class="mb-0 mt-2 fw-bold lead align-self-start">$'.$row["ProductPrice"].'</p>
          
      </div>
      </form>
  </div>';
    }
  
  
  }


?>
    


