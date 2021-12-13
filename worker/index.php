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
                                        Add Product</h3>
                                </div>
								<div class="module-body">
                                 <form class="form-horizontal row-fluid" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">Name</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Name..." name="name" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
                                                
                                            <select name="category" class="form-control">
                                                <option>Select Category...</option>
                                                <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM product_category");
                                                    while($row=mysqli_fetch_array($query)){
                                                ?>
                                                <option><?php echo $row['type_name'] ?></option>
                                                <?php }?>
                                            </select>
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
												<input type="text" id="basicinput" placeholder="unitprice..." name="price" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="description..." name="description" required class="span8">
												
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit">Add Product</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
                                    <?php
        if (isset($_POST['submit'])) {
          $name=$_POST['name'];
          $type_name=$_POST['category'];
          $sql = mysqli_query($conn,"SELECT * FROM product_category WHERE type_name='$type_name'");
          $row = mysqli_fetch_array($sql);
          $category = $row['type_id'];
          $quantity = $_POST['qty'];
          $unit = $_POST['price'];
          $description = $_POST['description'];
          $created = date('Y-M-D');
          $query=mysqli_query($conn,"SELECT * FROM product WHERE product_name='$name'");
          $fetch=mysqli_fetch_array($query);
          if ($fetch) {
            # code...
            print '
									<div class="module-body">
                                 <div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Already</strong> Inserted!
									</div>
                                    </div>
                                    ';
          }
          else{
            $insert="INSERT INTO product VALUES(NULL,'$name','$category','$quantity','$unit','$description','$created','$searchId')";
            $query=mysqli_query($conn,$insert)or die(mysqli_error($conn));
            print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Wooww!</strong> Successfully inserted
									</div>
                                    </div>
                                    ';
          }
        }
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
