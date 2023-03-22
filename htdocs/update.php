<?php 

require_once("db-connection.php");

session_start();
$id=$_SESSION["id"];
$sql = "SELECT * FROM users WHERE ID = '" .$id. "'";
$result = $con->query($sql);
if ($result !== false) {
    $row = $result->fetch_assoc();
  
} else {
  // an error has occured
  
  die;


}






if(isset($_POST['updated']))
{

if(empty($_POST['firstname']) || empty($_POST['lastname'])
 || empty($_POST['username']) || empty($_POST['phone'])
  || empty($_POST['email']) || empty($_POST['password']))
  {
    header("location: myprofile.php?content_id=update&empty");
    exit();
 }
 else{
   $fname=mysqli_real_escape_string($con,$_POST['firstname']);
   $lname=mysqli_real_escape_string($con,$_POST['lastname']);
   $uname=mysqli_real_escape_string($con,$_POST['username']);
   $phone=mysqli_real_escape_string($con,$_POST['phone']);
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $pwd=mysqli_real_escape_string($con,$_POST['password']);
  
 
   

   
  
  

  
   
   
      $query="UPDATE users SET FirstName='$fname', LastName='$lname', Username='$uname', PhoneNumber='$phone', Email='$email', Password='$pwd' where ID='$id'";
      
      $con->query($query);
      $_SESSION["username"]=$uname;

      header("Location: myprofile.php");
      exit();
   
      
   }
 


}





?>





<div class="col-md-8">


                  <div class="card mb-3">
                    
                    <div class="card-body">
                    
                    <form action="update.php" method="POST">
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text"  name="firstname" value=<?php echo $row["FirstName"];?> class="form-control form-control-lg" />  
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text"  name="lastname" value=<?php echo $row["LastName"];?>  class="form-control form-control-lg" />  
                        
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text"  name="username" value=<?php echo $row["Username"];?> class="form-control form-control-lg" />  
                       
                        </div>
                      </div>
                      <hr>
                                                 
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="tel"  name="phone" value=<?php echo $row["PhoneNumber"];?>  class="form-control form-control-lg" />  
                       
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="email"  name="email" value=<?php echo $row["Email"];?>  class="form-control form-control-lg" />  
                        
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="password"  name="password" value=<?php echo $row["Password"];?>  class="form-control form-control-lg" />  
                        
                        </div>
                      </div>
                      <hr>
                    
                      
                      <div class="row">
                      
                        <button class="btn btn-dark" type="submit" name="updated" >Save</button>
                   
                      </div>
                        </div>
                        </form>
                      </div>
                    </div>
 
                