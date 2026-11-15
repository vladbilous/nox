<?php
// database/legal_texts.php — legal texts for the Polish market [pl, uk, en] (+ 'html' flag).
// Based on: RODO (GDPR) art. 13; ustawa o świadczeniu usług drogą elektroniczną art. 5 and 8;
// Prawo komunikacji elektronicznej art. 399 (cookies); Prawo przedsiębiorców art. 20 (NIP);
// Omnibus (reviews). The Polish version is binding.
// Placeholders filled from config.php: {{company}} {{company_details}} {{email}} {{phone}} {{site}}
// {{privacy_url}} {{cookies_url}} {{terms_url}}.
// NOTE: a template, not legal advice — have it checked once the company details are filled in.

$privacyPl = <<<'HTML'
<h2>1. Administrator danych</h2>
<p>Administratorem Twoich danych osobowych jest {{company}} (dane powyżej). W sprawach dotyczących danych osobowych możesz kontaktować się z nami: {{email}}, tel. {{phone}} lub osobiście w salonie. Nie powołaliśmy inspektora ochrony danych.</p>
<h2>2. Cele, podstawy prawne i zakres przetwarzania</h2>
<ul>
<li><strong>Formularz kontaktowy</strong> — imię, telefon, e-mail i treść wiadomości przetwarzamy, aby odpowiedzieć na Twoje zapytanie (art. 6 ust. 1 lit. f RODO — prawnie uzasadniony interes, jakim jest prowadzenie korespondencji; jeśli zapytanie dotyczy wizyty — art. 6 ust. 1 lit. b RODO).</li>
<li><strong>Rezerwacja i realizacja wizyty</strong> — dane potrzebne do umówienia i wykonania usługi (art. 6 ust. 1 lit. b RODO). Rezerwacje online prowadzimy przez serwis Booksy, który w zakresie swojego serwisu jest odrębnym administratorem danych i działa według własnej polityki prywatności.</li>
<li><strong>Kontakt telefoniczny i przez Instagram</strong> — odpowiedź na wiadomość (art. 6 ust. 1 lit. f RODO). Operatorem Instagrama jest Meta Platforms Ireland Ltd., odrębny administrator danych.</li>
<li><strong>Statystyka i marketing</strong> (np. Google Analytics, Google Ads) — wyłącznie po wyrażeniu zgody w banerze cookies (art. 6 ust. 1 lit. a RODO w zw. z art. 399 Prawa komunikacji elektronicznej).</li>
<li><strong>Mapa Google</strong> — wczytujemy ją dopiero po Twojej zgodzie lub kliknięciu „Pokaż mapę” (art. 6 ust. 1 lit. a RODO).</li>
<li><strong>Bezpieczeństwo strony</strong> — serwer automatycznie zapisuje dane techniczne (adres IP, data i godzina, przeglądarka) w logach (art. 6 ust. 1 lit. f RODO — ochrona przed nadużyciami).</li>
<li><strong>Obowiązki prawne</strong> — np. przechowywanie dokumentów księgowych (art. 6 ust. 1 lit. c RODO).</li>
</ul>
<h2>3. Odbiorcy danych</h2>
<p>Dane mogą otrzymać wyłącznie podmioty, które pomagają nam prowadzić działalność: dostawca hostingu, dostawca poczty e-mail, firmy świadczące wsparcie IT i księgowe, a w zakresie, na który wyrazisz zgodę — Google Ireland Ltd. Booksy i Meta przetwarzają dane jako odrębni administratorzy. Nie sprzedajemy danych.</p>
<h2>4. Przekazywanie danych poza EOG</h2>
<p>Usługi Google mogą wiązać się z przekazaniem danych do USA. Odbywa się to na podstawie decyzji Komisji Europejskiej w sprawie EU-US Data Privacy Framework lub standardowych klauzul umownych.</p>
<h2>5. Okres przechowywania</h2>
<ul>
<li>dane z formularza i korespondencji — do zakończenia sprawy, nie dłużej niż 12 miesięcy od ostatniego kontaktu;</li>
<li>dane przetwarzane na podstawie zgody — do jej wycofania;</li>
<li>dane związane z wizytą — przez okres przedawnienia roszczeń i wymagany przepisami podatkowymi;</li>
<li>logi serwera — przez okres niezbędny dla bezpieczeństwa, zgodnie z ustawieniami dostawcy hostingu.</li>
</ul>
<h2>6. Twoje prawa</h2>
<p>Masz prawo do: dostępu do danych, ich sprostowania, usunięcia, ograniczenia przetwarzania, przenoszenia danych, sprzeciwu wobec przetwarzania opartego na prawnie uzasadnionym interesie oraz wycofania zgody w dowolnym momencie (bez wpływu na zgodność z prawem przetwarzania przed jej wycofaniem). Przysługuje Ci skarga do Prezesa Urzędu Ochrony Danych Osobowych (ul. Stawki 2, 00-193 Warszawa, uodo.gov.pl).</p>
<h2>7. Dobrowolność i profilowanie</h2>
<p>Podanie danych jest dobrowolne, ale bez nich nie odpowiemy na wiadomość ani nie umówimy wizyty. Nie podejmujemy decyzji w sposób zautomatyzowany i nie profilujemy Cię w rozumieniu art. 22 RODO.</p>
<h2>8. Pliki cookies</h2>
<p>Zasady korzystania z plików cookies opisuje <a href="{{cookies_url}}">Polityka cookies</a>. Swoje wybory możesz zmienić w każdej chwili przez link „Ustawienia cookies” w stopce strony.</p>
<h2>9. Zmiany polityki</h2>
<p>Polityka może być aktualizowana, np. przy zmianie przepisów lub usług. Aktualna wersja jest zawsze dostępna na tej stronie.</p>
HTML;

$privacyUk = <<<'HTML'
<p><em>Переклад для зручності. Юридично обов’язковою є польська версія документа.</em></p>
<h2>1. Адміністратор даних</h2>
<p>Адміністратором ваших персональних даних є {{company}} (дані вище). З питань персональних даних пишіть: {{email}}, телефонуйте {{phone}} або звертайтеся в салоні. Інспектора із захисту даних не призначено.</p>
<h2>2. Мета, правові підстави та обсяг обробки</h2>
<ul>
<li><strong>Контактна форма</strong> — ім’я, телефон, e-mail і текст повідомлення обробляємо, щоб відповісти на запит (ст. 6 ч. 1 п. f RODO/GDPR — законний інтерес; якщо запит стосується візиту — ст. 6 ч. 1 п. b).</li>
<li><strong>Запис і проведення візиту</strong> — дані, потрібні для запису та надання послуги (ст. 6 ч. 1 п. b). Онлайн-запис працює через Booksy, який є окремим адміністратором даних у своєму сервісі.</li>
<li><strong>Телефон та Instagram</strong> — відповідь на повідомлення (ст. 6 ч. 1 п. f). Оператор Instagram — Meta Platforms Ireland Ltd., окремий адміністратор.</li>
<li><strong>Статистика та маркетинг</strong> (Google Analytics, Google Ads) — лише після вашої згоди в банері cookies (ст. 6 ч. 1 п. a та ст. 399 закону Prawo komunikacji elektronicznej).</li>
<li><strong>Карта Google</strong> — завантажується лише після згоди або натискання «Показати карту».</li>
<li><strong>Безпека сайту</strong> — сервер автоматично записує технічні дані (IP, дата, браузер) у журнали (ст. 6 ч. 1 п. f).</li>
<li><strong>Юридичні обов’язки</strong> — наприклад, зберігання бухгалтерських документів (ст. 6 ч. 1 п. c).</li>
</ul>
<h2>3. Отримувачі даних</h2>
<p>Дані можуть отримати лише ті, хто допомагає нам працювати: хостинг, поштовий сервіс, IT- та бухгалтерська підтримка, а за вашою згодою — Google Ireland Ltd. Booksy та Meta є окремими адміністраторами. Ми не продаємо дані.</p>
<h2>4. Передача даних за межі ЄЕЗ</h2>
<p>Сервіси Google можуть передавати дані до США на підставі рішення Єврокомісії щодо EU-US Data Privacy Framework або стандартних договірних умов.</p>
<h2>5. Строк зберігання</h2>
<ul>
<li>дані з форми та листування — до завершення справи, не довше 12 місяців від останнього контакту;</li>
<li>дані, що обробляються за згодою, — до її відкликання;</li>
<li>дані про візит — протягом строку позовної давності та строків, яких вимагає податкове право;</li>
<li>журнали сервера — стільки, скільки потрібно для безпеки, згідно з налаштуваннями хостингу.</li>
</ul>
<h2>6. Ваші права</h2>
<p>Ви маєте право на доступ до даних, їх виправлення, видалення, обмеження обробки, перенесення, заперечення проти обробки на підставі законного інтересу та відкликання згоди будь-коли. Ви можете подати скаргу до Голови Управління захисту персональних даних (ul. Stawki 2, 00-193 Warszawa, uodo.gov.pl).</p>
<h2>7. Добровільність і профілювання</h2>
<p>Надання даних добровільне, але без них ми не зможемо відповісти чи записати вас. Ми не ухвалюємо автоматизованих рішень і не профілюємо вас (ст. 22 RODO).</p>
<h2>8. Файли cookie</h2>
<p>Детальніше — у <a href="{{cookies_url}}">Політиці cookies</a>. Змінити свій вибір можна будь-коли через посилання «Налаштування cookies» у підвалі сайту.</p>
<h2>9. Зміни</h2>
<p>Політика може оновлюватися. Актуальна версія завжди доступна на цій сторінці.</p>
HTML;

$privacyEn = <<<'HTML'
<p><em>Translation for convenience. The Polish version of this document is legally binding.</em></p>
<h2>1. Data controller</h2>
<p>The controller of your personal data is {{company}} (details above). For data protection matters contact us at {{email}}, by phone {{phone}} or in the salon. No data protection officer has been appointed.</p>
<h2>2. Purposes, legal bases and scope</h2>
<ul>
<li><strong>Contact form</strong> — your name, phone, e-mail and message are used to reply to your enquiry (Art. 6(1)(f) GDPR — legitimate interest; where it concerns a visit — Art. 6(1)(b)).</li>
<li><strong>Booking and providing the service</strong> — data needed to book and perform the treatment (Art. 6(1)(b)). Online booking runs through Booksy, a separate controller for its own service.</li>
<li><strong>Phone and Instagram</strong> — replying to your message (Art. 6(1)(f)). Instagram is operated by Meta Platforms Ireland Ltd., a separate controller.</li>
<li><strong>Statistics and marketing</strong> (Google Analytics, Google Ads) — only with your consent in the cookie banner (Art. 6(1)(a) GDPR and Art. 399 of the Polish Electronic Communications Law).</li>
<li><strong>Google Map</strong> — loaded only after your consent or a click on “Show map”.</li>
<li><strong>Website security</strong> — the server logs technical data (IP address, time, browser) (Art. 6(1)(f)).</li>
<li><strong>Legal obligations</strong> — e.g. keeping accounting records (Art. 6(1)(c)).</li>
</ul>
<h2>3. Recipients</h2>
<p>Data may only be shared with providers that help us run the business: hosting, e-mail, IT and accounting support and — to the extent you consent — Google Ireland Ltd. Booksy and Meta act as separate controllers. We never sell data.</p>
<h2>4. Transfers outside the EEA</h2>
<p>Google services may involve transfers to the USA based on the European Commission’s EU-US Data Privacy Framework decision or standard contractual clauses.</p>
<h2>5. Retention</h2>
<ul>
<li>form data and correspondence — until the matter is closed, no longer than 12 months after the last contact;</li>
<li>consent-based data — until you withdraw consent;</li>
<li>visit-related data — for the limitation period of claims and as required by tax law;</li>
<li>server logs — as long as needed for security, according to the hosting provider’s settings.</li>
</ul>
<h2>6. Your rights</h2>
<p>You have the right to access, rectify, erase and restrict your data, to data portability, to object to processing based on legitimate interest and to withdraw consent at any time. You may lodge a complaint with the Polish Data Protection Authority (Prezes UODO, ul. Stawki 2, 00-193 Warszawa, uodo.gov.pl).</p>
<h2>7. Voluntary data and profiling</h2>
<p>Providing data is voluntary, but without it we cannot reply or book your visit. We do not make automated decisions or profile you (Art. 22 GDPR).</p>
<h2>8. Cookies</h2>
<p>See our <a href="{{cookies_url}}">Cookie policy</a>. You can change your choice at any time via “Cookie settings” in the footer.</p>
<h2>9. Changes</h2>
<p>This policy may be updated. The current version is always available on this page.</p>
HTML;

$cookiesPl = <<<'HTML'
<h2>1. Czym są pliki cookies</h2>
<p>Pliki cookies to małe pliki tekstowe zapisywane na Twoim urządzeniu. Podobnie działa pamięć przeglądarki (localStorage), z której korzystamy do zapamiętania Twoich wyborów. Poniżej opisujemy obie technologie.</p>
<h2>2. Zasady</h2>
<p>Zgodnie z art. 399 Prawa komunikacji elektronicznej niezbędne pliki cookies stosujemy bez zgody, ponieważ bez nich strona nie działałaby prawidłowo. Pozostałe (multimedia zewnętrzne, statystyka, marketing) włączamy wyłącznie po Twojej zgodzie. Domyślnie wszystkie opcjonalne kategorie są wyłączone. Zgodę możesz w każdej chwili zmienić lub wycofać przez link „Ustawienia cookies” w stopce.</p>
<h2>3. Jakie pliki stosujemy</h2>
<table>
<thead><tr><th>Nazwa</th><th>Dostawca</th><th>Cel</th><th>Czas</th><th>Kategoria</th></tr></thead>
<tbody>
<tr><td>nox_consent (localStorage)</td><td>NOX (własny)</td><td>Zapamiętanie Twoich wyborów dotyczących cookies</td><td>12 miesięcy</td><td>Niezbędne</td></tr>
<tr><td>lang_detected</td><td>NOX (własny)</td><td>Zapamiętanie, że język strony został już dobrany (bez ponownego przekierowania)</td><td>Do zamknięcia przeglądarki</td><td>Niezbędne</td></tr>
<tr><td>PHPSESSID</td><td>NOX (własny)</td><td>Ochrona formularza kontaktowego przed spamem — ustawiany dopiero po wysłaniu formularza</td><td>Do zamknięcia przeglądarki</td><td>Niezbędne</td></tr>
<tr><td>nox_admin</td><td>NOX (własny)</td><td>Logowanie do panelu administracyjnego (tylko personel)</td><td>Do zamknięcia przeglądarki</td><td>Niezbędne</td></tr>
<tr><td>NID, AEC, SOCS i inne</td><td>Google Ireland Ltd.</td><td>Wyświetlenie mapy Google z dojazdem do salonu</td><td>Do 13 miesięcy</td><td>Multimedia zewnętrzne (zgoda)</td></tr>
<tr><td>_ga, _ga_*</td><td>Google Ireland Ltd.</td><td>Anonimowa statystyka odwiedzin (Google Analytics) — tylko jeśli usługa jest włączona</td><td>Do 2 lat</td><td>Analityczne (zgoda)</td></tr>
<tr><td>_gcl_au</td><td>Google Ireland Ltd.</td><td>Pomiar skuteczności reklam (Google Ads) — tylko jeśli usługa jest włączona</td><td>90 dni</td><td>Marketingowe (zgoda)</td></tr>
</tbody>
</table>
<h2>4. Serwisy zewnętrzne</h2>
<p>Po przejściu do Booksy, Instagrama lub Google Maps obowiązują zasady cookies tych serwisów. Sam link na naszej stronie nie zapisuje ich plików.</p>
<h2>5. Ustawienia przeglądarki</h2>
<p>Pliki cookies możesz też usuwać lub blokować w ustawieniach przeglądarki. Zablokowanie niezbędnych plików może utrudnić korzystanie ze strony.</p>
<p>Więcej o przetwarzaniu danych: <a href="{{privacy_url}}">Polityka prywatności</a>.</p>
HTML;

$cookiesUk = <<<'HTML'
<p><em>Переклад для зручності. Юридично обов’язковою є польська версія документа.</em></p>
<h2>1. Що таке cookies</h2>
<p>Cookies — це невеликі текстові файли на вашому пристрої. Схоже працює пам’ять браузера (localStorage), де ми зберігаємо ваш вибір. Нижче описано обидві технології.</p>
<h2>2. Правила</h2>
<p>Згідно зі ст. 399 закону Prawo komunikacji elektronicznej необхідні cookies ми використовуємо без згоди, бо без них сайт не працює коректно. Інші (зовнішні медіа, статистика, маркетинг) вмикаємо лише за вашою згодою. За замовчуванням усі необов’язкові категорії вимкнені. Змінити чи відкликати згоду можна будь-коли через «Налаштування cookies» у підвалі.</p>
<h2>3. Які файли ми використовуємо</h2>
<table>
<thead><tr><th>Назва</th><th>Постачальник</th><th>Мета</th><th>Строк</th><th>Категорія</th></tr></thead>
<tbody>
<tr><td>nox_consent (localStorage)</td><td>NOX (власний)</td><td>Запам’ятовує ваш вибір щодо cookies</td><td>12 місяців</td><td>Необхідні</td></tr>
<tr><td>lang_detected</td><td>NOX (власний)</td><td>Запам’ятовує, що мову сайту вже визначено</td><td>До закриття браузера</td><td>Необхідні</td></tr>
<tr><td>PHPSESSID</td><td>NOX (власний)</td><td>Захист контактної форми від спаму — лише після відправки форми</td><td>До закриття браузера</td><td>Необхідні</td></tr>
<tr><td>nox_admin</td><td>NOX (власний)</td><td>Вхід до панелі адміністратора (лише персонал)</td><td>До закриття браузера</td><td>Необхідні</td></tr>
<tr><td>NID, AEC, SOCS та інші</td><td>Google Ireland Ltd.</td><td>Показ карти Google з маршрутом до салону</td><td>До 13 місяців</td><td>Зовнішні медіа (згода)</td></tr>
<tr><td>_ga, _ga_*</td><td>Google Ireland Ltd.</td><td>Анонімна статистика відвідувань (Google Analytics), якщо увімкнено</td><td>До 2 років</td><td>Аналітичні (згода)</td></tr>
<tr><td>_gcl_au</td><td>Google Ireland Ltd.</td><td>Вимірювання ефективності реклами (Google Ads), якщо увімкнено</td><td>90 днів</td><td>Маркетингові (згода)</td></tr>
</tbody>
</table>
<h2>4. Зовнішні сервіси</h2>
<p>Після переходу на Booksy, Instagram чи Google Maps діють правила cookies цих сервісів. Саме посилання на нашому сайті їхніх файлів не зберігає.</p>
<h2>5. Налаштування браузера</h2>
<p>Cookies також можна видаляти чи блокувати в налаштуваннях браузера. Блокування необхідних файлів може порушити роботу сайту.</p>
<p>Більше про обробку даних: <a href="{{privacy_url}}">Політика конфіденційності</a>.</p>
HTML;

$cookiesEn = <<<'HTML'
<p><em>Translation for convenience. The Polish version of this document is legally binding.</em></p>
<h2>1. What cookies are</h2>
<p>Cookies are small text files stored on your device. Browser storage (localStorage), which we use to remember your choices, works in a similar way. Both are described below.</p>
<h2>2. Rules</h2>
<p>Under Art. 399 of the Polish Electronic Communications Law we use strictly necessary cookies without consent, as the site cannot work properly without them. Everything else (external media, statistics, marketing) is enabled only with your consent. All optional categories are off by default. You can change or withdraw consent at any time via “Cookie settings” in the footer.</p>
<h2>3. Cookies we use</h2>
<table>
<thead><tr><th>Name</th><th>Provider</th><th>Purpose</th><th>Duration</th><th>Category</th></tr></thead>
<tbody>
<tr><td>nox_consent (localStorage)</td><td>NOX (first party)</td><td>Remembers your cookie choices</td><td>12 months</td><td>Necessary</td></tr>
<tr><td>lang_detected</td><td>NOX (first party)</td><td>Remembers that the site language has been set</td><td>Until the browser closes</td><td>Necessary</td></tr>
<tr><td>PHPSESSID</td><td>NOX (first party)</td><td>Protects the contact form from spam — set only after you send the form</td><td>Until the browser closes</td><td>Necessary</td></tr>
<tr><td>nox_admin</td><td>NOX (first party)</td><td>Admin panel login (staff only)</td><td>Until the browser closes</td><td>Necessary</td></tr>
<tr><td>NID, AEC, SOCS and others</td><td>Google Ireland Ltd.</td><td>Showing the Google Map with directions</td><td>Up to 13 months</td><td>External media (consent)</td></tr>
<tr><td>_ga, _ga_*</td><td>Google Ireland Ltd.</td><td>Anonymous visit statistics (Google Analytics), if enabled</td><td>Up to 2 years</td><td>Analytics (consent)</td></tr>
<tr><td>_gcl_au</td><td>Google Ireland Ltd.</td><td>Ad performance measurement (Google Ads), if enabled</td><td>90 days</td><td>Marketing (consent)</td></tr>
</tbody>
</table>
<h2>4. External services</h2>
<p>Once you go to Booksy, Instagram or Google Maps, their cookie rules apply. A link on our site does not store their cookies.</p>
<h2>5. Browser settings</h2>
<p>You can also delete or block cookies in your browser settings. Blocking necessary cookies may affect how the site works.</p>
<p>More about data processing: <a href="{{privacy_url}}">Privacy policy</a>.</p>
HTML;

$termsPl = <<<'HTML'
<h2>§ 1. Postanowienia ogólne</h2>
<ol>
<li>Regulamin określa zasady korzystania ze strony internetowej {{site}} (dalej: Strona), zgodnie z art. 8 ustawy z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną.</li>
<li>Usługodawcą jest {{company}} (dane powyżej), kontakt: {{email}}, tel. {{phone}}.</li>
<li>Regulamin jest dostępny bezpłatnie na Stronie w formie, która umożliwia jego pobranie, utrwalenie i wydrukowanie.</li>
</ol>
<h2>§ 2. Rodzaje i zakres usług</h2>
<ol>
<li>Za pośrednictwem Strony Usługodawca świadczy bezpłatnie: a) udostępnianie informacji o salonie, usługach, cenach i pracach; b) formularz kontaktowy umożliwiający wysłanie wiadomości do salonu.</li>
<li>Strona zawiera odnośniki do zewnętrznych serwisów (Booksy, Instagram, Google Maps). Korzystanie z nich odbywa się na zasadach określonych przez ich operatorów. Rezerwacja wizyty online odbywa się w serwisie Booksy.</li>
<li>Strona nie służy do zawierania umów o wykonanie usług kosmetycznych — umowa jest zawierana przy rezerwacji wizyty lub w salonie.</li>
</ol>
<h2>§ 3. Wymagania techniczne</h2>
<p>Do korzystania ze Strony potrzebne jest urządzenie z dostępem do internetu i aktualna przeglądarka internetowa z włączoną obsługą JavaScript. Do wysłania formularza potrzebny jest numer telefonu lub adres e-mail.</p>
<h2>§ 4. Zasady korzystania</h2>
<p>Zabronione jest dostarczanie za pośrednictwem Strony treści o charakterze bezprawnym, w tym obraźliwych, naruszających dobra osobiste lub prawa osób trzecich, oraz podejmowanie działań zakłócających działanie Strony.</p>
<h2>§ 5. Zawarcie i rozwiązanie umowy</h2>
<ol>
<li>Umowa o udostępnianie informacji zostaje zawarta z chwilą wejścia na Stronę i rozwiązana z chwilą jej opuszczenia.</li>
<li>Umowa o korzystanie z formularza kontaktowego zostaje zawarta z chwilą wysłania wiadomości i rozwiązana z chwilą udzielenia odpowiedzi. Użytkownik może zrezygnować w każdej chwili, nie wysyłając formularza.</li>
</ol>
<h2>§ 6. Ceny i promocje</h2>
<ol>
<li>Ceny na Stronie są podane w złotych polskich i są cenami końcowymi. Mają charakter informacyjny i nie stanowią oferty w rozumieniu art. 66 Kodeksu cywilnego. Ostateczna cena zależy od zakresu usługi (np. długości i stanu paznokci lub włosów) i jest ustalana przy rezerwacji lub przed wykonaniem usługi.</li>
<li>Rabat −10% dotyczy pierwszej wizyty nowego klienta zarezerwowanej przez Booksy lub Instagram Direct. Szczegółowe warunki promocji przekazujemy przy rezerwacji.</li>
</ol>
<h2>§ 7. Opinie klientów</h2>
<ol>
<li>Na Stronie prezentujemy wybrane opinie klientów oraz średnią ocenę z serwisu Booksy.</li>
<li>Opinie z Booksy mogą wystawić wyłącznie osoby, które zarezerwowały wizytę w tym serwisie. Opinie pochodzące z Google i Instagrama publikujemy w oryginalnym brzmieniu (z możliwym tłumaczeniem), ale nie weryfikujemy, czy ich autor skorzystał z usługi.</li>
<li>Nie zamieszczamy opinii zamówionych ani nie zmieniamy treści opinii.</li>
</ol>
<h2>§ 8. Reklamacje</h2>
<ol>
<li>Reklamacje dotyczące działania Strony lub wykonanych usług można zgłaszać: {{email}}, telefonicznie ({{phone}}) lub osobiście w salonie. Prosimy o podanie danych kontaktowych i opisu problemu.</li>
<li>Reklamację rozpatrujemy w ciągu 14 dni od jej otrzymania i informujemy o wyniku w sposób, w jaki została zgłoszona.</li>
</ol>
<h2>§ 9. Pozasądowe rozwiązywanie sporów</h2>
<p>Konsument może skorzystać z pozasądowych sposobów rozpatrywania reklamacji i dochodzenia roszczeń, m.in. z pomocy miejskiego lub powiatowego rzecznika konsumentów albo mediacji prowadzonej przez Wojewódzki Inspektorat Inspekcji Handlowej. Informacje są dostępne na stronie Urzędu Ochrony Konkurencji i Konsumentów (uokik.gov.pl).</p>
<h2>§ 10. Dane osobowe i cookies</h2>
<p>Zasady przetwarzania danych osobowych opisuje <a href="{{privacy_url}}">Polityka prywatności</a>, a zasady stosowania plików cookies — <a href="{{cookies_url}}">Polityka cookies</a>.</p>
<h2>§ 11. Postanowienia końcowe</h2>
<ol>
<li>Usługodawca może zmienić Regulamin z ważnych przyczyn (np. zmiana przepisów lub zakresu usług). Zmiany obowiązują od opublikowania na Stronie.</li>
<li>W sprawach nieuregulowanych stosuje się przepisy prawa polskiego. Regulamin nie wyłącza ani nie ogranicza uprawnień konsumenta wynikających z bezwzględnie obowiązujących przepisów.</li>
</ol>
HTML;

$termsUk = <<<'HTML'
<p><em>Переклад для зручності. Юридично обов’язковою є польська версія документа.</em></p>
<h2>§ 1. Загальні положення</h2>
<ol>
<li>Регламент визначає правила користування сайтом {{site}} (далі — Сайт) відповідно до ст. 8 закону Польщі про надання послуг електронним шляхом.</li>
<li>Постачальник послуг — {{company}} (дані вище), контакт: {{email}}, тел. {{phone}}.</li>
<li>Регламент доступний безкоштовно на Сайті у формі, яку можна завантажити, зберегти й роздрукувати.</li>
</ol>
<h2>§ 2. Види та обсяг послуг</h2>
<ol>
<li>Через Сайт безкоштовно надається: а) інформація про салон, послуги, ціни та роботи; б) контактна форма для надсилання повідомлення салону.</li>
<li>Сайт містить посилання на зовнішні сервіси (Booksy, Instagram, Google Maps), які працюють за власними правилами. Онлайн-запис відбувається в Booksy.</li>
<li>Сайт не призначений для укладення договорів на косметичні послуги — договір укладається під час запису або в салоні.</li>
</ol>
<h2>§ 3. Технічні вимоги</h2>
<p>Потрібен пристрій з доступом до інтернету та сучасний браузер з увімкненим JavaScript. Для відправки форми — номер телефону або e-mail.</p>
<h2>§ 4. Правила користування</h2>
<p>Заборонено надсилати через Сайт протиправний вміст, зокрема образливий чи такий, що порушує права інших осіб, а також порушувати роботу Сайту.</p>
<h2>§ 5. Укладення та припинення договору</h2>
<ol>
<li>Договір про надання інформації укладається з моменту входу на Сайт і припиняється з моментом виходу.</li>
<li>Договір про користування формою укладається з моменту надсилання повідомлення й припиняється з моментом відповіді.</li>
</ol>
<h2>§ 6. Ціни та акції</h2>
<ol>
<li>Ціни вказано в польських злотих, це кінцеві ціни. Вони мають інформаційний характер і не є офертою (ст. 66 Цивільного кодексу Польщі). Остаточна ціна залежить від обсягу послуги й узгоджується під час запису або перед процедурою.</li>
<li>Знижка −10% діє на перший візит нового клієнта, записаного через Booksy або Instagram Direct. Детальні умови повідомляємо під час запису.</li>
</ol>
<h2>§ 7. Відгуки клієнтів</h2>
<ol>
<li>На Сайті показано вибрані відгуки та середню оцінку з Booksy.</li>
<li>Відгуки в Booksy можуть залишати лише клієнти, які записалися через цей сервіс. Відгуки з Google та Instagram публікуємо в оригінальному формулюванні (можливо, з перекладом), але не перевіряємо, чи автор скористався послугою.</li>
<li>Ми не публікуємо замовних відгуків і не змінюємо їхній зміст.</li>
</ol>
<h2>§ 8. Скарги</h2>
<ol>
<li>Скарги щодо роботи Сайту чи наданих послуг: {{email}}, телефоном ({{phone}}) або в салоні.</li>
<li>Скаргу розглядаємо протягом 14 днів і повідомляємо результат тим самим способом.</li>
</ol>
<h2>§ 9. Позасудове вирішення спорів</h2>
<p>Споживач може звернутися до міського або повітового захисника прав споживачів чи до медіації у Воєводській інспекції торгівлі. Інформація — на сайті UOKiK (uokik.gov.pl).</p>
<h2>§ 10. Персональні дані та cookies</h2>
<p>Див. <a href="{{privacy_url}}">Політику конфіденційності</a> та <a href="{{cookies_url}}">Політику cookies</a>.</p>
<h2>§ 11. Прикінцеві положення</h2>
<ol>
<li>Регламент може змінюватися з важливих причин; зміни діють з моменту публікації.</li>
<li>Застосовується право Польщі. Регламент не обмежує прав споживача, передбачених імперативними нормами.</li>
</ol>
HTML;

$termsEn = <<<'HTML'
<p><em>Translation for convenience. The Polish version of this document is legally binding.</em></p>
<h2>§ 1. General</h2>
<ol>
<li>These terms set out the rules for using the website {{site}} (the Site), as required by Art. 8 of the Polish Act on Providing Services by Electronic Means.</li>
<li>The service provider is {{company}} (details above), contact: {{email}}, phone {{phone}}.</li>
<li>The terms are available free of charge on the Site in a form that can be downloaded, saved and printed.</li>
</ol>
<h2>§ 2. Services</h2>
<ol>
<li>The Site provides, free of charge: a) information about the salon, services, prices and work; b) a contact form for sending messages to the salon.</li>
<li>The Site links to external services (Booksy, Instagram, Google Maps), which operate under their own rules. Online booking takes place on Booksy.</li>
<li>The Site is not used to conclude contracts for beauty treatments — those are concluded when booking or in the salon.</li>
</ol>
<h2>§ 3. Technical requirements</h2>
<p>A device with internet access and an up-to-date browser with JavaScript enabled. A phone number or e-mail address is needed to send the form.</p>
<h2>§ 4. Rules of use</h2>
<p>You may not submit unlawful content through the Site, including offensive content or content infringing third-party rights, or disrupt the Site.</p>
<h2>§ 5. Conclusion and termination</h2>
<ol>
<li>The information service starts when you open the Site and ends when you leave it.</li>
<li>The contact form service starts when you send a message and ends when we reply.</li>
</ol>
<h2>§ 6. Prices and offers</h2>
<ol>
<li>Prices are in Polish złoty and are final prices. They are for information only and do not constitute an offer under Art. 66 of the Polish Civil Code. The final price depends on the scope of the service and is agreed when booking or before the treatment.</li>
<li>The 10% discount applies to a new client’s first visit booked via Booksy or Instagram Direct. Detailed terms are given when booking.</li>
</ol>
<h2>§ 7. Customer reviews</h2>
<ol>
<li>The Site shows selected reviews and the average rating from Booksy.</li>
<li>Booksy reviews can only be left by people who booked a visit through Booksy. Reviews from Google and Instagram are published in their original wording (possibly translated), but we do not verify whether the author used the service.</li>
<li>We do not publish paid reviews or change their content.</li>
</ol>
<h2>§ 8. Complaints</h2>
<ol>
<li>Complaints about the Site or services: {{email}}, by phone ({{phone}}) or in the salon.</li>
<li>We handle complaints within 14 days and reply the same way the complaint was made.</li>
</ol>
<h2>§ 9. Out-of-court dispute resolution</h2>
<p>Consumers may seek help from a municipal or district consumer ombudsman or mediation by the Regional Trade Inspection. More at uokik.gov.pl.</p>
<h2>§ 10. Personal data and cookies</h2>
<p>See the <a href="{{privacy_url}}">Privacy policy</a> and the <a href="{{cookies_url}}">Cookie policy</a>.</p>
<h2>§ 11. Final provisions</h2>
<ol>
<li>We may change these terms for important reasons; changes apply from publication.</li>
<li>Polish law applies. These terms do not limit consumer rights under mandatory provisions.</li>
</ol>
HTML;

return [
    // ---------- Pages ----------
    'privacy_body' => [$privacyPl, $privacyUk, $privacyEn, 'html'],
    'privacy_desc' => [
        'Jak NOX Beauty Space przetwarza dane osobowe — administrator, cele, podstawy prawne, Twoje prawa.',
        'Як NOX Beauty Space обробляє персональні дані — адміністратор, мета, правові підстави, ваші права.',
        'How NOX Beauty Space processes personal data — controller, purposes, legal bases, your rights.',
    ],
    'cookies_policy_title' => ['Polityka cookies', 'Політика cookies', 'Cookie policy'],
    'cookies_policy_desc' => [
        'Jakie pliki cookies stosuje strona NOX Beauty Space i jak zmienić swoje wybory.',
        'Які файли cookie використовує сайт NOX Beauty Space і як змінити свій вибір.',
        'Which cookies the NOX Beauty Space website uses and how to change your choices.',
    ],
    'cookies_policy_body' => [$cookiesPl, $cookiesUk, $cookiesEn, 'html'],
    'cookies_policy_link' => ['Polityka cookies', 'Політика cookies', 'Cookie policy'],
    'terms_title' => ['Regulamin strony', 'Регламент сайту', 'Website terms'],
    'terms_desc' => [
        'Regulamin świadczenia usług drogą elektroniczną na stronie NOX Beauty Space.',
        'Регламент надання електронних послуг на сайті NOX Beauty Space.',
        'Terms of electronic services on the NOX Beauty Space website.',
    ],
    'terms_body' => [$termsPl, $termsUk, $termsEn, 'html'],
    'terms_link' => ['Regulamin', 'Регламент', 'Terms'],
    'legal_nav_label' => ['Informacje prawne', 'Правова інформація', 'Legal information'],
    'legal_updated' => ['Obowiązuje od', 'Діє з', 'Effective from'],
    'legal_effective_date' => ['15.11.2026', '15.11.2026', '15.11.2026'],
    'legal_contact_form' => ['formularz kontaktowy na stronie', 'контактна форма на сайті', 'the contact form on this site'],
    'legal_company_block' => [
        '<strong>Usługodawca i administrator danych</strong><br>{{company_details}}<br>Tel.: {{phone}}',
        '<strong>Постачальник послуг і адміністратор даних</strong><br>{{company_details}}<br>Тел.: {{phone}}',
        '<strong>Service provider and data controller</strong><br>{{company_details}}<br>Phone: {{phone}}',
        'html',
    ],
    'company_name_label' => ['Firma', 'Фірма', 'Company'],
    'company_address_label' => ['Adres', 'Адреса', 'Address'],

    // ---------- Cookie banner ----------
    'cookie_title' => ['Szanujemy Twoją prywatność', 'Ми поважаємо вашу приватність', 'We respect your privacy'],
    'cookie_text' => [
        'Niezbędne pliki cookies zapewniają działanie strony. Za Twoją zgodą wczytamy też mapę Google i — jeśli są włączone — narzędzia statystyki i marketingu. Możesz zaakceptować, odrzucić lub wybrać kategorie. Zmienisz to w każdej chwili w stopce.',
        'Необхідні cookies забезпечують роботу сайту. За вашою згодою ми також завантажимо карту Google і, якщо увімкнено, інструменти статистики та маркетингу. Можна прийняти, відхилити або вибрати категорії. Змінити вибір можна будь-коли в підвалі сайту.',
        'Necessary cookies keep the site working. With your consent we will also load the Google Map and — if enabled — statistics and marketing tools. You can accept, reject or choose categories, and change this any time in the footer.',
    ],
    'cookie_accept_all' => ['Akceptuj wszystkie', 'Прийняти все', 'Accept all'],
    'cookie_reject_all' => ['Odrzuć wszystkie', 'Відхилити все', 'Reject all'],
    'cookie_settings' => ['Ustawienia', 'Налаштування', 'Settings'],
    'cookie_save' => ['Zapisz wybór', 'Зберегти вибір', 'Save choice'],
    'cookie_settings_link' => ['Ustawienia cookies', 'Налаштування cookies', 'Cookie settings'],
    'cookie_cat_necessary' => ['Niezbędne (zawsze aktywne)', 'Необхідні (завжди активні)', 'Necessary (always on)'],
    'cookie_cat_necessary_desc' => [
        'Zapamiętanie języka i Twoich wyborów, ochrona formularza przed spamem.',
        'Запам’ятовують мову та ваш вибір, захищають форму від спаму.',
        'Remember your language and choices, protect the form from spam.',
    ],
    'cookie_cat_media' => ['Multimedia zewnętrzne', 'Зовнішні медіа', 'External media'],
    'cookie_cat_media_desc' => [
        'Mapa Google z dojazdem do salonu. Google może zapisać własne pliki cookies.',
        'Карта Google з маршрутом до салону. Google може зберегти власні cookies.',
        'Google Map with directions. Google may set its own cookies.',
    ],
    'cookie_cat_analytics' => ['Analityczne', 'Аналітичні', 'Analytics'],
    'cookie_cat_analytics_desc' => [
        'Anonimowa statystyka odwiedzin (Google Analytics), która pomaga ulepszać stronę.',
        'Анонімна статистика відвідувань (Google Analytics), що допомагає покращувати сайт.',
        'Anonymous visit statistics (Google Analytics) that help us improve the site.',
    ],
    'cookie_cat_marketing' => ['Marketingowe', 'Маркетингові', 'Marketing'],
    'cookie_cat_marketing_desc' => [
        'Pomiar skuteczności reklam Google Ads.',
        'Вимірювання ефективності реклами Google Ads.',
        'Measuring the performance of Google Ads.',
    ],

    // ---------- Map, form, prices, reviews ----------
    'map_consent_text' => [
        'Mapa Google zostanie wczytana dopiero po Twojej zgodzie — Google może wtedy zapisać pliki cookies.',
        'Карта Google завантажиться лише після вашої згоди — тоді Google може зберегти cookies.',
        'The Google Map loads only with your consent — Google may then set cookies.',
    ],
    'map_consent_btn' => ['Pokaż mapę', 'Показати карту', 'Show map'],
    'form_rodo_info' => [
        'Administratorem danych z formularza jest {{company}}. Wykorzystamy je wyłącznie, aby odpowiedzieć na Twoją wiadomość (art. 6 ust. 1 lit. f RODO). Masz prawo dostępu do danych, ich sprostowania, usunięcia i inne prawa — szczegóły w <a href="{{privacy_url}}">Polityce prywatności</a>.',
        'Адміністратор даних із форми — {{company}}. Ми використаємо їх лише для відповіді на ваше повідомлення (ст. 6 ч. 1 п. f RODO). Ви маєте право на доступ, виправлення, видалення даних та інші права — детальніше в <a href="{{privacy_url}}">Політиці конфіденційності</a>.',
        'The controller of the form data is {{company}}. We will use it only to reply to your message (Art. 6(1)(f) GDPR). You have the right to access, rectify and erase your data, among others — see the <a href="{{privacy_url}}">Privacy policy</a>.',
        'html',
    ],
    'prices_legal_note' => [
        'Ceny w złotych (PLN) są cenami końcowymi. Cennik ma charakter informacyjny i nie stanowi oferty w rozumieniu Kodeksu cywilnego.',
        'Ціни в злотих (PLN) є кінцевими. Прайс має інформаційний характер і не є офертою за Цивільним кодексом Польщі.',
        'Prices in Polish złoty (PLN) are final prices. The price list is for information only and is not an offer under the Polish Civil Code.',
    ],
    'reviews_note' => [
        'Prezentujemy wybrane opinie. Opinie z Booksy mogą wystawić wyłącznie osoby, które zarezerwowały wizytę w tym serwisie; opinii z Google i Instagrama nie weryfikujemy. Nie publikujemy opinii zamówionych. Więcej w <a href="{{terms_url}}">Regulaminie</a>.',
        'Показуємо вибрані відгуки. Відгуки в Booksy можуть залишати лише клієнти, які записалися через цей сервіс; відгуки з Google та Instagram ми не перевіряємо. Замовних відгуків не публікуємо. Детальніше в <a href="{{terms_url}}">Регламенті</a>.',
        'We show selected reviews. Booksy reviews can only be left by people who booked through Booksy; reviews from Google and Instagram are not verified by us. We do not publish paid reviews. More in the <a href="{{terms_url}}">Terms</a>.',
        'html',
    ],
];
