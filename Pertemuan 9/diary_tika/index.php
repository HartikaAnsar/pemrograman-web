<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌻 Diary Tika - Menu Utama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            max-width: 800px;
            width: 100%;
            text-align: center;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }

        h1 {
            color: #f59e0b;
            font-size: 3em;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #d97706;
            font-size: 1.3em;
            margin-bottom: 40px;
        }

        .welcome-message {
            background: linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%);
            border: 2px solid #fbbf24;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            color: #b45309;
            font-size: 1.1em;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .menu-item {
            background: linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%);
            border: 3px solid #fbbf24;
            border-radius: 20px;
            padding: 30px 20px;
            text-decoration: none;
            color: #b45309;
            font-size: 1.2em;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.15);
        }

        .menu-item:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.3);
            background: linear-gradient(135deg, #fde68a 0%, #fef3c7 100%);
            border-color: #f59e0b;
        }

        .icon {
            font-size: 2.8em;
            margin-bottom: 15px;
            display: block;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
            padding: 25px;
            background: linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%);
            border-radius: 20px;
            border: 2px solid #fbbf24;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.2em;
            font-weight: bold;
            color: #f59e0b;
        }

        .stat-label {
            color: #d97706;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌻 Diary Tika</h1>
        <p class="subtitle">Selamat Datang di Diary Tika</p>
        
        <div class="welcome-message">
            ✨ Selamat datang di diary pribadimu! Simpan semua kenangan berharga di sini dengan nuansa yang hangat dan cerah.
        </div>
        
        <div class="menu-grid">
            <a href="view_notes.php" class="menu-item">
                <span class="icon">📝</span>
                Lihat Catatan
            </a>
            <a href="add_note.php" class="menu-item">
                <span class="icon">➕</span>
                Tambah Catatan
            </a>
            <a href="view_categories.php" class="menu-item">
                <span class="icon">🏷️</span>
                Kategori
            </a>
            <a href="view_favorites.php" class="menu-item">
                <span class="icon">⭐</span>
                Favorit
            </a>
        </div>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-number" id="totalNotes">0</div>
                <div class="stat-label">Total Catatan</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" id="totalCategories">0</div>
                <div class="stat-label">Kategori</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" id="todayNotes">0</div>
                <div class="stat-label">Hari Ini</div>
            </div>
        </div>
    </div>

    <script>
        // Animasi angka statistik
        function animateValue(id, start, end, duration) {
            let obj = document.getElementById(id);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        document.addEventListener('DOMContentLoaded', function() {
            animateValue('totalNotes', 0, 12, 2000);
            animateValue('totalCategories', 0, 5, 2000);
            animateValue('todayNotes', 0, 2, 2000);
        });
    </script>
</body>
</html>