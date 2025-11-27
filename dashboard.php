<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="dash-body">

<div class="dashboard-container">

    <div class="navbar">
        <h2>Kesahatanku</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="content">
        <h1>Welcome, <?php echo $username; ?> 👋</h1>

        <div class="cards">
            <div class="card-info">
                <h3>Total Aktivitas</h3>
                <p>12 aktivitas tercatat</p>
            </div>

            <div class="card-info">
                <h3>Status Kesehatan</h3>
                <p>Normal • Tidak ada keluhan</p>
            </div>

            <div class="card-info">
                <h3>Riwayat</h3>
                <p>Lihat catatan terakhir</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>
