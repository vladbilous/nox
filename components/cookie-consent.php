<?php
// components/cookie-consent.php — cookie banner + settings (PKE art. 399, RODO art. 7, EDPB 03/2022):
// "Accept all" and "Reject all" are equally visible, nothing is pre-ticked, the choice can be changed
// any time from the footer link "Ustawienia cookies". Only categories actually used on the site are listed.
$cookieCats = [
    'media' => true, // embedded Google Map
    'analytics' => trim($siteConfig['ga4_id'] ?? '') !== '',
    'marketing' => trim($siteConfig['gads_id'] ?? '') !== '',
];
?>
<div class="cookie-banner" data-cookie-banner hidden role="dialog" aria-modal="false" aria-labelledby="cookie-title">
    <p class="cookie-title" id="cookie-title"><?= tre('cookie_title', 'Szanujemy Twoją prywatność') ?></p>
    <p><?= tre('cookie_text') ?> <a href="<?= $homeUrl ?>polityka-cookies"><?= tre('cookies_policy_link', 'Polityka cookies') ?></a></p>

    <div class="cookie-settings" data-cookie-settings hidden>
        <label class="cookie-cat">
            <input type="checkbox" checked disabled>
            <span><strong><?= tre('cookie_cat_necessary', 'Niezbędne') ?></strong><small><?= tre('cookie_cat_necessary_desc') ?></small></span>
        </label>
<?php foreach ($cookieCats as $cat => $used): if (!$used) continue; ?>
        <label class="cookie-cat">
            <input type="checkbox" data-cookie-cat="<?= $cat ?>">
            <span><strong><?= tre("cookie_cat_{$cat}") ?></strong><small><?= tre("cookie_cat_{$cat}_desc") ?></small></span>
        </label>
<?php endforeach; ?>
    </div>

    <div class="cookie-actions">
        <button type="button" class="btn btn-ghost btn-sm" data-cookie-action="settings"><?= tre('cookie_settings', 'Ustawienia') ?></button>
        <button type="button" class="btn btn-ghost btn-sm" data-cookie-action="save" hidden><?= tre('cookie_save', 'Zapisz wybór') ?></button>
        <button type="button" class="btn btn-ghost btn-sm" data-cookie-action="reject"><?= tre('cookie_reject_all', 'Odrzuć wszystkie') ?></button>
        <button type="button" class="btn btn-ghost btn-sm" data-cookie-action="accept"><?= tre('cookie_accept_all', 'Akceptuj wszystkie') ?></button>
    </div>
</div>
