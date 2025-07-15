<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        .payment-options { display: flex; justify-content: space-around; margin-top: 20px; }
        .option { padding: 20px; background-color: #eaeaea; border-radius: 5px; cursor: pointer; text-align: center; }
        .option:hover { background-color: #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pilih Metode Pembayaran</h2>
        <div class="payment-options">
            <div class="option" onclick="choosePayment('e-wallet')">
                <p><strong>E-Wallet</strong></p>
                <p>LinkAja, OVO, GoPay</p>
            </div>
            <div class="option" onclick="choosePayment('qris')">
                <p><strong>QRIS</strong></p>
                <p>QR Code untuk pembayaran</p>
            </div>
        </div>
    </div>

    <script>
        function choosePayment(method) {
            alert('Pembayaran berhasil!');

        // Mengarahkan pengguna ke halaman transaksi setelah pop-up ditutup
        setTimeout(function() {
                window.location.href = 'transaksi.php';  // Redirect ke halaman transaksi
            }, 1000);  // 1 detik delay sebelum redirect    
        }
    </script>
</body>
</html>
