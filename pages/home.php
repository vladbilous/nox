<?php
// pages/home.php — landing page of NOX Beauty Space.
$heroImages = DB::fetchAll("SELECT image_path FROM slider_images WHERE slider_type = 'hero' ORDER BY sort_order ASC");
$heroMain = $heroImages[0]['image_path'] ?? '/assets/img/nox/hero-chrome.webp';
$heroSecond = $heroImages[1]['image_path'] ?? '/assets/img/nox/salon-interior.webp';

$galleryImages = DB::fetchAll("SELECT image_path FROM slider_images WHERE slider_type = 'gallery' ORDER BY sort_order ASC");

$categories = DB::fetchAll("SELECT * FROM service_categories ORDER BY sort_order ASC");
$subcategories = DB::fetchAll("SELECT * FROM service_subcategories ORDER BY sort_order ASC");
$items = DB::fetchAll("SELECT * FROM service_items ORDER BY sort_order ASC");

$subsByCategory = [];
foreach ($subcategories as $sub) {
    $subsByCategory[$sub['category_id']][] = $sub;
}
$itemsBySub = [];
foreach ($items as $item) {
    $itemsBySub[$item['subcategory_id']][] = $item;
}


$serviceCards = [
    ['key' => 'manicure',   'img' => '/assets/img/nox/work-cherry.webp'],
    ['key' => 'extensions', 'img' => '/assets/img/nox/work-french-almond.webp'],
    ['key' => 'pedicure',   'img' => '/assets/img/nox/work-pedicure-red.webp'],
    ['key' => 'brows',      'img' => '/assets/img/nox/work-lash-lift.webp'],
    ['key' => 'hair',       'img' => '/assets/img/nox/work-hair-brunette.webp'],
    ['key' => 'barber',     'img' => '/assets/img/nox/work-barber-fade.webp'],
];

$team = [
    ['name' => 'Nataliia', 'role' => tr('team_role_nataliia', 'Manicure i pedicure')],
    ['name' => 'Taya',     'role' => tr('team_role_taya', 'Manicure i stylizacja paznokci')],
    ['name' => 'Alina',    'role' => tr('team_role_alina', 'Stylistka brwi i rzęs')],
    ['name' => 'Vadzim',   'role' => tr('team_role_vadzim', 'Fryzjer i barber')],
];

$reviews = [1, 2, 3, 4];

$icons = [
    'sterile' => '<svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 3l10 4v8c0 7-4.5 11.5-10 14C10.5 26.5 6 22 6 15V7l10-4z"/><path d="M11.5 16l3 3 6-6.5"/></svg>',
    'star'    => '<svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4l3.6 7.6 8.4 1-6.2 5.8 1.6 8.3L16 22.6l-7.4 4.1 1.6-8.3L4 12.6l8.4-1z"/></svg>',
    'metro'   => '<svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="16" r="12"/><path d="M9.5 21.5l3.2-11 3.3 7 3.3-7 3.2 11"/></svg>',
    'gift'    => '<svg viewBox="0 0 32 32" aria-hidden="true"><rect x="5" y="12" width="22" height="15" rx="1"/><path d="M3.5 8h25v4h-25zM16 8v19M16 8c-2-4-7-5-7-1.5S14 8 16 8zm0 0c2-4 7-5 7-1.5S18 8 16 8z"/></svg>',
];
?>
<main id="main">

    <!-- HERO -->
    <section class="hero" id="top">
        <div class="hero-bg" aria-hidden="true"></div>
        <div class="container hero-grid">
            <div class="hero-copy">
                <h1 class="hero-heading">
                    <span class="eyebrow reveal"><?= tre('hero_eyebrow', 'Salon beauty · Warszawa Wola') ?></span>
                    <span class="hero-title reveal"><?= tr('hero_title', 'Piękno <em>dopracowane</em> w każdym detalu') ?></span>
                </h1>
                <p class="hero-desc reveal"><?= tre('hero_desc', 'Manicure, pedicure, brwi, rzęsy i fryzjer w jednym miejscu.') ?></p>
                <a class="promo-card reveal" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">
                    <span class="promo-value"><?= tre('promo_value', '−10%') ?></span>
                    <span class="promo-text">
                        <strong><?= tre('promo_title', 'na pierwszą wizytę') ?></strong>
                        <small><?= tre('promo_sub', 'przy rezerwacji przez Booksy lub Direct') ?></small>
                    </span>
                    <span class="promo-arrow" aria-hidden="true">→</span>
                </a>
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
                </div>
            </div>

            <div class="hero-visual reveal">
                <div class="arch">
                    <img src="<?= htmlspecialchars($heroMain) ?>"<?php if ($heroSrcset && $heroMain === $heroPreload): ?> srcset="<?= htmlspecialchars($heroSrcset) ?>" sizes="(max-width: 1024px) 92vw, 46vw"<?php endif; ?> alt="<?= tre('hero_img_alt', 'Manicure hybrydowy w odcieniu wiśni — NOX Beauty Space') ?>" width="900" height="1200" fetchpriority="high" decoding="async">
                </div>
                <div class="hero-float">
                    <img src="<?= htmlspecialchars($heroSecond) ?>" alt="<?= tre('hero_img2_alt', 'Wnętrze salonu NOX Beauty Space') ?>" width="400" height="400" loading="lazy" decoding="async">
                </div>
                <div class="hero-ring" aria-hidden="true"></div>
                <a class="promo-seal" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener" aria-label="<?= tre('hero_promo', '−10% na pierwszą wizytę') ?>">
                    <svg class="seal-ring" viewBox="0 0 200 200" aria-hidden="true">
                        <defs><path id="sealPath" d="M100,100 m-78,0 a78,78 0 1,1 156,0 a78,78 0 1,1 -156,0"/></defs>
                        <text><textPath href="#sealPath" textLength="480"><?= tre('promo_ring', 'pierwsza wizyta • NOX beauty space •') ?></textPath></text>
                    </svg>
                    <span class="seal-core">
                        <strong><?= tre('promo_value', '−10%') ?></strong>
                    </span>
                </a>
            </div>
        </div>

        <ul class="container perks">
<?php foreach (['sterile', 'star', 'metro', 'gift'] as $i => $icon): $n = $i + 1; ?>
            <li class="perk reveal">
                <span class="perk-icon"><?= $icons[$icon] ?></span>
                <span>
                    <strong><?= tre("perk_{$n}_title") ?></strong>
                    <small><?= tre("perk_{$n}_text") ?></small>
                </span>
            </li>
<?php endforeach; ?>
        </ul>
    </section>

    <!-- SERVICES -->
    <section class="section" id="services">
        <div class="container">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('services_eyebrow', 'Usługi') ?></p>
                <h2 class="section-title"><?= tr('services_title', 'Wszystko dla Twojego <em>piękna</em>') ?></h2>
                <p class="section-lead"><?= tre('services_desc') ?></p>
            </header>
            <div class="service-grid">
<?php foreach ($serviceCards as $card): $k = $card['key']; ?>
                <a class="service-card reveal" href="<?= htmlspecialchars(service_url($k)) ?>">
                    <figure>
                        <img src="<?= $card['img'] ?>" alt="<?= tre("svc_{$k}_title") ?> — <?= tre('alt_service_suffix', 'salon NOX Beauty Space, Warszawa Wola') ?>" width="600" height="760" loading="lazy" decoding="async">
                    </figure>
                    <div class="service-body">
                        <h3><?= tre("svc_{$k}_title") ?></h3>
                        <p><?= tre("svc_{$k}_text") ?></p>
                        <span class="service-price"><?= tre("svc_{$k}_price") ?> <span aria-hidden="true">→</span></span>
                    </div>
                </a>
<?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="section section-marble" id="about">
        <div class="container about-grid">
            <div class="about-visual reveal">
                <div class="arch arch-tall">
                    <img src="/assets/img/nox/salon-interior.webp" alt="<?= tre('about_img_alt', 'Recepcja salonu NOX Beauty Space z podświetlanym logo') ?>" width="1000" height="1000" loading="lazy" decoding="async">
                </div>
                <div class="about-badge">
                    <strong>5.0</strong>
                    <span><?= tre('about_badge', 'średnia ocena klientów') ?></span>
                </div>
            </div>
            <div class="about-copy">
                <p class="eyebrow reveal"><?= tre('about_eyebrow', 'O nas') ?></p>
                <h2 class="section-title reveal"><?= tr('about_title', 'Miejsce, w którym <em>czas zwalnia</em>') ?></h2>
                <p class="reveal"><?= tre('about_text_1') ?></p>
                <p class="reveal"><?= tre('about_text_2') ?></p>

                <h3 class="team-title reveal"><?= tre('team_title', 'Nasz zespół') ?></h3>
                <ul class="team">
<?php foreach ($team as $member): ?>
                    <li class="team-member reveal">
                        <span class="monogram" aria-hidden="true"><?= mb_substr($member['name'], 0, 1) ?></span>
                        <span>
                            <strong><?= htmlspecialchars($member['name']) ?></strong>
                            <small><?= htmlspecialchars($member['role']) ?></small>
                        </span>
                    </li>
<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- PRICES -->
    <section class="section section-light" id="prices">
        <div class="container">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('prices_eyebrow', 'Cennik') ?></p>
                <h2 class="section-title"><?= tr('prices_title', 'Przejrzyste <em>ceny</em>') ?></h2>
                <p class="section-lead"><?= tre('prices_desc') ?></p>
            </header>

            <div class="tabs reveal" role="tablist" aria-label="<?= tre('prices_eyebrow', 'Cennik') ?>">
<?php foreach ($categories as $i => $cat): ?>
                <button type="button" role="tab" id="tab-btn-<?= htmlspecialchars($cat['slug']) ?>" aria-controls="tab-<?= htmlspecialchars($cat['slug']) ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" data-tab="<?= htmlspecialchars($cat['slug']) ?>"><?= htmlspecialchars(field($cat, 'name')) ?></button>
<?php endforeach; ?>
            </div>

<?php foreach ($categories as $i => $cat): ?>
            <div class="tab-panel" role="tabpanel" id="tab-<?= htmlspecialchars($cat['slug']) ?>" aria-labelledby="tab-btn-<?= htmlspecialchars($cat['slug']) ?>"<?= $i === 0 ? '' : ' hidden' ?>>
                <div class="price-groups">
<?php foreach ($subsByCategory[$cat['id']] ?? [] as $sub): ?>
                    <div class="price-group">
                        <h3><?= htmlspecialchars(field($sub, 'name')) ?></h3>
                        <ul class="price-list">
<?php foreach ($itemsBySub[$sub['id']] ?? [] as $item): ?>
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
            </div>
<?php endforeach; ?>

            <div class="prices-footer reveal">
                <p><?= tre('prices_note') ?></p>
                <a class="btn btn-dark" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><?= tre('btn_book', 'Wybierz termin w Booksy') ?></a>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="section" id="gallery">
        <div class="container">
            <header class="section-head section-head-split reveal">
                <div>
                    <p class="eyebrow"><?= tre('gallery_eyebrow', 'Portfolio') ?></p>
                    <h2 class="section-title"><?= tr('gallery_title', 'Nasze <em>prace</em>') ?></h2>
                </div>
                <div>
                    <p class="section-lead"><?= tre('gallery_text') ?></p>
                    <a class="link-gold" href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank" rel="noopener">@nox.beauty.space →</a>
                </div>
            </header>
            <div class="gallery" data-gallery>
<?php foreach ($galleryImages as $i => $img):
    $imgAlt = tr('alt_' . pathinfo($img['image_path'], PATHINFO_FILENAME));
    if ($imgAlt === '') {
        $imgAlt = tr('gallery_alt', 'Praca NOX Beauty Space') . ' ' . ($i + 1);
    }
?>
                <a class="gallery-item reveal" href="<?= htmlspecialchars($img['image_path']) ?>" data-lightbox>
                    <img src="<?= htmlspecialchars($img['image_path']) ?>" alt="<?= htmlspecialchars($imgAlt) ?>" loading="lazy" decoding="async" width="600" height="800">
                </a>
<?php endforeach; ?>
            </div>
            <div class="center reveal">
                <a class="btn btn-ghost" href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank" rel="noopener"><?= tre('gallery_more', 'Więcej na Instagramie') ?></a>
            </div>
        </div>
    </section>

    <!-- REVIEWS -->
    <section class="section section-marble" id="reviews">
        <div class="container">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('reviews_eyebrow', 'Opinie') ?></p>
                <h2 class="section-title"><?= tr('reviews_title', 'Co mówią nasze <em>klientki</em>') ?></h2>
            </header>
            <div class="reviews-layout">
                <div class="score reveal">
                    <strong>5.0</strong>
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <p><?= tre('reviews_text', '143 opinie zweryfikowanych klientów w Booksy') ?></p>
                    <a class="link-gold" href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener"><?= tre('reviews_link', 'Zobacz wszystkie opinie') ?> →</a>
                </div>
                <div class="review-grid">
<?php foreach ($reviews as $n): ?>
                    <figure class="review reveal">
                        <span class="stars" aria-hidden="true">★★★★★</span>
                        <blockquote><?= tre("review_{$n}_text") ?></blockquote>
                        <figcaption>
                            <strong><?= tre("review_{$n}_author") ?></strong>
                            <span><?= tre("review_{$n}_service") ?></span>
                        </figcaption>
                    </figure>
<?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php if (!empty($faqItems)): ?>
    <!-- FAQ -->
    <section class="section section-light" id="faq">
        <div class="container faq-grid">
            <header class="section-head reveal">
                <p class="eyebrow"><?= tre('faq_eyebrow', 'FAQ') ?></p>
                <h2 class="section-title"><?= tr('faq_title', 'Najczęstsze <em>pytania</em>') ?></h2>
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

    <!-- CONTACT -->
    <section class="section" id="contact">
        <div class="container contact-grid">
            <div class="contact-info">
                <p class="eyebrow reveal"><?= tre('contact_eyebrow', 'Kontakt') ?></p>
                <h2 class="section-title reveal"><?= tr('contact_title', 'Zapraszamy do <em>NOX</em>') ?></h2>
                <p class="reveal"><?= tre('contact_desc') ?></p>

                <dl class="contact-list reveal">
                    <div>
                        <dt><?= tre('contact_address_label', 'Adres') ?></dt>
                        <dd>
                            <address>ul. Ludwiki 4B/U1, 01-226 Warszawa</address>
                            <small><?= tre('contact_metro', 'Wola, blisko stacji metra Płocka (M2)') ?></small><br>
                            <a href="https://www.google.com/maps/dir/?api=1&amp;destination=NOX+Beauty+Space+Ludwiki+4B+01-226+Warszawa" target="_blank" rel="noopener" data-track="directions"><?= tre('map_link', 'Wyznacz trasę w Google Maps') ?></a>
                        </dd>
                    </div>
<?php if ($phone !== ''): ?>
                    <div>
                        <dt><?= tre('contact_phone_label', 'Telefon') ?></dt>
                        <dd><a href="<?= htmlspecialchars($phoneHref) ?>" data-track="phone"><?= htmlspecialchars($phone) ?></a></dd>
                    </div>
<?php endif; ?>
                    <div>
                        <dt><?= tre('contact_hours_label', 'Godziny otwarcia') ?></dt>
                        <dd><?= tre('contact_hours_value', 'Codziennie 10:00–20:00') ?></dd>
                    </div>
                    <div>
                        <dt><?= tre('contact_booking_label', 'Rezerwacja') ?></dt>
                        <dd>
                            <a href="<?= htmlspecialchars($booksyUrl) ?>" target="_blank" rel="noopener">Booksy</a> ·
                            <a href="<?= htmlspecialchars($instagramUrl) ?>" data-ig-direct="<?= htmlspecialchars($directUrl) ?>" target="_blank" rel="noopener">Instagram Direct</a>
                        </dd>
                    </div>
                    <div>
                        <dt><?= tre('contact_amenities_label', 'Udogodnienia') ?></dt>
                        <dd><?= tre('contact_amenities_value', 'Parking · płatność kartą · Wi-Fi · program lojalnościowy') ?></dd>
                    </div>
                </dl>
            </div>

            <form class="contact-form reveal" data-contact-form novalidate>
                <h3><?= tre('form_title', 'Masz pytanie? Napisz do nas') ?></h3>
                <input type="hidden" name="lang" value="<?= $currentLang ?>">
                <div class="hp" aria-hidden="true">
                    <label>Website <input type="text" name="website_url_hp" tabindex="-1" autocomplete="off"></label>
                </div>
                <label class="field">
                    <span><?= tre('form_name', 'Imię') ?></span>
                    <input type="text" name="userName" required autocomplete="name" maxlength="100">
                </label>
                <div class="field-row">
                    <label class="field">
                        <span><?= tre('form_phone', 'Telefon') ?></span>
                        <input type="tel" name="userPhone" required autocomplete="tel" maxlength="30">
                    </label>
                    <label class="field">
                        <span><?= tre('form_email', 'E-mail') ?></span>
                        <input type="email" name="userEmail" required autocomplete="email" maxlength="100">
                    </label>
                </div>
                <label class="field">
                    <span><?= tre('form_message', 'Wiadomość') ?></span>
                    <textarea name="userMessage" rows="4" maxlength="2000"></textarea>
                </label>
                <label class="consent">
                    <input type="checkbox" name="rodo_consent" value="1" required>
                    <span><?= tre('rodo_consent', 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celu kontaktu.') ?> <a href="<?= $homeUrl ?>polityka-prywatnosci" target="_blank"><?= tre('privacy_link', 'Polityka prywatności') ?></a></span>
                </label>
                <button type="submit" class="btn btn-gold btn-block" data-label-sending="<?= tre('form_sending', 'Wysyłanie…') ?>"><?= tre('form_submit', 'Wyślij') ?></button>
                <p class="form-status" role="status" aria-live="polite" data-form-status></p>
            </form>
        </div>

        <div class="container map-wrap reveal">
            <iframe title="<?= tre('map_title', 'Mapa dojazdu do NOX Beauty Space') ?>" src="https://www.google.com/maps?q=Ludwiki+4B,+01-226+Warszawa&hl=<?= $currentLang ?>&z=16&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>
