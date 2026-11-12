<?php
// index.php — front controller: language detection, SEO routes (robots.txt, sitemap.xml), pages.
session_start();
require_once __DIR__ . '/DB.php';

// DB Connection check
try {
    DB::getConnection();
} catch (Exception $e) {
    die("Database connection failed.");
}

$config = require __DIR__ . '/config.php';
$siteConfig = $config['site'] ?? [];

$route = isset($_GET['route']) ? trim($_GET['route'], '/') : '';
$parts = explode('/', $route);

// Canonical site address: from config in production, from the request in development
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$siteUrl = rtrim($siteConfig['url'] ?? '', '/');
if ($siteUrl === '') {
    $host = preg_replace('/[^a-zA-Z0-9.:\-]/', '', $_SERVER['HTTP_HOST'] ?? 'localhost');
    $siteUrl = $scheme . '://' . $host;
}

// Available languages
$langs = DB::fetchAll("SELECT code, name, is_default FROM languages");
$langCodes = array_column($langs, 'code');
$defaultLang = '';
foreach ($langs as $l) {
    if ($l['is_default']) $defaultLang = $l['code'];
}

$currentLang = $defaultLang;

// Technical SEO files
if ($route === 'robots.txt') {
    require __DIR__ . '/components/seo/robots.php';
    exit;
}
if ($route === 'sitemap.xml') {
    require __DIR__ . '/components/seo/sitemap.php';
    exit;
}
if ($route === 'site.webmanifest') {
    require __DIR__ . '/components/seo/manifest.php';
    exit;
}

// One URL per page: "/uk" -> "/uk/" (language home pages always end with a slash)
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if (count($parts) === 1 && in_array($parts[0], $langCodes) && substr($requestPath, -1) !== '/') {
    $query = $_SERVER['QUERY_STRING'] ?? '';
    $query = preg_replace('/(^|&)route=[^&]*/', '', $query);
    $query = ltrim($query, '&');
    header('Location: /' . $parts[0] . '/' . ($query !== '' ? '?' . $query : ''), true, 301);
    exit;
}

// Auto-detect language on first visit to root (only for people: Googlebot sends no Accept-Language)
if (empty($parts[0]) && !isset($_COOKIE['lang_detected'])) {
    $detected = $defaultLang; // unsupported browser language (e.g. ru) -> default language
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

// "/home" duplicates the language home page
if ($pageSlug === 'home' && !empty($parts[0])) {
    header('Location: ' . ($currentLang === $defaultLang ? '/' : '/' . $currentLang . '/'), true, 301);
    exit;
}

// Get Page ID
$page = DB::fetch("SELECT id FROM pages WHERE slug = ?", [$pageSlug]);
$isNotFound = !$page || count($parts) > 1;
if ($isNotFound) {
    http_response_code(404);
    $page = DB::fetch("SELECT id FROM pages WHERE slug = 'home'");
    $pageSlug = '404';
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

// Escaped variant of tr() for plain-text output
function tre($key, $default = '') {
    return htmlspecialchars(tr($key, $default), ENT_QUOTES, 'UTF-8');
}

// Home URL for a given language ("/" for the default one, "/uk/" for others)
function lang_url($code) {
    global $defaultLang;
    return $code === $defaultLang ? '/' : '/' . $code . '/';
}

$homeUrl = lang_url($currentLang);

// Service landing pages share one template (pages/service.php)
$services = require __DIR__ . '/components/services.php';
$service = $services[$pageSlug] ?? null;

// Localised DB field (name_uk, price_en...) with Polish fallback
function field($row, $name) {
    global $currentLang;
    $value = $row[$name . '_' . $currentLang] ?? '';
    return $value !== '' && $value !== null ? $value : ($row[$name . '_pl'] ?? '');
}

// URL of a service landing page by its key ('manicure', 'barber'...) in the current language
function service_url($key) {
    global $services, $homeUrl;
    foreach ($services as $slug => $svc) {
        if ($svc['key'] === $key) {
            return $homeUrl . $slug;
        }
    }
    return $homeUrl . '#services';
}

// Render the appropriate template
$templateFile = __DIR__ . ($service ? '/pages/service.php' : "/pages/{$pageSlug}.php");
if (file_exists($templateFile)) {
    require __DIR__ . '/components/header.php';
    require $templateFile;
    require __DIR__ . '/components/footer.php';
} else {
    echo "Template not found.";
}
