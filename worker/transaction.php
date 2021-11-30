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
                        <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class=" icon-random"></i><b><?php 
                                                $query = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'purchase'");
                                                $row = mysqli_fetch_array($query);
                                                echo $row['SUM(total)'];
                                            ?></b>
                                        <p class="text-muted">
                                            Total Purchase
                                            </p>
                                    </a><a class="btn-box big span4"><i class="icon-exchange"></i><b><?php 
                                                $query = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'sale'");
                                                $row = mysqli_fetch_array($query);
                                                echo $row['SUM(total)'];
                                            ?></b>
                                        <p class="text-muted">
                                            Total Sales</p>
                                    </a><a class="btn-box big span4"><i class="icon-money"></i><b><?php 
                                                $query = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'purchase'");
                                                $row = mysqli_fetch_array($query);
                                                $purchase = $row['SUM(total)'];
                                                $insert = mysqli_query($conn, "SELECT SUM(total) FROM transaction WHERE type = 'sale'");
                                                $fetch = mysqli_fetch_array($insert);
                                                $sale = $fetch['SUM(total)'];
                                                $result = $sale - $purchase;
                                                echo $result;
                                            ?></b>
                                            <?php if ($purchase > $sale) {?>
                                        <p class="text-muted" style="color: red;">
                                            Loss
                                        </p>
                                        <?php } else{ ?>
                                            <p class="text-muted">
                                            Profit
                                        </p> 
                                        <?php }?>  
                                    </a>
                                </div>
                                <div class="module">
                            <div class="module-head">
                                <h3>
                                    Chart - flot</h3>
                            </div>
                            <div class="module-body">
                                <div class="chart">
                                    <div id="placeholder" class="graph">
                                    </div>
                                </div>
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
