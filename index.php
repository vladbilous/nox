<?php
// index.php
session_start();
require_once __DIR__ . '/DB.php';

// DB Connection check
try {
    DB::getConnection();
} catch (Exception $e) {
    die("Database connection failed.");
}

$route = isset($_GET['route']) ? trim($_GET['route'], '/') : '';
$parts = explode('/', $route);

// Available languages
$langs = DB::fetchAll("SELECT code, name, is_default FROM languages");
$langCodes = array_column($langs, 'code');
$defaultLang = '';
foreach ($langs as $l) {
    if ($l['is_default']) $defaultLang = $l['code'];
}

$currentLang = $defaultLang;

// Auto-detect language on first visit to root
if (empty($parts[0]) && !isset($_COOKIE['lang_detected'])) {
    $detected = 'cs'; // fallback to Czech as requested
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $headerLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if (in_array($headerLang, $langCodes)) {
            $detected = $headerLang;
        }
    }
    setcookie('lang_detected', '1', time() + 86400 * 30, '/');
    if ($detected !== $defaultLang) {
        header("Location: /{$detected}/", true, 302);
        exit;
    }
}

// Detect language from URL
if (!empty($parts[0]) && in_array($parts[0], $langCodes)) {
    $currentLang = $parts[0];
    array_shift($parts); // remove lang from parts
    
    // Redirect /pl/ to / if pl is default
    if ($currentLang === $defaultLang) {
        $newRoute = implode('/', $parts);
        header("Location: /" . $newRoute, true, 301);
        exit;
    }
}

// Current Page
$pageSlug = empty($parts[0]) ? 'home' : $parts[0];

// Admin routing
if ($pageSlug === 'admin') {
    require __DIR__ . '/admin/index.php';
    exit;
}

// Get Page ID
$page = DB::fetch("SELECT id FROM pages WHERE slug = ?", [$pageSlug]);
if (!$page) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit;
}
$pageId = $page['id'];

// Get SEO Metadata
$seo = DB::fetch("SELECT * FROM seo_metadata WHERE page_id = ? AND lang_code = ?", [$pageId, $currentLang]);

// Get all translations for this language
$translationsRaw = DB::fetchAll("
    SELECT cb.key_name, t.value 
    FROM content_blocks cb 
    LEFT JOIN translations t ON t.block_id = cb.id AND t.lang_code = ?
", [$currentLang]);

$t = [];
foreach ($translationsRaw as $row) {
    $t[$row['key_name']] = $row['value'] ?? ''; // fallback to empty if no translation yet
}

// Helper function to output content
function tr($key, $default = '') {
    global $t;
    return !empty($t[$key]) ? $t[$key] : $default;
}

// Render the appropriate template
$templateFile = __DIR__ . "/pages/{$pageSlug}.php";
if (file_exists($templateFile)) {
    require __DIR__ . '/components/header.php';
    require $templateFile;
    require __DIR__ . '/components/footer.php';
} else {
    echo "Template not found.";
}
