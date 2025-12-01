
<?php 
session_start();
$baseURL = "http://website-sederhana.test/"; 
require_once "config/db.php";

$error = "";
if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
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

        <!-- LOGO -->
    <img src="<?= $baseURL ?>assets/img/Bridgestone-Logo-500x281.png" alt="logo" style="width:120px;">

        <!-- Judul mirip Figma -->
        <h2 class="title">Sign in to <span class="green">Website</span></h2>

        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="prosesLogin.php">


            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login" class="btn">SIGN IN</button>

        </form>

        <a href="#" class="forgot">Forgot your password?</a>

    </div>

</div>

</body>
</html>
