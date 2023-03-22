<?php
                      
  require_once("db-connection.php");
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

    $query = "SELECT * FROM favorites WHERE UserId = '" .$_SESSION['id']. "'";
    $results=mysqli_query($con,$query);
 if (mysqli_num_rows($results)>0){
?>
<div class="col-md-10">
    <div class="card mb-3">
        <div class="card-body">

            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-lg-12 ">

                        <?php
                        while ($row = mysqli_fetch_array($results)) {?>
                        <div class="row p-2 bg-white border rounded mt-2">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                    src=<?php echo "".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['LikedProductId']. "'"))['ProductImage']).""; ?>>
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5><?php echo "".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['LikedProductId']. "'"))['ProductName']).""; ?>
                                </h5>
                                <div class="d-flex flex-row">
                                    <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i></div><span></span>
                                </div>
                                <div class="mt-1 mb-1 spec-1">
                                    <span><?php echo "".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['LikedProductId']. "'"))['Description']).""; ?>
                                </div>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">
                                        $<?php echo "".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['LikedProductId']. "'"))['ProductPrice']).""; ?>
                                    </h4></span>
                                </div>
                                <h6 class="text-success">+ shipping</h6>
                                <div class="d-flex flex-column mt-4">
                                <a class="btn btn-secondary btn-sm mb-2"  href="categories.php?productid=<?= $row["LikedProductId"] ?>">
                                    Go to 
                                   </a>
                                  <button class="btn btn-warning btn-sm" type="button1" data-row_id=<?php echo "".($row['FavoriteId'])."" ?>>
                                    Remove My List
                                  </button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
else{
    echo '<h3 class="h3 text-center mt-5 ">There is no product.</h3>';
}



?>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-warning').click(function() {
      // go delete php page
      location.href = "my_profile/deletefav.php?FavoriteId=" + $(this).data('row_id');
    });
  });
</script>