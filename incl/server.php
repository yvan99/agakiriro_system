<?php
session_start();
require_once '../connect.php';
if(!isset($_SESSION['admin'])){
    header('location:../index.php');
}
?>