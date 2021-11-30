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
                                        Make Sale</h3>
                                </div>
								<div class="module-body">
                                 <form class="form-horizontal row-fluid" method="POST">
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Choose Product</label>
											<div class="controls">
                                                
                                            <?php
                                            @$cat=$_GET['product']; // Use this line or below line if register_global is off
                                            if(strlen($cat) < 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
                                            echo "Data Error";
                                            exit;
                                            }
                                            $query2="SELECT * FROM product"; 
                                            ?>
                                            <select name='productTag' onchange="refresh(this.form)">
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
												<button type="submit" class="btn" name="saveSale">Make Sale</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
                                    <?php 
                                        if (isset($_POST['saveSale'])) {
                                            $product = $_POST['productTag'];
                                            $quantity = $_POST['qty'];
                                            $price = $_POST['pricetag'];
                                            $total = $price * $quantity;
                                            $query=mysqli_query($conn,"SELECT * FROM product WHERE product_name='$product'");
                                            $fetch=mysqli_fetch_array($query);
                                            $product_id = $fetch['product_id'];
                                            $foundQuantity = $fetch['quantity'];
                                            if ($foundQuantity < $quantity) {
                                                print '<div class="module-body">
                                                            <div class="alert alert-error">
										                        <button type="button" class="close" data-dismiss="alert">×</button>
										                        <strong>Not</strong> Enough quantity!
									                        </div>
                                                        </div>';
                                            }else{
                                                $foundQuantity = $foundQuantity - $quantity;
                                                $created = date("y-m-d");
                                                $insert="INSERT INTO saletbl VALUES(NULL,'$product_id','$quantity','$price','$total','$created','9')";
                                                mysqli_query($conn,$insert)or die(mysqli_error($conn));
                                                $updateProduct = mysqli_query($conn, "UPDATE product SET quantity = '$foundQuantity' WHERE product_id='$product_id' ");
                                                // header('Location:saleOrder.php'); 
                                            }
                                        }
                                    ?>
									</div>
                            </div>
                            
                                 <?php
								 $sql = "SELECT * FROM saletbl,product WHERE product = product_id";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
                                     <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Sale You made</h3>
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
                                                    '.$row['sale_qty'].'
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
                                    print ' </tbody>
                                
                                    </table>
                                    <br>
                                    <form method="POST" action="operation.php?id=9">
                                    <button type="submit" name="transactionSale" class="btn btn-primary pull-left">Submit</button>
                                    </form>';
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
