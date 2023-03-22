<?php
                      
  require_once("db-connection.php");
  session_start();
                    
                      

 

                $sql = "SELECT * FROM users WHERE ID = '" .$_SESSION['id']. "'";
                      $result = mysqli_query($con,$sql);
                      if ($result !== false) {
                          $row = mysqli_fetch_array($result);
                        
                      } else {
                        // an error has occured
                        
                        die;
                                }
                               $userid=$row["ID"];
                                ?>
                          
               
                  <div class="card mb-3">
                    <div class="card-body">
                    <form action="update.php" method="POST">
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text"  name="firstname" readonly value=<?php echo $row["FirstName"];?> class="form-control form-control-lg" />  
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text"  name="lastname" readonly value=<?php echo $row["LastName"];?>  class="form-control form-control-lg" />  
                        
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text"  name="username" readonly value=<?php echo $row["Username"];?>  class="form-control form-control-lg" />  
                       
                        </div>
                      </div>
                      <hr>
                                                 
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="tel"  name="phone" readonly value=<?php echo $row["PhoneNumber"];?>   class="form-control form-control-lg" />  
                       
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="email"  name="email" readonly value=<?php echo $row["Email"];?>   class="form-control form-control-lg" />  
                        
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-sm-3 align-self-center">
                          <h6 class="mb-0">Password</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="password"  name="password" readonly value=<?php echo $row["Password"];?>   class="form-control form-control-lg" />  
                        
                        </div>
                      </div>
                      <hr>
                    
                      
                      <div class="row">
                        <div class="col-sm-12"><a  class="btn btn-warning text-white" href="myprofile.php?content_id=update">Edit</a>
                     
                   
                      </div>
                        </div>
                        </form>
                      </div>
                    </div>
                
    
                  
    
    
    
                </div>
         