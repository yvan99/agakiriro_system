<?php
include '../connect.php';
$get = $_GET['id'];
$pass = $_GET['pass'];

$query = mysqli_query($conn,"SELECT * FROM worker WHERE names = '$get'");
$row = mysqli_fetch_array($query);
$id = $row['id'];
$username = $row['email'];

mysqli_query($conn,"INSERT INTO users values(NULL,3,'$username','$pass','active')");
mysqli_query($conn, "DELETE FROM worker_app WHERE names = '$get'");
header("location:./");
?>