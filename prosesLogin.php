<?php
session_start();
require "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepared Statement
    $stmt = mysqli_prepare($conn, "SELECT id, username, password FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    if ($data) {

        if (password_verify($password, $data['password'])) {

            session_regenerate_id(true); // Anti Session Hijack
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $email;

            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Password salah!";
        }

    } else {
        $_SESSION['error'] = "Email tidak terdaftar!";
    }

    header("Location: login.php");
    exit();
}
?>
