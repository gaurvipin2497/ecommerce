<?php
                      
  require_once("db-connection.php");
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

    $query = "SELECT * FROM purchased WHERE BuyerId = '" .$_SESSION['id']. "'";
    $results=mysqli_query($con,$query);
    $row_count=mysqli_num_rows($results);
?>

<div class="col-md d-md-block ">
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
                                    <th>Order #</th>
                                    <th>Product name</th>
                                    <th>Status</th>
                                    <th>Price</th>
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
                                        echo "<td>".($row['PurchaseId'])."</td>";
                                        echo "<td>".(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['ProductId']. "'"))['ProductName'])."</td>";
                                        if (mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE ProductId = '" .$row['ProductId']. "'"))['Status']==0) {
                                            echo "<td>Pending</td>";
                                        } else {
                                            echo "<td>Delivered</td>";
                                        }
                                        echo "<td>$".($row['Price'])."</td>";
                                        echo "<td>".($row['Date'])."</td>";
                                        echo "</tr>";
                                    }                                   

                                    mysqli_query($con,$query); 
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