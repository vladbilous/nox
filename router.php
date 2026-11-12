<?php
// router.php — local dev router for `php -S`, mirrors .htaccess rules (incl. the security whitelist).
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $path;

// Only public entry points are reachable; everything else that exists on disk returns 404
$public = '#^/(assets/|favicon\.ico$|send_form\.php$|admin/(index\.php)?$|google[0-9a-f]+\.html$|BingSiteAuth\.xml$)#i';
$blockedDir = '#^/(\.git|\.claude|\.osp|node_modules|database|PHPMailer|components|pages)(/|$)#i';

if (preg_match($blockedDir, $path) || ($path !== '/' && is_file($file) && !preg_match($public, $path) && $path !== '/index.php')) {
    $_GET['route'] = '404-not-found';
    require __DIR__ . '/index.php';
    return true;
}
if ($path === '/index.php') {
    header('Location: /', true, 301);
    return true;
}
if ($path !== '/' && is_file($file)) {
    return false; // serve public static file / allowed PHP script as-is
}
if ($path !== '/' && is_dir($file) && is_file(rtrim($file, '/') . '/index.php')) {
    chdir(rtrim($file, '/'));
    require rtrim($file, '/') . '/index.php';
    return true;
}
$_GET['route'] = ltrim($path, '/');
require __DIR__ . '/index.php';
