<?php
// admin/layout.php
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Salon CMS</title>
    <style>
        body { margin: 0; font-family: sans-serif; display: flex; height: 100vh; overflow: hidden; background: #f9f9f9; }
        .sidebar { width: 250px; flex-shrink: 0; background: #1f2937; color: white; padding-top: 20px; display: flex; flex-direction: column; }
        .sidebar a { display: block; padding: 15px 20px; color: #d1d5db; text-decoration: none; border-left: 3px solid transparent;}
        .sidebar a:hover, .sidebar a.active { background: #374151; color: white; border-left-color: #c89656; }
        .content { flex-grow: 1; padding: 30px; overflow-y: auto; position: relative; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb; padding-bottom: 20px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #f3f4f6; font-weight: 600; color: #374151; }
        .btn { padding: 8px 15px; background: #c89656; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer;}
        .btn:hover { background: #b18244; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-bottom:10px;}
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold;}
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="padding: 0 20px; color: #c89656;">Salon Admin</h2>
        <a href="/admin/?action=dashboard" class="<?= $action === 'dashboard' ? 'active' : '' ?>">Головна</a>
        <a href="/admin/?action=pages" class="<?= $action === 'pages' ? 'active' : '' ?>">Контент та Сторінки</a>
        <a href="/admin/?action=services" class="<?= $action === 'services' ? 'active' : '' ?>">Прайс-лист</a>
        <a href="/admin/?action=sliders" class="<?= $action === 'sliders' ? 'active' : '' ?>">Слайдери</a>
        <a href="/admin/?action=contacts" class="<?= $action === 'contacts' ? 'active' : '' ?>">Заявки</a>
        <a href="/admin/?action=profile" class="<?= $action === 'profile' ? 'active' : '' ?>">Профіль</a>
        <a href="/admin/?action=logout" style="margin-top: auto;">Вихід</a>
    </div>
    <div class="content">
        <div class="header">
            <h1><?= $pageTitle ?? 'Dashboard' ?></h1>
        </div>
        <?= $content ?>
    </div>
</body>
</html>
