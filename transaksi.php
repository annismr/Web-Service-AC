<?php
include 'config.php';
session_start(); 

  $user_id = $_SESSION['user_id'];
  
  // Ambil transaksi yang pernah dilakukan oleh user ini dari tabel bookings
  $query = "SELECT * FROM bookings";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Transaksi Saya</title>
      <style>
          body {
              font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f4f8;
            margin: 0;
          }
          .container {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.8em;
        }
          table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 10px;
          }
          th, td {
              padding: 12px 15px;
              border-bottom: 1px solid #ddd;
          }
          th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
          }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td {
            color: #555;
        }
        .no-transactions {
            color: #777;
            font-size: 1.1em;
            margin-top: 20px;
        }

      </style>
  </head>
  <body>
  
  <div class="container">
  <h2>Riwayat Transaksi Anda</h2>
  
  <?php if ($result->num_rows > 0): ?>
      <table>
          <thead>
              <tr>
                  <th>Jenis Layanan</th>
                  <th>Tanggal Pesan</th>
                  <th>Status</th>
                  <th>Alamat</th>
                  <th>Harga</th>
              </tr>
          </thead>
          <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
                  <tr>
                      <td><?php echo htmlspecialchars($row['service_type']); ?></td>
                      <td><?php echo htmlspecialchars($row['tanggal_pesan']); ?></td>
                      <td><?php echo htmlspecialchars($row['status']); ?></td>
                      <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                      <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                  </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
  <?php else: ?>
      <p class="no-transactions">Anda belum memiliki transaksi.</p>
  <?php endif; ?>
  
  <?php
  // Tutup koneksi
  $stmt->close();
  $mysqli->close();
  ?>
  </div>
  
  </body>
  </html>
  
