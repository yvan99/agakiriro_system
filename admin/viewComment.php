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
                                        Comment List</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * FROM worker,agakiriro,comment where comment.user_id = worker.worker_id and worker.agakiriro_id = agakiriro.aga_id and agakiriro.aga_id = $searchId";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Worker Name
                                                </th>
                                                <th>
                                                    Comment Title
                                                </th>
                                                <th>
                                                    Comment Body
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
                                                    '.$row['comment_title'].'
                                                </td>
                                                <td>
                                                    '.$row['comment_body'].'
                                                </td>
                                            </tr>';
                                    }
                                    } else {
                                    print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No Worker Found!</h3>
										All Comment in your Site will be shown here.
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
