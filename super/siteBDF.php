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
                                        Agakiriro Report</h3>
                                </div>
                                <div class="module-body table">
                                <form class="form-horizontal row-fluid">
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Choose Agakiriro</label>
											<div class="controls">
                                                
                                            <?php
                                            @$cat=$_GET['site']; // Use this line or below line if register_global is off
                                            if(strlen($cat) < 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
                                            echo "Data Error";
                                            exit;
                                            }
                                            $query2="SELECT * FROM agakiriro"; 
                                            ?>
                                            <select name='site' onchange="changeSiteReport(this.form)">
                                                <option value=''>Select one</option>
                                                <?php
                                                    if($stmt = $conn->query("$query2")){
                                                        while ($row2 = $stmt->fetch_assoc()) {
                                                            if($row2['name']==@$cat){
                                                ?>
                                                <option selected value=<?php echo $row2['name'] ?>><?php echo $cat?></option>
                                                <?php
                                                            }

                                                            else{
                                                ?>
                                                <option><?php echo $row2['name']?></option>
                                                <?php
                                                                } 
                                                        }
                                                    }else{
                                                        echo $conn->error;
                                                    }
                                                        echo "</select>";
                                                ?>
                                                <a href="BdfSite.php?id=<?php echo $cat ?>" class="btn btn-info border text-light-50 shadow-none"> Print Document</a>
											</div>
										</div>
                                </div>
                                <br>
                                <?php
                                $sql = "SELECT * from worker, agakiriro WHERE worker.agakiriro_id  = aga_id and name = '$cat' AND capital = 'BDF'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    print '
                                     <table cellpadding="0" cellspacing="0" border="0" class="table table-striped"	 display"
                                       width="100%">
                                       <thead>
                                           <tr>
                                                <th>
                                                   #
                                               </th>
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
                                    $i = 1;
                                 while($row = $result->fetch_assoc()) {
                              print '<tr class="odd gradeX">
                                                <td>
                                                   '.$i.'
                                               </td>
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
                                           $i++;
                                   }
                                   } else {
                                   print '
                                   <div class="module-body">
                                <div class="alert alert-success">
                                       <button type="button" class="close" data-dismiss="alert">×</button>
                                       <h3 style="color:green">No SELECTED Agakiriro!</h3>
                                       All worker will be shown here once you select Agakiriro.
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
        <?php require '../incl/footer.php' ?>
        <?php require '../incl/js.php' ?>
      
    </body>
