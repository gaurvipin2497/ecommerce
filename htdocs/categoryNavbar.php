<?php

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light ">
          <div class="container">
             <a class="navbar-brand d-lg-none d-lg-flex " href="#">
            Categories</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
              <div class="collapse navbar-collapse justify-content-center "  id="navbarNavDropdown">
                  <ul class="navbar-nav">
                  <li class="nav-item"> <a class="nav-link" href="categories.php?All=All">All Products</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="categories.php?AllBuy=All Buy">All Buy</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="categories.php?AllBid=All Bids">All Bid</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="categories.php?new=New">New</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="categories.php?used=Used">Used </a> </li>';
                  ?>
                  <?php 
                   $get_categories="SELECT CategoryName from categories";
                   $result=$con->query($get_categories);
                    while($row=$result->fetch_assoc()){               
                    echo  ' <li class="nav-item"> <a class="nav-link" href="categories.php?category='.$row["CategoryName"].'">'.ucfirst($row["CategoryName"]).'</a> </li>';
                    }
                   echo '</ul>
                    </div>
                </div>
            </nav>';
      
                      ?>
                      
                   
        

