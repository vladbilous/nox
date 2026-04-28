<?php
// admin/sliders.php
if (!isset($_SESSION['admin_logged_in'])) exit;

$message = '';
$error = '';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $image = DB::fetch("SELECT image_path FROM slider_images WHERE id = ?", [$id]);
    if ($image) {
        $filePath = __DIR__ . '/../' . ltrim($image['image_path'], '/');
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        DB::execute("DELETE FROM slider_images WHERE id = ?", [$id]);
        $message = "Зображення видалено.";
    }
}

// Handle Update Sort Order
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_sort'])) {
    if (isset($_POST['sort_order']) && is_array($_POST['sort_order'])) {
        foreach ($_POST['sort_order'] as $id => $order) {
            DB::execute("UPDATE slider_images SET sort_order = ? WHERE id = ?", [(int)$order, (int)$id]);
        }
        $message = "Порядок сортування оновлено.";
    }
}

// Handle Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_image'])) {
    $slider_type = $_POST['slider_type'];
    if (!in_array($slider_type, ['hero', 'gallery'])) {
        $error = "Невірний тип слайдера.";
    } elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = __DIR__ . '/../assets/img/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $newFileName = uniqid($slider_type . '_') . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;
            
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $dbPath = '/assets/img/uploads/' . $newFileName;
                
                // Get max sort order
                $maxSort = DB::fetch("SELECT MAX(sort_order) as max_sort FROM slider_images WHERE slider_type = ?", [$slider_type]);
                $nextSort = ($maxSort['max_sort'] !== null) ? (int)$maxSort['max_sort'] + 10 : 0;
                
                DB::execute("INSERT INTO slider_images (slider_type, image_path, sort_order) VALUES (?, ?, ?)", [$slider_type, $dbPath, $nextSort]);
                $message = "Зображення успішно завантажено.";
            } else {
                $error = "Помилка при збереженні файлу.";
            }
        } else {
            $error = "Дозволені лише зображення (JPG, PNG, WEBP, GIF).";
        }
    } else {
        $error = "Помилка завантаження файлу.";
    }
}

$hero_images = DB::fetchAll("SELECT * FROM slider_images WHERE slider_type = 'hero' ORDER BY sort_order ASC");
$gallery_images = DB::fetchAll("SELECT * FROM slider_images WHERE slider_type = 'gallery' ORDER BY sort_order ASC");

$pageTitle = "Керування Слайдерами";
ob_start();
?>

<style>
    .slider-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
    .slider-item { background: white; border: 1px solid #e5e7eb; padding: 10px; border-radius: 8px; text-align: center; }
    .slider-item img { width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px; }
    .slider-item input[type="number"] { width: 60px; display: inline-block; margin-bottom: 0; }
    .delete-btn { background: #dc2626; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 14px; }
    .delete-btn:hover { background: #b91c1c; }
    .upload-form { background: white; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb; margin-bottom: 30px; }
    .success { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
    .error { background: #fee2e2; color: #991b1b; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
</style>

<?php if ($message): ?><div class="success"><?= htmlspecialchars($message) ?></div><?php endif; ?>
<?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>

<div class="upload-form">
    <h2>Завантажити нове зображення</h2>
    <form method="POST" enctype="multipart/form-data" style="display: flex; gap: 15px; align-items: flex-end;">
        <div class="form-group" style="margin-bottom: 0;">
            <label>Тип слайдера</label>
            <select name="slider_type" required>
                <option value="hero">Головний (Hero)</option>
                <option value="gallery">Галерея (Наші роботи)</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <label>Зображення</label>
            <input type="file" name="image" accept="image/*" required style="margin-bottom: 0;">
        </div>
        <button type="submit" name="upload_image" class="btn">Завантажити</button>
    </form>
</div>

<form method="POST">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Головний слайдер (Hero)</h2>
        <button type="submit" name="update_sort" class="btn">Зберегти порядок</button>
    </div>
    
    <div class="slider-grid">
        <?php if(empty($hero_images)): ?>
            <p>Немає зображень.</p>
        <?php else: ?>
            <?php foreach ($hero_images as $img): ?>
                <div class="slider-item">
                    <img src="<?= htmlspecialchars($img['image_path']) ?>" alt="Slide">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            Порядок: <input type="number" name="sort_order[<?= $img['id'] ?>]" value="<?= $img['sort_order'] ?>">
                        </div>
                        <a href="?action=sliders&delete_id=<?= $img['id'] ?>" class="delete-btn" onclick="return confirm('Ви впевнені?')">Видалити</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <h2 style="margin-top: 40px;">Галерея (Наші роботи)</h2>
    <div class="slider-grid">
        <?php if(empty($gallery_images)): ?>
            <p>Немає зображень.</p>
        <?php else: ?>
            <?php foreach ($gallery_images as $img): ?>
                <div class="slider-item">
                    <img src="<?= htmlspecialchars($img['image_path']) ?>" alt="Slide">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            Порядок: <input type="number" name="sort_order[<?= $img['id'] ?>]" value="<?= $img['sort_order'] ?>">
                        </div>
                        <a href="?action=sliders&delete_id=<?= $img['id'] ?>" class="delete-btn" onclick="return confirm('Ви впевнені?')">Видалити</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
