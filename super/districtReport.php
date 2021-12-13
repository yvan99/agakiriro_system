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
                                        District Report</h3>
                                </div>
                                <div class="module-body table">
                                <form class="form-horizontal row-fluid">
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Choose District</label>
											<div class="controls">
                                                
                                            <?php
                                            @$cat=$_GET['district']; // Use this line or below line if register_global is off
                                            if(strlen($cat) < 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
                                            echo "Data Error";
                                            exit;
                                            }
                                            $query2="SELECT * FROM agakiriro"; 
                                            ?>
                                            <select name='district' onchange="change(this.form)">
                                                <option value=''>Select one</option>
                                                <?php
                                                    if($stmt = $conn->query("$query2")){
                                                        while ($row2 = $stmt->fetch_assoc()) {
                                                            if($row2['location']==@$cat){
                                                ?>
                                                <option selected value=<?php echo $row2['location'] ?>><?php echo $cat?></option>
                                                <?php
                                                            }

                                                            else{
                                                ?>
                                                <option><?php echo $row2['location']?></option>
                                                <?php
                                                                } 
                                                        }
                                                    }else{
                                                        echo $conn->error;
                                                    }
                                                        echo "</select>";
                                                ?>
                                                <a href="reportDistrict.php?id=<?php echo $cat ?>" class="btn btn-info border text-light-50 shadow-none"> Print Document</a>
											</div>
										</div>
                                </div>
                                <br>
                                <?php
                                $sql = "SELECT * from worker, agakiriro WHERE worker.agakiriro_id  = aga_id and location = '$cat'";
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
                                                   Agakiriro
                                               </th>
                                               <th>
                                                   Total Purchase
                                               </th>
                                               <th>
                                                   Total Sale
                                               </th>
                                               <th>
                                                   Loss/Profit
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
                                                   '.$row['name'].'
                                               </td>' ?>
                                               <td>
                                                <?php
                                                    $id = $row['worker_id'];
                                                    $check = mysqli_query($conn, "SELECT SUM(total) as purchase  FROM transaction WHERE type = 'Purchase' and user_id = '$row[worker_id]'");
                                                    $checkResult = mysqli_fetch_array($check);
                                                    echo $checkResult['purchase'];
                                                  ?>
                                               </td>
                                               <td>
                                                <?php
                                                    $id = $row['worker_id'];
                                                    $check = mysqli_query($conn, "SELECT SUM(total) as sale  FROM transaction WHERE type = 'Sale' and user_id = '$row[worker_id]'");
                                                    $checkResult = mysqli_fetch_array($check);
                                                    echo $checkResult['sale'];
                                                  ?>
                                               </td>
                                               <td>
                                                <?php
                                                    $id = $row['worker_id'];
                                                    $check = mysqli_query($conn, "SELECT SUM(total) as sale  FROM transaction WHERE type = 'Sale' and user_id = '$row[worker_id]'");
                                                    $checkResult = mysqli_fetch_array($check);
                                                    $sale = $checkResult['sale'];
                                                    $checkP= mysqli_query($conn, "SELECT SUM(total) as purchase  FROM transaction WHERE type = 'Purchase' and user_id = '$row[worker_id]'");
                                                    $checkPResult = mysqli_fetch_array($checkP);
                                                    $purchase = $checkPResult['purchase'];
                                                    $resultT = $sale - $purchase;
                                                    if ($purchase > $sale) {
                                                        echo '<h5 style="color:red">Loss: ' .$resultT;
                                                    }else {
                                                        echo '<h5 style="color:red">Profit: ' .$resultT;
                                                    }
                                                  ?>
                                               </td>
                                               <td class="center">
                                                   <a href="workerReport.php?id=<?php echo $row['worker_id']?>">Print Report</a>
                                               </td>
                                           </tr><?php
                                           $i++;
                                   }
                                   } else {
                                   print '
                                   <div class="module-body">
                                <div class="alert alert-success">
                                       <button type="button" class="close" data-dismiss="alert">×</button>
                                       <h3 style="color:green">No SELECTED District!</h3>
                                       All worker will be shown here once you select a District.
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
