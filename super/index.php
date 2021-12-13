<?php require '../incl/inclSuper/server.php';
require_once '../connect.php';

?>
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
                                            <label class="control-label" for="basicinput">District</label>
                                            <div class="controls">
                                            <select name="district" class="form-control">
                                                <option>Select District..</option>
                                                <option>karongi</option>
                                                <option>ngororero</option>
                                                <option>nyabihu</option>
                                                <option>nyamasheke</option>
                                                <option>rubavu</option>
                                                <option>rusizi</option>
                                                <option>rutsiro</option>
                                            </select>
                                            </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Telephone</label>
											<div class="controls">
												<input type="text" placeholder="Telephone…" pattern="07[2,3,8]{1}[0-9]{7}" name="phone" required class="span8 tip">
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Admin</label>
											<div class="controls">
                                                
                                            <select name="admin" class="form-control">
                                                <option>Select Admin..</option>
                                                <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM admin");
                                                    while($row=mysqli_fetch_array($query)){
                                                ?>
                                                <option><?php echo $row['fullnames'] ?></option>
                                                <?php }?>
                                            </select>
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
          $location=$_POST['district'];
          $phone=$_POST['phone'];
          $admin = $_POST['admin'];
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
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE fullnames = '$admin'");
            $rows = mysqli_fetch_array($sql);
            $id = $rows['id'];
            $insert="INSERT INTO agakiriro VALUES(NULL,'$name','$location','$phone','$id')";
            $query=mysqli_query($conn,$insert)or die(mysqli_error($conn));
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
