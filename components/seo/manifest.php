<?php
// components/seo/manifest.php — /site.webmanifest (icons and colours for "Add to home screen").
header('Content-Type: application/manifest+json; charset=UTF-8');
header('Cache-Control: public, max-age=604800');
echo json_encode([
    'name' => 'NOX Beauty Space',
    'short_name' => 'NOX',
    'start_url' => '/',
    'display' => 'standalone',
    'background_color' => '#0b0a09',
    'theme_color' => '#0b0a09',
    'icons' => [
        ['src' => '/assets/img/nox/favicon-192.png', 'sizes' => '192x192', 'type' => 'image/png'],
        ['src' => '/assets/img/nox/favicon-512.png', 'sizes' => '512x512', 'type' => 'image/png'],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
