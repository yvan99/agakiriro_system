<?php require '../incl/server.php';

require_once '../connect.php';

$current = $_SESSION['admin'];
$searchQuery = mysqli_query($conn, "SELECT * FROM `users`,admin,agakiriro WHERE users.email = admin.email and usr_id = $current AND admin.id = agakiriro.admin_id ");
$search = mysqli_fetch_array($searchQuery);
$searchId = $search['aga_id'];
?>

<?php require '../incl/css.php' ?>
    <body>
        <?php require '../incl/header.php' ?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    
                    <!-- Navbar section -->
                    <?php require '../incl/navbar.php' ?>
            
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Worker List</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * FROM worker,agakiriro,users WHERE agakiriro_id= aga_id and aga_id = '$searchId' and users.email = worker.email";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Full Name
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
                               print '<tr class="odd gradeX">
                                                <td>
                                                    '.$row['names'].'
                                                </td>
                                                <td>
                                                    '.$row['email'].'
                                                </td>
                                                <td>
                                                    '.$row['name'].'
                                                </td>
                                                <td>
                                                    '.$row['phone'].'
                                                </td>
                                                <td class="center">
                                               <div class="control-group">
											<div class="controls">
												<div class="dropdown">'?>
                                                <?php
                                                if($row['status'] == 'active'){
                                            ?>
                                            <a class="dropdown-toggle btn btn-danger" href="activeWorker.php?disable=<?php echo $row['email'];?>">Disable Account</a>
                                            <?php
                                                }else{?>
                                            <a class="dropdown-toggle btn btn-info" href="activeWorker.php?active=<?php echo $row['email'];?>">Activate Account</a>
                                            <?php
                                                }'
												</div>
											</div>
										</div>
                                                </td>
                                            </tr>';
                                    }
                                    } else {
                                    print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No Worker Found!</h3>
										All Worker in your Site will be shown here.
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
