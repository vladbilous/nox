<?php
// admin/profile.php
$pageTitle = "Налаштування профілю";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF validation failed.");
    }

    $new_password = (string)($_POST['new_password'] ?? '');
    $user = DB::fetch("SELECT password_hash FROM users WHERE id = ?", [$_SESSION['admin_id']]);
    if (!$user || !password_verify((string)($_POST['current_password'] ?? ''), $user['password_hash'])) {
        $err = "Поточний пароль введено неправильно.";
    } elseif (mb_strlen($new_password) < 8) {
        $err = "Новий пароль має бути не коротшим за 8 символів.";
    } else {
        DB::execute("UPDATE users SET password_hash = ? WHERE id = ?", [password_hash($new_password, PASSWORD_DEFAULT), $_SESSION['admin_id']]);
        session_regenerate_id(true);
        $msg = "Пароль успішно змінено!";
    }
}

ob_start();
?>

<?php if(!empty($err)): ?><div style="background: #fee2e2; color: #991b1b; padding: 15px; margin-bottom: 20px; border-radius: 4px;"><?= htmlspecialchars($err) ?></div><?php endif; ?>
<?php if(!empty($msg)): ?><div style="background: #d1fae5; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 4px;"><?= $msg ?></div><?php endif; ?>

<form method="POST" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 400px;">
    <h3>Зміна паролю</h3>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <div class="form-group">
        <label>Поточний пароль</label>
        <input type="password" name="current_password" required autocomplete="current-password">
    </div>
    <div class="form-group">
        <label>Новий пароль (мінімум 8 символів)</label>
        <input type="password" name="new_password" required minlength="8" autocomplete="new-password">
    </div>
    <button type="submit" name="change_password" class="btn">Зберегти</button>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
