<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f6fa;
            padding: 50px;
        }
        .form-box {
            background: #fff;
            width: 400px;
            padding: 25px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0px 4px 18px rgba(0,0,0,0.08);
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        button {
            width: 100%;
            background: #5A48E8;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover {
            background: #4736c7;
        }
    </style>
</head>

<body>

<div class="form-box">
    <h2>Add New Customer</h2>
    <form action="prosesTambahCustomer.php" method="POST">
        <input type="text" name="nama" placeholder="Customer Name" required>
        <input type="date" name="join_date" required>
        <select name="status" required>
            <option value="Active">HRD</option>
            <option value="Inactive">Karyawan</option>
            <option value="Inactive">Magang</option>
        </select>
        <button type="submit">Save</button>
    </form>
</div>

</body>
</html>
