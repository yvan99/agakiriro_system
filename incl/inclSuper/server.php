<?php 
session_start();
if (!isset($_SESSION['super'])) {
    header("location:logout");
}
?>