<?php
include 'config/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM customers WHERE id='$id'");

header("Location: dashboard.php");
exit();
?>

