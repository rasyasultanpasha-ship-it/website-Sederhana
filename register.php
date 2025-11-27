<?php
require_once "config/db.php";

$success = "";
$error = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $exists = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($exists) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        mysqli_query($conn, "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')");
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

        <div class="social">
            <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png">
            <img src="https://cdn-icons-png.flaticon.com/512/3128/3128304.png">
            <img src="https://cdn-icons-png.flaticon.com/512/145/145807.png">
        </div>

        <?php 
        if ($success) echo "<div class='success'>$success</div>";
        if ($error) echo "<div class='error'>$error</div>";
        ?>

        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
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

