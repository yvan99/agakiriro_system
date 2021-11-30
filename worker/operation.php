<?php
        include '../connect.php';
        if (isset($_POST['savePurchase'])) {
            $productTag = $_POST['productTag'];
            $quantity = $_POST['qty'];
            $pricetag = $_POST['pricetag'];
            $total = $pricetag * $quantity;
            $query=mysqli_query($conn,"SELECT * FROM product WHERE product_name='$productTag'");
            $fetch=mysqli_fetch_array($query);
            $product_id = $fetch['product_id'];
            $foundQuantity = $fetch['quantity'];
            $foundQuantity = $foundQuantity + $quantity;
            $created = date("y-m-d");
            $insert="INSERT INTO purchasetbl VALUES(NULL,'$product_id','$created','$quantity','$pricetag','$total','9')";
            mysqli_query($conn,$insert)or die(mysqli_error($conn));
            $updateProduct = mysqli_query($conn, "UPDATE product SET quantity = '$foundQuantity' WHERE product_id='$product_id' ");
            header('Location:purchaseOrder.php');
        }elseif (isset($_POST['transaction'])) {
            $id = $_GET['id'];
            $insert="INSERT INTO transaction
                SELECT NULL,'Purchase',trans_date,purchase_qty,unit_price,total,user_id from purchasetbl where user_id = 9;
            ";
            mysqli_query($conn,$insert)or die(mysqli_error($conn));
            $updateProduct = mysqli_query($conn, "DELETE FROM purchasetbl where user_id = 9");
            header('Location:purchaseOrder.php');
        }elseif (isset($_POST['transactionSale'])) {
            $id = $_GET['id'];
            $insert="INSERT INTO transaction
                SELECT NULL,'Sale',trans_date,sale_qty,unit_price,total,user_id from saletbl where user_id = 9;
            ";
            mysqli_query($conn,$insert)or die(mysqli_error($conn));
            $updateProduct = mysqli_query($conn, "DELETE FROM saletbl where user_id = 9");
            header('Location:saleOrder.php');
        }

    ?>