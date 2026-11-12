<?php
// components/header.php — <head>, SEO and the site header.
$localeMap = ['pl' => 'pl_PL', 'uk' => 'uk_UA', 'en' => 'en_US'];
$langLabels = ['pl' => 'Polski', 'uk' => 'Українська', 'en' => 'English'];
$langOrder = ['pl', 'uk', 'en'];

$pageTitle = $seo['title'] ?? tr('seo_title', 'NOX Beauty Space — manicure, pedicure, brwi i fryzjer | Warszawa Wola');
$pageDesc = $seo['description'] ?? tr('seo_desc', 'Salon kosmetyczny NOX Beauty Space na Woli, blisko metra Płocka.');
$ogTitle = $seo['og_title'] ?? $pageTitle;
$ogDesc = $seo['og_description'] ?? $pageDesc;
$ogImage = $seo['og_image'] ?? '/assets/img/nox/og-image.jpg';
if (strpos($ogImage, 'http') !== 0) {
    $ogImage = $siteUrl . $ogImage;
}

$booksyUrl = tr('link_booksy', 'https://booksy.com/pl-pl/340508_nox-beauty-space-manicure-pedicure-fryzjer_paznokcie_3_warszawa');
$instagramUrl = tr('link_instagram', 'https://www.instagram.com/nox.beauty.space/');
$directUrl = tr('link_direct', 'https://ig.me/m/nox.beauty.space');

$navItems = [
    'services' => tr('nav_services', 'Usługi'),
    'about'    => tr('nav_about', 'O nas'),
    'prices'   => tr('nav_prices', 'Cennik'),
    'gallery'  => tr('nav_gallery', 'Galeria'),
    'reviews'  => tr('nav_reviews', 'Opinie'),
    'contact'  => tr('nav_contact', 'Kontakt'),
];

$phone = trim($siteConfig['phone'] ?? '');
$phoneHref = $phone !== '' ? 'tel:' . preg_replace('/[^0-9+]/', '', $phone) : '';
$isNotFound = $isNotFound ?? false;
$isPrivacy = ($pageSlug ?? '') === 'polityka-prywatnosci';
$pagePath = in_array($pageSlug ?? 'home', ['home', '404'], true) ? '' : $pageSlug;
$noIndex = $isNotFound || $isPrivacy;
if ($isNotFound) {
    $pageTitle = tr('404_title', 'Nie znaleziono strony') . ' — NOX Beauty Space';
} elseif (!empty($service)) {
    $sk = $service['key'];
    $pageTitle = tr("svcpage_{$sk}_title", $pageTitle);
    $pageDesc = tr("svcpage_{$sk}_desc", $pageDesc);
    $ogTitle = $pageTitle;
    $ogDesc = $pageDesc;
} elseif ($isPrivacy) {
    $pageTitle = tr('privacy_title', 'Polityka prywatności') . ' — NOX Beauty Space';
    $pageDesc = tr('privacy_desc', $pageDesc);
    $ogTitle = $pageTitle;
    $ogDesc = $pageDesc;
}
$canonicalUrl = $siteUrl . $homeUrl . $pagePath;

// Main first-screen photo (the largest element, Google's LCP): preload it, with a lighter phone version if present
$heroRow = DB::fetch("SELECT image_path FROM slider_images WHERE slider_type = 'hero' ORDER BY sort_order ASC LIMIT 1");
$heroPreload = !empty($service) ? $service['image'] : ($heroRow['image_path'] ?? '/assets/img/nox/hero-chrome.webp');
$heroSmall = preg_replace('/\.webp$/', '-600.webp', $heroPreload);
$heroSrcset = is_file(__DIR__ . '/..' . $heroSmall) ? $heroSmall . ' 600w, ' . $heroPreload . ' 1200w' : '';
$ogImageAlt = tr('og_image_alt', 'NOX Beauty Space — salon beauty na Woli w Warszawie');

// ---------- Structured data (schema.org) for Google: business, website, price list, FAQ ----------
$salonId = $siteUrl . '/#salon';
$offerCatalog = [];
foreach (DB::fetchAll("SELECT * FROM service_categories ORDER BY sort_order ASC") as $cat) {
    $catItems = DB::fetchAll("SELECT i.* FROM service_items i JOIN service_subcategories s ON s.id = i.subcategory_id WHERE s.category_id = ? ORDER BY s.sort_order, i.sort_order", [$cat['id']]);
    $offers = [];
    foreach ($catItems as $item) {
        $name = $item['name_' . $currentLang] ?: $item['name_pl'];
        $priceRaw = $item['price_' . $currentLang] ?: $item['price_pl'];
        $offer = ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $name]];
        if (preg_match('/^\s*(\d+(?:[.,]\d+)?)\s*zł\s*$/u', $priceRaw, $m)) {
            $offer['price'] = str_replace(',', '.', $m[1]);
            $offer['priceCurrency'] = 'PLN';
        }
        $offers[] = $offer;
    }
    if ($offers) {
        $offerCatalog[] = ['@type' => 'OfferCatalog', 'name' => $cat['name_' . $currentLang] ?: $cat['name_pl'], 'itemListElement' => $offers];
    }
}

$salon = [
    '@type' => ['BeautySalon', 'NailSalon', 'HairSalon'],
    '@id' => $salonId,
    'name' => 'NOX Beauty Space',
    'url' => $canonicalUrl,
    'image' => [
        $siteUrl . '/assets/img/nox/og-image.jpg',
        $siteUrl . '/assets/img/nox/salon-interior.webp',
        $siteUrl . '/assets/img/nox/hero-chrome.webp',
    ],
    'logo' => $siteUrl . '/assets/img/nox/logo-round.png',
    'description' => $pageDesc,
    'priceRange' => '30–350 PLN',
    'currenciesAccepted' => 'PLN',
    'paymentAccepted' => 'Credit Card',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'ul. Ludwiki 4B/U1',
        'postalCode' => '01-226',
        'addressLocality' => 'Warszawa',
        'addressRegion' => 'Mazowieckie',
        'addressCountry' => 'PL',
    ],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => 52.2312653, 'longitude' => 20.9641617],
    'hasMap' => 'https://www.google.com/maps/search/?api=1&query=NOX+Beauty+Space+Ludwiki+4B+Warszawa',
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Warszawa'],
        ['@type' => 'AdministrativeArea', 'name' => 'Wola'],
    ],
    'knowsLanguage' => ['pl', 'uk', 'en'],
    'openingHoursSpecification' => [[
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        'opens' => '10:00',
        'closes' => '20:00',
    ]],
    'amenityFeature' => [
        ['@type' => 'LocationFeatureSpecification', 'name' => 'Parking', 'value' => true],
        ['@type' => 'LocationFeatureSpecification', 'name' => 'Wi-Fi', 'value' => true],
        ['@type' => 'LocationFeatureSpecification', 'name' => 'Card payments', 'value' => true],
        ['@type' => 'LocationFeatureSpecification', 'name' => 'Pets allowed', 'value' => true],
    ],
    'potentialAction' => [
        '@type' => 'ReserveAction',
        'target' => ['@type' => 'EntryPoint', 'urlTemplate' => $booksyUrl, 'actionPlatform' => ['http://schema.org/DesktopWebPlatform', 'http://schema.org/MobileWebPlatform']],
        'result' => ['@type' => 'Reservation', 'name' => tr('book_btn', 'Umów wizytę')],
    ],
    'sameAs' => [$instagramUrl, $booksyUrl],
];
if ($phone !== '') {
    $salon['telephone'] = $phone;
}
if ($offerCatalog) {
    $salon['hasOfferCatalog'] = ['@type' => 'OfferCatalog', 'name' => tr('prices_eyebrow', 'Cennik'), 'itemListElement' => $offerCatalog];
}

$graph = [
    [
        '@type' => 'WebSite',
        '@id' => $siteUrl . '/#website',
        'url' => $siteUrl . '/',
        'name' => 'NOX Beauty Space',
        'inLanguage' => ['pl', 'uk', 'en'],
        'publisher' => ['@id' => $salonId],
    ],
    [
        '@type' => 'WebPage',
        '@id' => $canonicalUrl . '#webpage',
        'url' => $canonicalUrl,
        'name' => $pageTitle,
        'description' => $pageDesc,
        'inLanguage' => $currentLang,
        'isPartOf' => ['@id' => $siteUrl . '/#website'],
        'about' => ['@id' => $salonId],
        'primaryImageOfPage' => $siteUrl . '/assets/img/nox/og-image.jpg',
    ],
    $salon,
];

// FAQ (same questions as the visible FAQ section on the page)
$faqItems = [];
$faqPrefix = !empty($service) ? "svcpage_{$service['key']}_faq_" : 'faq_';
for ($i = 1; $i <= 8; $i++) {
    $q = tr("{$faqPrefix}{$i}_q");
    $a = tr("{$faqPrefix}{$i}_a");
    if ($q !== '' && $a !== '') {
        $faqItems[] = ['q' => $q, 'a' => $a];
    }
}
if (!empty($service)) {
    // The service itself + breadcrumbs (shown in Google results instead of the bare URL)
    $sk = $service['key'];
    $graph[1]['breadcrumb'] = ['@id' => $canonicalUrl . '#breadcrumb'];
    $graph[] = [
        '@type' => 'BreadcrumbList',
        '@id' => $canonicalUrl . '#breadcrumb',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => tr('svcpage_breadcrumb_home', 'Strona główna'), 'item' => $siteUrl . $homeUrl],
            ['@type' => 'ListItem', 'position' => 2, 'name' => tr("svc_{$sk}_title"), 'item' => $canonicalUrl],
        ],
    ];
    $graph[] = [
        '@type' => 'Service',
        '@id' => $canonicalUrl . '#service',
        'name' => tr("svc_{$sk}_title"),
        'serviceType' => tr("svc_{$sk}_title"),
        'description' => $pageDesc,
        'url' => $canonicalUrl,
        'image' => $siteUrl . $service['image'],
        'provider' => ['@id' => $salonId],
        'areaServed' => ['@type' => 'City', 'name' => 'Warszawa'],
        'availableLanguage' => ['pl', 'uk', 'en'],
    ];
}
if ($faqItems && ($pagePath === '' || !empty($service)) && !$isNotFound) {
    $graph[] = [
        '@type' => 'FAQPage',
        '@id' => $canonicalUrl . '#faq',
        'inLanguage' => $currentLang,
        'mainEntity' => array_map(fn($f) => [
            '@type' => 'Question',
            'name' => $f['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($f['a'])],
        ], $faqItems),
    ];
}
$jsonLd = ['@context' => 'https://schema.org', '@graph' => $graph];
?>
<!doctype html>
<html lang="<?= $currentLang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.classList.add('js');</script>
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
<?php if ($noIndex): ?>
    <meta name="robots" content="noindex, follow">
<?php else: ?>
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<?php endif; ?>
    <meta name="theme-color" content="#0b0a09">
    <meta name="format-detection" content="telephone=no">
    <meta name="geo.region" content="PL-14">
    <meta name="geo.placename" content="Warszawa">
    <meta name="geo.position" content="52.2312653;20.9641617">
    <meta name="ICBM" content="52.2312653, 20.9641617">
<?php if (!empty($siteConfig['google_verification'])): ?>
    <meta name="google-site-verification" content="<?= htmlspecialchars($siteConfig['google_verification']) ?>">
<?php endif; ?>
<?php if (!empty($siteConfig['bing_verification'])): ?>
    <meta name="msvalidate.01" content="<?= htmlspecialchars($siteConfig['bing_verification']) ?>">
<?php endif; ?>

    <link rel="icon" href="/favicon.ico" sizes="48x48">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/nox/favicon-96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/nox/favicon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/nox/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

<?php if (!$isNotFound): ?>
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
<?php foreach ($langOrder as $code): if (!in_array($code, $langCodes)) continue; ?>
    <link rel="alternate" hreflang="<?= $code ?>" href="<?= htmlspecialchars($siteUrl . lang_url($code) . $pagePath) ?>">
<?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($siteUrl . '/' . $pagePath) ?>">
<?php endif; ?>

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="NOX Beauty Space">
    <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($ogDesc) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?= htmlspecialchars($ogImageAlt) ?>">
    <meta property="og:locale" content="<?= $localeMap[$currentLang] ?? 'pl_PL' ?>">
<?php foreach ($langOrder as $code): if ($code === $currentLang || !in_array($code, $langCodes)) continue; ?>
    <meta property="og:locale:alternate" content="<?= $localeMap[$code] ?>">
<?php endforeach; ?>
    <meta property="business:contact_data:street_address" content="ul. Ludwiki 4B/U1">
    <meta property="business:contact_data:locality" content="Warszawa">
    <meta property="business:contact_data:postal_code" content="01-226">
    <meta property="business:contact_data:country_name" content="Poland">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($ogDesc) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($ogImage) ?>">
    <meta name="twitter:image:alt" content="<?= htmlspecialchars($ogImageAlt) ?>">

<?php if (!$isNotFound): ?>
    <script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?></script>
<?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@300;400;500;600&display=swap">
<?php if (($pagePath === '' || !empty($service)) && !$isNotFound): ?>
    <link rel="preload" as="image" href="<?= htmlspecialchars($heroPreload) ?>"<?php if ($heroSrcset): ?> imagesrcset="<?= htmlspecialchars($heroSrcset) ?>" imagesizes="(max-width: 1024px) 92vw, 46vw"<?php endif; ?> fetchpriority="high">
<?php endif; ?>
    <link rel="stylesheet" href="/assets/css/nox.css?v=<?= filemtime(__DIR__ . '/../assets/css/nox.css') ?>">
<?php require __DIR__ . '/analytics.php'; ?>
</head>
<body data-lang="<?= $currentLang ?>">
<a class="skip-link" href="#main"><?= tre('skip_link', 'Przejdź do treści') ?></a>

<header class="site-header" data-header>
    <div class="container header-inner">
        <a class="brand" href="<?= $homeUrl ?>" aria-label="NOX Beauty Space">
            <img src="/assets/img/nox/logo-96.webp" alt="NOX Beauty Space" width="48" height="48" class="brand-badge">
            <span class="brand-text">
                <span class="brand-name">NOX</span>
                <span class="brand-sub">beauty space</span>
            </span>
        </a>

        <nav class="main-nav" aria-label="<?= tre('nav_label', 'Menu główne') ?>">
            <ul>
<?php foreach ($navItems as $anchor => $label): ?>
                <li><a href="<?= $homeUrl ?>#<?= $anchor ?>"><?= htmlspecialchars($label) ?></a></li>
<?php endforeach; ?>
            </ul>
        </nav>

        <div class="header-actions">
            <div class="lang-switch" data-dropdown>
                <button type="button" class="lang-current" aria-haspopup="true" aria-expanded="false" data-dropdown-toggle>
                    <?= strtoupper($currentLang) ?>
                    <svg width="10" height="6" viewBox="0 0 10 6" aria-hidden="true"><path d="M1 1l4 4 4-4" fill="none" stroke="currentColor" stroke-width="1.4"/></svg>
                </button>
                <ul class="lang-menu" role="menu">
<?php foreach ($langOrder as $code): if (!in_array($code, $langCodes)) continue; ?>
                    <li role="none"><a role="menuitem" hreflang="<?= $code ?>" href="<?= lang_url($code) . $pagePath ?>"<?= $code === $currentLang ? ' aria-current="true"' : '' ?>><?= $langLabels[$code] ?></a></li>
<?php endforeach; ?>
                </ul>
            </div>
            <a class="btn btn-gold btn-sm header-cta" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><?= tre('book_btn', 'Umów wizytę') ?></a>
            <button type="button" class="burger" aria-label="<?= tre('menu_open', 'Otwórz menu') ?>" aria-expanded="false" data-burger>
                <span></span><span></span>
            </button>
        </div>
    </div>

    <div class="mobile-menu" data-mobile-menu hidden>
        <ul>
<?php foreach ($navItems as $anchor => $label): ?>
            <li><a href="<?= $homeUrl ?>#<?= $anchor ?>" data-close-menu><?= htmlspecialchars($label) ?></a></li>
<?php endforeach; ?>
        </ul>
        <div class="mobile-langs">
<?php foreach ($langOrder as $code): if (!in_array($code, $langCodes)) continue; ?>
            <a href="<?= lang_url($code) . $pagePath ?>" hreflang="<?= $code ?>"<?= $code === $currentLang ? ' aria-current="true"' : '' ?>><?= strtoupper($code) ?></a>
<?php endforeach; ?>
        </div>
        <a class="btn btn-gold" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><?= tre('book_btn', 'Umów wizytę') ?></a>
    </div>
</header>
