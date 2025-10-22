<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Diary Tika</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 50%, #fde68a 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 50px;
            box-shadow: 0 25px 60px rgba(251, 191, 36, 0.2);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #f59e0b;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .nav-btn {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #92400e;
            padding: 12px 25px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏷️ Kategori</h1>
        <p style="color: #d97706; margin-bottom: 30px; font-size: 1.1em;">Fitur kategori akan segera tersedia!</p>
        <a href="index.php" class="nav-btn">🏠 Kembali ke Menu</a>
        <a href="view_notes.php" class="nav-btn">📝 Lihat Catatan</a>
    </div>
</body>
</html>