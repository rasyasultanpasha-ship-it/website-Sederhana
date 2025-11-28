<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config/db.php";

if (isset($_POST['id'])) {

    $id        = $_POST['id'];
    $nama      = $_POST['nama'];
    $join_date = $_POST['join_date'];
    $status    = $_POST['status'];

    // Update table
    $query = mysqli_query($conn, "UPDATE customers SET 
        nama='$nama',
        join_date='$join_date',
        status='$status'
        WHERE id='$id'
    ");

    if ($query) {
        echo "
        <script>
            alert('Customer updated successfully!');
            window.location='dashboard.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Failed to update customer!');
            window.location='editCustomer.php?id=$id';
        </script>
        ";
    }

} else {
    header("Location: dashboard.php");
    exit();
}
?>
