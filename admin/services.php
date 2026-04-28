<?php
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: /admin");
    exit;
}

$pageTitle = "Прайс-лист (Послуги)";
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actionType = $_POST['service_action'] ?? '';

    if ($actionType === 'add_cat') {
        DB::execute("INSERT INTO service_categories (slug, name_pl, name_uk, name_en, name_ru, sort_order) VALUES (?, ?, ?, ?, ?, ?)", [
            $_POST['slug'], $_POST['name_pl'], $_POST['name_uk'], $_POST['name_en'], $_POST['name_ru'], (int)$_POST['sort_order']
        ]);
        $msg = "Категорію додано.";
    } elseif ($actionType === 'edit_cat') {
        DB::execute("UPDATE service_categories SET slug=?, name_pl=?, name_uk=?, name_en=?, name_ru=?, sort_order=? WHERE id=?", [
            $_POST['slug'], $_POST['name_pl'], $_POST['name_uk'], $_POST['name_en'], $_POST['name_ru'], (int)$_POST['sort_order'], $_POST['id']
        ]);
        $msg = "Категорію оновлено.";
    } elseif ($actionType === 'del_cat') {
        DB::execute("DELETE FROM service_categories WHERE id=?", [$_POST['id']]);
        $msg = "Категорію видалено.";
    }
    
    elseif ($actionType === 'add_subcat') {
        DB::execute("INSERT INTO service_subcategories (category_id, name_pl, name_uk, name_en, name_ru, sort_order) VALUES (?, ?, ?, ?, ?, ?)", [
            $_POST['category_id'], $_POST['name_pl'], $_POST['name_uk'], $_POST['name_en'], $_POST['name_ru'], (int)$_POST['sort_order']
        ]);
        $msg = "Підкатегорію додано.";
    } elseif ($actionType === 'edit_subcat') {
        DB::execute("UPDATE service_subcategories SET name_pl=?, name_uk=?, name_en=?, name_ru=?, sort_order=? WHERE id=?", [
            $_POST['name_pl'], $_POST['name_uk'], $_POST['name_en'], $_POST['name_ru'], (int)$_POST['sort_order'], $_POST['id']
        ]);
        $msg = "Підкатегорію оновлено.";
    } elseif ($actionType === 'del_subcat') {
        DB::execute("DELETE FROM service_subcategories WHERE id=?", [$_POST['id']]);
        $msg = "Підкатегорію видалено.";
    }

    elseif ($actionType === 'add_item') {
        DB::execute("INSERT INTO service_items (subcategory_id, name_pl, name_uk, name_en, name_ru, price_pl, price_uk, price_en, price_ru, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $_POST['subcategory_id'], $_POST['name_pl'], $_POST['name_uk'], $_POST['name_en'], $_POST['name_ru'], $_POST['price_pl'], $_POST['price_uk'], $_POST['price_en'], $_POST['price_ru'], (int)$_POST['sort_order']
        ]);
        $msg = "Послугу додано.";
    } elseif ($actionType === 'edit_item') {
        DB::execute("UPDATE service_items SET name_pl=?, name_uk=?, name_en=?, name_ru=?, price_pl=?, price_uk=?, price_en=?, price_ru=?, sort_order=? WHERE id=?", [
            $_POST['name_pl'], $_POST['name_uk'], $_POST['name_en'], $_POST['name_ru'], $_POST['price_pl'], $_POST['price_uk'], $_POST['price_en'], $_POST['price_ru'], (int)$_POST['sort_order'], $_POST['id']
        ]);
        $msg = "Послугу оновлено.";
    } elseif ($actionType === 'del_item') {
        DB::execute("DELETE FROM service_items WHERE id=?", [$_POST['id']]);
        $msg = "Послугу видалено.";
    }
}

$cats = DB::fetchAll("SELECT * FROM service_categories ORDER BY sort_order ASC");
$subcats = DB::fetchAll("SELECT * FROM service_subcategories ORDER BY sort_order ASC");
$items = DB::fetchAll("SELECT * FROM service_items ORDER BY sort_order ASC");

$tree = [];
foreach($cats as $c) {
    $c['subs'] = [];
    $tree[$c['id']] = $c;
}
foreach($subcats as $s) {
    $s['items'] = [];
    if(isset($tree[$s['category_id']])) {
        $tree[$s['category_id']]['subs'][$s['id']] = $s;
    }
}
foreach($items as $i) {
    foreach($tree as &$c) {
        if(isset($c['subs'][$i['subcategory_id']])) {
            $c['subs'][$i['subcategory_id']]['items'][] = $i;
            break;
        }
    }
}

ob_start();
?>
<?php if ($msg): ?>
    <div style="background:#d1fae5; color:#065f46; padding:10px; margin-bottom:15px; border-radius:4px;"><?= htmlspecialchars($msg) ?></div>
<?php endif; ?>

<style>
    .svc-box { border: 1px solid #e5e7eb; padding: 15px; margin-bottom: 15px; background: #fff; border-radius: 8px; }
    .svc-cat-title { font-size: 18px; font-weight: bold; margin-bottom: 10px; display:flex; justify-content:space-between; align-items:center; }
    .svc-subcat-box { border: 1px dashed #d1d5db; padding: 10px; margin: 10px 0 10px 20px; background: #f9fafb; border-radius: 4px; }
    .svc-item-box { padding: 5px; margin-left: 20px; border-bottom: 1px solid #eee; display:flex; justify-content:space-between; align-items:center;}
    .actions button { margin-left: 5px; cursor: pointer; padding: 3px 8px; font-size: 12px; }
    .add-btn { background: #10b981; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor:pointer;}
    .add-btn:hover { background: #059669; }
    
    dialog { border: none; border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); padding: 20px; width: 600px; max-width: 90%; }
    dialog::backdrop { background: rgba(0,0,0,0.5); }
    .dialog-header { font-size: 18px; font-weight: bold; margin-bottom: 15px; }
    .form-row { display:flex; gap:10px; margin-bottom: 10px; }
    .form-row > div { flex: 1; }
</style>

<div style="margin-bottom:20px;">
    <button class="add-btn" onclick="openModal('catModal', 'add_cat')">+ Додати Категорію (Вкладку)</button>
</div>

<?php foreach ($tree as $cat): ?>
    <div class="svc-box">
        <div class="svc-cat-title">
            <span>
                📁 <?= htmlspecialchars($cat['name_uk'] ?: $cat['name_pl']) ?> 
                <small style="color:#666; font-weight:normal;">(ID: <?= $cat['id'] ?>, Slug: <?= htmlspecialchars($cat['slug']) ?>)</small>
            </span>
            <div class="actions">
                <button onclick='editCat(<?= json_encode($cat) ?>)'>Редагувати</button>
                <form method="POST" style="display:inline;" onsubmit="return confirm('Видалити категорію та всі її послуги?');">
                    <input type="hidden" name="service_action" value="del_cat">
                    <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                    <button type="submit" style="background:#ef4444; color:white; border:none; border-radius:4px;">Видалити</button>
                </form>
            </div>
        </div>
        
        <div style="margin-bottom: 10px; margin-left: 20px;">
            <button class="add-btn" style="background:#3b82f6;" onclick="openSubcatModal(<?= $cat['id'] ?>)">+ Додати Підкатегорію (Блок)</button>
        </div>

        <?php foreach ($cat['subs'] as $sub): ?>
            <div class="svc-subcat-box">
                <div style="font-weight:bold; margin-bottom:10px; display:flex; justify-content:space-between;">
                    <span>📄 <?= htmlspecialchars($sub['name_uk'] ?: $sub['name_pl']) ?></span>
                    <div class="actions">
                        <button onclick='editSubcat(<?= json_encode($sub) ?>)'>Редагувати</button>
                        <form method="POST" style="display:inline;" onsubmit="return confirm('Видалити підкатегорію та всі послуги?');">
                            <input type="hidden" name="service_action" value="del_subcat">
                            <input type="hidden" name="id" value="<?= $sub['id'] ?>">
                            <button type="submit" style="background:#ef4444; color:white; border:none; border-radius:4px;">Видалити</button>
                        </form>
                    </div>
                </div>

                <?php foreach ($sub['items'] as $item): ?>
                    <div class="svc-item-box">
                        <div>
                            <?= htmlspecialchars($item['name_uk'] ?: $item['name_pl']) ?>
                            <span style="color:#c89656; font-weight:bold; margin-left:10px;">
                                <?= htmlspecialchars($item['price_pl']) ?>
                            </span>
                        </div>
                        <div class="actions">
                            <button onclick='editItem(<?= json_encode($item) ?>)'>Редагувати</button>
                            <form method="POST" style="display:inline;" onsubmit="return confirm('Видалити послугу?');">
                                <input type="hidden" name="service_action" value="del_item">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" style="background:#ef4444; color:white; border:none; border-radius:4px;">Видалити</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div style="margin-top: 10px;">
                    <button class="add-btn" style="background:#8b5cf6;" onclick="openItemModal(<?= $sub['id'] ?>)">+ Додати Послугу</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>


<!-- CATEGORY MODAL -->
<dialog id="catModal">
    <div class="dialog-header">Редагування Категорії</div>
    <form method="POST">
        <input type="hidden" name="service_action" id="cat_action" value="add_cat">
        <input type="hidden" name="id" id="cat_id">
        <div class="form-row">
            <div><label>Slug (eng, без пробілів):</label><input type="text" name="slug" id="cat_slug" required></div>
            <div><label>Порядок (сортування):</label><input type="number" name="sort_order" id="cat_order" value="0"></div>
        </div>
        <div class="form-row">
            <div><label>Назва PL:</label><input type="text" name="name_pl" id="cat_pl" required></div>
            <div><label>Назва UK:</label><input type="text" name="name_uk" id="cat_uk"></div>
        </div>
        <div class="form-row">
            <div><label>Назва EN:</label><input type="text" name="name_en" id="cat_en"></div>
            <div><label>Назва RU:</label><input type="text" name="name_ru" id="cat_ru"></div>
        </div>
        <div style="text-align:right; margin-top:20px;">
            <button type="button" onclick="document.getElementById('catModal').close()">Скасувати</button>
            <button type="submit" class="btn">Зберегти</button>
        </div>
    </form>
</dialog>

<!-- SUBCATEGORY MODAL -->
<dialog id="subcatModal">
    <div class="dialog-header">Редагування Підкатегорії</div>
    <form method="POST">
        <input type="hidden" name="service_action" id="subcat_action" value="add_subcat">
        <input type="hidden" name="id" id="subcat_id">
        <input type="hidden" name="category_id" id="subcat_cat_id">
        <div class="form-row">
            <div><label>Порядок (сортування):</label><input type="number" name="sort_order" id="subcat_order" value="0"></div>
        </div>
        <div class="form-row">
            <div><label>Назва PL:</label><input type="text" name="name_pl" id="subcat_pl" required></div>
            <div><label>Назва UK:</label><input type="text" name="name_uk" id="subcat_uk"></div>
        </div>
        <div class="form-row">
            <div><label>Назва EN:</label><input type="text" name="name_en" id="subcat_en"></div>
            <div><label>Назва RU:</label><input type="text" name="name_ru" id="subcat_ru"></div>
        </div>
        <div style="text-align:right; margin-top:20px;">
            <button type="button" onclick="document.getElementById('subcatModal').close()">Скасувати</button>
            <button type="submit" class="btn">Зберегти</button>
        </div>
    </form>
</dialog>

<!-- ITEM MODAL -->
<dialog id="itemModal">
    <div class="dialog-header">Редагування Послуги</div>
    <form method="POST">
        <input type="hidden" name="service_action" id="item_action" value="add_item">
        <input type="hidden" name="id" id="item_id">
        <input type="hidden" name="subcategory_id" id="item_subcat_id">
        
        <div class="form-row">
            <div><label>Порядок:</label><input type="number" name="sort_order" id="item_order" value="0"></div>
        </div>
        
        <h4>Назви</h4>
        <div class="form-row">
            <div><label>Назва PL:</label><input type="text" name="name_pl" id="item_name_pl" required></div>
            <div><label>Назва UK:</label><input type="text" name="name_uk" id="item_name_uk"></div>
        </div>
        <div class="form-row">
            <div><label>Назва EN:</label><input type="text" name="name_en" id="item_name_en"></div>
            <div><label>Назва RU:</label><input type="text" name="name_ru" id="item_name_ru"></div>
        </div>

        <h4>Ціни (напр. "80 zł")</h4>
        <div class="form-row">
            <div><label>Ціна PL:</label><input type="text" name="price_pl" id="item_price_pl" required></div>
            <div><label>Ціна UK:</label><input type="text" name="price_uk" id="item_price_uk"></div>
        </div>
        <div class="form-row">
            <div><label>Ціна EN:</label><input type="text" name="price_en" id="item_price_en"></div>
            <div><label>Ціна RU:</label><input type="text" name="price_ru" id="item_price_ru"></div>
        </div>

        <div style="text-align:right; margin-top:20px;">
            <button type="button" onclick="document.getElementById('itemModal').close()">Скасувати</button>
            <button type="submit" class="btn">Зберегти</button>
        </div>
    </form>
</dialog>

<script>
function openModal(id, action) {
    document.getElementById(id).showModal();
    if(action) {
        document.getElementById(id.replace('Modal', '_action')).value = action;
    }
}

// Cat
function editCat(data) {
    document.getElementById('cat_action').value = 'edit_cat';
    document.getElementById('cat_id').value = data.id;
    document.getElementById('cat_slug').value = data.slug;
    document.getElementById('cat_order').value = data.sort_order;
    document.getElementById('cat_pl').value = data.name_pl;
    document.getElementById('cat_uk').value = data.name_uk;
    document.getElementById('cat_en').value = data.name_en;
    document.getElementById('cat_ru').value = data.name_ru;
    openModal('catModal');
}

// Subcat
function openSubcatModal(catId) {
    document.getElementById('subcat_action').value = 'add_subcat';
    document.getElementById('subcat_cat_id').value = catId;
    document.getElementById('subcat_id').value = '';
    document.getElementById('subcat_order').value = '0';
    document.getElementById('subcat_pl').value = '';
    document.getElementById('subcat_uk').value = '';
    document.getElementById('subcat_en').value = '';
    document.getElementById('subcat_ru').value = '';
    openModal('subcatModal');
}
function editSubcat(data) {
    document.getElementById('subcat_action').value = 'edit_subcat';
    document.getElementById('subcat_id').value = data.id;
    document.getElementById('subcat_order').value = data.sort_order;
    document.getElementById('subcat_pl').value = data.name_pl;
    document.getElementById('subcat_uk').value = data.name_uk;
    document.getElementById('subcat_en').value = data.name_en;
    document.getElementById('subcat_ru').value = data.name_ru;
    openModal('subcatModal');
}

// Item
function openItemModal(subcatId) {
    document.getElementById('item_action').value = 'add_item';
    document.getElementById('item_subcat_id').value = subcatId;
    document.getElementById('item_id').value = '';
    document.getElementById('item_order').value = '0';
    
    document.getElementById('item_name_pl').value = '';
    document.getElementById('item_name_uk').value = '';
    document.getElementById('item_name_en').value = '';
    document.getElementById('item_name_ru').value = '';
    
    document.getElementById('item_price_pl').value = '';
    document.getElementById('item_price_uk').value = '';
    document.getElementById('item_price_en').value = '';
    document.getElementById('item_price_ru').value = '';
    
    openModal('itemModal');
}
function editItem(data) {
    document.getElementById('item_action').value = 'edit_item';
    document.getElementById('item_id').value = data.id;
    document.getElementById('item_order').value = data.sort_order;
    
    document.getElementById('item_name_pl').value = data.name_pl;
    document.getElementById('item_name_uk').value = data.name_uk;
    document.getElementById('item_name_en').value = data.name_en;
    document.getElementById('item_name_ru').value = data.name_ru;
    
    document.getElementById('item_price_pl').value = data.price_pl;
    document.getElementById('item_price_uk').value = data.price_uk;
    document.getElementById('item_price_en').value = data.price_en;
    document.getElementById('item_price_ru').value = data.price_ru;
    
    openModal('itemModal');
}
</script>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
