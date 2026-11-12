<?php
// components/analytics.php — Google Analytics 4 / Google Ads with Consent Mode v2 (EU/RODO).
// Nothing is tracked until the visitor accepts cookies in the banner (components/footer.php).
$ga4Id = trim($siteConfig['ga4_id'] ?? '');
$gadsId = trim($siteConfig['gads_id'] ?? '');
$analyticsEnabled = $ga4Id !== '' || $gadsId !== '';
if (!$analyticsEnabled) {
    return;
}
$tagId = $ga4Id !== '' ? $ga4Id : $gadsId;
?>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        var noxConsent = null;
        try { noxConsent = localStorage.getItem('nox_consent'); } catch (e) {}
        gtag('consent', 'default', {
            ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied',
            analytics_storage: 'denied', functionality_storage: 'granted', security_storage: 'granted',
            wait_for_update: 500
        });
        if (noxConsent === 'granted') {
            gtag('consent', 'update', { ad_storage: 'granted', ad_user_data: 'granted', ad_personalization: 'granted', analytics_storage: 'granted' });
        }
        gtag('js', new Date());
<?php if ($ga4Id !== ''): ?>
        gtag('config', <?= json_encode($ga4Id) ?>);
<?php endif; ?>
<?php if ($gadsId !== ''): ?>
        gtag('config', <?= json_encode($gadsId) ?>);
<?php endif; ?>
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= urlencode($tagId) ?>"></script>
