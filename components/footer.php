<?php // components/footer.php ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <img src="/assets/img/nox/logo-round.png" alt="NOX Beauty Space" width="96" height="96" loading="lazy">
            <p><?= tre('footer_tagline', 'Manicure, pedicure, brwi, rzęsy i fryzjer na warszawskiej Woli.') ?></p>
        </div>
        <div>
            <h4><?= tre('footer_nav_title', 'Menu') ?></h4>
            <ul>
<?php foreach ($navItems as $anchor => $label): ?>
                <li><a href="<?= $homeUrl ?>#<?= $anchor ?>"><?= htmlspecialchars($label) ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h4><?= tre('footer_services_title', 'Usługi') ?></h4>
            <ul>
<?php foreach ($services as $svcSlug => $svc): ?>
                <li><a href="<?= $homeUrl . $svcSlug ?>"><?= tre('svc_' . $svc['key'] . '_title') ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h4><?= tre('contact_eyebrow', 'Kontakt') ?></h4>
            <ul>
                <li><address>ul. Ludwiki 4B/U1<br>01-226 Warszawa</address></li>
                <li><?= tre('contact_hours_value', 'Codziennie 10:00–20:00') ?></li>
<?php if ($phone !== ''): ?>
                <li><a href="<?= htmlspecialchars($phoneHref) ?>" data-track="phone"><?= htmlspecialchars($phone) ?></a></li>
<?php endif; ?>
                <li><a href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank" rel="noopener">Instagram</a> · <a href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">Booksy</a></li>
            </ul>
        </div>
        <div>
            <h4><?= tre('footer_lang_title', 'Język') ?></h4>
            <ul>
<?php foreach ($langOrder as $code): if (!in_array($code, $langCodes)) continue; ?>
                <li><a href="<?= lang_url($code) . $pagePath ?>" hreflang="<?= $code ?>"<?= $code === $currentLang ? ' aria-current="true"' : '' ?>><?= $langLabels[$code] ?></a></li>
<?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="container footer-bottom">
        <span>© <?= date('Y') ?> NOX Beauty Space. <?= tre('footer_rights', 'Wszelkie prawa zastrzeżone.') ?> · <a href="<?= $homeUrl ?>polityka-prywatnosci"><?= tre('privacy_link', 'Polityka prywatności') ?></a></span>
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

<?php if (!empty($analyticsEnabled)): ?>
<div class="cookie-banner" data-cookie-banner hidden role="dialog" aria-live="polite" aria-label="Cookies">
    <p><?= tre('cookie_text') ?> <a href="<?= $homeUrl ?>polityka-prywatnosci"><?= tre('privacy_link', 'Polityka prywatności') ?></a></p>
    <div class="cookie-actions">
        <button type="button" class="btn btn-ghost btn-sm" data-cookie-choice="denied"><?= tre('cookie_decline', 'Tylko niezbędne') ?></button>
        <button type="button" class="btn btn-gold btn-sm" data-cookie-choice="granted"><?= tre('cookie_accept', 'Akceptuję') ?></button>
    </div>
</div>
<?php endif; ?>

<script>window.NOX_I18N = <?= json_encode([
    'error' => tr('form_error', 'Nie udało się wysłać wiadomości. Spróbuj ponownie lub napisz do nas na Instagramie.'),
    'required' => tr('form_required', 'Uzupełnij wymagane pola i zaznacz zgodę.'),
], JSON_UNESCAPED_UNICODE) ?>;</script>
<script src="/assets/js/nox.js?v=<?= filemtime(__DIR__ . '/../assets/js/nox.js') ?>" defer></script>
</body>
</html>
