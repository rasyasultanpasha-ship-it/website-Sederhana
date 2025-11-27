<?php
session_start();
require_once "config/db.php";

$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($q) === 1) {
        $row = mysqli_fetch_assoc($q);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-container">
    <div class="card">

        <h2 class="title">Sign in to <span class="green">Kesahatanku</span></h2>

        <?php if ($error) echo "<div class='error'>$error</div>"; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login" class="btn">SIGN IN</button>
        </form>

        <p class="switch">Don't have an account? 
            <a href="register.php">Sign Up</a>
        </p>

    </div>
</div>

</body>
</html>
