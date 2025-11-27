<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Welcome, <?= $_SESSION['username']; ?>!</h2>

    <a class="btn-logout" href="logout.php">Logout</a>
</div>

</body>
</html>
