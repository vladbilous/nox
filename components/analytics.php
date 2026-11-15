<?php
// components/analytics.php — Google Analytics 4 / Google Ads in "basic" Consent Mode v2 (Poland: PKE art. 399, RODO).
// The Google tag script is NOT loaded at all until the visitor allows analytics or marketing cookies
// in the cookie banner (components/cookie-consent.php + assets/js/nox.js).
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
        gtag('consent', 'default', {
            ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied',
            analytics_storage: 'denied', functionality_storage: 'denied', personalization_storage: 'denied',
            security_storage: 'granted'
        });
        // Called by the cookie banner with the visitor's choice; loads the Google tag only when allowed
        window.noxApplyTracking = function (c) {
            gtag('consent', 'update', {
                analytics_storage: c.analytics ? 'granted' : 'denied',
                ad_storage: c.marketing ? 'granted' : 'denied',
                ad_user_data: c.marketing ? 'granted' : 'denied',
                ad_personalization: c.marketing ? 'granted' : 'denied'
            });
            if ((c.analytics || c.marketing) && !window.noxTagLoaded) {
                window.noxTagLoaded = true;
                gtag('js', new Date());
<?php if ($ga4Id !== ''): ?>
                gtag('config', <?= json_encode($ga4Id) ?>, { anonymize_ip: true });
<?php endif; ?>
<?php if ($gadsId !== ''): ?>
                gtag('config', <?= json_encode($gadsId) ?>);
<?php endif; ?>
                var s = document.createElement('script');
                s.async = true;
                s.src = 'https://www.googletagmanager.com/gtag/js?id=' + <?= json_encode(rawurlencode($tagId)) ?>;
                document.head.appendChild(s);
            }
        };
    </script>
