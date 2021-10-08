<?php 
include '../connect.php';
@$Approve = $_GET['active'];
@$Disable = $_GET['disable'];
if ($Approve) {
    mysqli_query($conn,"UPDATE users SET status='active' WHERE user_id='$Approve'");
    header("location:manageAdmin");
}
elseif ($Disable) {
    mysqli_query($conn,"UPDATE users SET status='disable' WHERE user_id='$Disable'");
    header("location:manageAdmin");
}
?>