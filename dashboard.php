<?php
include 'config/db.php';
session_start();

// Redirect ke login kalau belum login
if (!isset($_SESSION['username'])) {
    header("Location: .html");
    exit;
}

// Ambil data user dari database
$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </header>

       <section class="user-list">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="user-card">';
            echo '<p>'.$row['username'].'</p>';
            echo '</div>';
        }
    } else {
        echo "<p>Tidak ada user</p>";
    }
    ?>
</section>
    </div>
</body>
</html>
