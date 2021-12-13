<?php 
session_start();
if (!isset($_SESSION['worker'])) {
    header("location:logout");
}
?>