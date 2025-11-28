<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config/db.php";

// Cek apakah ID ada di URL
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM customers WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Customer tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family: Arial, sans-serif;}

        body{
            display:flex;
            background:#f5f6fa;
        }

        .sidebar{
            width:260px;
            background:#fff;
            height:100vh;
            padding:30px 20px;
            border-right:1px solid #eee;
            position:fixed;
        }

        .sidebar h2{ font-size:22px; margin-bottom:35px; }

        .menu a{
            display:block;margin:16px 0;
            color:#555;text-decoration:none;
            padding:10px;border-radius:8px;font-size:16px;
        }

        .menu a.active, .menu a:hover{
            background:#5A48E8;color:#fff;
        }

        .logout-btn{
            display:block;margin-top:80px;padding:10px;
            background:#ff2e2e;color:#fff;text-align:center;
            border-radius:8px;text-decoration:none;
        }

        .main{
            margin-left:260px;
            padding:30px;
            width:100%;
        }

        .section-title{
            font-size:22px;
            font-weight:600;
            margin-bottom:20px;
        }

        .form-box{
            background:#fff;
            padding:25px;
            border-radius:18px;
            width:450px;
            box-shadow:0 4px 20px rgba(0,0,0,0.07);
        }

        label{
            font-size:15px;
            font-weight:500;
            display:block;
            margin-bottom:6px;
        }

        input, select{
            width:100%;
            padding:12px;
            font-size:15px;
            border-radius:8px;
            border:1px solid #ddd;
            margin-bottom:15px;
        }

        .btn-save{
            width:100%;
            background:#5A48E8;color:#fff;
            padding:12px;font-size:16px;
            border:none;border-radius:10px;
            cursor:pointer;transition:.3s;
        }
        .btn-save:hover{ background:#4736c7; }

        .btn-cancel{
            display:block;margin-top:15px;text-align:center;
            padding:12px;border-radius:10px;
            text-decoration:none;border:1px solid #ccc;
            color:#333;background:#f2f2f2;
        }
        .btn-cancel:hover{
            background:#e0e0e0;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>BRIDGESTONE</h2>
        <div class="menu">
            <a href="dashboard.php" class="active">Dashboard</a>
            <a href="#">Product</a>
            <a href="#">Customers</a>
            <a href="#">Income</a>
            <a href="#">Promote</a>
            <a href="#">Help</a>
        </div>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

    <div class="main">

        <div class="section-title">Edit Customer</div>

        <div class="form-box">
            <form action="updateCustomer.php" method="POST">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <label>Name</label>
                <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

                <label>Join Date</label>
                <input type="date" name="join_date" value="<?= $data['join_date']; ?>" required>

                <label>Status</label>
                <select name="status" required>
                    <option value="Active" <?= ($data['status']=="Active") ? "selected" : ""; ?>>Active</option>
                    <option value="Pending" <?= ($data['status']=="Pending") ? "selected" : ""; ?>>Pending</option>
                    <option value="Blocked" <?= ($data['status']=="Blocked") ? "selected" : ""; ?>>Blocked</option>
                </select>

                <button type="submit" class="btn-save">Save Changes</button>
            </form>

            <a href="dashboard.php" class="btn-cancel">Cancel</a>
        </div>

    </div>

</body>
</html>
