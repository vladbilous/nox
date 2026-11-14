<?php
// admin/index.php
// Hardened admin session cookie: not readable from JS, not sent from other sites, HTTPS-only when on HTTPS
$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_name('nox_admin');
session_set_cookie_params(['lifetime' => 0, 'path' => '/admin', 'httponly' => true, 'samesite' => 'Strict', 'secure' => $isHttps]);
session_start();
// Errors go to the server log, never to the screen (they can leak paths and SQL)
ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: same-origin');
header('Cache-Control: no-store');
require_once __DIR__ . '/../DB.php';
require_once __DIR__ . '/security.php';

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

    $username = (string)($_POST['username'] ?? '');
    $password = (string)($_POST['password'] ?? '');

    $wait = nox_login_locked();
    if ($wait > 0) {
        $error = "Забагато невдалих спроб. Спробуйте через " . ceil($wait / 60) . " хв.";
    } else {
        $user = DB::fetch("SELECT * FROM users WHERE username = ?", [$username]);
        if ($user && password_verify($password, $user['password_hash'])) {
            nox_login_success();
            session_regenerate_id(true); // protects against session fixation
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            if (password_needs_rehash($user['password_hash'], PASSWORD_DEFAULT)) {
                DB::execute("UPDATE users SET password_hash = ? WHERE id = ?", [password_hash($password, PASSWORD_DEFAULT), $user['id']]);
            }
            header("Location: /admin");
            exit;
        }
        nox_login_failed();
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
    <html lang="uk">
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

// Every state-changing request inside the admin panel must carry the CSRF token
// (forms get it automatically in layout.php; links use ?token=...)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !nox_csrf_valid($_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    die('Сесія застаріла. Оновіть сторінку і спробуйте ще раз.');
}

// Routes
if ($action === 'dashboard') {
    require __DIR__ . '/dashboard.php';
} elseif ($action === 'pages') {
    require __DIR__ . '/pages.php';
} elseif ($action === 'contacts') {
    require __DIR__ . '/contacts.php';
} elseif ($action === 'mail') {
    require __DIR__ . '/mail.php';
} elseif ($action === 'profile') {
    require __DIR__ . '/profile.php';
} elseif ($action === 'sliders') {
    require __DIR__ . '/sliders.php';
} elseif ($action === 'services') {
    require __DIR__ . '/services.php';
} else {
    echo "404 Admin Page";
}
