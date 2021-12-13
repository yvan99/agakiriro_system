<?php require '../incl/inclWorker/server.php';

require_once '../connect.php';
$current = $_SESSION['worker'];
$searchQuery = mysqli_query($conn, "SELECT * FROM `users`,worker WHERE users.email = worker.email and usr_id = $current ");
$search = mysqli_fetch_array($searchQuery);
$searchId = $search['worker_id'];
$searchEmail = $search['email'];

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
                            <div class="module-body">
                                <div class="profile-head media">
                                    <div class="media-body">
                                        <h4>
                                            <?php echo $search['names'] ?> <small>Online</small>
                                        </h4>
                                        
                                    </div>
                                </div>
                                <ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Update Profile</a></li>
                                    <li><a href="#friends" data-toggle="tab">Update Password</a></li>
                                </ul>
                                <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">
                                        <div class="stream-list">
                                            <div class="media stream">
                                                <div class="media-body">
                                                <form class="form-horizontal row-fluid" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">FullNames</label>
											<div class="controls">
												<input type="text" id="basicinput" value="<?php echo $search['names'] ?>" placeholder="fullnames..." name="name" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Phone</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="phone..." value="<?php echo $search['phone'] ?>" name="phone" required class="span8">
												
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="updateProfile">Update Profile</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
                                    <?php 
                                        if (isset($_POST['updateProfile'])) {
                                            $names = $_POST['name'];
                                            $phone = $_POST['phone'];
                                            $sql = "UPDATE worker SET names ='$names', phone ='$phone' WHERE worker_id='$searchId'";
                                            if ($conn->query($sql) === TRUE) {
                                                ?>
			                                    <meta http-equiv ="refresh" content="0; url=profile.php">
			                                    <?php
                                             } else {
                                              echo "Error updating record: " . $conn->error;
                                            }
                                            $conn->close();
                                        }
                                    ?>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <!--/.stream-list-->
                                    </div>
                                    <div class="tab-pane fade" id="friends">
                                        <div class="module-option clearfix">
                                            <form method="POST">
                                            <div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Password..." name="pass" required class="span6">
												
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="updatePassword">Update Password</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
                                    </div>
                                            </form>
                                            <?php 
                                        if (isset($_POST['updatePassword'])) {
                                            $password = $_POST['pass'];
                                            $sql = "UPDATE users SET password ='$password' WHERE email='$searchEmail'";
                                            if ($conn->query($sql) === TRUE) {
                                                ?>
			                                    <meta http-equiv ="refresh" content="0; url=profile.php">
			                                    <?php
                                             } else {
                                              echo "Error updating record: " . $conn->error;
                                            }
                                            $conn->close();
                                        }
                                    ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--/.module-body-->
                        </div>
                        <!--/.module-->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
                </div>
            </div>
                    
        </div>
        <?php require '../incl/footer.php' ?>
        <?php require '../incl/js.php' ?>
      
    </body>
