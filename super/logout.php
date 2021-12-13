<?php
require_once '../connect.php';
require '../incl/inclSuper/server.php';
session_destroy();
header("location:../login.php");
?>