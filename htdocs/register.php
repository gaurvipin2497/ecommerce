



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
       .border-mid{
        border-left: 2px solid #E0E0E0 ;
      }

@media only screen and (max-width: 768px) {

  .border-mid{
    border-left: none;
   
    
  }
 
}

  
    </style>
    <title>Register to ListingShop.com</title>

</head>
<body >
    
    
  

<section  style="background-color: #9A616D;">
  <div class="container  ">
    <div class="row d-flex justify-content-center align-items-center  vh-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row align-items-center justify-content-center pt-4 pb-4">
            <div class="col-md-6 col-lg-6 text-center pb-3">
              <span class="h1 fst-italic ms-md-2">ListingShop.com</span>
            </div>
            <div class="col-md-6 col-lg-6 d-flex align-items-start justify-content-center border-mid">
              <div class="card-body px-lg-5 text-black align-items-start ">

                    <?php
                      if(isset($_GET['empty'])){
                $message=$_GET['empty'];
                $message="Please Fill in the Blanks!";

                    ?> 

                
<div class="alert alert-danger text-center"><?php
                  echo $message

                    ?></div>



                    <?php

                    }?>





<?php
                      if(isset($_GET['email'])){
                $message=$_GET['email'];
                $message="Email is already taken!";

                    ?> 

                
<div class="alert alert-danger text-center"><?php
                  echo $message

                    ?></div>
                    <?php

                    }?>

<?php
                      if(isset($_GET['username'])){
                $message=$_GET['username'];
                $message="Username is already taken!";

                    ?> 

                
<div class="alert alert-danger text-center">
  <?php
                  echo $message

                    ?></div>
                    <?php

                    }?>








                   

                <form  action="userregistration.php" method="POST" enctype="multipart/form-data" >
                  <h3 class="text-uppercase text-center mb-4 align-items-start">Create an account</h3>
                  <div class="form-outline mb-4">
                      <label for="formFileMultiple" class="form-label">Choose a Profile Picture</label>
                      <input type="file" name="picture" class="form-control" >
                    
                  </div>


                     <div class="d-flex justify-content-between">
                      <div class="form-outline mb-4 pe-1">
                          <input type="text" name="firstname"  placeholder="First Name" class="form-control " />
                         
                        </div>
                        <div class="form-outline mb-4">
                          <input type="text" id="form3Example1cg"  name="lastname" placeholder="Last Name" class="form-control " />
                         
                        </div>

                  </div>
                  <div class="d-flex justify-content-between">
                  <div class="form-outline mb-4 pe-1">
                      <input type="username" name="username"   placeholder="Username" class="form-control" />
                      
                    </div>
                    <div class="form-outline mb-4">
                      <input type="tel"  name="phonenumber"   placeholder="Phone Number" class="form-control" />
                      
                    </div>
                  
                  </div>
  
                  <div class="form-outline mb-4">
                    <input type="email"  name="email"    placeholder="Email" class="form-control " />
                    
                  </div>
  
                  <div class="form-outline mb-4">
                    <input type="password"  name="password"  placeholder="Password" class="form-control" />
                    
                  </div>
  
                          
                  <div class="form-check d-flex justify-content-center mb-4">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="termsofService"
                    />
                    <label class="form-check-label" name="Term"  for="termsofService">
                      I agree all statements in <a class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div>
  
                  <div class="text-center d-grid">
                      <button class="btn btn-dark" type="submit" name="register" >Register</button>
                    </div>
  
                  <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
<footer
class="text-center  text-white bg-dark "

>
<!-- Grid container -->

<!-- Grid container -->

<!-- Copyright -->
<div
class="text-center p-1 fixed-bottom"
style="background-color: rgba(0, 0, 0, 0.2)"
>
© 2022 Copyright:
<a class="text-white" href="https://listingShop.com/"
>ListingShop.com</a
>
</div>
<!-- Copyright -->
</footer>






    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>