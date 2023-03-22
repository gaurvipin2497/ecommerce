 
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
    <link rel="stylesheet" href="/cssfiles/mymessagesstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>My Profile</title>
   



    

</head>
<body class="bg-white">

<script type="text/javascript">
  function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<?php
session_start();
require_once("db-connection.php");
require_once("header.php");


$username=$_SESSION["username"];
$id=$_SESSION["id"];

if(isset($_POST["submit"])){
$target_dir = "uploads/users/";
$target_file = $target_dir .time(). basename($_FILES["picture"]["name"]);

move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
$query="UPDATE users SET Picture='$target_file' where ID='$id'";
$con->query($query);

header("location:myprofile.php");


}
 ?>





<section>


    <div class="container-fluid justify-content-center vh-100">
        <div class="main-body">
        
             
     
     
              <div class="row gutters-sm">
                <div class="col-md-3 mb-3">
                  <div class="card">
                    <div class="card-body picture-container">
               
                      <div class=" d-flex flex-column align-items-center text-center picture">
                        <form action="" method="POST" enctype="multipart/form-data">
                        
                        <?php 

                        $sql="SELECT * FROM users WHERE ID='$id'";
                        $query=$con->query($sql);
                         $row=$query->fetch_assoc();  ?>
                      

                       <?php echo '<img  class="picture-src" id="output_image" src="'.$row['Picture'].'" alt="image" >'; 
                        
                       
                       ?>
                        
                      

                        <input type="file" name="picture" onchange="preview_image(event)" class="form-control" >
                        
                      </div>
                 
                    </div>
                    <div class="mb-3 align-items-center text-center">
                          <h4><?php echo "Hello " . $username ?></h4>
                          
                          <input class="btn btn-outline-secondary" type="submit" name="submit" value="Upload"  /> 
                          </form>
                     
                          
                        </div>

                     

                  
                  </div>
                  
                  
                  <div class="col-md d-md-block py-2">
                    <div class="card">
                      <div class="card-body">
                        <nav class="nav flex-column nav-pills nav-gap-y-1">
                          <div class="text-center d-grid">
                           
                          <a class="button" href="myprofile.php?content_id=profile" >Profile</a>
                          </a>
                          <div class="text-center d-grid">
                            <a class="button" href="myprofile.php?content_id=messages" >My Messages</a>
                          </div>
                          </a>
                          <div class="text-center d-grid">
                          <a class="button" href="myprofile.php?content_id=createnewlisting">Create New Listing</a>
                         </div>
                         </a>
                         <div class="text-center d-grid">
                          <a class="button" href="myprofile.php?content_id=mylistings" >My Listings</a>
                         </div>
                          </a>
                          <div class="text-center d-grid">
                            <a class="button" href="myprofile.php?content_id=mypurchases" >My Purchases</a>
                           </div>
                          </a>
                          <div class="text-center d-grid">
                            <a class="button" href="myprofile.php?content_id=mybids" >My Bids</a>
                           </div>
                           </a>
                           <div class="text-center d-grid">
                            <a class="button" href="myprofile.php?content_id=myfavlist" >My Favorite Listings</a>
                           </div>
                           </a>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>

                      <!-- SADECE BURASI DEĞİŞECEK -->
                      <div class="col-md-9 mb-3">
                
                <?php 
                 $content=$_GET['content_id'];
                if($content=="" || $content=="profile"){
                  require_once("my_profile/information.php");
                }
                else if($content=="messages"){
                  require_once("my_profile/messages.php");
                }
                else if($content=="createnewlisting"){
                  require_once("my_profile/newListing.php");
                }
                else if($content=="mylistings"){
                  require_once("my_profile/mylisting.php");
                }
                else if($content=="mypurchases"){
                  require_once("my_profile/mypurchases.php");
                }
                else if($content=="myfavlist"){
                  require_once("my_profile/myfav.php");
                }
                else if($content=="mybids"){
                  require_once("my_profile/mybids.php");
                }
                
                else if($content=="update"){
                  require_once("update.php");
                }
               
                                
                 ?>


                      </div>
              </div>
    
            </div>
        </div>
    </section>


     <?php require_once("footer.php")?>






    
    













    
</body>
</html>