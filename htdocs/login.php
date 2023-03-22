
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Login</title>
    <style>
      .border-mid{
        border-left: 2px solid #E0E0E0 ;
      }

@media only screen and (max-width: 768px) {

  .border-mid{
    border:none
  }
}
    </style>
</head>
<body>
    <section style="background-color: #9A616D;" >
        <div class="container ">
          <div class="row d-flex justify-content-center align-items-center vh-100 ">
            <div class="col col-xl-10 py-2">
              <div class="card" style="border-radius: 1rem;">
                <div class="row align-items-center justify-content-center pt-4 pb-4">
                  <div class="col-md-6 col-lg-6 text-center pb-3">
                    <span class="h1 fst-italic ms-md-2">ListingShop.com</span>
                  </div>
                  <div class="col-md-6 col-lg-6 d-flex align-items-center justify-content-center border-mid">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="userlogin.php" method="POST" >
      
                        <div class="d-flex align-items-center j mb-3 pb-2">
                         
                          <span class="h1 fw-bold mb-0" >LOGIN</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
      

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
                      if(isset($_GET['wrong'])){
                $message=$_GET['wrong'];
                $message="Email or password is wrong";

                    ?> 

                
<div class="alert alert-danger text-center"><?php
                  echo $message

                    ?></div>
                    <?php

                    }?>


                        <div class="form-outline mb-4">
                          <input type="email"  placeholder="Email" name="email" class="form-control form-control-lg" />
                          
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password"  placeholder="Password" name="password" class="form-control form-control-lg" />
                        
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" name="login" type="submit">Login</button>
                        </div>
      
                      
                        <p class="pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
                       
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
      class="text-center text-lg-start text-white bg-dark "
      
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