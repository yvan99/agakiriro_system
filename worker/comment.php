<?php require '../incl/inclWorker/server.php';

require_once '../connect.php';

$current = $_SESSION['worker'];
$searchQuery = mysqli_query($conn, "SELECT * FROM `users`,worker WHERE users.email = worker.email and usr_id = $current ");
$search = mysqli_fetch_array($searchQuery);
$searchId = $search['worker_id'];
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
                                <div class="module-head">
                                    <h3>
                                        Add Comment</h3>
                                </div>
								<div class="module-body">
                                 <form class="form-horizontal row-fluid" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">Comment Title</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Title..." name="title" required class="span8">
												
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Comment Body</label>
											<div class="controls">
                                                <textarea class="span8" name="body" style="height: 70px; resize: none;"></textarea>
												
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit">Add Comment</button>
												<button type="reset" class="btn">Reset Form</button>
											</div>
										</div>
									</form>
                                    
									</div>
                            </div>
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Comment you made</h3>
                                </div>
                                <div class="module-body table">
                                 <?php
								 $sql = "SELECT * FROM comment where user_id = '$searchId'";
                                 $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
									 print '
									  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped"	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Title
                                                </th>
                                                <th>
                                                    Body
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
    
                                  while($row = $result->fetch_assoc()) {
                               print '<tr class="odd gradeX">
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
										<h3 style="color:green">No Comment Found!</h3>
										All COMMENT you made will be shown here.
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

                            <?php
        include '..\connect.php';
        if (isset($_POST['submit'])) {
          $title = $_POST['title'];
          $body = $_POST['body'];
          $query=mysqli_query($conn,"SELECT * FROM comment WHERE comment_title='$title'");
          $fetch=mysqli_fetch_array($query);
          if ($fetch) {
            # code...

          }
          else{
            $insert="INSERT INTO comment VALUES(NULL,'$title','$body','$searchId')";
            $query=mysqli_query($conn,$insert)or die(mysqli_error($conn));
            print '
            <div class="module-body">
            <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>Wooww!</strong> Successfully inserted
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
