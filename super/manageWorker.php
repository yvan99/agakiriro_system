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
                                        Manage Udukiriro</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * from worker, agakiriro WHERE worker.agakiriro_id  = agakiriro.id";
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
                                                    Phone
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Agakiriro
                                                </th>
                                                <th>
                                                    CAPITAL
                                                </th>
                                                <th>
                                                    Action
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
                                                    '.$row['phone'].'
                                                </td>
                                                <td>
                                                    '.$row['email'].'
                                                </td>
                                                <td>
                                                    '.$row['name'].'
                                                </td>
                                                <td>
                                                    '.$row['capital'].'
                                                </td>
                                                <td class="center">
                                                    <a href="workerReport.php?id='.$row['worker_id'].'">Print Report</a>
                                                </td>
                                            </tr>';
                                    }
                                    } else {
                                    print '
									<div class="module-body">
                                 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No APPLICATION Found!</h3>
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
