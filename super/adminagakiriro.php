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
                                        Add Admin</h3>
                                </div>
								<div class="module-body">
                                 <form class="form-horizontal row-fluid" method="POST" action="saveAdmin.php">
										<div class="control-group">
											<label class="control-label" for="basicinput">FullNames</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Name..." name="name" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Email</label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" placeholder="Email..." name="email" required class="span8">
                                                
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
												<button type="submit" class="btn" name="submit">Add Admin</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
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
