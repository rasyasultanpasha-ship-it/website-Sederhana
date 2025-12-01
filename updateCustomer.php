<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config/db.php";

if (isset($_POST['id'])) {

    $id        = $_POST['id'];
    $nama      = trim($_POST['nama']);
    $join_date = $_POST['join_date'];
    $status    = $_POST['status'];
    $today = date("Y-m-d");

    // Validasi server-side wajib
    if (strlen($nama) < 3 || !preg_match("/^[A-Za-z\s]+$/", $nama)) {
        echo "<script>alert('Nama tidak valid!'); history.back();</script>";
        exit();
    }
    if (empty($join_date) || $join_date > $today) {
        echo "<script>alert('Tanggal tidak valid!'); history.back();</script>";
        exit();
    }
    if (empty($status)) {
        echo "<script>alert('Status harus dipilih!'); history.back();</script>";
        exit();
    }

    // Prepared Statement untuk UPDATE
    $stmt = $conn->prepare("UPDATE customers SET nama=?, join_date=?, status=? WHERE id=?");
    $stmt->bind_param("sssi", $nama, $join_date, $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Customer updated successfully!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to update customer!'); history.back();</script>";
    }

    $stmt->close();

} else {
    header("Location: dashboard.php");
    exit();
}
?>
