<?php
// database/seo_update.php — adds the SEO texts (FAQ, image alts, 404, privacy, cookies) to an existing site.
// Also creates the privacy page and the service landing pages. Safe to re-run: new keys are added, existing texts edited in the admin are kept,
// except the keys listed in $overwrite (search snippet + the languages sentence).
// Usage: DB_HOST=127.0.0.1 DB_USER=nox DB_PASS=nox php database/seo_update.php

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('CLI only');
}

require __DIR__ . '/../DB.php';

$texts = array_merge(require __DIR__ . '/seo_texts.php', require __DIR__ . '/service_texts.php');
$services = require __DIR__ . '/../components/services.php';
$langs = ['pl', 'uk', 'en'];
$overwrite = ['seo_title', 'seo_desc', 'about_text_2'];

$pdo = DB::getConnection();
$pdo->exec("SET NAMES utf8mb4");
$pdo->beginTransaction();
$added = 0;
$updated = 0;

try {
    foreach ($texts as $key => $values) {
        $type = (isset($values[3]) && $values[3] === 'html') ? 'html' : 'text';
        $block = DB::fetch("SELECT id FROM content_blocks WHERE key_name = ?", [$key]);
        if ($block) {
            $blockId = $block['id'];
        } else {
            DB::execute("INSERT INTO content_blocks (key_name, description, type) VALUES (?, ?, ?)", [$key, $key, $type]);
            $blockId = $pdo->lastInsertId();
        }
        foreach ($langs as $i => $lang) {
            $existing = DB::fetch("SELECT value FROM translations WHERE block_id = ? AND lang_code = ?", [$blockId, $lang]);
            if (!$existing) {
                DB::execute("INSERT INTO translations (block_id, lang_code, value) VALUES (?, ?, ?)", [$blockId, $lang, $values[$i]]);
                $added++;
            } elseif (in_array($key, $overwrite, true) && $existing['value'] !== $values[$i]) {
                DB::execute("UPDATE translations SET value = ? WHERE block_id = ? AND lang_code = ?", [$values[$i], $blockId, $lang]);
                $updated++;
            }
        }
    }

    // Search snippet of the home page
    $home = DB::fetch("SELECT id FROM pages WHERE slug = 'home'");
    foreach ($langs as $i => $lang) {
        $title = $texts['seo_title'][$i];
        $desc = $texts['seo_desc'][$i];
        $row = DB::fetch("SELECT id FROM seo_metadata WHERE page_id = ? AND lang_code = ?", [$home['id'], $lang]);
        if ($row) {
            DB::execute("UPDATE seo_metadata SET title = ?, description = ?, og_title = ?, og_description = ? WHERE id = ?", [$title, $desc, $title, $desc, $row['id']]);
        } else {
            DB::execute("INSERT INTO seo_metadata (page_id, lang_code, title, description, og_title, og_description, og_image) VALUES (?, ?, ?, ?, ?, ?, ?)",
                [$home['id'], $lang, $title, $desc, $title, $desc, '/assets/img/nox/og-image.jpg']);
        }
    }

    // Privacy policy page (/polityka-prywatnosci, /uk/polityka-prywatnosci, /en/polityka-prywatnosci)
    if (!DB::fetch("SELECT id FROM pages WHERE slug = 'polityka-prywatnosci'")) {
        DB::execute("INSERT INTO pages (slug, name) VALUES ('polityka-prywatnosci', 'Політика конфіденційності')");
    }

    // Service landing pages (/manicure-warszawa-wola, /uk/manicure-warszawa-wola, ...)
    foreach ($services as $slug => $svc) {
        if (!DB::fetch("SELECT id FROM pages WHERE slug = ?", [$slug])) {
            DB::execute("INSERT INTO pages (slug, name) VALUES (?, ?)", [$slug, 'Послуга: ' . $texts['svc' . 'page_' . $svc['key'] . '_eyebrow'][1]]);
        }
    }

    $pdo->commit();
    echo "SEO texts: {$added} added, {$updated} updated.\n";
} catch (Throwable $e) {
    $pdo->rollBack();
    fwrite(STDERR, "Failed: " . $e->getMessage() . "\n");
    exit(1);
}
