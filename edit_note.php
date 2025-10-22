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

// Ambil data catatan yang akan diedit
$note = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM notes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $note = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$note) {
        $_SESSION['error'] = "Catatan tidak ditemukan!";
        header("Location: view_notes.php");
        exit();
    }
}

// Proses update catatan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    
    $sql = "UPDATE notes SET title = ?, content = ?, category = ?, updated_at = NOW() WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$title, $content, $category, $id])) {
        $_SESSION['success'] = "Catatan berhasil diupdate! ✨";
        header("Location: view_notes.php");
        exit();
    } else {
        $_SESSION['error'] = "Gagal mengupdate catatan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan - Diary Tika</title>
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

        .button-group {
            display: flex;
            gap: 15px;
        }

        .cancel-btn {
            background: #6b7280;
            color: white;
            padding: 18px 30px;
            border: none;
            border-radius: 15px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            flex: 1;
        }

        .cancel-btn:hover {
            background: #4b5563;
            transform: translateY(-2px);
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
            <h1>✏️ Edit Catatan</h1>
            <p class="subtitle">Perbarui cerita Anda</p>
        </div>

        <a href="view_notes.php" class="back-btn">⬅ Kembali ke Daftar Catatan</a>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                ❌ <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if ($note): ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
            
            <div class="form-group">
                <label for="title">📝 Judul Catatan</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
            </div>

            <div class="form-group">
                <label for="category">🏷️ Kategori</label>
                <select id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Harian" <?php echo $note['category'] == 'Harian' ? 'selected' : ''; ?>>📅 Cerita Harian</option>
                    <option value="Kenangan" <?php echo $note['category'] == 'Kenangan' ? 'selected' : ''; ?>>🌟 Kenangan</option>
                    <option value="Impian" <?php echo $note['category'] == 'Impian' ? 'selected' : ''; ?>>💫 Impian & Cita-cita</option>
                    <option value="Pemikiran" <?php echo $note['category'] == 'Pemikiran' ? 'selected' : ''; ?>>💭 Pemikiran</option>
                    <option value="Lainnya" <?php echo $note['category'] == 'Lainnya' ? 'selected' : ''; ?>>📂 Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="content">📖 Isi Catatan</label>
                <textarea id="content" name="content" required><?php echo htmlspecialchars($note['content']); ?></textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="submit-btn">💾 Update Catatan</button>
                <a href="view_notes.php" class="cancel-btn">❌ Batal</a>
            </div>
        </form>
        <?php else: ?>
            <div style="text-align: center; padding: 40px; color: #92400e;">
                <p>Catatan tidak ditemukan.</p>
                <a href="view_notes.php" class="back-btn">Kembali ke Daftar Catatan</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>