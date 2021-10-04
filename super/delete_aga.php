<?php
include '../connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM agakiriro WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
header("location:manage_udu.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>