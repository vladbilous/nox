<?php
// admin/profile.php
$pageTitle = "Налаштування профілю";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF validation failed.");
    }

    $new_password = $_POST['new_password'];
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    
    DB::execute("UPDATE users SET password_hash = ? WHERE id = ?", [$hash, $_SESSION['admin_id']]);
    $msg = "Пароль успішно змінено!";
}

ob_start();
?>

<?php if(!empty($msg)): ?><div style="background: #d1fae5; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 4px;"><?= $msg ?></div><?php endif; ?>

<form method="POST" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 400px;">
    <h3>Зміна паролю</h3>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <div class="form-group">
        <label>Новий пароль</label>
        <input type="password" name="new_password" required minlength="6">
    </div>
    <button type="submit" name="change_password" class="btn">Зберегти</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
