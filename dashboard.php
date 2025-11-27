<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome to Dashboard</h1>
<a href="logout.php">Logout</a>

</body>
</html>
