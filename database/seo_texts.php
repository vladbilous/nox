<?php
// database/seo_texts.php — SEO-related CMS texts [pl, uk, en] (+ optional 'html' flag as 4th element).
// Used by database/seed_nox.php (fresh install) and database/seo_update.php (adds them to an existing site).
return [
    // ---------- Search result snippet (also stored in seo_metadata) ----------
    'seo_title' => [
        'Manicure i pedicure Warszawa Wola — salon NOX Beauty Space',
        'Манікюр і педикюр Варшава, Воля — салон NOX Beauty Space',
        'Manicure & Pedicure in Warsaw (Wola) — NOX Beauty Space',
    ],
    'seo_desc' => [
        'Manicure hybrydowy, pedicure SPA, brwi, rzęsy i fryzjer na Woli, blisko metra Płocka. Sterylizacja w autoklawie, ocena 5.0. −10% na pierwszą wizytę.',
        'Гібридний манікюр, SPA-педикюр, брови, вії та перукар на Волі біля метро Płocka. Стерилізація в автоклаві, рейтинг 5.0. −10% на перший візит.',
        'Gel manicure, SPA pedicure, brows, lashes and hair in Wola, near Płocka metro. Autoclave sterilisation, 5.0 rating. −10% off your first visit.',
    ],
    'og_image_alt' => [
        'NOX Beauty Space — salon beauty na Woli w Warszawie',
        'NOX Beauty Space — салон краси на Волі у Варшаві',
        'NOX Beauty Space — beauty salon in Wola, Warsaw',
    ],
    'about_text_2' => [
        'Bezpieczeństwo to dla nas podstawa: każde narzędzie przechodzi dezynfekcję, czyszczenie ultradźwiękowe i sterylizację w autoklawie, a pakiet otwieramy przy Tobie. Mówimy po polsku, ukraińsku i angielsku.',
        'Безпека для нас — основа: кожен інструмент проходить дезінфекцію, ультразвукове очищення та стерилізацію в автоклаві, а пакет ми відкриваємо при вас. Говоримо польською, українською та англійською.',
        'Safety comes first: every tool is disinfected, ultrasonically cleaned and sterilised in an autoclave, and the pouch is opened in front of you. We speak Polish, Ukrainian and English.',
    ],

    // ---------- Contact ----------
    'contact_phone_label' => ['Telefon', 'Телефон', 'Phone'],
    'map_link' => ['Wyznacz trasę w Google Maps', 'Прокласти маршрут у Google Maps', 'Get directions in Google Maps'],

    // ---------- FAQ ----------
    'faq_eyebrow' => ['FAQ', 'FAQ', 'FAQ'],
    'faq_title' => ['Najczęstsze <em>pytania</em>', 'Часті <em>запитання</em>', 'Frequently asked <em>questions</em>', 'html'],
    'faq_1_q' => [
        'Ile kosztuje manicure hybrydowy na Woli?',
        'Скільки коштує гібридний манікюр на Волі?',
        'How much is a gel manicure in Wola?',
    ],
    'faq_1_a' => [
        'W NOX manicure hybrydowy kosztuje 160 zł, manicure klasyczny i męski — 110 zł, a manicure japoński — 130 zł. Na pierwszą wizytę przez Booksy lub Instagram Direct otrzymasz −10%.',
        'У NOX гібридний манікюр коштує 160 zł, класичний і чоловічий — 110 zł, японський — 130 zł. На перший візит через Booksy або Instagram Direct — знижка −10%.',
        'At NOX a gel (hybrid) manicure costs 160 zł, a classic or men’s manicure 110 zł and a Japanese manicure 130 zł. Book your first visit via Booksy or Instagram and get 10% off.',
    ],
    'faq_2_q' => [
        'Ile kosztuje pedicure i przedłużanie paznokci?',
        'Скільки коштує педикюр і нарощування нігтів?',
        'How much are pedicures and nail extensions?',
    ],
    'faq_2_a' => [
        'Pedicure klasyczny kosztuje 150 zł, hybrydowy — 190 zł, a pedicure hybrydowy SPA — 205 zł. Przedłużanie paznokci żelem lub akrylożelem zaczyna się od 240 zł, uzupełnienie — od 200 zł.',
        'Класичний педикюр коштує 150 zł, гібридний — 190 zł, гібридний SPA-педикюр — 205 zł. Нарощування нігтів гелем або акригелем — від 240 zł, корекція — від 200 zł.',
        'A classic pedicure is 150 zł, a gel pedicure 190 zł and a SPA gel pedicure 205 zł. Gel or polygel nail extensions start at 240 zł, refills at 200 zł.',
    ],
    'faq_3_q' => [
        'Jak dojechać do salonu NOX?',
        'Як дістатися до салону NOX?',
        'How do I get to NOX?',
    ],
    'faq_3_a' => [
        'Salon znajduje się przy ul. Ludwiki 4B/U1 (01-226 Warszawa, Wola), kilka minut pieszo od stacji metra Płocka (linia M2). W pobliżu salonu jest parking.',
        'Салон розташований за адресою ul. Ludwiki 4B/U1 (01-226 Варшава, Воля), за кілька хвилин пішки від станції метро Płocka (лінія M2). Поруч із салоном є паркування.',
        'We are at ul. Ludwiki 4B/U1 (01-226 Warsaw, Wola district), a few minutes’ walk from Płocka metro station (M2 line). Parking is available nearby.',
    ],
    'faq_4_q' => [
        'Jak umówić wizytę?',
        'Як записатися на візит?',
        'How can I book an appointment?',
    ],
    'faq_4_a' => [
        'Najwygodniej przez Booksy — rezerwacja działa całą dobę i od razu widzisz wolne terminy. Możesz też napisać do nas na Instagramie (@nox.beauty.space) lub zostawić wiadomość w formularzu na tej stronie.',
        'Найзручніше — через Booksy: запис працює цілодобово, і ви одразу бачите вільні години. Також можна написати нам в Instagram (@nox.beauty.space) або залишити повідомлення у формі на цій сторінці.',
        'The easiest way is Booksy — it works 24/7 and shows free slots instantly. You can also message us on Instagram (@nox.beauty.space) or use the contact form on this page.',
    ],
    'faq_5_q' => [
        'W jakich godzinach jest otwarty salon?',
        'Коли працює салон?',
        'What are your opening hours?',
    ],
    'faq_5_a' => [
        'Pracujemy codziennie, także w soboty i niedziele, w godzinach 10:00–20:00.',
        'Ми працюємо щодня, зокрема в суботу та неділю, з 10:00 до 20:00.',
        'We are open every day, including Saturdays and Sundays, from 10:00 to 20:00.',
    ],
    'faq_6_q' => [
        'Jak dbacie o higienę i sterylizację narzędzi?',
        'Як ви дбаєте про гігієну та стерилізацію інструментів?',
        'How do you sterilise your tools?',
    ],
    'faq_6_a' => [
        'Każde narzędzie przechodzi 3 etapy: dezynfekcję, czyszczenie w myjce ultradźwiękowej i sterylizację w autoklawie. Pakiet z narzędziami otwieramy przy Tobie.',
        'Кожен інструмент проходить 3 етапи: дезінфекцію, очищення в ультразвуковій мийці та стерилізацію в автоклаві. Пакет з інструментами відкриваємо при вас.',
        'Every tool goes through 3 stages: disinfection, ultrasonic cleaning and autoclave sterilisation. The sealed pouch is opened in front of you.',
    ],
    'faq_7_q' => [
        'Czy mogę zapłacić kartą?',
        'Чи можна оплатити карткою?',
        'Can I pay by card?',
    ],
    'faq_7_a' => [
        'Tak, w salonie akceptujemy płatności kartą. Mamy też program lojalnościowy dla stałych klientów.',
        'Так, у салоні можна оплатити карткою. Для постійних клієнтів діє програма лояльності.',
        'Yes, we accept card payments. Regular clients can also join our loyalty programme.',
    ],
    'faq_8_q' => [
        'W jakich językach obsługujecie klientów?',
        'Якими мовами ви обслуговуєте клієнтів?',
        'Which languages do you speak?',
    ],
    'faq_8_a' => [
        'Obsługujemy klientów po polsku, ukraińsku i angielsku.',
        'Ми обслуговуємо клієнтів польською, українською та англійською.',
        'We speak Polish, Ukrainian and English.',
    ],

    // ---------- Image descriptions (alt) — Google Images and accessibility ----------
    'alt_service_suffix' => ['salon NOX Beauty Space, Warszawa Wola', 'салон NOX Beauty Space, Варшава Воля', 'NOX Beauty Space salon, Warsaw Wola'],
    'alt_work-cherry' => ['Manicure hybrydowy w kolorze wiśni — NOX Beauty Space Warszawa', 'Гібридний манікюр вишневого кольору — NOX Beauty Space Варшава', 'Cherry red gel manicure — NOX Beauty Space Warsaw'],
    'alt_work-clean-pink' => ['Naturalny różowy manicure hybrydowy clean girl', 'Натуральний рожевий гібридний манікюр clean girl', 'Natural clean-girl pink gel manicure'],
    'alt_work-plum-matte' => ['Matowy manicure hybrydowy w kolorze śliwki', 'Матовий гібридний манікюр сливового кольору', 'Matte plum gel manicure'],
    'alt_work-lash-lamination' => ['Laminowanie rzęs — efekt po zabiegu', 'Ламінування вій — результат після процедури', 'Lash lift and tint — result'],
    'alt_work-hair-brunette' => ['Strzyżenie i stylizacja długich ciemnych włosów', 'Стрижка та укладка довгого темного волосся', 'Haircut and styling for long dark hair'],
    'alt_work-french-square' => ['Francuski manicure na kwadratowych paznokciach', 'Френч-манікюр на квадратних нігтях', 'French manicure on square nails'],
    'alt_work-nude-art' => ['Manicure nude ze zdobieniem', 'Нюдовий манікюр з дизайном', 'Nude manicure with nail art'],
    'alt_work-pedicure-red' => ['Czerwony pedicure hybrydowy', 'Червоний гібридний педикюр', 'Red gel pedicure'],
    'alt_work-halloween' => ['Manicure z motywem Halloween', 'Манікюр з дизайном на Хелловін', 'Halloween nail art manicure'],
    'alt_work-hair-blonde' => ['Koloryzacja blond i strzyżenie damskie', 'Фарбування у блонд і жіноча стрижка', 'Blonde colouring and women’s haircut'],
    'alt_work-plum-french' => ['Śliwkowy french na migdałowych paznokciach', 'Сливовий френч на мигдалеподібних нігтях', 'Plum French tips on almond nails'],
    'alt_work-lash-before-after' => ['Laminowanie rzęs — przed i po', 'Ламінування вій — до і після', 'Lash lift — before and after'],
    'alt_work-milky-nude' => ['Mleczny manicure nude', 'Молочний нюдовий манікюр', 'Milky nude manicure'],
    'alt_work-barber-fade' => ['Męskie strzyżenie fade — barber NOX', 'Чоловіча стрижка фейд — барбер NOX', 'Men’s fade haircut — NOX barber'],
    'alt_work-pink-nude' => ['Różowy manicure nude na krótkich paznokciach', 'Рожевий нюдовий манікюр на коротких нігтях', 'Pink nude manicure on short nails'],
    'alt_hero-ring' => ['Manicure hybrydowy ze złotym pierścionkiem', 'Гібридний манікюр із золотим кільцем', 'Gel manicure with a gold ring'],

    // ---------- 404 ----------
    '404_title' => ['Nie znaleziono strony', 'Сторінку не знайдено', 'Page not found'],
    '404_text' => [
        'Ta strona nie istnieje lub została przeniesiona. Wróć na stronę główną — tam znajdziesz cennik, galerię i rezerwację.',
        'Такої сторінки не існує або її перенесено. Поверніться на головну — там ціни, галерея та запис.',
        'This page doesn’t exist or has moved. Go back to the home page for prices, gallery and booking.',
    ],
    '404_button' => ['Strona główna', 'На головну', 'Home page'],

    // ---------- Privacy policy & cookies ----------
    'privacy_link' => ['Polityka prywatności', 'Політика конфіденційності', 'Privacy policy'],
    'privacy_title' => ['Polityka prywatności', 'Політика конфіденційності', 'Privacy policy'],
    'privacy_desc' => [
        'Jak NOX Beauty Space przetwarza dane osobowe i pliki cookies.',
        'Як NOX Beauty Space обробляє персональні дані та файли cookie.',
        'How NOX Beauty Space processes personal data and cookies.',
    ],
    'privacy_body' => [
        '<h2>1. Administrator danych</h2><p>Administratorem danych osobowych jest NOX Beauty Space, ul. Ludwiki 4B/U1, 01-226 Warszawa. W sprawach danych osobowych skontaktuj się z nami przez formularz na stronie lub Instagram @nox.beauty.space.</p>'
        . '<h2>2. Jakie dane i w jakim celu</h2><p>Formularz kontaktowy: imię, telefon, e-mail i treść wiadomości — wyłącznie po to, by odpowiedzieć na Twoje pytanie (art. 6 ust. 1 lit. a i f RODO). Rezerwacje przez Booksy i wiadomości na Instagramie podlegają politykom prywatności tych serwisów.</p>'
        . '<h2>3. Jak długo przechowujemy dane</h2><p>Dane z formularza przechowujemy do czasu zakończenia korespondencji, nie dłużej niż 12 miesięcy, chyba że przepisy wymagają dłużej.</p>'
        . '<h2>4. Odbiorcy danych</h2><p>Dane mogą być powierzane wyłącznie dostawcom usług technicznych (hosting, poczta e-mail), którzy przetwarzają je na nasze zlecenie. Nie sprzedajemy danych.</p>'
        . '<h2>5. Pliki cookies</h2><p>Strona używa niezbędnych plików cookies (np. zapamiętanie języka). Cookies analityczne i marketingowe (Google Analytics, Google Ads) włączamy tylko po Twojej zgodzie w banerze. Zgodę możesz w każdej chwili wycofać, czyszcząc dane strony w przeglądarce.</p>'
        . '<h2>6. Twoje prawa</h2><p>Masz prawo dostępu do danych, ich sprostowania, usunięcia, ograniczenia przetwarzania, przenoszenia, sprzeciwu oraz cofnięcia zgody. Przysługuje Ci skarga do Prezesa Urzędu Ochrony Danych Osobowych (uodo.gov.pl).</p>',
        '<h2>1. Адміністратор даних</h2><p>Адміністратором персональних даних є NOX Beauty Space, ul. Ludwiki 4B/U1, 01-226 Warszawa. З питань персональних даних зв’яжіться з нами через форму на сайті або Instagram @nox.beauty.space.</p>'
        . '<h2>2. Які дані та для чого</h2><p>Контактна форма: ім’я, телефон, e-mail і текст повідомлення — лише для відповіді на ваше запитання (ст. 6 ч. 1 п. a та f GDPR/RODO). Записи через Booksy та повідомлення в Instagram регулюються політиками конфіденційності цих сервісів.</p>'
        . '<h2>3. Як довго зберігаємо дані</h2><p>Дані з форми зберігаємо до завершення листування, але не довше 12 місяців, якщо закон не вимагає довшого строку.</p>'
        . '<h2>4. Отримувачі даних</h2><p>Дані можуть передаватися лише постачальникам технічних послуг (хостинг, електронна пошта), які обробляють їх на наше доручення. Ми не продаємо дані.</p>'
        . '<h2>5. Файли cookie</h2><p>Сайт використовує необхідні cookie (наприклад, для запам’ятовування мови). Аналітичні та маркетингові cookie (Google Analytics, Google Ads) вмикаються лише після вашої згоди в банері. Згоду можна відкликати будь-коли, очистивши дані сайту в браузері.</p>'
        . '<h2>6. Ваші права</h2><p>Ви маєте право на доступ до даних, їх виправлення, видалення, обмеження обробки, перенесення, заперечення та відкликання згоди. Ви можете подати скаргу до Голови Управління захисту персональних даних Польщі (uodo.gov.pl).</p>',
        '<h2>1. Data controller</h2><p>The controller of your personal data is NOX Beauty Space, ul. Ludwiki 4B/U1, 01-226 Warsaw, Poland. For any data protection matters, contact us via the form on this site or on Instagram @nox.beauty.space.</p>'
        . '<h2>2. What data we process and why</h2><p>Contact form: name, phone, e-mail and your message — only to reply to your enquiry (Art. 6(1)(a) and (f) GDPR). Bookings via Booksy and Instagram messages are governed by those services’ privacy policies.</p>'
        . '<h2>3. How long we keep data</h2><p>Form data is kept until our correspondence ends and no longer than 12 months, unless the law requires longer.</p>'
        . '<h2>4. Recipients</h2><p>Data may only be shared with technical service providers (hosting, e-mail) that process it on our behalf. We never sell data.</p>'
        . '<h2>5. Cookies</h2><p>The site uses essential cookies (e.g. to remember your language). Analytics and marketing cookies (Google Analytics, Google Ads) are enabled only after you consent in the banner. You can withdraw consent at any time by clearing this site’s data in your browser.</p>'
        . '<h2>6. Your rights</h2><p>You have the right to access, rectify, erase, restrict and port your data, to object, and to withdraw consent. You may lodge a complaint with the Polish Data Protection Authority (uodo.gov.pl).</p>',
        'html',
    ],
    'cookie_text' => [
        'Używamy plików cookies, aby mierzyć ruch i ulepszać stronę. Analityka włączy się tylko za Twoją zgodą.',
        'Ми використовуємо cookie, щоб вимірювати відвідуваність і покращувати сайт. Аналітика вмикається лише за вашою згодою.',
        'We use cookies to measure traffic and improve the site. Analytics is enabled only with your consent.',
    ],
    'cookie_accept' => ['Akceptuję', 'Погоджуюсь', 'Accept'],
    'cookie_decline' => ['Tylko niezbędne', 'Лише необхідні', 'Essential only'],
];
