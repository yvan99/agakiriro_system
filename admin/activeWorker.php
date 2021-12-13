<?php 
include '../connect.php';
@$Approve = $_GET['active'];
@$Disable = $_GET['disable'];
if ($Approve) {
    mysqli_query($conn,"UPDATE users SET status='active' WHERE email='$Approve'");
    header("location:index");
}
elseif ($Disable) {
    mysqli_query($conn,"UPDATE users SET status='disable' WHERE email='$Disable'");
    header("location:index");
}