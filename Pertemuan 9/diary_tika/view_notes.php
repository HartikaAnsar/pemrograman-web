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

// Hapus catatan
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM notes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$delete_id])) {
        $_SESSION['success'] = "Catatan berhasil dihapus! 🗑️";
    } else {
        $_SESSION['error'] = "Gagal menghapus catatan.";
    }
    header("Location: view_notes.php");
    exit();
}

// Ambil data catatan
$sql = "SELECT * FROM notes ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Catatan - Diary Tika</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.2);
            border: 1px solid rgba(251, 191, 36, 0.2);
        }

        h1 {
            color: #f59e0b;
            font-size: 2.8em;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: #d97706;
            font-size: 1.2em;
        }

        .navigation {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .nav-btn {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #92400e;
            padding: 12px 25px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3);
            transition: all 0.3s ease;
            border: 2px solid #fbbf24;
        }

        .nav-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(251, 191, 36, 0.4);
        }

        .notes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .note-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.15);
            border: 1px solid rgba(251, 191, 36, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .note-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        .note-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(251, 191, 36, 0.25);
        }

        .note-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .note-category {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #92400e;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
        }

        .note-title {
            font-size: 1.4em;
            color: #92400e;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .note-content {
            color: #78350f;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .note-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid rgba(251, 191, 36, 0.2);
        }

        .note-date {
            color: #b45309;
            font-size: 0.9em;
        }

        .note-actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9em;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .view-btn {
            background: #fbbf24;
            color: #92400e;
        }

        .edit-btn {
            background: #f59e0b;
            color: white;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.15);
        }

        .empty-icon {
            font-size: 4em;
            margin-bottom: 20px;
            color: #fbbf24;
        }

        .empty-title {
            color: #92400e;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .empty-subtitle {
            color: #b45309;
            margin-bottom: 30px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
            border-left: 4px solid #10b981;
        }

        .alert-error {
            background: linear-gradient(135deg, #fecaca, #fca5a5);
            color: #7f1d1d;
            border-left: 4px solid #ef4444;
        }

        @media (max-width: 768px) {
            .notes-grid {
                grid-template-columns: 1fr;
            }
            
            .navigation {
                flex-direction: column;
                align-items: center;
            }
            
            .nav-btn {
                width: 200px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📝 Catatan Saya</h1>
            <p class="subtitle">Semua kenangan dan cerita tersimpan rapi di sini</p>
        </div>

        <!-- Notifikasi -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                ✅ <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                ❌ <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="navigation">
            <a href="index.php" class="nav-btn">🏠 Menu Utama</a>
            <a href="add_note.php" class="nav-btn">➕ Tambah Catatan</a>
        </div>

        <?php if (count($notes) > 0): ?>
            <div class="notes-grid">
                <?php foreach ($notes as $note): ?>
                    <div class="note-card">
                        <div class="note-header">
                            <span class="note-category"><?php echo htmlspecialchars($note['category']); ?></span>
                            <?php if (isset($note['is_favorite']) && $note['is_favorite']): ?>
                                <span style="color: #f59e0b;">⭐</span>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="note-title"><?php echo htmlspecialchars($note['title']); ?></h3>
                        
                        <div class="note-content">
                            <?php 
                            $content = strip_tags($note['content']);
                            echo strlen($content) > 150 ? substr($content, 0, 150) . '...' : $content;
                            ?>
                        </div>
                        
                        <div class="note-footer">
                            <span class="note-date">
                                📅 <?php echo date('d M Y', strtotime($note['created_at'])); ?>
                            </span>
                            <div class="note-actions">
                                <a href="edit_note.php?id=<?php echo $note['id']; ?>" class="action-btn edit-btn">✏️ Edit</a>
                                <a href="view_notes.php?delete_id=<?php echo $note['id']; ?>" class="action-btn delete-btn" 
                                   onclick="return confirm('Yakin ingin menghapus catatan ini?')">🗑️ Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">📝</div>
                <h2 class="empty-title">Belum Ada Catatan</h2>
                <p class="empty-subtitle">Mulai buat catatan pertama Anda!</p>
                <a href="add_note.php" class="nav-btn">➕ Buat Catatan Pertama</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>