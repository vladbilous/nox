<?php // components/footer.php ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <img src="/assets/img/nox/logo-round.png" alt="NOX Beauty Space" width="96" height="96" loading="lazy">
            <p><?= tre('footer_tagline', 'Manicure, pedicure, brwi, rzęsy i fryzjer na warszawskiej Woli.') ?></p>
        </div>
        <?php /* Big tap targets for phones (hidden on desktop, where the columns below already show these links) */ ?>
        <div class="footer-actions">
<?php if ($phone !== ''): ?>
            <a href="<?= htmlspecialchars($phoneHref) ?>" data-track="phone"><svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 4h3.5l1.8 4.4-2.3 1.4a11 11 0 0 0 6.2 6.2l1.4-2.3L20 15.5V19a1.5 1.5 0 0 1-1.6 1.5A16.5 16.5 0 0 1 3.5 5.6 1.5 1.5 0 0 1 5 4z"/></svg><?= tre('footer_call', 'Zadzwoń') ?></a>
<?php endif; ?>
            <a href="https://www.google.com/maps/dir/?api=1&amp;destination=NOX+Beauty+Space+Ludwiki+4B+01-226+Warszawa" target="_blank" rel="noopener" data-track="directions"><svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg><?= tre('footer_route', 'Trasa') ?></a>
            <a href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank" rel="noopener"><svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r="1" fill="currentColor" stroke="none"/></svg>Instagram</a>
            <a href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="5" width="17" height="15.5" rx="3"/><path d="M3.5 10h17M8 3v4M16 3v4"/></svg>Booksy</a>
        </div>
        <div class="footer-col footer-nav">
            <h4><?= tre('footer_nav_title', 'Menu') ?></h4>
            <ul>
<?php foreach ($navItems as $anchor => $label): ?>
                <li><a href="<?= $homeUrl ?>#<?= $anchor ?>"><?= htmlspecialchars($label) ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-col footer-services">
            <h4><?= tre('footer_services_title', 'Usługi') ?></h4>
            <ul>
<?php foreach ($services as $svcSlug => $svc): ?>
                <li><a href="<?= $homeUrl . $svcSlug ?>"><?= tre('svc_' . $svc['key'] . '_title') ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-col footer-contact">
            <h4><?= tre('contact_eyebrow', 'Kontakt') ?></h4>
            <ul>
                <li><address>ul. Ludwiki 4B/U1<br>01-226 Warszawa</address></li>
                <li><?= tre('contact_hours_value', 'Codziennie 10:00–20:00') ?></li>
<?php if ($phone !== ''): ?>
                <li class="footer-dup"><a href="<?= htmlspecialchars($phoneHref) ?>" data-track="phone"><?= htmlspecialchars($phone) ?></a></li>
<?php endif; ?>
                <li class="footer-dup"><a href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank" rel="noopener">Instagram</a> · <a href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">Booksy</a></li>
            </ul>
        </div>
        <div class="footer-col footer-lang">
            <h4><?= tre('footer_lang_title', 'Język') ?></h4>
            <ul>
<?php foreach ($langOrder as $code): if (!in_array($code, $langCodes)) continue; ?>
                <li><a href="<?= lang_url($code) . $pagePath ?>" hreflang="<?= $code ?>"<?= $code === $currentLang ? ' aria-current="true"' : '' ?>><?= $langLabels[$code] ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="container footer-legal">
        <p class="footer-company">
<?php $ci = company_info(); $first = true; foreach ($ci as $label => $value): ?>
            <?= $first ? '' : '<span aria-hidden="true">·</span>' ?><span><?= htmlspecialchars($label) ?>: <?= $label === 'E-mail' ? '<a href="mailto:' . htmlspecialchars($value) . '">' . htmlspecialchars($value) . '</a>' : htmlspecialchars($value) ?></span>
<?php $first = false; endforeach; ?>
        </p>
        <nav class="footer-legal-links" aria-label="<?= tre('legal_nav_label', 'Informacje prawne') ?>">
            <a href="<?= $homeUrl ?>polityka-prywatnosci"><?= tre('privacy_link', 'Polityka prywatności') ?></a>
            <a href="<?= $homeUrl ?>polityka-cookies"><?= tre('cookies_policy_link', 'Polityka cookies') ?></a>
            <a href="<?= $homeUrl ?>regulamin"><?= tre('terms_link', 'Regulamin') ?></a>
            <button type="button" class="link-button" data-cookie-open><?= tre('cookie_settings_link', 'Ustawienia cookies') ?></button>
        </nav>
    </div>
    <div class="container footer-bottom">
        <span>© <?= date('Y') ?> NOX Beauty Space. <?= tre('footer_rights', 'Wszelkie prawa zastrzeżone.') ?></span>
        <a href="#main"><?= tre('back_to_top', 'Do góry') ?> ↑</a>
    </div>
</footer>

<a class="mobile-book" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><?= tre('book_btn', 'Umów wizytę') ?> <span class="mobile-book-promo"><?= tre('promo_value', '−10%') ?></span></a>

<div class="lightbox" data-lightbox-root hidden>
    <button type="button" class="lb-close" aria-label="<?= tre('close', 'Zamknij') ?>" data-lb-close>×</button>
    <button type="button" class="lb-nav lb-prev" aria-label="←" data-lb-prev>‹</button>
    <img alt="" data-lb-img>
    <button type="button" class="lb-nav lb-next" aria-label="→" data-lb-next>›</button>
</div>

<?php require __DIR__ . '/cookie-consent.php'; ?>

<script>window.NOX_I18N = <?= json_encode([
    'error' => tr('form_error', 'Nie udało się wysłać wiadomości. Spróbuj ponownie lub napisz do nas na Instagramie.'),
    'required' => tr('form_required', 'Uzupełnij wymagane pola i zaznacz zgodę.'),
], JSON_UNESCAPED_UNICODE) ?>;</script>
<script src="/assets/js/nox.js?v=<?= filemtime(__DIR__ . '/../assets/js/nox.js') ?>" defer></script>
</body>
</html>
