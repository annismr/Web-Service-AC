<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitrajaya AC</title>
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f0fe;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Container Style */
        .container {
            width: 90%;
            max-width: 500px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Header and Paragraph */
        h1 {
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        p {
            font-size: 1em;
            color: #555;
            margin-bottom: 25px;
        }

        /* Button Container */
        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        /* Button Style */
        .button {
            padding: 10px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            h1 {
                font-size: 1.5em;
            }
            p {
                font-size: 0.95em;
            }
            .buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat Datang di Layanan Mitrajaya AC</h1>
        <p>Kami menyediakan layanan perbaikan dan perawatan AC dengan mudah. Silakan daftar atau login untuk memesan layanan kami.</p>
        
        <div class="buttons">
            <?php if (isset($_SESSION['email'])): ?>
                <a href="dashboard.php" class="button">Dashboard</a>
                <a href="logout.php" class="button">Logout</a>
            <?php else: ?>
                <a href="login.php" class="button">Login</a>
                <a href="register.php" class="button">Register</a>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
