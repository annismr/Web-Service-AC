<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_type = $_POST['service_type'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $status = "pending";
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    
    if (strtotime($tanggal_pesan) < strtotime(date("Y-m-d"))) {
        echo "<script>alert('Tanggal pesan tidak valid. Silakan pilih tanggal yang benar.');</script>";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO bookings (user_id, service_type, tanggal_pesan, status, alamat, harga) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssi", $user_id, $service_type, $tanggal_pesan, $status, $alamat, $harga);

        if ($stmt->execute()) {
            // Redirect ke halaman pembayaran setelah berhasil memesan
            $_SESSION['booking_id'] = $stmt->insert_id; // Menyimpan booking ID di sesi jika diperlukan
            header("Location: pembayaran.php");
            exit();
        } else {
            echo "<script>alert('Gagal melakukan pemesanan: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Layanan AC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #4B79A1, #283E51);
            color: #fff;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1, h2 {
            color: #fff;
            font-weight: 300;
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            display: block;
            margin: 10px 0 5px;
            color: #fff;
        }
        select, input[type="date"], input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
            background-color: #f4f4f4;
        }
        .button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
        .price-display {
            font-weight: bold;
            margin-bottom: 15px;
            color: #ffecb3;
        }
    </style>
    <script>
        function updateHarga() {
            const hargaLayanan = {
                "Cuci AC": 100000,
                "Isi Freon": 150000,
                "Check AC": 50000,
                "Jual Beli AC": 300000
            };
            const serviceType = document.getElementById("service_type").value;
            const harga = hargaLayanan[serviceType] || 0;
            document.getElementById("harga").value = harga;
            document.getElementById("displayHarga").innerText = "Rp " + harga.toLocaleString();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Pesan Layanan AC</h1>
        <form method="POST" action="booking.php">
            <label for="service_type">Jenis Layanan:</label>
            <select name="service_type" id="service_type" onchange="updateHarga()" required>
                <option value="Cuci AC">Cuci AC</option>
                <option value="Isi Freon">Isi Freon</option>
                <option value="Check AC">Check AC</option>
                <option value="Jual Beli AC">Jual Beli AC</option>
            </select>

            <label>Harga:</label>
            <div class="price-display" id="displayHarga">Rp 100,000</div>
            <input type="hidden" name="harga" id="harga" value="100000">

            <label for="tanggal_pesan">Tanggal Pesan:</label>
            <input type="date" name="tanggal_pesan" id="tanggal_pesan" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" required>

            <button type="submit" class="button">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>
