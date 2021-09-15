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
                                        Worker Application</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT worker_app.id,name,names,idn0,email,gender,worker_app.phone FROM worker_app,agakiriro WHERE worker_app.agakiriro = agakiriro.id";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    FullNames
                                                </th>
                                                <th>
                                                    IDN0
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                                <th>
                                                    Agakiriro
                                                </th>
                                                <th>
                                                    Gender
                                                </th>
                                                <th>
                                                    Approve/Reject
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
                                                    '.$row['idn0'].'
                                                </td>
                                                <td>
                                                    '.$row['email'].'
                                                </td>
                                                <td>
                                                    '.$row['phone'].'
                                                </td>
                                                <td>
                                                    '.$row['name'].'
                                                </td>
                                                <td>
                                                    '.$row['gender'].'
                                                </td>
                                                <td class="center">
                                               <div class="control-group">
											<div class="controls">
												<div class="dropdown">
													<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Option <i class="icon-caret-down"></i></a>
													<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														<li><a href="approve_worker.php?id='.$row['id'].'">Approve Worker</a></li>
                                                        <li><a href="reject_worker.php?id='.$row['id'].'">Reject Worker</a></li>
														</ul>
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
