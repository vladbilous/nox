<?php
// admin/mail.php — where contact-form leads are e-mailed + test send.
require_once __DIR__ . '/../mailer.php';
$pageTitle = "Пошта для заявок";

$msg = '';
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF validation failed.");
    }
    if (isset($_POST['save_emails'])) {
        $raw = trim($_POST['notify_emails'] ?? '');
        $valid = nox_parse_emails($raw);
        $tokens = preg_split('/[\s,;]+/', $raw, -1, PREG_SPLIT_NO_EMPTY);
        if (count($tokens) !== count($valid)) {
            $err = 'Деякі адреси введено з помилкою. Перевірте список.';
        } elseif (!$valid) {
            $err = 'Вкажіть хоча б одну адресу.';
        } else {
            nox_set_setting('notify_emails', implode(', ', $valid));
            $msg = 'Збережено. Нові заявки надходитимуть на: ' . implode(', ', $valid);
        }
    } elseif (isset($_POST['send_test'])) {
        [$ok, $reason] = nox_send_notification(
            'Тестовий лист — NOX Beauty Space',
            '<p style="font-family:Arial,sans-serif">Якщо ви бачите цей лист, заявки з сайту будуть приходити сюди. ✅</p>'
        );
        $ok ? $msg = 'Тестовий лист надіслано на: ' . implode(', ', nox_notify_emails())
            : $err = 'Не вдалося надіслати: ' . $reason;
    }
}

$current = implode(', ', nox_notify_emails());
$smtpReady = nox_smtp_ready();
$mc = nox_mail_config();
$h = fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<?php if ($msg): ?><div style="background:#d1fae5;color:#065f46;padding:15px;margin-bottom:20px;border-radius:4px;"><?= $h($msg) ?></div><?php endif; ?>
<?php if ($err): ?><div style="background:#fee2e2;color:#991b1b;padding:15px;margin-bottom:20px;border-radius:4px;"><?= $h($err) ?></div><?php endif; ?>

<form method="POST" style="background:white;padding:20px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.1);max-width:560px;margin-bottom:20px;">
    <h3 style="margin-top:0">Куди надсилати заявки</h3>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <div class="form-group">
        <label>E-mail отримувачів (можна кілька, через кому)</label>
        <input type="text" name="notify_emails" value="<?= $h($current) ?>" required placeholder="salon@example.com, manager@example.com">
    </div>
    <button type="submit" name="save_emails" class="btn">Зберегти</button>
</form>

<form method="POST" style="background:white;padding:20px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.1);max-width:560px;">
    <h3 style="margin-top:0">Відправка пошти (SMTP)</h3>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <?php if ($smtpReady): ?>
        <p>✅ Налаштовано: надсилаємо через <b><?= $h($mc['smtp_host']) ?></b> від імені <b><?= $h($mc['from_email'] ?: $mc['smtp_user']) ?></b>.</p>
        <button type="submit" name="send_test" class="btn">Надіслати тестовий лист</button>
    <?php else: ?>
        <p>⚠️ SMTP ще не налаштовано, тому листи <b>не надсилаються</b>. Заявки все одно зберігаються в розділі «Заявки».</p>
        <p style="color:#555;font-size:14px">Щоб увімкнути: скопіюйте <code>config.local.example.php</code> у <code>config.local.php</code> у корені сайту і впишіть туди Gmail-адресу та пароль застосунку (App Password).</p>
    <?php endif; ?>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
