<?php
    include '../connect.php';
    $email = $_GET['email'];
    $password = $_GET['pass'];
    
    $query = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email'");
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    
    mysqli_query($conn,"INSERT INTO users values(NULL,2,'$email','$password','active')");
    header("location:adminagakiriro.php");
?>