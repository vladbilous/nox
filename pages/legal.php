<?php
// pages/legal.php — shared layout of the legal pages (privacy policy, cookie policy, terms).
// Texts are edited in the admin (keys <prefix>_title / <prefix>_body); {{placeholders}} come from config.php → company.
?>
<main id="main">
    <section class="section simple-page">
        <div class="container simple-page-inner">
            <p class="eyebrow">NOX Beauty Space</p>
            <h1 class="section-title"><?= tre("{$legalKey}_title") ?></h1>
            <p class="legal-updated"><?= tre('legal_updated', 'Obowiązuje od') ?>: <?= htmlspecialchars(tr('legal_effective_date', '15.11.2026')) ?></p>
            <div class="legal-company"><?= legal_text('legal_company_block') ?></div>
            <div class="legal-text"><?= legal_text("{$legalKey}_body") ?></div>
<?php if ($legalKey === 'cookies_policy'): ?>
            <p><button type="button" class="btn btn-ghost btn-sm" data-cookie-open><?= tre('cookie_settings_link', 'Ustawienia cookies') ?></button></p>
<?php endif; ?>
            <p><a class="link-gold" href="<?= $homeUrl ?>">← <?= tre('404_button', 'Strona główna') ?></a></p>
        </div>
    </section>
</main>
