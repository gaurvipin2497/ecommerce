<?php
                      
  require_once("db-connection.php");
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $id=$_SESSION["id"];
  }

    $query = "SELECT * FROM bids INNER JOIN users INNER JOIN products on products.ProductId=bids.ProductId and users.ID=bids.BuyerUserId  WHERE BuyerUserId = $id";
    $results=mysqli_query($con,$query);
    $row_count=mysqli_num_rows($results);
?>
<div class="row"><div class="col-md d-md-block ">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center row">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="toggle-btn">
                                            <div class="inner-circle"></div>
                                        </div>
                                    </th>
                                    <th>Bid ID #</th>
                                    <th>Product name</th>
                                    <th>Seller Name</th>
                                    <th>My Price</th>
                                    <th>Seller Price</th>
                                    <th>Status</th>
                                    <th>Expired Date</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php 
                                    while ($row = mysqli_fetch_array($results)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>";
                                        echo "<div class='toggle-btn'>";
                                        echo "<div class='inner-circle'></div>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td>".($row['BidID'])."</td>";
                                        echo "<td>".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['ProductId']. "'"))['ProductName'])."</td>";
                                        echo "<td>".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users WHERE ID = '" .$row['SellerUserId']. "'"))['FirstName'])."</td>";
                                        echo "<td>$".($row['BuyerPrice'])."</td>";
                                        echo "<td>$".($row['SellerPrice'])."</td>";
                                        echo "<td>".($row['Status'])."</td>";
                                        echo "<td>$".($row['ExpiredDate'])."</td>";
                                        echo "<td>".($row['PurchaseDate'])."</td>";
                                        echo "</tr>";
                                    }                                   

                                    mysqli_query($con,$query); 
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php 

$dquery = "SELECT * FROM bids INNER JOIN users INNER JOIN products on products.ProductId=bids.ProductId and users.ID=bids.SellerUserId  WHERE SellerUserId = $id";
$dresults=mysqli_query($con,$dquery);

?>

<div class="row"><div class="col-md d-md-block ">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center row">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="toggle-btn">
                                            <div class="inner-circle"></div>
                                        </div>
                                    </th>
                                    <th>Bid ID #</th>
                                    <th>Product name</th>
                                    <th>Buyer Name</th>
                                    <th>Buyer Price</th>
                                    <th>My Price</th>
                                    <th>Status</th>
                                    <th>Expired Date</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php 
                                    while ($drow = mysqli_fetch_array($dresults)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>";
                                        echo "<div class='toggle-btn'>";
                                        echo "<div class='inner-circle'></div>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td>".($drow['BidID'])."</td>";
                                        echo "<td>".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$drow['ProductId']. "'"))['ProductName'])."</td>";
                                        echo "<td>".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users WHERE ID = '" .$drow['BuyerUserId']. "'"))['Username'])."</td>";
                                        echo "<td>$".($drow['BuyerPrice'])."</td>";
                                        echo "<td>$".($drow['SellerPrice'])."</td>";
                                        echo "<td>".($drow['Status'])."</td>";
                                        echo "<td>".($drow['ExpiredDate'])."</td>";
                                        echo "<td>".($drow['PurchaseDate'])."</td>";
                                        echo "</tr>";
                                    }                                   

                                    mysqli_query($con,$dquery); 
                                    mysqli_close($con);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>