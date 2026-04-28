<?php
// admin/pages.php
$pageTitle = "Контент та Сторінки";

$languages = DB::fetchAll("SELECT * FROM languages");
$blocks = DB::fetchAll("SELECT * FROM content_blocks ORDER BY key_name");

$currentLang = isset($_GET['lang']) ? $_GET['lang'] : 'pl';

// Handle Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_translations'])) {
    if (isset($_POST['translations']) && is_array($_POST['translations'])) {
        foreach ($_POST['translations'] as $block_id => $value) {
            $exists = DB::fetch("SELECT id FROM translations WHERE block_id = ? AND lang_code = ?", [$block_id, $currentLang]);
            if ($exists) {
                DB::execute("UPDATE translations SET value = ? WHERE id = ?", [$value, $exists['id']]);
            } else {
                DB::execute("INSERT INTO translations (block_id, lang_code, value) VALUES (?, ?, ?)", [$block_id, $currentLang, $value]);
            }
        }
    }
    // Also save SEO
    $page_id = 1; // home
    $seoExists = DB::fetch("SELECT id FROM seo_metadata WHERE page_id = ? AND lang_code = ?", [$page_id, $currentLang]);
    if ($seoExists) {
        DB::execute("UPDATE seo_metadata SET title=?, description=?, og_title=?, og_description=?, og_image=? WHERE id=?", [
            $_POST['seo']['title'], $_POST['seo']['description'], 
            $_POST['seo']['og_title'], $_POST['seo']['og_description'], $_POST['seo']['og_image'], 
            $seoExists['id']
        ]);
    } else {
        DB::execute("INSERT INTO seo_metadata (page_id, lang_code, title, description, og_title, og_description, og_image) VALUES (?, ?, ?, ?, ?, ?, ?)", [
            $page_id, $currentLang, $_POST['seo']['title'], $_POST['seo']['description'], 
            $_POST['seo']['og_title'], $_POST['seo']['og_description'], $_POST['seo']['og_image']
        ]);
    }
    header("Location: /admin/?action=pages&lang=$currentLang&saved=1");
    exit;
}

// Get Translations
$translationsRaw = DB::fetchAll("SELECT block_id, value FROM translations WHERE lang_code = ?", [$currentLang]);
$t = [];
foreach ($translationsRaw as $r) {
    $t[$r['block_id']] = $r['value'];
}

// Get UK translations as fallback/hints
$ukTranslationsRaw = DB::fetchAll("SELECT block_id, value FROM translations WHERE lang_code = 'uk'");
$ukT = [];
foreach ($ukTranslationsRaw as $r) {
    $ukT[$r['block_id']] = $r['value'];
}

// Get SEO
$seo = DB::fetch("SELECT * FROM seo_metadata WHERE page_id = 1 AND lang_code = ?", [$currentLang]);
if (!$seo) {
    $seo = ['title'=>'', 'description'=>'', 'og_title'=>'', 'og_description'=>'', 'og_image'=>''];
}

ob_start();
?>

<div style="margin-bottom: 20px;">
    <strong>Виберіть мову:</strong>
    <?php foreach ($languages as $l): ?>
        <a href="?action=pages&lang=<?= $l['code'] ?>" class="btn" style="<?= $currentLang == $l['code'] ? 'background:#374151;' : '' ?>">
            <?= $l['name'] ?>
        </a>
    <?php endforeach; ?>
</div>

<?php if (isset($_GET['saved'])): ?>
    <div style="background: #d1fae5; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 4px;">Зміни успішно збережено!</div>
<?php endif; ?>

<form method="POST">
    <h3>SEO Налаштування (Головна сторінка)</h3>
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 20px;">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="seo[title]" value="<?= htmlspecialchars($seo['title']) ?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="seo[description]" rows="3"><?= htmlspecialchars($seo['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>OG Title</label>
            <input type="text" name="seo[og_title]" value="<?= htmlspecialchars($seo['og_title']) ?>">
        </div>
        <div class="form-group">
            <label>OG Description</label>
            <textarea name="seo[og_description]" rows="3"><?= htmlspecialchars($seo['og_description']) ?></textarea>
        </div>
        <div class="form-group">
            <label>OG Image URL</label>
            <input type="text" name="seo[og_image]" value="<?= htmlspecialchars($seo['og_image']) ?>">
        </div>
    </div>

    <h3>Текстові блоки</h3>
    <div style="background: white; padding: 20px; padding-bottom: 80px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); position: relative;">
        <?php foreach ($blocks as $b): ?>
            <div class="form-group">
                <label><?= $b['key_name'] ?></label>
                <?php if ($b['type'] === 'html'): ?>
                    <textarea name="translations[<?= $b['id'] ?>]" rows="5" placeholder="<?= htmlspecialchars($ukT[$b['id']] ?? '') ?>"><?= htmlspecialchars($t[$b['id']] ?? '') ?></textarea>
                <?php else: ?>
                    <input type="text" name="translations[<?= $b['id'] ?>]" value="<?= htmlspecialchars($t[$b['id']] ?? '') ?>" placeholder="<?= htmlspecialchars($ukT[$b['id']] ?? '') ?>">
                <?php endif; ?>
                <?php if ($currentLang !== 'uk' && empty($t[$b['id']]) && !empty($ukT[$b['id']])): ?>
                    <small style="color: #6b7280; display: block; margin-top: 5px;">Підказка (Укр): <i><?= htmlspecialchars($ukT[$b['id']]) ?></i></small>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        
        <div style="position: sticky; bottom: 0px; background: white; padding: 15px 0; border-top: 1px solid #e5e7eb; margin-top: 20px; z-index: 10;">
            <button type="submit" name="save_translations" class="btn" style="width: 100%; font-size: 16px; padding: 12px;">Зберегти всі зміни</button>
        </div>
    </div>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
