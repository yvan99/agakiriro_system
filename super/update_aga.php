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
                        <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * from agakiriro where aga_id = '$id'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result);
                        ?>
       
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
												<input type="text" id="basicinput" value="<?php echo $row['name'];?>" placeholder="Name..." name="name" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Location</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" value="<?php echo $row['location'];?>" placeholder="Location..." name="location" required class="span8">
                                                
                                            </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Telephone</label>
											<div class="controls">
												<input type="text" placeholder="Telephone…" value="<?php echo $row['phone'];?>" pattern="07[2,3,8]{1}[0-9]{7}" name="phone" required class="span8 tip">
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
												<button type="submit" class="btn" name="submit">Update Agakiriro</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
									</div>
                            </div>

                            <?php
        if (isset($_POST['submit'])) {
          $name=$_POST['name'];
          $location=$_POST['location'];
          $phone=$_POST['phone'];
          $admin = $_POST['admin'];
          $sql = mysqli_query($conn, "SELECT * FROM admin WHERE fullnames = '$admin'");
          $rows = mysqli_fetch_array($sql);
          $admin_id = $rows['id'];
          $insert="UPDATE agakiriro SET name='$name', location='$location', phone='$phone', admin_id='$admin_id' WHERE aga_id='$id'";
          $query=mysqli_query($conn,$insert)or die(mysqli_error($conn));
          echo "<script type='text/javascript'>window.location.href='manage_udu.php'</script>";
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
