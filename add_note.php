<?php
session_start();

// Koneksi database
$host = "localhost";
$dbname = "diary_tika"; 
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Proses form tambah catatan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    
    $sql = "INSERT INTO notes (title, content, category) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$title, $content, $category])) {
        $_SESSION['success'] = "Catatan berhasil ditambahkan! 🎉";
        header("Location: view_notes.php");
        exit();
    } else {
        $_SESSION['error'] = "Gagal menambahkan catatan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan - Diary Tika</title>
    <style>
        /* Style sama dengan edit_note.php */
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
            padding: 40px;
            box-shadow: 0 25px 60px rgba(251, 191, 36, 0.2);
            max-width: 600px;
            width: 100%;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: #f59e0b;
            font-size: 2.2em;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #d97706;
            font-size: 1.1em;
        }

        .back-btn {
            display: inline-block;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #92400e;
            padding: 12px 25px;
            border-radius: 15px;
            text-decoration: none;
            margin-bottom: 25px;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3);
            transition: all 0.3s ease;
            border: 2px solid #fbbf24;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(251, 191, 36, 0.4);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #b45309;
            font-weight: bold;
            font-size: 1.1em;
        }

        input, select, textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #fbbf24;
            border-radius: 15px;
            font-size: 1em;
            font-family: inherit;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(251, 191, 36, 0.1);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #f59e0b;
            box-shadow: 0 5px 20px rgba(251, 191, 36, 0.2);
            background: white;
            transform: translateY(-2px);
        }

        textarea {
            height: 200px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #92400e;
            padding: 18px 30px;
            border: none;
            border-radius: 15px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(251, 191, 36, 0.3);
            border: 2px solid #fbbf24;
            margin-bottom: 15px;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(251, 191, 36, 0.4);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-error {
            background: linear-gradient(135deg, #fecaca, #fca5a5);
            color: #7f1d1d;
            border-left: 4px solid #ef4444;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌻 Tambah Catatan</h1>
            <p class="subtitle">Tulis cerita baru Anda dengan nuansa yang cerah</p>
        </div>

        <a href="view_notes.php" class="back-btn">⬅ Kembali ke Daftar Catatan</a>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                ❌ <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="title">📝 Judul Catatan</label>
                <input type="text" id="title" name="title" required placeholder="Masukkan judul catatan yang menarik...">
            </div>

            <div class="form-group">
                <label for="category">🏷️ Kategori</label>
                <select id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Harian">📅 Cerita Harian</option>
                    <option value="Kenangan">🌟 Kenangan</option>
                    <option value="Impian">💫 Impian & Cita-cita</option>
                    <option value="Pemikiran">💭 Pemikiran</option>
                    <option value="Lainnya">📂 Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="content">📖 Isi Catatan</label>
                <textarea id="content" name="content" required placeholder="Tulis isi catatan Anda di sini dengan bebas..."></textarea>
            </div>

            <button type="submit" class="submit-btn">💾 Simpan Catatan</button>
        </form>
    </div>
</body>
</html>