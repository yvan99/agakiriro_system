<?php require '../incl/css.php' ?>
    <body>
        <?php require '../incl/header.php' ?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    
                    <!-- Navbar section -->
                    <?php require '../incl/inclSuper/navbar.php' ?>
            
                    <div class="span9">
                        <div class="content">

       
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Add Agakiriro</h3>
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
                                            <label class="control-label" for="basicinput">Location</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Location..." name="location" required class="span8">
                                                
                                            </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Telephone</label>
											<div class="controls">
												<input type="text" placeholder="Telephone…" pattern="07[2,3,8]{1}[0-9]{7}" name="phone" required class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit">Add Agakiriro</button>
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
          $location=$_POST['location'];
          $phone=$_POST['phone'];
          $query=mysqli_query($conn,"SELECT * FROM agakiriro WHERE name='$name'");
          $fetch=mysqli_fetch_array($query);
          if ($fetch) {
            # code...
            print '
									<div class="module-body">
                                 <div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">Already Inserted!</h3>
									</div>
									</div>';
          }
          else{

            $insert="INSERT INTO agakiriro VALUES(NULL,'$name','$location','$phone')";
            $query=mysqli_query($conn,$insert)or die(mysqli_error());
            print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">Successfuly inserted!</h3>
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
