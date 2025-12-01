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
        .error {
            background: #ffdddd;
            border-left: 4px solid red;
            padding: 10px;
            margin: 10px 0;
            color: #b10000;
            border-radius: 6px;
        }
    </style>

    <script>
        function validateForm() {
            const name = document.forms["customerForm"]["nama"].value.trim();
            const joinDate = document.forms["customerForm"]["join_date"].value;
            const status = document.forms["customerForm"]["status"].value;
            const today = new Date().toISOString().split("T")[0];

            let errorMessage = "";

            if (name.length < 3 || !/^[A-Za-z\s]+$/.test(name)) {
                errorMessage += "Nama minimal 3 karakter dan hanya huruf!<br>";
            }

            if (joinDate === "") {
                errorMessage += "Tanggal tidak boleh kosong!<br>";
            } else if (joinDate > today) {
                errorMessage += "Tanggal tidak boleh lebih dari hari ini!<br>";
            }

            if (status === "") {
                errorMessage += "Status harus dipilih!<br>";
            }

            if (errorMessage !== "") {
                document.getElementById("error-box").innerHTML = errorMessage;
                document.getElementById("error-box").style.display = "block";
                return false;
            }

            return true;
        }
    </script>

</head>

<body>

<div class="form-box">
    <h2>Add New Customer</h2>

    <div id="error-box" class="error" style="display:none;"></div>

    <form name="customerForm" action="prosesTambahCustomer.php" 
          method="POST" onsubmit="return validateForm()">

        <input type="text" name="nama" placeholder="Customer Name">
        <input type="date" name="join_date">
        <select name="status">
            <option value="">-- Pilih Status --</option>
            <option value="HRD">HRD</option>
            <option value="Karyawan">Karyawan</option>
            <option value="Magang">Magang</option>
        </select>

        <button type="submit">Save</button>
    </form>
</div>

</body>
</html>
