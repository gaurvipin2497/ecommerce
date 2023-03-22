 <!--NAVBAR-->
 <?php 
      session_start();
   
       ?>
                  
      

      
      <header class=" bg-white sticky-top border">
 
       
        <div class="container ">
            <div class="row p-2 d-flex">
                <div class="col-lg-3 col-md-6 align-self-center text-center"> <h3 class="h3"> <a href="index.php" class="nav-link text-dark fst-italic  ">ListingShop.com</a></h3> </div>
                <div class="col-lg-5 col-md-6 align-self-center">
                <form action="search.php" method="POST">
                  <div class="input-group ">
                  
                    <input class="form-control py-2 border-end-0 border bg-light " style="color: gray;"  type="text" name="searchitem" placeholder="Search" >
                    <span class="input-group-append ">
                      
                        <button class="btn btn-outline-secondary bg-light border-start-0 border py-2"  name="search" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                  </div>
                
                </div>
                </form>
                <div class="col-lg-4 col-md d-flex justify-content-center align-items-center ">
                  
                  <div class="dropdown">
                    <a href="myprofile.php" name="myprofile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded text-dark">
                      <i class="bi-person" style="font-size: 1.25rem; color: black;"></i> 
                      <?php 
     
                      if (!$_SESSION["auth"]){
                      header("Location: login.php");
                      
                    }
                    echo $_SESSION["username"];
     
       ?>
                     </a>
                    <div class="dropdown-content nav-item nav-link has-icon nav-link-faded text-dark">
                      <a href="logout.php"><i class="bi-power" style="font-size: 1.25rem; color: black;"></i>Logout</a>
                      
                    </div>
                  </div>

                   <a href="myprofile.php?content_id=myfavlist" data-toggle="tab" class="nav-item nav-link  has-icon nav-link-faded  text-dark ">
                    <i class="bi-heart"style="font-size: 1.25rem; color: black;"></i> Favorites
                   </a>
                   <a href="mycart.php" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded text-dark">
                    <i class="bi-cart"style="font-size: 1.25rem; color: black;"></i> My Cart 
                   </a>
                    
                </div>
            </div>
        </div>
      
     

   
   
    </header>
