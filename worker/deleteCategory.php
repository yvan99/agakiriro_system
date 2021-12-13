<?php 
    include '../connect.php';
    $id = $_GET['id'];
    echo $id;
    $sql = mysqli_query($conn,"DELETE FROM product_category where type_id = '$id'");
    $query = mysqli_query($conn, "DELETE FROM product where category = '$id'");
    header("Location:productType.php");
?>