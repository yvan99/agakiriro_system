<?php 
    require '../server/codeGenerator.php';
    include '../connect.php';
    require '../incl/inclSuper/server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AGAKIRIRO SMART SYSTEM</title>
    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="../assets/printer/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/printer/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../assets/printer/css/tit-print.css" />

</head>

<body style="background-color: #fff !important;">
    <!-- Container -->
    <div class="container-fluid invoice-container" style="max-width: 970px !important;">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0"> <img id="logo" src="../assets/printer/img/rwanda.png" style="width: 100px;" title="Koice" alt="Koice" /> </div>
                <div class="col-sm-5 text-center text-sm-right">
                    <h5 class="mb-0">AGAKIRIRO SMART SYSTEM</h5>
                    <p class="mb-0">Report N<sup>0</sup> <?php echo 'RE' . codeGenerator(); ?></p>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
            <?php  
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "SELECT * from worker, agakiriro WHERE worker.agakiriro_id  = aga_id and location = '$id' ");
                        ?>

                <div class="col-sm-6 order-sm-0"> <strong>MINISTRY OF TRADE AND INDUSTRY </strong>
                    <address>
                        <?php echo $id; ?> DISTRICT<br />
                        <?php echo date("y-m-d"); ?>
                    </address>
                </div>
            </div>

            <br>
            <h4 class="text-center">Report of Worker Profit/Loss </h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-left"><strong>Names</strong></th>
                            <th class="text-left"><strong>Phone</strong></th>
                            <th class="text-left"><strong>Agakiriro</strong></th>
                            <th class="text-left"><strong>Total Purcase</strong></th>
                            <th class="text-left"><strong>Total Sale</strong></th>
                            <th class="text-left"><strong>Loss/Profit</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php while($row = $query->fetch_array()) {
                            ?>

                                <td class="text-left"><?php echo $row['names']; ?></td>
                                <td class="text-left"><?php echo $row['phone']; ?></td>
                                <td class="text-left"><?php echo $row['name']; ?></td>
                                <td class="text-left"><?php
                                                    $id = $row['worker_id'];
                                                    $check = mysqli_query($conn, "SELECT SUM(total) as purchase  FROM transaction WHERE type = 'Purchase' and user_id = '$row[worker_id]'");
                                                    $checkResult = mysqli_fetch_array($check);
                                                    echo $checkResult['purchase'];
                                                  ?></td>
                                <td class="text-left"><?php
                                                    $id = $row['worker_id'];
                                                    $check = mysqli_query($conn, "SELECT SUM(total) as sale  FROM transaction WHERE type = 'Sale' and user_id = '$row[worker_id]'");
                                                    $checkResult = mysqli_fetch_array($check);
                                                    echo $checkResult['sale'];
                                                  ?></td>
                                <td class="text-left"><?php
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
                                                  ?></td>

                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-right">
            <p class="text-1">Generated by AGAKIRIRO SMART SYSTEM</p>
            <a href="districtReport.php">GO BACK</a>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-success border text-light-50 shadow-none"> Print Document</a> </div>
        </footer>
    </div>
    <!-- Back to My Account Link -->
</body>

</html>