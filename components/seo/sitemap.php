<?php
// components/seo/sitemap.php — /sitemap.xml (served by index.php).
// One entry per language version of each page (home + service pages), with hreflang alternates.
header('Content-Type: application/xml; charset=UTF-8');
header('Cache-Control: public, max-age=3600');

$langOrder = ['pl', 'uk', 'en'];
$codes = array_values(array_filter($langOrder, fn($c) => in_array($c, $langCodes)));
$urlFor = fn($code, $path = '') => $siteUrl . ($code === $defaultLang ? '/' : '/' . $code . '/') . $path;
$services = require __DIR__ . '/../services.php';

// Last change: newest of the templates and stylesheet
$lastmod = date('Y-m-d', max(array_map(fn($f) => is_file($f) ? filemtime($f) : 0, [
    __DIR__ . '/../../pages/home.php',
    __DIR__ . '/../../pages/service.php',
    __DIR__ . '/../header.php',
    __DIR__ . '/../../assets/css/nox.css',
])));

// path => image list
$pagesList = ['' => array_column(DB::fetchAll("SELECT image_path FROM slider_images WHERE slider_type IN ('hero', 'gallery') ORDER BY slider_type DESC, sort_order ASC"), 'image_path')];
foreach ($services as $slug => $svc) {
    $pagesList[$slug] = array_map(fn($n) => "/assets/img/nox/{$n}.webp", $svc['gallery']);
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php foreach ($pagesList as $path => $images): foreach ($codes as $code): ?>
  <url>
    <loc><?= htmlspecialchars($urlFor($code, $path)) ?></loc>
    <lastmod><?= $lastmod ?></lastmod>
<?php foreach ($codes as $alt): ?>
    <xhtml:link rel="alternate" hreflang="<?= $alt ?>" href="<?= htmlspecialchars($urlFor($alt, $path)) ?>"/>
<?php endforeach; ?>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($urlFor($defaultLang, $path)) ?>"/>
<?php foreach ($images as $img): ?>
    <image:image><image:loc><?= htmlspecialchars($siteUrl . $img) ?></image:loc></image:image>
<?php endforeach; ?>
  </url>
<?php endforeach; endforeach; ?>
</urlset>
