<?php
// pages/service.php — service landing page (manicure, pedicure, brows, hair, barber...).
// Settings: components/services.php. Texts: CMS keys svcpage_<key>_*. Prices: the price list in the admin.
$sk = $service['key'];

// Price groups for this service
[$priceCat, $subPositions] = $service['prices'];
$cat = DB::fetch("SELECT * FROM service_categories WHERE slug = ?", [$priceCat]);
$priceGroups = [];
if ($cat) {
    $subs = DB::fetchAll("SELECT * FROM service_subcategories WHERE category_id = ? ORDER BY sort_order ASC", [$cat['id']]);
    foreach ($subs as $pos => $sub) {
        if ($subPositions !== null && !in_array($pos, $subPositions, true)) {
            continue;
        }
        $priceGroups[] = [
            'name' => field($sub, 'name'),
            'items' => DB::fetchAll("SELECT * FROM service_items WHERE subcategory_id = ? ORDER BY sort_order ASC", [$sub['id']]),
        ];
    }
}

$benefitIcons = [
    '<svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 3l10 4v8c0 7-4.5 11.5-10 14C10.5 26.5 6 22 6 15V7l10-4z"/><path d="M11.5 16l3 3 6-6.5"/></svg>',
    '<svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4l3.6 7.6 8.4 1-6.2 5.8 1.6 8.3L16 22.6l-7.4 4.1 1.6-8.3L4 12.6l8.4-1z"/></svg>',
    '<svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="16" r="12"/><path d="M16 9v7l5 3"/></svg>',
    '<svg viewBox="0 0 32 32" aria-hidden="true"><rect x="5" y="12" width="22" height="15" rx="1"/><path d="M3.5 8h25v4h-25zM16 8v19M16 8c-2-4-7-5-7-1.5S14 8 16 8zm0 0c2-4 7-5 7-1.5S18 8 16 8z"/></svg>',
];

$otherCards = [
    'manicure'   => '/assets/img/nox/work-cherry.webp',
    'extensions' => '/assets/img/nox/work-french-almond.webp',
    'pedicure'   => '/assets/img/nox/work-pedicure-red.webp',
    'brows'      => '/assets/img/nox/work-lash-lift.webp',
    'hair'       => '/assets/img/nox/work-hair-brunette.webp',
    'barber'     => '/assets/img/nox/work-barber-fade.webp',
];
unset($otherCards[$sk]);

// Real image size (width/height attributes stop the layout from jumping while photos load)
$imgSize = function ($path) {
    $info = @getimagesize(__DIR__ . '/..' . $path);
    return $info ? 'width="' . $info[0] . '" height="' . $info[1] . '"' : 'width="900" height="1200"';
};
?>
<main id="main">

    <!-- HERO -->
    <section class="hero service-hero" id="top">
        <div class="hero-bg" aria-hidden="true"></div>
        <div class="container hero-grid">
            <div class="hero-copy">
                <nav class="breadcrumbs reveal" aria-label="Breadcrumb">
                    <ol>
                        <li><a href="<?= $homeUrl ?>"><?= tre('svcpage_breadcrumb_home', 'Strona główna') ?></a></li>
                        <li><a href="<?= $homeUrl ?>#services"><?= tre('svcpage_breadcrumb_services', 'Usługi') ?></a></li>
                        <li aria-current="page"><?= tre("svc_{$sk}_title") ?></li>
                    </ol>
                </nav>
                <h1 class="hero-heading">
                    <span class="eyebrow reveal"><?= tre("svcpage_{$sk}_eyebrow") ?></span>
                    <span class="hero-title reveal"><?= tr("svcpage_{$sk}_h1") ?></span>
                </h1>
                <p class="hero-desc reveal"><?= tre("svcpage_{$sk}_lead") ?></p>
                <div class="hero-actions reveal">
                    <a class="btn btn-ghost" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">
                        <svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="5" width="17" height="15.5" rx="3"/><path d="M3.5 10h17M8 3v4M16 3v4"/></svg>
                        <?= tre('hero_button', 'Zarezerwuj w Booksy') ?>
                    </a>
                    <a class="btn btn-ghost" href="<?= htmlspecialchars($instagramUrl) ?>" data-ig-direct="<?= htmlspecialchars($directUrl) ?>" target="_blank" rel="noopener">
                        <svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r="1" fill="currentColor" stroke="none"/></svg>
                        <?= tre('hero_button_ig', 'Napisz w Direct') ?>
                    </a>
                </div>
                <div class="hero-proof reveal">
                    <a class="rating" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">
                        <span class="stars" aria-hidden="true">★★★★★</span>
                        <strong>5.0</strong>
                        <span><?= tre('hero_rating_label', '143 opinie w Booksy') ?></span>
                    </a>
                    <span class="service-from"><?= tre("svc_{$sk}_price") ?></span>
                </div>
            </div>

            <div class="hero-visual reveal">
                <div class="arch">
                    <img src="<?= htmlspecialchars($service['image']) ?>" alt="<?= tre('alt_' . pathinfo($service['image'], PATHINFO_FILENAME), tr("svc_{$sk}_title")) ?>" <?= $imgSize($service['image']) ?> fetchpriority="high" decoding="async">
                </div>
                <div class="hero-ring" aria-hidden="true"></div>
                <a class="promo-seal" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener" aria-label="<?= tre('hero_promo', '−10% na pierwszą wizytę') ?>">
                    <svg class="seal-ring" viewBox="0 0 200 200" aria-hidden="true">
                        <defs><path id="sealPath" d="M100,100 m-78,0 a78,78 0 1,1 156,0 a78,78 0 1,1 -156,0"/></defs>
                        <text><textPath href="#sealPath" textLength="480"><?= tre('promo_ring', 'pierwsza wizyta • NOX beauty space •') ?></textPath></text>
                    </svg>
                    <span class="seal-core"><strong><?= tre('promo_value', '−10%') ?></strong></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ABOUT THE SERVICE -->
    <section class="section section-marble">
        <div class="container service-about">
            <div class="service-about-copy">
                <p class="eyebrow reveal"><?= tre('svcpage_why_eyebrow', 'Dlaczego NOX') ?></p>
                <h2 class="section-title reveal"><?= tr("svcpage_{$sk}_about_title") ?></h2>
                <p class="reveal"><?= tre("svcpage_{$sk}_about_1") ?></p>
                <p class="reveal"><?= tre("svcpage_{$sk}_about_2") ?></p>
            </div>
            <ul class="benefits">
<?php for ($b = 1; $b <= 4; $b++): ?>
                <li class="benefit reveal">
                    <span class="perk-icon"><?= $benefitIcons[$b - 1] ?></span>
                    <span>
                        <strong><?= tre("svcpage_{$sk}_b{$b}_t") ?></strong>
                        <small><?= tre("svcpage_{$sk}_b{$b}_x") ?></small>
                    </span>
                </li>
<?php endfor; ?>
            </ul>
        </div>
    </section>

<?php if (tr("svcpage_{$sk}_s1_t") !== ''): ?>
    <!-- VISIT STEPS -->
    <section class="section steps-section">
        <div class="container">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('svcpage_steps_eyebrow', 'Krok po kroku') ?></p>
                <h2 class="section-title"><?= tr('svcpage_steps_title', 'Jak wygląda <em>wizyta</em>') ?></h2>
            </header>
            <ol class="steps">
<?php for ($n = 1; $n <= 4; $n++): if (tr("svcpage_{$sk}_s{$n}_t") === '') continue; ?>
                <li class="step reveal">
                    <span class="step-num" aria-hidden="true">0<?= $n ?></span>
                    <h3><?= tre("svcpage_{$sk}_s{$n}_t") ?></h3>
                    <p><?= tre("svcpage_{$sk}_s{$n}_x") ?></p>
                </li>
<?php endfor; ?>
            </ol>
        </div>
    </section>
<?php endif; ?>

<?php if ($priceGroups): ?>
    <!-- PRICES -->
    <section class="section section-light" id="prices">
        <div class="container">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('svcpage_prices_eyebrow', 'Cennik') ?></p>
                <h2 class="section-title"><?= tr('svcpage_prices_title', 'Aktualne <em>ceny</em>') ?></h2>
            </header>
            <div class="price-groups reveal">
<?php foreach ($priceGroups as $group): ?>
                <div class="price-group">
                    <h3><?= htmlspecialchars($group['name']) ?></h3>
                    <ul class="price-list">
<?php foreach ($group['items'] as $item): ?>
                        <li>
                            <span class="price-name"><?= htmlspecialchars(field($item, 'name')) ?></span>
                            <span class="price-dots" aria-hidden="true"></span>
                            <span class="price-value"><?= htmlspecialchars(field($item, 'price')) ?></span>
                        </li>
<?php endforeach; ?>
                    </ul>
                </div>
<?php endforeach; ?>
            </div>
            <div class="prices-footer reveal">
                <p><?= tre('prices_note') ?><br><small class="prices-legal-note"><?= tre('prices_legal_note') ?></small></p>
                <a class="btn btn-dark" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><?= tre('btn_book', 'Wybierz termin w Booksy') ?></a>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($service['gallery'])): ?>
    <!-- GALLERY -->
    <section class="section" id="gallery">
        <div class="container">
            <header class="section-head section-head-split reveal">
                <div>
                    <p class="eyebrow"><?= tre('svcpage_gallery_eyebrow', 'Portfolio') ?></p>
                    <h2 class="section-title"><?= tr('svcpage_gallery_title', 'Nasze <em>prace</em>') ?></h2>
                </div>
                <div>
                    <a class="link-gold" href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank" rel="noopener">@nox.beauty.space →</a>
                </div>
            </header>
            <div class="gallery gallery-<?= min(count($service['gallery']), 4) ?>" data-gallery>
<?php foreach ($service['gallery'] as $name): $path = "/assets/img/nox/{$name}.webp"; ?>
                <a class="gallery-item reveal" href="<?= $path ?>" data-lightbox>
                    <img src="<?= $path ?>" alt="<?= tre('alt_' . $name, 'NOX Beauty Space') ?>" loading="lazy" decoding="async" <?= $imgSize($path) ?>>
                </a>
<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($faqItems)): ?>
    <!-- FAQ -->
    <section class="section section-light" id="faq">
        <div class="container faq-grid">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('faq_eyebrow', 'FAQ') ?></p>
                <h2 class="section-title"><?= tr('svcpage_faq_title', 'Pytania i <em>odpowiedzi</em>') ?></h2>
            </header>
            <div class="faq-list">
<?php foreach ($faqItems as $i => $faq): ?>
                <details class="faq-item reveal"<?= $i === 0 ? ' open' : '' ?>>
                    <summary><h3><?= htmlspecialchars($faq['q']) ?></h3><span class="faq-icon" aria-hidden="true"></span></summary>
                    <p><?= htmlspecialchars($faq['a']) ?></p>
                </details>
<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

    <!-- OTHER SERVICES -->
    <section class="section">
        <div class="container">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('svcpage_other_eyebrow', 'Zobacz też') ?></p>
                <h2 class="section-title"><?= tr('svcpage_other_title', 'Inne <em>usługi</em>') ?></h2>
            </header>
            <div class="service-grid service-grid-compact">
<?php foreach ($otherCards as $k => $img): ?>
                <a class="service-card reveal" href="<?= htmlspecialchars(service_url($k)) ?>">
                    <figure>
                        <img src="<?= $img ?>" alt="<?= tre("svc_{$k}_title") ?> — <?= tre('alt_service_suffix', 'salon NOX Beauty Space, Warszawa Wola') ?>" width="600" height="760" loading="lazy" decoding="async">
                    </figure>
                    <div class="service-body">
                        <h3><?= tre("svc_{$k}_title") ?></h3>
                        <span class="service-price"><?= tre("svc_{$k}_price") ?> <span aria-hidden="true">→</span></span>
                    </div>
                </a>
<?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- VISIT -->
    <section class="section section-marble visit-strip">
        <div class="container visit-grid reveal">
            <div>
                <p class="eyebrow"><?= tre('contact_eyebrow', 'Kontakt') ?></p>
                <h2 class="section-title"><?= tr('contact_title', 'Zapraszamy do <em>NOX</em>') ?></h2>
            </div>
            <dl class="contact-list">
                <div>
                    <dt><?= tre('contact_address_label', 'Adres') ?></dt>
                    <dd>
                        <address>ul. Ludwiki 4B/U1, 01-226 Warszawa</address>
                        <small><?= tre('contact_metro', 'Wola, blisko stacji metra Płocka (M2)') ?></small><br>
                        <a href="https://www.google.com/maps/dir/?api=1&amp;destination=NOX+Beauty+Space+Ludwiki+4B+01-226+Warszawa" target="_blank" rel="noopener"><?= tre('map_link', 'Wyznacz trasę w Google Maps') ?></a>
                    </dd>
                </div>
                <div>
                    <dt><?= tre('contact_hours_label', 'Godziny otwarcia') ?></dt>
                    <dd><?= tre('contact_hours_value', 'Codziennie 10:00–20:00') ?></dd>
                </div>
<?php if ($phone !== ''): ?>
                <div>
                    <dt><?= tre('contact_phone_label', 'Telefon') ?></dt>
                    <dd><a href="<?= htmlspecialchars($phoneHref) ?>"><?= htmlspecialchars($phone) ?></a></dd>
                </div>
<?php endif; ?>
                <div>
                    <dt><?= tre('contact_booking_label', 'Rezerwacja') ?></dt>
                    <dd>
                        <a href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">Booksy</a> ·
                        <a href="<?= htmlspecialchars($instagramUrl) ?>" data-ig-direct="<?= htmlspecialchars($directUrl) ?>" target="_blank" rel="noopener">Instagram Direct</a>
                    </dd>
                </div>
            </dl>
        </div>
    </section>
</main>
