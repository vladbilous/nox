<?php
// database/seed_nox.php — fills the CMS with NOX Beauty Space content (texts in 3 languages,
// price list from Booksy, gallery). Safe to re-run: it overwrites the managed rows.
// Usage: DB_HOST=127.0.0.1 DB_USER=nox DB_PASS=nox php database/seed_nox.php

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('CLI only');
}

require __DIR__ . '/../DB.php';

// key => [pl, uk, en] (+ optional 'html' type flag as 4th element)
$texts = [
    // Links (same in every language)
    'link_booksy'    => array_fill(0, 3, 'https://booksy.com/pl-pl/340508_nox-beauty-space-manicure-pedicure-fryzjer_paznokcie_3_warszawa'),
    'link_instagram' => array_fill(0, 3, 'https://www.instagram.com/nox.beauty.space/'),
    'link_direct'    => array_fill(0, 3, 'https://ig.me/m/nox.beauty.space'),

    // SEO fallbacks
    'seo_title' => [
        'NOX Beauty Space — manicure, pedicure, brwi i fryzjer | Warszawa Wola',
        'NOX Beauty Space — манікюр, педикюр, брови та перукар | Варшава Воля',
        'NOX Beauty Space — manicure, pedicure, brows & hair | Warsaw Wola',
    ],
    'seo_desc' => [
        'Salon beauty na Woli, blisko metra Płocka: manicure hybrydowy, pedicure SPA, laminowanie brwi i rzęs, fryzjer i barber. Sterylizacja w autoklawie. −10% na pierwszą wizytę.',
        'Салон краси на Волі біля метро Płocka: гібридний манікюр, SPA-педикюр, ламінування брів і вій, перукар і барбер. Стерилізація в автоклаві. −10% на перший візит.',
        'Beauty salon in Wola near Płocka metro: gel manicure, SPA pedicure, brow & lash lamination, hair and barber services. Autoclave sterilisation. −10% on your first visit.',
    ],

    // Navigation & common
    'skip_link'     => ['Przejdź do treści', 'Перейти до змісту', 'Skip to content'],
    'nav_label'     => ['Menu główne', 'Головне меню', 'Main menu'],
    'nav_services'  => ['Usługi', 'Послуги', 'Services'],
    'nav_about'     => ['O nas', 'Про нас', 'About'],
    'nav_prices'    => ['Cennik', 'Ціни', 'Prices'],
    'nav_gallery'   => ['Galeria', 'Галерея', 'Gallery'],
    'nav_reviews'   => ['Opinie', 'Відгуки', 'Reviews'],
    'nav_contact'   => ['Kontakt', 'Контакти', 'Contact'],
    'book_btn'      => ['Umów wizytę', 'Записатися', 'Book now'],
    'menu_open'     => ['Otwórz menu', 'Відкрити меню', 'Open menu'],
    'close'         => ['Zamknij', 'Закрити', 'Close'],
    'back_to_top'   => ['Do góry', 'Нагору', 'Back to top'],

    // Hero
    'hero_eyebrow' => ['Salon beauty · Warszawa Wola', 'Салон краси · Варшава, Воля', 'Beauty salon · Warsaw, Wola'],
    'hero_title' => [
        'Piękno <em>dopracowane</em> w&nbsp;każdym detalu',
        'Краса, <em>досконала</em> в&nbsp;кожній деталі',
        'Beauty <em>perfected</em> in every detail',
        'html',
    ],
    'hero_desc' => [
        'Manicure, pedicure, brwi, rzęsy i fryzjer w jednym miejscu — z najwyższą sterylnością i stylistkami, którym ufają setki klientek z Woli.',
        'Манікюр, педикюр, брови, вії та перукар в одному місці — з найвищою стерильністю та майстрами, яким довіряють сотні клієнток на Волі.',
        'Manicure, pedicure, brows, lashes and hair under one roof — with the highest sterility standards and stylists hundreds of Wola clients trust.',
    ],
    'hero_button'       => ['Zarezerwuj w Booksy', 'Записатися в Booksy', 'Book on Booksy'],
    'hero_button_ig'    => ['Napisz w Direct', 'Написати в Direct', 'Message us on Instagram'],
    'hero_rating_label' => ['143 opinie w Booksy', '143 відгуки в Booksy', '143 reviews on Booksy'],
    'hero_promo'        => ['−10% na pierwszą wizytę', '−10% на перший візит', '−10% on your first visit'],
    'promo_value' => array_fill(0, 3, '−10%'),
    'promo_title' => ['na pierwszą wizytę', 'на перший візит', 'on your first visit'],
    'promo_sub'   => [
        'przy rezerwacji przez Booksy lub Direct',
        'при записі через Booksy або Direct',
        'when you book via Booksy or Instagram',
    ],
    'promo_ring'  => [
        'pierwsza wizyta • rabat • nox beauty space •',
        'перший візит • знижка • nox beauty space •',
        'first visit • discount • nox beauty space •',
    ],
    'hero_img_alt'  => ['Manicure hybrydowy w odcieniu wiśni ze złotym pierścionkiem', 'Гібридний манікюр вишневого відтінку із золотим перснем', 'Cherry gel manicure with a gold ring'],
    'hero_img2_alt' => ['Recepcja salonu NOX Beauty Space', 'Рецепція салону NOX Beauty Space', 'NOX Beauty Space reception'],

    // Perks
    'perk_1_title' => ['Najwyższa sterylność', 'Найвища стерильність', 'Highest sterility'],
    'perk_1_text'  => [
        '3-etapowa sterylizacja narzędzi, autoklaw i pakiety otwierane przy Tobie.',
        '3-етапна стерилізація інструментів, крафт-пакет відкриваємо при вас.',
        '3-step tool sterilisation, autoclave, pouches opened in front of you.',
    ],
    'perk_2_title' => ['Top stylistki', 'Топ-майстри', 'Top stylists'],
    'perk_2_text'  => ['Średnia ocena 5.0 na podstawie 143 opinii.', 'Середня оцінка 5.0 за 143 відгуками.', 'An average rating of 5.0 from 143 reviews.'],
    'perk_3_title' => ['Blisko metra Płocka', 'Поруч із метро Płocka', 'Near Płocka metro'],
    'perk_3_text'  => ['ul. Ludwiki 4B/U1, Wola. Otwarte codziennie 10–20.', 'вул. Ludwiki 4B/U1, Воля. Щодня 10–20.', 'Ludwiki 4B/U1, Wola. Open daily 10am–8pm.'],
    'perk_4_title' => ['−10% na start', '−10% на старт', '−10% to start'],
    'perk_4_text'  => ['Rabat na pierwszą wizytę przy rezerwacji przez Booksy lub Direct.', 'Знижка на перший візит при записі через Booksy або Direct.', 'First-visit discount when you book via Booksy or Instagram.'],

    // Services
    'services_eyebrow' => ['Usługi', 'Послуги', 'Services'],
    'services_title'   => ['Wszystko dla Twojego <em>piękna</em>', 'Усе для вашої <em>краси</em>', 'Everything for your <em>beauty</em>', 'html'],
    'services_desc'    => [
        'Od perfekcyjnego manicure po nowe cięcie — wybierz zabieg, a my zadbamy o resztę.',
        'Від бездоганного манікюру до нової стрижки — оберіть процедуру, а про решту подбаємо ми.',
        'From a flawless manicure to a fresh cut — pick a treatment and we will take care of the rest.',
    ],
    'svc_manicure_title' => ['Manicure', 'Манікюр', 'Manicure'],
    'svc_manicure_text'  => [
        'Hybrydowy, klasyczny, japoński i męski. Czyste skórki, idealny kształt i lustrzany połysk.',
        'Гібридний, класичний, японський і чоловічий. Ідеальна кутикула, форма та дзеркальний блиск.',
        'Gel, classic, Japanese and men’s. Clean cuticles, perfect shape and a mirror shine.',
    ],
    'svc_manicure_price' => ['od 110 zł', 'від 110 zł', 'from 110 zł'],
    'svc_extensions_title' => ['Przedłużanie paznokci', 'Нарощування нігтів', 'Nail extensions'],
    'svc_extensions_text'  => [
        'Żel i akrylożel na górnych formach — delikatny french, migdał lub kwadrat w wymarzonej długości.',
        'Гель і акригель на верхніх формах — ніжний френч, мигдаль або квадрат потрібної довжини.',
        'Gel and polygel on top forms — soft French, almond or square in the length you love.',
    ],
    'svc_extensions_price' => ['od 240 zł', 'від 240 zł', 'from 240 zł'],
    'svc_pedicure_title' => ['Pedicure', 'Педикюр', 'Pedicure'],
    'svc_pedicure_text'  => [
        'Klasyczny, hybrydowy i SPA z kąpielą w soli i peelingiem. Gładkie stopy i trwały kolor.',
        'Класичний, гібридний і SPA з ванночкою із сіллю та пілінгом. Гладенькі стопи й стійкий колір.',
        'Classic, gel and SPA with a salt soak and scrub. Smooth feet and long-lasting colour.',
    ],
    'svc_pedicure_price' => ['od 150 zł', 'від 150 zł', 'from 150 zł'],
    'svc_brows_title' => ['Brwi, rzęsy i epilacja', 'Брови, вії та епіляція', 'Brows, lashes & hair removal'],
    'svc_brows_text'  => [
        'Laminowanie brwi i rzęs, regulacja, farbowanie oraz elektroepilacja — trwałe usuwanie każdego rodzaju włosa.',
        'Ламінування брів і вій, корекція, фарбування та електроепіляція — назавжди для будь-якого типу волосся.',
        'Brow and lash lamination, shaping, tinting and electrolysis — permanent removal of any hair type.',
    ],
    'svc_brows_price' => ['od 30 zł', 'від 30 zł', 'from 30 zł'],
    'svc_hair_title' => ['Fryzjer', 'Перукар', 'Hair'],
    'svc_hair_text'  => [
        'Strzyżenie, koloryzacja, tonowanie i balayage. Bezpłatna konsultacja przed farbowaniem.',
        'Стрижка, фарбування, тонування та балаяж. Безкоштовна консультація перед фарбуванням.',
        'Cuts, colouring, toning and balayage. Free consultation before colouring.',
    ],
    'svc_hair_price' => ['od 40 zł', 'від 40 zł', 'from 40 zł'],
    'svc_barber_title' => ['Barber', 'Барбер', 'Barber'],
    'svc_barber_text'  => [
        'Męskie strzyżenie maszynką i nożyczkami, fade oraz strzyżenie dziecięce.',
        'Чоловіча стрижка машинкою та ножицями, фейд і дитяча стрижка.',
        'Men’s clipper and scissor cuts, fades and kids’ haircuts.',
    ],
    'svc_barber_price' => ['od 50 zł', 'від 50 zł', 'from 50 zł'],

    // About & team
    'about_eyebrow' => ['O nas', 'Про нас', 'About us'],
    'about_title'   => ['Miejsce, w którym <em>czas zwalnia</em>', 'Місце, де <em>час сповільнюється</em>', 'A place where <em>time slows down</em>', 'html'],
    'about_text_1'  => [
        'NOX Beauty Space to kameralny salon na warszawskiej Woli, kilka kroków od metra Płocka. Łączymy precyzyjną technikę, sprawdzone materiały i spokojną atmosferę, w której możesz naprawdę odpocząć.',
        'NOX Beauty Space — затишний салон на варшавській Волі, за кілька кроків від метро Płocka. Ми поєднуємо точну техніку, перевірені матеріали та спокійну атмосферу, в якій можна по-справжньому відпочити.',
        'NOX Beauty Space is an intimate salon in Warsaw’s Wola district, a short walk from Płocka metro. We combine precise technique, proven products and a calm atmosphere where you can truly unwind.',
    ],
    'about_text_2'  => [
        'Bezpieczeństwo to dla nas podstawa: każde narzędzie przechodzi dezynfekcję, czyszczenie ultradźwiękowe i sterylizację w autoklawie, a pakiet otwieramy przy Tobie. Mówimy po polsku, ukraińsku, angielsku i rosyjsku.',
        'Безпека для нас — основа: кожен інструмент проходить дезінфекцію, ультразвукове очищення та стерилізацію, а крафт-пакет ми відкриваємо при вас. Говоримо польською, українською, англійською та російською.',
        'Safety comes first: every tool is disinfected, ultrasonically cleaned and sterilised in an autoclave, and the pouch is opened in front of you. We speak Polish, Ukrainian, English and Russian.',
    ],
    'about_img_alt' => ['Recepcja salonu NOX Beauty Space z podświetlanym logo', 'Рецепція салону NOX Beauty Space з підсвіченим логотипом', 'NOX Beauty Space reception with an illuminated logo'],
    'about_badge'   => ['średnia ocena klientów', 'середня оцінка клієнтів', 'average client rating'],
    'team_title'    => ['Nasz zespół', 'Наша команда', 'Our team'],
    'team_role_nataliia' => ['Manicure i pedicure', 'Манікюр і педикюр', 'Manicure & pedicure'],
    'team_role_taya'     => ['Manicure i stylizacja paznokci', 'Манікюр і дизайн нігтів', 'Manicure & nail design'],
    'team_role_alina'    => ['Stylistka brwi i rzęs', 'Майстриня брів і вій', 'Brow & lash stylist'],
    'team_role_vadzim'   => ['Fryzjer i barber', 'Перукар і барбер', 'Hairdresser & barber'],

    // Prices
    'prices_eyebrow' => ['Cennik', 'Ціни', 'Prices'],
    'prices_title'   => ['Przejrzyste <em>ceny</em>', 'Прозорі <em>ціни</em>', 'Clear <em>prices</em>', 'html'],
    'prices_desc'    => [
        'Aktualny cennik naszych usług. Wybierz kategorię, aby zobaczyć szczegóły.',
        'Актуальні ціни на наші послуги. Оберіть категорію, щоб побачити деталі.',
        'Our current price list. Choose a category to see the details.',
    ],
    'prices_note' => [
        'Ceny mogą się różnić w zależności od długości i stanu paznokci lub włosów. Wolne terminy i aktualne promocje znajdziesz w Booksy.',
        'Вартість може залежати від довжини та стану нігтів або волосся. Вільні віконця й актуальні акції — у Booksy.',
        'Prices may vary with the length and condition of nails or hair. See free slots and current offers on Booksy.',
    ],
    'btn_book' => ['Wybierz termin w Booksy', 'Обрати час у Booksy', 'Pick a time on Booksy'],

    // Gallery
    'gallery_eyebrow' => ['Portfolio', 'Портфоліо', 'Portfolio'],
    'gallery_title'   => ['Nasze <em>prace</em>', 'Наші <em>роботи</em>', 'Our <em>work</em>', 'html'],
    'gallery_text'    => [
        'Prawdziwe efekty naszych stylistek — od clean pink nude po głęboką wiśnię i chrom. Codziennie nowe prace na Instagramie.',
        'Справжні роботи наших майстрів — від clean pink nude до глибокої вишні та хрому. Щодня нові роботи в Instagram.',
        'Real results by our stylists — from clean pink nude to deep cherry and chrome. New work on Instagram every day.',
    ],
    'gallery_alt'  => ['Praca NOX Beauty Space', 'Робота NOX Beauty Space', 'NOX Beauty Space work'],
    'gallery_more' => ['Więcej na Instagramie', 'Більше в Instagram', 'More on Instagram'],

    // Reviews (quotes stay in the language they were written in)
    'reviews_eyebrow' => ['Opinie', 'Відгуки', 'Reviews'],
    'reviews_title'   => ['Co mówią nasze <em>klientki</em>', 'Що кажуть наші <em>клієнтки</em>', 'What our <em>clients</em> say', 'html'],
    'reviews_text'    => ['143 opinie zweryfikowanych klientów w Booksy', '143 відгуки перевірених клієнтів у Booksy', '143 reviews from verified Booksy clients'],
    'reviews_link'    => ['Zobacz wszystkie opinie', 'Усі відгуки', 'See all reviews'],
    'review_1_text'    => array_fill(0, 3, 'Bardzo dziękuję Pani Natalii. Jestem bardzo zadowolona z manicure — paznokcie są pięknie wykonane i starannie dopracowane.'),
    'review_1_author'  => array_fill(0, 3, 'Iryna'),
    'review_1_service' => ['Manicure klasyczny · Booksy', 'Класичний манікюр · Booksy', 'Classic manicure · Booksy'],
    'review_2_text'    => array_fill(0, 3, 'Vadzim is a perfectionist! Listens carefully, very gentle and a lot of attention to details. I will be back for sure.'),
    'review_2_author'  => array_fill(0, 3, 'Agata'),
    'review_2_service' => ['Strzyżenie damskie · Booksy', 'Жіноча стрижка · Booksy', 'Women’s haircut · Booksy'],
    'review_3_text'    => array_fill(0, 3, 'Super ❤️😍'),
    'review_3_author'  => array_fill(0, 3, 'Alisa'),
    'review_3_service' => ['Manicure hybrydowy · Booksy', 'Гібридний манікюр · Booksy', 'Gel manicure · Booksy'],
    'review_4_text'    => array_fill(0, 3, 'Тотальний кайф перед моїм весіллям — час, проведений у NOX. Саме їм я довірила свій весільний образ.'),
    'review_4_author'  => array_fill(0, 3, 'Klientka NOX'),
    'review_4_service' => ['Stylizacja ślubna · Instagram', 'Весільний образ · Instagram', 'Bridal look · Instagram'],

    // Contact
    'contact_eyebrow' => ['Kontakt', 'Контакти', 'Contact'],
    'contact_title'   => ['Zapraszamy do <em>NOX</em>', 'Чекаємо вас у <em>NOX</em>', 'Welcome to <em>NOX</em>', 'html'],
    'contact_desc'    => [
        'Najszybciej zarezerwujesz wizytę w Booksy lub przez Instagram Direct. Masz pytanie? Zostaw wiadomość — odpowiemy tego samego dnia.',
        'Найшвидше записатися можна в Booksy або через Instagram Direct. Маєте запитання? Залиште повідомлення — відповімо того ж дня.',
        'The fastest way to book is Booksy or Instagram Direct. Got a question? Leave a message and we will reply the same day.',
    ],
    'contact_address_label'   => ['Adres', 'Адреса', 'Address'],
    'contact_metro'           => ['Wola, blisko stacji metra Płocka (M2)', 'Воля, поруч зі станцією метро Płocka (M2)', 'Wola, near Płocka metro station (M2)'],
    'contact_hours_label'     => ['Godziny otwarcia', 'Години роботи', 'Opening hours'],
    'contact_hours_value'     => ['Codziennie 10:00–20:00', 'Щодня 10:00–20:00', 'Daily 10:00–20:00'],
    'contact_booking_label'   => ['Rezerwacja', 'Запис', 'Booking'],
    'contact_amenities_label' => ['Udogodnienia', 'Зручності', 'Amenities'],
    'contact_amenities_value' => [
        'Parking · płatność kartą · Wi-Fi · program lojalnościowy',
        'Паркінг · оплата карткою · Wi-Fi · програма лояльності',
        'Parking · card payments · Wi-Fi · loyalty programme',
    ],
    'map_title' => ['Mapa dojazdu do NOX Beauty Space', 'Мапа проїзду до NOX Beauty Space', 'Map to NOX Beauty Space'],

    // Form
    'form_title'    => ['Masz pytanie? Napisz do nas', 'Маєте запитання? Напишіть нам', 'Got a question? Write to us'],
    'form_name'     => ['Imię', 'Ім’я', 'Name'],
    'form_phone'    => ['Telefon', 'Телефон', 'Phone'],
    'form_email'    => ['E-mail', 'E-mail', 'Email'],
    'form_message'  => ['Wiadomość', 'Повідомлення', 'Message'],
    'form_submit'   => ['Wyślij wiadomość', 'Надіслати', 'Send message'],
    'form_sending'  => ['Wysyłanie…', 'Надсилаємо…', 'Sending…'],
    'form_required' => ['Uzupełnij wymagane pola i zaznacz zgodę.', 'Заповніть обов’язкові поля та позначте згоду.', 'Please fill in the required fields and tick the consent box.'],
    'form_error'    => [
        'Nie udało się wysłać wiadomości. Spróbuj ponownie lub napisz do nas na Instagramie.',
        'Не вдалося надіслати повідомлення. Спробуйте ще раз або напишіть нам в Instagram.',
        'We could not send your message. Please try again or message us on Instagram.',
    ],
    'rodo_consent' => [
        'Wyrażam zgodę na przetwarzanie moich danych osobowych przez NOX Beauty Space w celu odpowiedzi na wiadomość (RODO).',
        'Я погоджуюся на обробку моїх персональних даних NOX Beauty Space для відповіді на повідомлення (RODO/GDPR).',
        'I agree to NOX Beauty Space processing my personal data to reply to my message (GDPR).',
    ],

    // Footer
    'footer_tagline'   => [
        'Manicure, pedicure, brwi, rzęsy i fryzjer na warszawskiej Woli.',
        'Манікюр, педикюр, брови, вії та перукар на варшавській Волі.',
        'Manicure, pedicure, brows, lashes and hair in Warsaw’s Wola.',
    ],
    'footer_nav_title'  => ['Menu', 'Меню', 'Menu'],
    'footer_lang_title' => ['Język', 'Мова', 'Language'],
    'footer_rights'     => ['Wszelkie prawa zastrzeżone.', 'Усі права захищено.', 'All rights reserved.'],
];

// Price list from Booksy. category => [names[4], subcategories => [names[4], items => [[names[4], price]]]]
// Price strings use "zł"; translations of "od" (from) are applied per language below.
// SEO texts (FAQ, image alts, 404, privacy, cookies, search snippet) live in a separate file
$texts = array_merge($texts, require __DIR__ . '/seo_texts.php', require __DIR__ . '/service_texts.php');

$priceList = [
    'manicure' => [['Manicure', 'Манікюр', 'Manicure'], [
        [['Manicure', 'Манікюр', 'Manicure'], [
            [['Manicure hybrydowy', 'Гібридний манікюр', 'Gel manicure'], '160 zł'],
            [['Manicure klasyczny (bez hybrydy)', 'Класичний манікюр (без покриття)', 'Classic manicure (no gel)'], '110 zł'],
            [['Manicure japoński', 'Японський манікюр', 'Japanese manicure'], '130 zł'],
            [['Manicure męski', 'Чоловічий манікюр', 'Men’s manicure'], '110 zł'],
        ]],
        [['Przedłużanie i uzupełnianie', 'Нарощування та корекція', 'Extensions & refills'], [
            [['Przedłużanie paznokci — długość 1', 'Нарощування нігтів — довжина 1', 'Nail extensions — length 1'], '240 zł'],
            [['Przedłużanie paznokci — długość 2', 'Нарощування нігтів — довжина 2', 'Nail extensions — length 2'], '260 zł'],
            [['Przedłużanie paznokci — długość 3–4', 'Нарощування нігтів — довжина 3–4', 'Nail extensions — length 3–4'], '280 zł'],
            [['Uzupełnienie żelem/akrylożelem — długość 1', 'Корекція гелем/акригелем — довжина 1', 'Gel/polygel refill — length 1'], '200 zł'],
            [['Uzupełnienie żelem/akrylożelem — długość 2', 'Корекція гелем/акригелем — довжина 2', 'Gel/polygel refill — length 2'], '220 zł'],
            [['Uzupełnienie żelem/akrylożelem — długość 3–4', 'Корекція гелем/акригелем — довжина 3–4', 'Gel/polygel refill — length 3–4'], '240 zł'],
            [['Usunięcie poprzedniej stylizacji żelowej', 'Зняття попереднього гелевого покриття', 'Removal of previous gel'], '+40 zł'],
        ]],
    ]],
    'pedicure' => [['Pedicure', 'Педикюр', 'Pedicure'], [
        [['Pedicure', 'Педикюр', 'Pedicure'], [
            [['Pedicure hybrydowy', 'Гібридний педикюр', 'Gel pedicure'], '190 zł'],
            [['Pedicure hybrydowy częściowy', 'Гібридний педикюр частковий (без стопи)', 'Partial gel pedicure (toes only)'], '160 zł'],
            [['Pedicure hybrydowy SPA', 'Гібридний SPA-педикюр', 'SPA gel pedicure'], '205 zł'],
            [['Pedicure klasyczny', 'Класичний педикюр', 'Classic pedicure'], '150 zł'],
            [['Pedicure klasyczny SPA', 'Класичний SPA-педикюр', 'Classic SPA pedicure'], '165 zł'],
            [['Pedicure męski SPA', 'Чоловічий SPA-педикюр', 'Men’s SPA pedicure'], '180 zł'],
        ]],
    ]],
    'brows' => [['Brwi i rzęsy', 'Брови та вії', 'Brows & lashes'], [
        [['Brwi', 'Брови', 'Brows'], [
            [['Regulacja brwi', 'Корекція брів', 'Brow shaping'], '50 zł'],
            [['Regulacja i farbowanie brwi', 'Корекція та фарбування брів', 'Brow shaping & tint'], '80 zł'],
            [['Laminowanie brwi + regulacja', 'Ламінування брів + корекція', 'Brow lamination + shaping'], '130 zł'],
            [['Laminowanie brwi + regulacja + farbowanie', 'Ламінування брів + корекція + фарбування', 'Brow lamination + shaping + tint'], '150 zł'],
        ]],
        [['Rzęsy', 'Вії', 'Lashes'], [
            [['Laminowanie rzęs', 'Ламінування вій', 'Lash lift'], '160 zł'],
            [['Farbowanie rzęs', 'Фарбування вій', 'Lash tint'], '40 zł'],
            [['PROMO: laminowanie brwi i rzęs', 'PROMO: ламінування брів і вій', 'PROMO: brow & lash lamination'], '270 zł'],
        ]],
        [['Depilacja i elektroepilacja', 'Депіляція та електроепіляція', 'Waxing & electrolysis'], [
            [['Depilacja wąsika', 'Депіляція над губою', 'Upper lip wax'], '30 zł'],
            [['Elektroepilacja — zapisy przez Direct', 'Електроепіляція — запис через Direct', 'Electrolysis — book via Instagram'], '—'],
        ]],
    ]],
    'hair' => [['Fryzjer', 'Перукар', 'Hair'], [
        [['Strzyżenie damskie', 'Жіноча стрижка', 'Women’s haircuts'], [
            [['Mycie + strzyżenie + czesanie — włosy krótkie', 'Миття + стрижка + укладка — коротке волосся', 'Wash + cut + style — short hair'], '100 zł'],
            [['Mycie + strzyżenie + czesanie — włosy średnie', 'Миття + стрижка + укладка — середнє волосся', 'Wash + cut + style — medium hair'], '120 zł'],
            [['Mycie + strzyżenie + czesanie — włosy długie', 'Миття + стрижка + укладка — довге волосся', 'Wash + cut + style — long hair'], '140 zł'],
            [['Strzyżenie końcówek (bez mycia)', 'Підрізання кінчиків (без миття)', 'Trim (no wash)'], '80 zł'],
            [['Strzyżenie grzywki', 'Стрижка чубчика', 'Fringe trim'], '40 zł'],
        ]],
        [['Strzyżenie męskie i dziecięce', 'Чоловіча та дитяча стрижка', 'Men’s & kids’ cuts'], [
            [['Strzyżenie męskie (mycie + strzyżenie)', 'Чоловіча стрижка (миття + стрижка)', 'Men’s haircut (wash + cut)'], '70 zł'],
            [['Strzyżenie męskie nożyczkami', 'Чоловіча стрижка ножицями', 'Men’s scissor cut'], '90 zł'],
            [['Strzyżenie dziecięce (do 10 lat)', 'Дитяча стрижка (до 10 років)', 'Kids’ haircut (up to 10)'], '50 zł'],
        ]],
        [['Koloryzacja', 'Фарбування', 'Colouring'], [
            [['Konsultacja przed farbowaniem', 'Консультація перед фарбуванням', 'Colour consultation'], 'gratis'],
            [['Koloryzacja jednolita — włosy krótkie', 'Однотонне фарбування — коротке волосся', 'Single-colour — short hair'], '280 zł'],
            [['Koloryzacja jednolita — włosy średnie', 'Однотонне фарбування — середнє волосся', 'Single-colour — medium hair'], '310 zł'],
            [['Koloryzacja jednolita — włosy długie', 'Однотонне фарбування — довге волосся', 'Single-colour — long hair'], '350 zł'],
            [['PROMO: tonowanie + strzyżenie', 'PROMO: тонування + стрижка', 'PROMO: toning + haircut'], '300 zł'],
        ]],
    ]],
];

$freeWord = ['gratis', 'безкоштовно', 'free'];

$heroImages = [
    '/assets/img/nox/hero-chrome.webp',
    '/assets/img/nox/salon-interior.webp',
];
$galleryImages = [
    'work-cherry', 'work-clean-pink', 'work-plum-matte', 'work-lash-lamination', 'work-hair-brunette',
    'work-french-square', 'work-nude-art', 'work-pedicure-red', 'work-halloween', 'work-hair-blonde',
    'work-plum-french', 'work-lash-before-after', 'work-milky-nude', 'work-barber-fade', 'work-pink-nude', 'hero-ring',
];

$seo = [
    'pl' => [$texts['seo_title'][0], $texts['seo_desc'][0]],
    'uk' => [$texts['seo_title'][1], $texts['seo_desc'][1]],
    'en' => [$texts['seo_title'][2], $texts['seo_desc'][2]],
];

$langs = ['pl', 'uk', 'en'];
$pdo = DB::getConnection();
$pdo->exec("SET NAMES utf8mb4");
$pdo->beginTransaction();

try {
    // Texts
    foreach ($texts as $key => $values) {
        $type = (isset($values[3]) && $values[3] === 'html') ? 'html' : 'text';
        $block = DB::fetch("SELECT id FROM content_blocks WHERE key_name = ?", [$key]);
        if ($block) {
            DB::execute("UPDATE content_blocks SET type = ? WHERE id = ?", [$type, $block['id']]);
            $blockId = $block['id'];
        } else {
            DB::execute("INSERT INTO content_blocks (key_name, description, type) VALUES (?, ?, ?)", [$key, $key, $type]);
            $blockId = $pdo->lastInsertId();
        }
        foreach ($langs as $i => $lang) {
            DB::execute("DELETE FROM translations WHERE block_id = ? AND lang_code = ?", [$blockId, $lang]);
            DB::execute("INSERT INTO translations (block_id, lang_code, value) VALUES (?, ?, ?)", [$blockId, $lang, $values[$i]]);
        }
    }

    // Price list (replace everything)
    DB::execute("DELETE FROM service_items");
    DB::execute("DELETE FROM service_subcategories");
    DB::execute("DELETE FROM service_categories");
    $catSort = 10;
    foreach ($priceList as $slug => [$catNames, $subs]) {
        DB::execute("INSERT INTO service_categories (slug, name_pl, name_uk, name_en, sort_order) VALUES (?, ?, ?, ?, ?)",
            [$slug, $catNames[0], $catNames[1], $catNames[2], $catSort]);
        $catId = $pdo->lastInsertId();
        $catSort += 10;
        $subSort = 10;
        foreach ($subs as [$subNames, $items]) {
            DB::execute("INSERT INTO service_subcategories (category_id, name_pl, name_uk, name_en, sort_order) VALUES (?, ?, ?, ?, ?)",
                [$catId, $subNames[0], $subNames[1], $subNames[2], $subSort]);
            $subId = $pdo->lastInsertId();
            $subSort += 10;
            $itemSort = 10;
            foreach ($items as [$names, $price]) {
                $prices = $price === 'gratis' ? $freeWord : array_fill(0, 3, $price);
                DB::execute("INSERT INTO service_items (subcategory_id, name_pl, name_uk, name_en, price_pl, price_uk, price_en, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
                    [$subId, $names[0], $names[1], $names[2], $prices[0], $prices[1], $prices[2], $itemSort]);
                $itemSort += 10;
            }
        }
    }

    // Sliders
    DB::execute("DELETE FROM slider_images WHERE slider_type IN ('hero', 'gallery')");
    foreach ($heroImages as $i => $path) {
        DB::execute("INSERT INTO slider_images (slider_type, image_path, sort_order) VALUES ('hero', ?, ?)", [$path, $i * 10]);
    }
    foreach ($galleryImages as $i => $name) {
        DB::execute("INSERT INTO slider_images (slider_type, image_path, sort_order) VALUES ('gallery', ?, ?)", ["/assets/img/nox/{$name}.webp", $i * 10]);
    }

    // Privacy policy page
    if (!DB::fetch("SELECT id FROM pages WHERE slug = 'polityka-prywatnosci'")) {
        DB::execute("INSERT INTO pages (slug, name) VALUES ('polityka-prywatnosci', 'Політика конфіденційності')");
    }

    // Service landing pages
    foreach (require __DIR__ . '/../components/services.php' as $slug => $svc) {
        if (!DB::fetch("SELECT id FROM pages WHERE slug = ?", [$slug])) {
            DB::execute("INSERT INTO pages (slug, name) VALUES (?, ?)", [$slug, $slug]);
        }
    }

    // SEO for the home page
    $page = DB::fetch("SELECT id FROM pages WHERE slug = 'home'");
    foreach ($seo as $lang => [$title, $desc]) {
        DB::execute("DELETE FROM seo_metadata WHERE page_id = ? AND lang_code = ?", [$page['id'], $lang]);
        DB::execute("INSERT INTO seo_metadata (page_id, lang_code, title, description, og_title, og_description, og_image) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [$page['id'], $lang, $title, $desc, $title, $desc, '/assets/img/nox/og-image.jpg']);
    }

    $pdo->commit();
    echo "Seeded: " . count($texts) . " texts, " . count($priceList) . " price categories, " . count($galleryImages) . " gallery images.\n";
} catch (Throwable $e) {
    $pdo->rollBack();
    fwrite(STDERR, "Seed failed: " . $e->getMessage() . "\n");
    exit(1);
}
