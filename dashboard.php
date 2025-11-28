<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background: #f5f6fa;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #ffffff;
            height: 100vh;
            padding: 30px 20px;
            border-right: 1px solid #eee;
            position: fixed;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 35px;
        }

        .menu a {
            display: block;
            margin: 16px 0;
            color: #555;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .menu a.active, .menu a:hover {
            background: #5A48E8;
            color: #fff;
        }

        .logout-btn {
            display: block;
            margin-top: 80px;
            padding: 10px;
            background: #ff2e2e;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
        }

        /* Main Content */
        .main {
            margin-left: 260px;
            padding: 30px;
            width: 100%;
        }

        .welcome {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Top Stats Cards */
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: #fff;
            flex: 1;
            padding: 25px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.05);
        }

        .stat-title { font-size: 15px; color: #777; }
        .stat-number { font-size: 30px; font-weight: 700; margin: 5px 0; }
        .stat-growth { font-size: 14px; color: #18c67a; }

        /* Section Title */
        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Add Button */
        .add-btn {
            display: inline-block;
            background: #5A48E8;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 15px;
            margin-bottom: 15px;
            transition: 0.2s;
        }
        .add-btn:hover {
            background: #4736c7;
        }

        /* Table Box */
        .table-box {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0px 4px 30px rgba(0,0,0,0.08);
            margin-bottom: 50px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            text-align: left;
            padding: 12px;
            font-size: 15px;
            border-bottom: 1px solid #eee;
        }

        table th {
            background: #f7f7f7;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>BRIDGESTONE</h2>

        <div class="menu">
            <a href="#" class="active">Dashboard</a>
            <a href="#">Product</a>
            <a href="#">Customers</a>
            <a href="#">Income</a>
            <a href="#">Promote</a>
            <a href="#">Help</a>
        </div>

        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

    <!-- Main -->
    <div class="main">

        <?php
        $hour = date('H');
        if ($hour < 12) $greeting = "Good Morning";
        else if ($hour < 18) $greeting = "Good Afternoon";
        else $greeting = "Good Evening";
        ?>
        <div class="welcome">
            <?= $greeting . ', ' . $_SESSION['username']; ?> 👋
        </div>

        <!-- Stats -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-title">Total Customers</div>
                <div class="stat-number">5,423</div>
                <div class="stat-growth">▲ 18% this month</div>
            </div>

            <div class="stat-card">
                <div class="stat-title">Members</div>
                <div class="stat-number">1,893</div>
                <div class="stat-growth">▲ 3% this month</div>
            </div>

            <div class="stat-card">
                <div class="stat-title">Active Now</div>
                <div class="stat-number">189</div>
                <div class="stat-growth">👥 live users</div>
            </div>
        </div>

        <!-- Customers -->
        <div class="section-title">All Customers</div>

        <a href="tambahCustomer.php" class="add-btn">+ Add Customer</a>

        <div class="table-box">
            <table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Join Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM customers ORDER BY id DESC");
    while($row = mysqli_fetch_array($data)) {
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['join_date']; ?></td>
        <td><?= $row['status']; ?></td>
        <td>
            <a href="editCustomer.php?id=<?= $row['id']; ?>" style="color: blue;">Edit</a> |
            <a href="deleteCustomer.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin hapus?')" style="color: red;">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

        </div>

    </div>

</body>
</html>
