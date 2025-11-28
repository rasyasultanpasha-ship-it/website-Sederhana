<?php
session_start();
require "config/db.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$data  = mysqli_fetch_assoc($query);

if ($data) {

    if (password_verify($password, $data['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }

} else {
    echo "<script>alert('Email tidak ditemukan!'); window.location='login.php';</script>";
}
?>
