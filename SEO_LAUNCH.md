# SEO і запуск сайту NOX Beauty Space: чекліст

## Що вже зроблено на сайті

**Технічне SEO**
- `robots.txt` і `sitemap.xml` генеруються автоматично. У sitemap є всі 3 мови зі зв'язками hreflang і фото для Google Images.
- Кожна сторінка має одну адресу. `/uk` веде на `/uk/`, `/home` і `/index.php` ведуть на головну, на сервері налаштовано редирект на HTTPS і домен без `www`.
- Справжня сторінка 404 (код 404 і `noindex`), щоб Google не індексував «биті» адреси.
- `canonical`, `hreflang` (pl, uk, en, x-default) і `og:locale` на кожній сторінці.
- Мета-тег robots, `max-image-preview:large`, щоб у видачі показувались великі фото.
- `favicon.ico` у корені (Google бере іконку для видачі саме звідти) і web manifest.

**Розмітка для Google (schema.org)**
- `BeautySalon` + `NailSalon` + `HairSalon`: адреса, GPS-координати, години роботи, мови, зручності, посилання на Booksy та Instagram, кнопка запису (ReserveAction).
- Повний прайс (39 послуг з цінами в PLN) прямо в розмітці.
- `FAQPage` з 8 питаннями, тими самими, що видно на сторінці.
- `WebSite` і `WebPage`.

**Контент**
- Новий title і description під ключові запити: «manicure i pedicure Warszawa Wola», «манікюр Варшава Воля», «manicure Warsaw».
- H1 тепер містить «Salon beauty · Warszawa Wola», вигляд не змінився.
- Блок FAQ: ціни, як доїхати, запис, години, стерилізація, оплата, мови.
- Описи (alt) для всіх фото трьома мовами.
- Адреса в тегу `<address>`, посилання «Прокласти маршрут» у Google Maps.
- Сторінка «Політика конфіденційності» (RODO) трьома мовами, посилання на неї з форми та футера.

**Сторінки послуг** (6 сторінок × 3 мови, усі в sitemap)
| Сторінка | Адреса (PL; для UK/EN додається `/uk/`, `/en/`) | Основні запити |
|---|---|---|
| Манікюр | `/manicure-warszawa-wola` | manicure hybrydowy Wola, manicure japoński, manicure męski |
| Нарощування | `/przedluzanie-paznokci-warszawa-wola` | przedłużanie paznokci Warszawa, akrylożel, paznokcie żelowe |
| Педикюр | `/pedicure-warszawa-wola` | pedicure hybrydowy, pedicure SPA Wola |
| Брови та вії | `/brwi-rzesy-warszawa-wola` | laminowanie brwi, laminowanie rzęs, elektroepilacja |
| Перукар | `/fryzjer-warszawa-wola` | fryzjer damski Wola, koloryzacja, strzyżenie damskie |
| Барбер | `/barber-warszawa-wola` | barber Wola, strzyżenie męskie, fade |

На кожній сторінці: свій title/description, H1, опис, 4 переваги, 4 кроки візиту, фото з Instagram салону (32 нових фото з SEO-назвами файлів та описами), ціни з адмінки (оновлюються автоматично), 5 FAQ, хлібні крихти та розмітка `Service` + `BreadcrumbList` + `FAQPage`. Картки на головній і колонка «Послуги» у футері ведуть на ці сторінки. Тексти редагуються в адмінці (ключі `svcpage_*`), налаштування сторінок (фото, які ціни показувати) — у `components/services.php`.

**Швидкість (Core Web Vitals)**
- Перший екран більше не чекає на JavaScript: заголовок і фото видно одразу.
- Головне фото завантажується першим, для телефонів є легша версія.
- Лого 3 KB замість 136 KB.
- Стиснення, кешування на рік для статичних файлів, `loading="lazy"` для фото нижче першого екрана.
- Перше завантаження на телефоні: близько 15 запитів і 150 KB.

**Безпека** (Google знижує в пошуку зламані сайти)
- З інтернету закрито службові файли: дамп бази, `.git`, нотатки з паролями, старі скрипти, які можуть стерти прайс, `README`, `config.php`.
- Напряму відкривається тільки вхід в адмінку. Адмінка і форма мають `noindex`.
- Заголовки безпеки: `nosniff`, `X-Frame-Options`, `Referrer-Policy`.

**Аналітика та реклама**
- Google Analytics 4 і Google Ads із Consent Mode v2 і cookie-банером (обов'язково в ЄС). Вмикаються, щойно вписати ID у конфіг.
- Події конверсій: `booking_click` (Booksy та Instagram), `phone_click`, `directions_click`, `generate_lead` (форма).

---

## Що зробити перед запуском (5–10 хв)

Вписати в `config.php` → `site` (або в змінні оточення на хостингу):

| Поле | Що вписати |
|---|---|
| `url` | Домен сайту, наприклад `https://noxbeauty.pl`. **Обов'язково**, інакше canonical і sitemap візьмуть адресу із запиту. |
| `phone` | Вже вписано: `+48 666 623 396` (підтверджено). Показується на сайті, у футері та в розмітці для Google. |
| `ga4_id` | ID з Google Analytics, наприклад `G-XXXXXXX`. |
| `gads_id` | ID з Google Ads, наприклад `AW-XXXXXXX`, коли запустимо рекламу. |
| `google_verification` | Код із Google Search Console (варіант «HTML-тег»). |
| `bing_verification` | Код із Bing Webmaster Tools. |

А також:
1. Увімкнути HTTPS на хостингу (безкоштовний Let's Encrypt). Після цього розкоментувати рядок `Strict-Transport-Security` у `.htaccess`.
2. Змінити пароль адмінки на складний і заповнити `smtp_pass` у `config.php`.
3. Не завантажувати на хостинг `node_modules/`, `ПАРОЛЬ.txt`, `salon_cms.sql`, `.git/`, `.claude/`. Вони вже заблоковані, але краще їх там просто не мати.
4. У «Політиці конфіденційності» за потреби додати юридичну назву фірми та NIP (Адмінка → Тексти → `privacy_body`).

## Одразу після запуску (перший день)

1. **Google Search Console** (search.google.com/search-console): додати сайт, підтвердити, надіслати `https://ДОМЕН/sitemap.xml`. Потім «Перевірка URL» → «Надіслати запит на індексацію» для `/`, `/uk/`, `/en/`.
2. **Bing Webmaster Tools**: імпортувати сайт із Search Console одним кліком (Bing також живить ChatGPT і Copilot).
3. **Перевірити розмітку**: search.google.com/test/rich-results і validator.schema.org.
4. **PageSpeed Insights** (pagespeed.web.dev): перевірити мобільну версію, мета 90+.

## Найважливіше для «манікюр Варшава»: Google Maps

По запитах на кшталт «manicure Wola» чи «paznokcie blisko mnie» Google спочатку показує **карту з 3 салонами**, і більшість клієнтів приходить звідти.

1. **Профіль у Google (Google Business Profile)**, business.google.com:
   - категорія: основна **«Salon manicure i pedicure»**, додаткові «Salon kosmetyczny», «Salon fryzjerski», «Barber»;
   - назва точно **NOX Beauty Space**, без додаткових слів (за ключові слова в назві Google блокує профіль);
   - адреса **точно як на сайті**: `ul. Ludwiki 4B/U1, 01-226 Warszawa`, телефон, години, сайт;
   - кнопка «Zarezerwuj» → посилання Booksy (або підключити Booksy як партнера бронювання);
   - послуги з цінами (скопіювати з прайсу) і посиланням на відповідну сторінку послуги, 20+ фото: інтер'єр, роботи, команда, вхід із вулиці;
   - пост раз на тиждень (нова робота, акція −10%).
2. **Відгуки** — фактор №1 для карти. Після кожного візиту просити відгук у Google (QR-код на рецепції, посилання в повідомленні). Відповідати на кожен відгук.
3. **Однакові дані скрізь (NAP)**: назва, адреса й телефон мають однаково виглядати на сайті, Booksy, Instagram, Facebook, Apple Maps, Bing Places, а також у польських каталогах: pkt.pl, panoramafirm.pl, zumi.pl, cylex.pl.
4. **Посилання на сайт**: у профілі Booksy, біо Instagram, Facebook, Google-профілі.

## Як рости далі (наступні кроки)

1. **Блог / поради** (1–2 статті на місяць): «Ile trzyma się manicure hybrydowy», «Manicure japoński — co to jest». Такі статті приводять людей, які ще вибирають салон.
2. **Фото й відео** з описом району (Wola, metro Płocka) у Google-профілі та Instagram.
3. **Google Ads**: пошукова кампанія на Варшаву/Волю, бюджет від 600–1500 zł на місяць, конверсії вже налаштовані.
4. Раз на місяць дивитись Search Console: за якими запитами показуємось, що можна покращити.
