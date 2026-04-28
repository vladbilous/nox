<?php
// admin/index.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../DB.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';

// Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF Token validation failed.");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = DB::fetch("SELECT * FROM users WHERE username = ?", [$username]);
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['id'];
        header("Location: /admin");
        exit;
    } else {
        $error = "Невірний логін або пароль";
    }
}

// Handle Logout
if ($action === 'logout') {
    session_destroy();
    header("Location: /admin");
    exit;
}

// Check Auth
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    ?>
    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Вхід - Salon CMS</title>
        <style>
            body { font-family: sans-serif; display:flex; justify-content:center; align-items:center; height: 100vh; background: #f4f4f4; margin:0;}
            .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px;}
            input { width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing:border-box;}
            button { width: 100%; padding: 10px; background: #c89656; color: white; border: none; border-radius: 4px; cursor: pointer;}
            button:hover { background: #b18244; }
            .error { color: red; margin-bottom: 10px; font-size: 14px;}
        </style>
    </head>
    <body>
        <div class="login-box">
            <h2>Salon CMS</h2>
            <?php if(!empty($error)): ?><div class="error"><?=$error?></div><?php endif; ?>
            <form method="POST">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <input type="text" name="username" placeholder="Логін" required>
                <input type="password" name="password" placeholder="Пароль" required>
                <button type="submit" name="login">Увійти</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Routes
if ($action === 'dashboard') {
    require __DIR__ . '/dashboard.php';
} elseif ($action === 'pages') {
    require __DIR__ . '/pages.php';
} elseif ($action === 'contacts') {
    require __DIR__ . '/contacts.php';
} elseif ($action === 'profile') {
    require __DIR__ . '/profile.php';
} elseif ($action === 'sliders') {
    require __DIR__ . '/sliders.php';
} elseif ($action === 'services') {
    require __DIR__ . '/services.php';
} else {
    echo "404 Admin Page";
}
