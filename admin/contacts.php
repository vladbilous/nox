<?php
// admin/contacts.php
$pageTitle = "Заявки з сайту";

// Handle Status Change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    DB::execute("UPDATE contacts SET status = ? WHERE id = ?", [$_POST['status'], $_POST['id']]);
    header("Location: /admin/?action=contacts");
    exit;
}

$contacts = DB::fetchAll("SELECT * FROM contacts ORDER BY created_at DESC");

ob_start();
?>
<table>
    <thead>
        <tr>
            <th>Дата</th>
            <th>Ім'я</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Повідомлення</th>
            <th>Статус</th>
            <th>Дія</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($contacts)): ?>
        <tr><td colspan="7">Немає заявок.</td></tr>
        <?php else: ?>
            <?php foreach ($contacts as $c): ?>
            <tr>
                <td><?= $c['created_at'] ?></td>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= htmlspecialchars($c['phone']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($c['message'])) ?></td>
                <td>
                    <?php 
                        if ($c['status'] == 'new') echo '<span style="color:red; font-weight:bold;">Нова</span>';
                        elseif ($c['status'] == 'read') echo '<span style="color:green;">Прочитано</span>';
                        else echo '<span style="color:gray;">Архів</span>';
                    ?>
                </td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $c['id'] ?>">
                        <select name="status" onchange="this.form.submit()">
                            <option value="new" <?= $c['status'] == 'new' ? 'selected' : '' ?>>Нова</option>
                            <option value="read" <?= $c['status'] == 'read' ? 'selected' : '' ?>>Прочитано</option>
                            <option value="archived" <?= $c['status'] == 'archived' ? 'selected' : '' ?>>Архів</option>
                        </select>
                        <input type="hidden" name="update_status" value="1">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
