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
                                        Make Purchase</h3>
                                </div>
								<div class="module-body">
                                 <form class="form-horizontal row-fluid" action="operation.php" method="POST">
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Choose Product</label>
											<div class="controls">
                                                
                                            <?php
                                            @$cat=$_GET['product']; // Use this line or below line if register_global is off
                                            if(strlen($cat) < 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
                                            echo "Data Error";
                                            exit;
                                            }
                                            $query2="SELECT * FROM product where user_id = '$searchId'"; 
                                            ?>
                                            <select name='productTag' onchange="reload(this.form)">
                                                <option value=''>Select one</option>
                                                <?php
                                                    if($stmt = $conn->query("$query2")){
                                                        while ($row2 = $stmt->fetch_assoc()) {
                                                            if($row2['product_name']==@$cat){
                                                ?>
                                                <option selected value=<?php echo $row2['product_name'] ?>><?php echo $cat?></option>
                                                <?php
                                                            }

                                                            else{
                                                ?>
                                                <option><?php echo $row2['product_name']?></option>
                                                <?php
                                                                } 
                                                        }
                                                    }else{
                                                        echo $conn->error;
                                                    }
                                                        echo "</select>";
                                                ?>
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Quantity</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="quantity..." name="qty" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Unit Price</label>
											<div class="controls">
												<input type="text" id="basicinput" value="<?php
                                                 $query = mysqli_query($conn,"SELECT * FROM product where product_name='$cat'"); 
                                                 $row = mysqli_fetch_array($query);
                                                 echo $row['unit_price'];
                                                 ?>" placeholder="unitprice..." name="pricetag" required class="span8">
												
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="savePurchase">Make Purchase</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
									</div>
                            </div>
                            
                                 <?php
								 $sql = "SELECT * FROM purchasetbl,product WHERE product = product_id AND purchasetbl.user_id = '$searchId' ";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
                                     <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Purchase You made</h3>
                                </div>
                                <div class="module-body table">
									  <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Product
                                                </th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
    
                                  while($row = $result->fetch_assoc()) {
                               print '<tr class="odd gradeX">
                                                <td>
                                                    '.$row['product_name'].'
                                                </td>
                                                <td>
                                                    '.$row['purchase_qty'].'
                                                </td>
                                                <td>
                                                    '.$row['unit_price'].'
                                                </td>
                                                <td>
                                                    '.$row['total'].'
                                                </td>
                                            </tr>
                                            ';
                                    }
                                    ?></tbody>
                                
                                    </table>
                                    <br>
                                    <form method="POST" action="operation.php?id=<?php echo $searchId ?>">
                                    <button type="submit" name="transaction" class="btn btn-primary pull-left">Submit</button>
                                    </form><?php
                                    } 
								 ?>
                                 <br>
                                 <div class="clearfix"></div>
                                 
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
