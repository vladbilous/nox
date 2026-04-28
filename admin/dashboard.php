<?php
// admin/dashboard.php
if (!defined('DB_PATH')) { /* just a dummy check if needed, but not strictly required since it's included */ }

$pageTitle = "Dashboard";
ob_start();
?>
<div>
    <h2>Ласкаво просимо в панель управління Salon!</h2>
    <p>Виберіть розділ меню зліва для початку роботи.</p>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
