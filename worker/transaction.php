<?php require '../incl/inclWorker/server.php';

require_once '../connect.php';
$current = $_SESSION['worker'];
$searchQuery = mysqli_query($conn, "SELECT * FROM `users`,worker WHERE users.email = worker.email and usr_id = $current ");
$search = mysqli_fetch_array($searchQuery);
$searchId = $search['worker_id'];
?>
<?php require '../incl/css.php' ?>
    <body>
        <?php require '../incl/header.php' ?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    
                    <!-- Navbar section -->
                    <?php require '../incl/inclWorker/navbar.php' ?>
            
                    <div class="span9">
                        <div class="content">
                        <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class=" icon-random"></i><b><?php 
                                                $query = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'purchase' AND user_id = '$searchId' ");
                                                $row = mysqli_fetch_array($query);
                                                echo $row['SUM(total)'];
                                            ?></b>
                                        <p class="text-muted">
                                            Total Purchase
                                            </p>
                                    </a><a class="btn-box big span4"><i class="icon-exchange"></i><b><?php 
                                                $query = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'sale' and user_id = '$searchId'");
                                                $row = mysqli_fetch_array($query);
                                                echo $row['SUM(total)'];
                                            ?></b>
                                        <p class="text-muted">
                                            Total Sales</p>
                                    </a><a class="btn-box big span4"><i class="icon-money"></i><b><?php 
                                                $query = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'purchase' and user_id = '$searchId'");
                                                $row = mysqli_fetch_array($query);
                                                $purchase = $row['SUM(total)'];
                                                $insert = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'sale' and user_id = '$searchId'");
                                                $fetch = mysqli_fetch_array($insert);
                                                $sale = $fetch['SUM(total)'];
                                                $result = $sale - $purchase;
                                                echo $result;
                                            ?></b>
                                            <?php if ($purchase > $sale) {?>
                                        <p class="text-muted" style="color: red;">
                                            Loss
                                        </p>
                                        <?php } else{ ?>
                                            <p class="text-muted">
                                            Profit
                                        </p> 
                                        <?php }?>  
                                    </a>
                                </div>
                                
                        </div>
                        
                        </div>
                        <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Product List</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * FROM transaction,product WHERE product = product_id AND transaction.user_id = '$searchId' ";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    UnitPrice
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
    
                                  while($row = $result->fetch_assoc()) {
                               print '<tr class="odd gradeX">
                                                <td>
                                                    '.$row['product_name'].'
                                                </td>
                                                <td>
                                                    '.$row['type'].'
                                                </td>
                                                <td>
                                                    '.$row['quantity'].'
                                                </td>
                                                <td>
                                                    '.$row['unit_price'].'
                                                </td>
                                                <td>
                                                    '.$row['total'].'
                                                </td>
                                            </tr>';
                                    }
                                    } else {
                                    print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No APPLICATION Found!</h3>
										All APPLICATION you register will be shown here.
									</div>
									</div>';
                                       }
									   
									   print ' </tbody>
                                
                                    </table>';
                                     $conn->close();
								 ?>
                                </div>
                            </div>

                       
                        </div>
                 
                    </div>
                    </div>
    
                </div>
            </div>
   
        </div>
        <?php require '../incl/footer.php' ?>
        <?php require '../incl/js.php' ?>
      
    </body>
