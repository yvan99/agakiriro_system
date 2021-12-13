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
                                        Update Category</h3>
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
											<div class="controls">
												<button type="submit" class="btn" name="submit">Update Category</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
                                    
									</div>
                            </div>

                            <?php
        include '..\connect.php';
        if (isset($_POST['submit'])) {
          $name=$_POST['name'];
          $query=mysqli_query($conn,"SELECT * FROM product_category WHERE type_name='$name'");
          $fetch=mysqli_fetch_array($query);
          if ($fetch) {
            # code...

          }
          else{
            $insert="INSERT INTO product_category VALUES(NULL,'$name','$searchId')";
            $query=mysqli_query($conn,$insert)or die(mysqli_error($conn));
            print '
            <div class="module-body">
            <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>Wooww!</strong> Successfully inserted
               </div>
               </div>';
          }
        }
    ?>
                        </div>
                 
                    </div>
    
                </div>
            </div>
   
        </div>
        <?php require '../incl/footer.php' ?>
        <?php require '../incl/js.php' ?>
      
    </body>
