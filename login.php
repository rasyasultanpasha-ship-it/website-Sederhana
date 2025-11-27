<?php
session_start();
include "config/db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required><br>

        <input type="password" name="password" placeholder="Password" required><br>

        <button type="submit" name="login">Login</button>

    </form>

    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</div>

</body>
</html>
