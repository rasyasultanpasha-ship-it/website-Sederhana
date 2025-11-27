<?php
require_once "config/db.php";

$success = "";
$error = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cek username atau email sudah ada
    $exists = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");

    if (mysqli_num_rows($exists) > 0) {
        $error = "Username atau Email sudah digunakan!";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
        $success = "Akun berhasil dibuat! Silakan login.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-container">
    <div class="card">

        <h2 class="title">Create <span class="green">Account</span></h2>

        <?php 
        if ($success) echo "<div class='success'>$success</div>";
        if ($error) echo "<div class='error'>$error</div>";
        ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="register" class="btn">SIGN UP</button>
        </form>

        <p class="switch">Already have an account? 
            <a href="login.php">Login</a>
        </p>

    </div>
</div>

</body>
</html>
