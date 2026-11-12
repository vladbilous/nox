<?php
// components/seo/robots.php — /robots.txt (served by index.php). Uses the canonical site URL.
header('Content-Type: text/plain; charset=UTF-8');
header('Cache-Control: public, max-age=86400');
?>
User-agent: *
Allow: /
Disallow: /admin
Disallow: /send_form.php
Disallow: /*?route=

Sitemap: <?= $siteUrl ?>/sitemap.xml
