<?php
require '../incl/inclWorker/server.php';
session_destroy();
header("location:../login.php");
?>