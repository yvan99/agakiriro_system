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
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Product List</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * FROM product,product_category WHERE category = type_id and product.user_id = '$searchId' and product_category.user_id='$searchId' ";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Category
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    UnitPrice
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    CreatedDate
                                                </th>
                                                <th>
                                                Action
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
                                                    '.$row['type_name'].'
                                                </td>
                                                <td>
                                                    '.$row['quantity'].'
                                                </td>
                                                <td>
                                                    '.$row['unit_price'].'
                                                </td>
                                                <td>
                                                    '.$row['description'].'
                                                </td>
                                                <td>
                                                    '.$row['createdDate'].'
                                                </td>
                                                <td>
                                                <div class="controls">
												<div class="dropdown">
													<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Option <i class="icon-caret-down"></i></a>
													<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														<li><a href="approve_worker.php">Delete Product</a></li>
                                                        <li><a href="reject_worker.php">Update Product</a></li>
														</ul>
												</div>
											</div>
										</div>
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
        <?php require '../incl/footer.php' ?>
        <?php require '../incl/js.php' ?>
      
    </body>
