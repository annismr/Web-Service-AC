<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4B79A1, #283E51);
            color: #fff;
            text-align: center;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h2 {
            font-weight: 300;
            margin-bottom: 20px;
            color: #fff;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            color: #fff;
            background-color: #4B79A1;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #283E51;
        }
        .button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat datang di Layanan Service AC!</h2>
        <div class="button-container">
            <a href="booking.php" class="button">Pesan Layanan AC</a>
            <a href="transaksi.php" class="button">Transaksi</a>
            <a href="logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>
