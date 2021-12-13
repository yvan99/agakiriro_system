<?php
require '../incl/server.php';
session_destroy();
header("location:../login.php");
?>