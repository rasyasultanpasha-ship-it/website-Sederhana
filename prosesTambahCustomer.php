<?php
include "config/db.php";

$nama = $_POST['nama'];
$join_date = $_POST['join_date'];
$status = $_POST['status'];

$query = "INSERT INTO customers (nama, join_date, status) 
          VALUES ('$nama', '$join_date', '$status')";

mysqli_query($conn, $query);

header("Location: dashboard.php");
exit();
?>
