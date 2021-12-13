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
                                        Manage Admin</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * from admin, users,agakiriro WHERE admin.email = users.email and admin.id = agakiriro.admin_id";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Names
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Agakiriro
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                                <th>
                                                    Activate/Diactivate
                                                </th>  
                                            </tr>
                                        </thead>
                                        <tbody>';
                                  while($row = $result->fetch_assoc()) {
                                      ?>
                               <tr class="odd gradeX">
                                                <td>
                                                    <?php echo $row['fullnames'] ?>
                                                </td>
                                                <td>
                                                <?php echo $row['email'] ?>
                                                </td>
                                                <td>
                                                <?php echo $row['name'] ?>
                                                </td>
                                                <td>
                                                <?php echo $row['phone'] ?>
                                                </td>
                                                <td class="center">
                                               <div class="control-group">
											<div class="controls">
												<div class="dropdown">
                                                    <?php
                                                        if($row['status'] == 'active'){
                                                    ?>
													<a class="dropdown-toggle btn btn-danger" href="approveAccount.php?disable=<?php echo $row['email'];?>">Disable Account</a>
                                                    <?php
                                                        }else{?>
                                                    <a class="dropdown-toggle btn btn-info" href="approveAccount.php?active=<?php echo $row['email'];?>">Activate Account</a>
                                                    <?php
                                                        }
                                                    ?>
												</div>
											</div>
										</div>
                                                </td>
                                            </tr>
                                            <?php
                                    }
                                    } else {
                                    print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No ADMIN Found!</h3>
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
