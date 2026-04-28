-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MariaDB-11.2
-- Час створення: Квт 28 2026 р., 20:22
-- Версія сервера: 11.2.2-MariaDB
-- Версія PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `salon_cms`
--

-- --------------------------------------------------------

--
-- Структура таблиці `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('new','read','archived') DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `content_blocks`
--

CREATE TABLE `content_blocks` (
  `id` int(11) NOT NULL,
  `key_name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `content_blocks`
--

INSERT INTO `content_blocks` (`id`, `key_name`, `description`, `type`) VALUES
(1, 'hero_title', NULL, 'text'),
(2, 'hero_desc', NULL, 'html'),
(3, 'hero_button', NULL, 'text'),
(4, 'hero_small_text', NULL, 'text'),
(5, 'about_title', NULL, 'text'),
(6, 'about_text_1', NULL, 'html'),
(7, 'about_text_2', NULL, 'html'),
(8, 'about_ig_link', NULL, 'text'),
(9, 'about_socials_title', NULL, 'text'),
(10, 'reviews_title', NULL, 'text'),
(11, 'reviews_text', NULL, 'html'),
(12, 'reviews_link', NULL, 'text'),
(13, 'gallery_title', NULL, 'text'),
(14, 'gallery_text_1', NULL, 'html'),
(15, 'gallery_text_2', NULL, 'html'),
(16, 'services_title', NULL, 'text'),
(17, 'services_desc', NULL, 'html'),
(18, 'contact_title', NULL, 'text'),
(19, 'contact_desc_1', NULL, 'html'),
(20, 'contact_desc_2', NULL, 'html'),
(21, 'form_name', NULL, 'text'),
(22, 'form_email', NULL, 'text'),
(23, 'form_message', NULL, 'text'),
(24, 'form_submit', NULL, 'text'),
(25, 'rodo_consent', NULL, 'text'),
(26, 'btn_book', NULL, 'text');

-- --------------------------------------------------------

--
-- Структура таблиці `languages`
--

CREATE TABLE `languages` (
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_default` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `languages`
--

INSERT INTO `languages` (`code`, `name`, `is_default`) VALUES
('en', 'English', 0),
('pl', 'Polski', 1),
('ru', 'Русский', 0),
('uk', 'Українська', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `slug`, `name`) VALUES
(1, 'home', 'Головна сторінка');

-- --------------------------------------------------------

--
-- Структура таблиці `seo_metadata`
--

CREATE TABLE `seo_metadata` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `lang_code` varchar(5) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `seo_metadata`
--

INSERT INTO `seo_metadata` (`id`, `page_id`, `lang_code`, `title`, `description`, `og_title`, `og_description`, `og_image`) VALUES
(1, 1, 'pl', 'Salon | Manicure i Pedicure', 'Nasz salon oferuje najlepsze usługi 1...', 'Salon | Manicure i Pedicure', 'Nasz salon oferuje najlepsze usługi...', '/assets/img/og-image.jpg'),
(2, 1, 'uk', 'Салон Краси Варшава', 'Наш салон пропонує найкращі послуги...', 'Салон Краси Варшава', 'Наш салон пропонує найкращі послуги...', '/assets/img/og-image.jpg'),
(3, 1, 'en', 'Salon | Manicure i Pedicure', '', 'Salon | Manicure i Pedicure', '', '/assets/img/og-image.jpg'),
(4, 1, 'ru', 'Салон Красоты Варшава', 'Наш салон предлагает лучшие услуги...', 'Салон Красоты Варшава', 'Наш салон предлагает лучшие услуги...', '/assets/img/og-image.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name_pl` varchar(255) DEFAULT NULL,
  `name_uk` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `service_categories`
--

INSERT INTO `service_categories` (`id`, `slug`, `name_pl`, `name_uk`, `name_en`, `name_ru`, `sort_order`) VALUES
(7, 'nails', 'Paznokcie', 'Нігті', 'Nails', 'Ногти', 10),
(8, 'visage', 'Wizaż', 'Візаж', 'Visage', 'Визаж', 20),
(9, 'eyelashes', 'Rzęsy', 'Вії', 'Eyelashes', 'Ресницы', 30),
(10, 'massage', 'Masaż', 'Масаж', 'Massage', 'Массаж', 40),
(11, 'hair', 'Włosy', 'Волосся', 'Hair', 'Волосы', 50);

-- --------------------------------------------------------

--
-- Структура таблиці `service_items`
--

CREATE TABLE `service_items` (
  `id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `name_pl` varchar(255) DEFAULT NULL,
  `name_uk` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `price_pl` varchar(255) DEFAULT NULL,
  `price_uk` varchar(255) DEFAULT NULL,
  `price_en` varchar(255) DEFAULT NULL,
  `price_ru` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `service_items`
--

INSERT INTO `service_items` (`id`, `subcategory_id`, `name_pl`, `name_uk`, `name_en`, `name_ru`, `price_pl`, `price_uk`, `price_en`, `price_ru`, `sort_order`) VALUES
(26, 10, 'Manicure klasyczny', 'Класичний манікюр', 'Classic manicure', 'Классический маникюр', '80 zł', '80 zł', '80 zł', '80 zł', 10),
(27, 10, 'Manicure męski', 'Чоловічий манікюр', 'Men\'s manicure', 'Мужской маникюр', '100 zł', '100 zł', '100 zł', '100 zł', 20),
(28, 10, 'Manicure hybrydowy', 'Покриття гель-лаком', 'Hybrid manicure', 'Покрытие гель-лаком', '140 zł', '140 zł', '140 zł', '140 zł', 30),
(29, 11, 'Krótkie', 'Короткі', 'Short', 'Короткие', '200 zł', '200 zł', '200 zł', '200 zł', 10),
(30, 11, 'Średnie', 'Середні', 'Medium', 'Средние', '220 zł', '220 zł', '220 zł', '220 zł', 20),
(31, 11, 'Długie', 'Довгі', 'Long', 'Длинные', '250 zł', '250 zł', '250 zł', '250 zł', 30),
(32, 12, 'Regulacja brwi', 'Корекція форми', 'Brow shaping', 'Коррекция формы', '50 zł', '50 zł', '50 zł', '50 zł', 10),
(33, 12, 'Farbowanie', 'Фарбування', 'Tinting', 'Окрашивание', '60 zł', '60 zł', '60 zł', '60 zł', 20),
(34, 12, 'Laminowanie', 'Ламінування', 'Lamination', 'Ламинирование', '100 zł', '100 zł', '100 zł', '100 zł', 30),
(35, 13, 'Makijaż dzienny', 'Денний макіяж', 'Day makeup', 'Дневной макияж', '170 zł', '170 zł', '170 zł', '170 zł', 10),
(36, 13, 'Makijaż wieczorowy', 'Вечірній макіяж', 'Evening makeup', 'Вечерний макияж', '220 zł', '220 zł', '220 zł', '220 zł', 20),
(37, 14, 'Farbowanie', 'Фарбування', 'Tinting', 'Окрашивание', '50 zł', '50 zł', '50 zł', '50 zł', 10),
(38, 14, 'Laminowanie', 'Ламінування', 'Lamination', 'Ламинирование', '150 zł', '150 zł', '150 zł', '150 zł', 20),
(39, 14, 'Przedłużanie 1:1', 'Нарощування 1:1', 'Extensions 1:1', 'Наращивание 1:1', '170 zł', '170 zł', '170 zł', '170 zł', 30),
(40, 14, 'Przedłużanie 2:1', 'Нарощування 2:1', 'Extensions 2:1', 'Наращивание 2:1', '180 zł', '180 zł', '180 zł', '180 zł', 40),
(41, 15, '1 godzina', '1 година', '1 hour', '1 час', '180 zł', '180 zł', '180 zł', '180 zł', 10),
(42, 15, '1.5 godziny', '1.5 години', '1.5 hours', '1.5 часа', '250 zł', '250 zł', '250 zł', '250 zł', 20),
(43, 16, '1 godzina', '1 година', '1 hour', '1 час', '220 zł', '220 zł', '220 zł', '220 zł', 10),
(44, 16, '1.5 godziny', '1.5 години', '1.5 hours', '1.5 часа', '290 zł', '290 zł', '290 zł', '290 zł', 20),
(45, 17, 'Strzyżenie damskie', 'Стрижка жіноча', 'Women\'s haircut', 'Стрижка женская', '150 zł', '150 zł', '150 zł', '150 zł', 10),
(46, 17, 'Modelowanie', 'Укладка', 'Styling', 'Укладка', '90 zł', '90 zł', '90 zł', '90 zł', 20),
(47, 17, 'Loki', 'Локони', 'Curls', 'Локоны', '140 zł', '140 zł', '140 zł', '140 zł', 30),
(48, 18, 'Farbowanie odrostów', 'Фарбування коренів', 'Root touch-up', 'Окрашивание корней', '250 zł', '250 zł', '250 zł', '250 zł', 10),
(49, 18, 'Tonowanie', 'Тонування', 'Toning', 'Тонирование', '260 zł', '260 zł', '260 zł', '260 zł', 20),
(50, 18, 'Airtouch', 'Airtouch', 'Airtouch', 'Airtouch', '800 zł', '800 zł', '800 zł', '800 zł', 30),
(51, 10, 'тест пл', 'тест ук', 'тест ет', ' тест ру', 'тест ціна зл', 'тест ціна ук', 'тест ціна ен', 'тест ціна гу', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `service_subcategories`
--

CREATE TABLE `service_subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_pl` varchar(255) DEFAULT NULL,
  `name_uk` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `service_subcategories`
--

INSERT INTO `service_subcategories` (`id`, `category_id`, `name_pl`, `name_uk`, `name_en`, `name_ru`, `sort_order`) VALUES
(10, 7, 'Manicure', 'Манікюр', 'Manicure', 'Маникюр', 10),
(11, 7, 'Przedłużanie paznokci', 'Нарощування нігтів', 'Nail extensions', 'Наращивание ногтей', 20),
(12, 8, 'Brwi', 'Брови', 'Brows', 'Брови', 10),
(13, 8, 'Makijaż', 'Макіяж', 'Makeup', 'Макияж', 20),
(14, 9, 'Rzęsy', 'Вії', 'Eyelashes', 'Ресницы', 10),
(15, 10, 'Masaż klasyczny', 'Класичний масаж', 'Classic massage', 'Классический массаж', 10),
(16, 10, 'Masaż sportowy', 'Спортивний масаж', 'Sports massage', 'Спортивный массаж', 20),
(17, 11, 'Stylizacja i Strzyżenie', 'Укладка та Стрижка', 'Styling and Haircut', 'Укладка и Стрижка', 10),
(18, 11, 'Farbowanie', 'Фарбування', 'Coloring', 'Окрашивание', 20);

-- --------------------------------------------------------

--
-- Структура таблиці `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `slider_type` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `slider_images`
--

INSERT INTO `slider_images` (`id`, `slider_type`, `image_path`, `sort_order`) VALUES
(27, 'hero', '/assets/img/slider-image-01.BLjGY7Tt_1ggL5J.webp', 0),
(28, 'hero', '/assets/img/slider-image-02.B6QS6ABQ_NaqWT.webp', 10),
(29, 'hero', '/assets/img/slider-image-03.uxZQsQSE_Z1f55u.webp', 20),
(30, 'hero', '/assets/img/slider-image-04.DIgV1dWw_1CSoJW.webp', 30),
(31, 'hero', '/assets/img/slider-image-05.DK2cK-Is_1Tm2o4.webp', 40),
(32, 'hero', '/assets/img/slider-image-06.BHFJqsXQ_2ggQVj.webp', 50),
(33, 'hero', '/assets/img/slider-image-07.CI7nJox7_ZH3xHp.webp', 60),
(34, 'hero', '/assets/img/slider-image-08.r1yclwGx_ZKRrAg.webp', 70),
(35, 'hero', '/assets/img/slider-image-09.B6vK9DYb_ZWa1pX.webp', 80),
(36, 'hero', '/assets/img/slider-image-10.CCWLUVQQ_ZB6MGz.webp', 90),
(37, 'hero', '/assets/img/slider-image-11.BCUSUzih_ZMSBoh.webp', 100),
(38, 'hero', '/assets/img/slider-image-12.D91Ql-NB_2d7X3R.webp', 110),
(39, 'gallery', '/assets/img/example-1.BWNU52GE_Z1qlEN2.webp', 0),
(40, 'gallery', '/assets/img/example-2.DQc_ouVF_1FGO0o.webp', 10),
(41, 'gallery', '/assets/img/example-3.BseZE_hV_O3FO8.webp', 20),
(42, 'gallery', '/assets/img/example-10.B65sMmJg_ZXRNiA.webp', 30),
(43, 'gallery', '/assets/img/example-11.CAxC705y_2d68Gd.webp', 40),
(44, 'gallery', '/assets/img/example-27.BV35obP6_Zls9eL.webp', 50),
(45, 'gallery', '/assets/img/example-28.DYgT3cm6_2iHFrH.webp', 60),
(46, 'gallery', '/assets/img/example-29.BuB576S__Z1o1uzo.webp', 70),
(47, 'gallery', '/assets/img/example-30.CjA5y-N9_NqyYH.webp', 80),
(48, 'gallery', '/assets/img/example-31.TdQY_Cei_2pFcXm.webp', 90),
(49, 'gallery', '/assets/img/example-32.B1zUkhor_1PFp0q.webp', 100);

-- --------------------------------------------------------

--
-- Структура таблиці `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `lang_code` varchar(5) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `translations`
--

INSERT INTO `translations` (`id`, `block_id`, `lang_code`, `value`) VALUES
(1, 1, 'uk', 'У Salon ми втілюємо не лише мрії, а й стильні фантазії!'),
(2, 2, 'uk', 'Професійний манікюр і педикюр, гібридний манікюр, моделювання нігтів та догляд за бровами у Варшаві - все, щоб ви почувалися впевнено та особливо. Наші фахівці подбають про кожну деталь, а ви можете просто... бути собою.'),
(3, 3, 'uk', 'Забронювати час'),
(4, 4, 'uk', 'Salon - краса починається саме тут. Запишіться на прийом сьогодні!'),
(5, 5, 'uk', 'Трохи про нас'),
(6, 6, 'uk', 'Наша студія — це більше, ніж просто місце для косметичних послуг у Варшаві. Це простір, де мистецтво зустрічається з пристрастю. Ми створюємо манікюр, дизайн нігтів і педикюр, а також дбаємо про брови та повний beauty-образ. Наші досвідчені професіонали використовують високоякісні продукти та сучасні інновації у сфері краси.'),
(7, 7, 'uk', 'Залишайтеся на зв&#39;язку з нами в соціальних мережах! Слідкуйте за нами, щоб отримувати останні оновлення, спеціальні пропозиції та натхнення. Дізнайтеся про закулісні моменти та подивіться, чому наші клієнти нас люблять. Приєднуйтесь до нашої зростаючої спільноти сьогодні!'),
(8, 8, 'uk', 'Підпишіться на наш Instagram'),
(9, 9, 'uk', 'Інші наші соціальні мережі:'),
(10, 10, 'uk', 'Щось пішло не за планом? Ми все виправимо!'),
(11, 11, 'uk', 'У нашому салоні ваше задоволення є нашим головним пріоритетом. Наші кваліфіковані фахівці використовують лише преміальні продукти та дотримуються найвищих стандартів, щоб щоразу забезпечувати виняткові результати.'),
(12, 12, 'uk', 'Перегляньте наші останні відгуки'),
(13, 13, 'uk', 'Галерея наших робіт'),
(14, 14, 'uk', 'Від тонких вдосконалень до сміливих фірмових образів, наше портфоліо демонструє широту нашого ремесла: дбайливий стиль, майстерність кольору та всебічний догляд за зовнішністю, який підкреслює унікальну красу та впевненість кожного клієнта.'),
(15, 15, 'uk', 'Хочете більше? <a class=\"text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline\" href=\"https://www.instagram.com/Salon.warsaw\" target=\"_blank\" rel=\"noopener\"><span>Перегляньте наш Instagram</span></a>, щоб побачити останні оновлення, прев’ю та трансформації клієнтів.'),
(16, 16, 'uk', 'Прайс-лист послуг'),
(17, 17, 'uk', 'Відкрийте всі наші послуги: нігті, класичний і гібридний манікюр, педикюр, стилізація брів та інші beauty-процедури у Варшаві. Інтерактивні картки категорій дозволяють фільтрувати перегляд та зосередитись на тому, що вас цікавить.'),
(18, 26, 'uk', 'Записатись'),
(19, 18, 'uk', 'Зв&#39;яжіться з Нами Легко всього за Два Кроки'),
(20, 19, 'uk', 'Маєте запитання або хочете зв&#39;язатися? Наша проста форма полегшує зв&#39;язок з нами. Просто заповніть деталі, а ми подбаємо про решту!'),
(21, 20, 'uk', 'Хочете швидшої відповіді? Напишіть нам у <a href=\"https://ig.me/m/Salon.warsaw\" target=\"_blank\" rel=\"noopener\" class=\"hover:text-cove-600 font-medium underline transition-[color] duration-200\">Instagram Direct</a> і ми швидко вам відповімо!'),
(22, 21, 'uk', 'Введіть ваше імʼя'),
(23, 22, 'uk', 'Введіть вашу пошту'),
(24, 23, 'uk', 'Введіть ваше повідомлення'),
(25, 25, 'uk', 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celu kontaktu zgodnie z polityką prywatności.'),
(26, 24, 'uk', 'Надіслати'),
(27, 8, 'en', 'Subscribe to our Instagram'),
(28, 9, 'en', 'Our other social networks:'),
(29, 6, 'en', 'Our studio is more than just a place for beauty services in Warsaw. It\'s a space where art meets passion. We create manicures, nail designs, and pedicures, and also take care of your eyebrows and complete beauty look. Our experienced professionals use high-quality products and modern innovations in the beauty industry.'),
(30, 7, 'en', 'Stay in touch with us on social media! Follow us to get the latest updates, special offers, and inspiration. Learn about behind-the-scenes moments and see why our clients love us. Join our growing community today!'),
(31, 5, 'en', 'A little about us'),
(32, 26, 'en', 'Book Now'),
(33, 19, 'en', 'Have questions or want to get in touch? Our simple form makes contacting us easy. Just fill in the details, and we\'ll take care of the rest!'),
(34, 20, 'en', 'Want a faster response? Write to us on <a href=\"https://ig.me/m/Salon.warsaw\" target=\"_blank\" rel=\"noopener\" class=\"hover:text-cove-600 font-medium underline transition-[color] duration-200\">Instagram Direct</a> and we will reply quickly!'),
(35, 18, 'en', 'Contact Us Easily in Just Two Steps'),
(36, 22, 'en', ''),
(37, 23, 'en', ''),
(38, 21, 'en', 'Enter your name'),
(39, 24, 'en', 'Submit'),
(40, 14, 'en', 'From subtle enhancements to bold signature looks, our portfolio showcases the breadth of our craft: careful styling, color mastery, and comprehensive appearance care that emphasizes the unique beauty and confidence of every client.'),
(41, 15, 'en', 'Want more? <a class=\"text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline\" href=\"https://www.instagram.com/Salon.warsaw\" target=\"_blank\" rel=\"noopener\"><span>Check out our Instagram</span></a> to see the latest updates, sneak peeks, and client transformations.'),
(42, 13, 'en', 'Gallery of our works'),
(43, 3, 'en', 'Book an appointment'),
(44, 2, 'en', 'Professional manicure and pedicure, hybrid manicure, nail styling, and eyebrow care in Warsaw - everything to make you feel confident and special. Our experts will take care of every detail, while you can just... be yourself.'),
(45, 4, 'en', 'Salon - beauty begins right here. Book your appointment today!'),
(46, 1, 'en', 'At Salon, we make not only dreams come true, but also stylish fantasies!'),
(47, 12, 'en', 'Check out our latest reviews'),
(48, 11, 'en', 'At our salon, your satisfaction is our top priority. Our qualified specialists use only premium products and adhere to the highest standards to ensure exceptional results every time.'),
(49, 10, 'en', 'Did something not go as planned? We will fix everything!'),
(50, 25, 'en', 'I consent to the processing of my personal data for contact purposes in accordance with the privacy policy.'),
(51, 17, 'en', 'Discover all our services: nails, classic and hybrid manicure, pedicure, eyebrow styling, and other beauty treatments in Warsaw. Interactive category cards allow you to filter the view and focus on what interests you.'),
(52, 16, 'en', 'Services Price List'),
(53, 1, 'pl', 'W Salon spełniamy nie tylko marzenia, ale i stylowe fantazje!'),
(54, 1, 'ru', 'В Salon мы воплощаем не только мечты, но и стильные фантазии!'),
(55, 2, 'pl', 'Profesjonalny manicure i pedicure, manicure hybrydowy, stylizacja paznokci i pielęgnacja brwi w Warszawie - wszystko, abyś czuła się pewnie i wyjątkowo. Nasi specjaliści zadbają o każdy szczegół, a Ty możesz po prostu... być sobą.'),
(56, 2, 'ru', 'Профессиональный маникюр и педикюр, гибридный маникюр, моделирование ногтей и уход за бровями в Варшаве - все, чтобы вы чувствовали себя уверенно и по-особенному. Наши специалисты позаботятся о каждой детали, а вы можете просто... быть собой.'),
(57, 3, 'pl', 'Zarezerwuj wizytę'),
(58, 3, 'ru', 'Забронировать время'),
(59, 4, 'pl', 'Salon - piękno zaczyna się właśnie tutaj. Zarezerwuj wizytę już dziś!'),
(60, 4, 'ru', 'Salon - красота начинается именно здесь. Запишитесь на прием сегодня!'),
(61, 5, 'pl', 'Trochę o nas'),
(62, 5, 'ru', 'Немного о нас'),
(63, 6, 'pl', 'Nasze studio to więcej niż tylko miejsce na usługi kosmetyczne w Warszawie. To przestrzeń, w której sztuka spotyka się z pasją. Tworzymy manicure, stylizację paznokci i pedicure, a także dbamy o brwi i kompletny wizerunek beauty. Nasi doświadczeni profesjonaliści korzystają z wysokiej jakości produktów i nowoczesnych innowacji w branży beauty.'),
(64, 6, 'ru', 'Наша студия — это больше, чем просто место для косметических услуг в Варшаве. Это пространство, где искусство встречается со страстью. Мы создаем маникюр, дизайн ногтей и педикюр, а также заботимся о бровях и полном beauty-образе. Наши опытные профессионалы используют высококачественные продукты и современные инновации в сфере красоты.'),
(65, 7, 'pl', 'Bądź z nami w kontakcie w mediach społecznościowych! Śledź nas, aby otrzymywać najnowsze informacje, specjalne oferty i inspiracje. Poznaj kulisy naszej pracy i zobacz, dlaczego nasi klienci nas kochają. Dołącz do naszej rosnącej społeczności już dziś!'),
(66, 7, 'ru', 'Оставайтесь на связи с нами в социальных сетях! Следите за нами, чтобы получать последние обновления, специальные предложения и вдохновение. Узнайте о закулисных моментах и посмотрите, почему наши клиенты нас любят. Присоединяйтесь к нашему растущему сообществу сегодня!'),
(67, 8, 'pl', 'Zasubskrybuj nasz Instagram'),
(68, 8, 'ru', 'Подпишитесь на наш Instagram'),
(69, 9, 'pl', 'Nasze inne sieci społecznościowe:'),
(70, 9, 'ru', 'Наши другие социальные сети:'),
(71, 10, 'pl', 'Coś poszło nie tak? Naprawimy wszystko!'),
(72, 10, 'ru', 'Что-то пошло не по плану? Мы все исправим!'),
(73, 11, 'pl', 'W naszym salonie Twoje zadowolenie jest dla nas najwyższym priorytetem. Nasi wykwalifikowani specjaliści używają wyłącznie produktów premium i przestrzegają najwyższych standardów, aby za każdym razem zapewnić wyjątkowe rezultaty.'),
(74, 11, 'ru', 'В нашем салоне ваше удовлетворение является нашим главным приоритетом. Наши квалифицированные специалисты используют только премиальные продукты и придерживаются самых высоких стандартов, чтобы каждый раз обеспечивать исключительные результаты.'),
(75, 12, 'pl', 'Sprawdź nasze najnowsze opinie'),
(76, 12, 'ru', 'Посмотрите наши последние отзывы'),
(77, 13, 'pl', 'Galeria naszych prac'),
(78, 13, 'ru', 'Галерея наших работ'),
(79, 14, 'pl', 'Od subtelnych ulepszeń po odważne, autorskie looki – nasze portfolio ukazuje wszechstronność naszego rzemiosła: staranną stylizację, mistrzostwo w doborze kolorów oraz kompleksową pielęgnację wyglądu, która podkreśla wyjątkowe piękno i pewność siebie każdego klienta.'),
(80, 14, 'ru', 'От тонких улучшений до смелых фирменных образов, наше портфолио демонстрирует широту нашего ремесла: бережный стиль, мастерство цвета и всесторонний уход за внешностью, который подчеркивает уникальную красоту и уверенность каждого клиента.'),
(81, 15, 'pl', 'Chcesz więcej? <a class=\"text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline\" href=\"https://www.instagram.com/Salon.warsaw\" target=\"_blank\" rel=\"noopener\"><span>Sprawdź nasz Instagram</span></a>, aby zobaczyć najnowsze aktualizacje, zapowiedzi i metamorfozy klientów.'),
(82, 15, 'ru', 'Хотите больше? <a class=\"text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline\" href=\"https://www.instagram.com/Salon.warsaw\" target=\"_blank\" rel=\"noopener\"><span>Посмотрите наш Instagram</span></a>, чтобы увидеть последние обновления, превью и трансформации клиентов.'),
(83, 16, 'pl', 'Cennik usług'),
(84, 16, 'ru', 'Прайс-лист услуг'),
(85, 17, 'pl', 'Odkryj wszystkie nasze usługi: paznokcie, klasyczny i hybrydowy manicure, pedicure, stylizacja brwi oraz inne zabiegi beauty w Warszawie. Interaktywne karty kategorii pozwalają na filtrowanie widoku i skupienie się na tym, co Cię interesuje.'),
(86, 17, 'ru', 'Откройте все наши услуги: ногти, классический и гибридный маникюр, педикюр, стилизация бровей и другие beauty-процедуры в Варшаве. Интерактивные карточки категорий позволяют фильтровать просмотр и сосредоточиться на том, что вас интересует.'),
(87, 26, 'pl', 'Zapisz się'),
(88, 26, 'ru', 'Записаться'),
(89, 18, 'pl', 'Skontaktuj się z nami łatwo w zaledwie dwa kroki'),
(90, 18, 'ru', 'Свяжитесь с нами легко всего за два шага'),
(91, 19, 'pl', 'Masz pytania lub chcesz się z nami skontaktować? Nasz prosty formularz ułatwia kontakt z nami. Wystarczy wypełnić dane, a my zajmiemy się resztą!'),
(92, 19, 'ru', 'У вас есть вопросы или хотите связаться с нами? Наша простая форма облегчает связь с нами. Просто заполните данные, а мы позаботимся об остальном!'),
(93, 20, 'pl', 'Chcesz szybszej odpowiedzi? Napisz do nas na <a href=\"https://ig.me/m/Salon.warsaw\" target=\"_blank\" rel=\"noopener\" class=\"hover:text-cove-600 font-medium underline transition-[color] duration-200\">Instagram Direct</a>, a my szybko odpowiemy!'),
(94, 20, 'ru', 'Хотите более быстрого ответа? Напишите нам в <a href=\"https://ig.me/m/Salon.warsaw\" target=\"_blank\" rel=\"noopener\" class=\"hover:text-cove-600 font-medium underline transition-[color] duration-200\">Instagram Direct</a> и мы быстро вам ответим!'),
(95, 21, 'pl', 'Wpisz swoje imię'),
(96, 21, 'ru', 'Введите ваше имя'),
(97, 25, 'pl', 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celu kontaktu zgodnie z polityką prywatności.'),
(98, 25, 'ru', 'Я соглашаюсь на обработку моих персональных данных с целью обратной связи согласно политике конфиденциальности.'),
(99, 24, 'pl', 'Wyślij'),
(100, 24, 'ru', 'Отправить');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$eb0PPozs1ninn5sY/vljYO6VQIC0cGXHa5uisq6YAfvFBQ7ztTI2S');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `content_blocks`
--
ALTER TABLE `content_blocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_name` (`key_name`);

--
-- Індекси таблиці `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`code`);

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Індекси таблиці `seo_metadata`
--
ALTER TABLE `seo_metadata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_id` (`page_id`,`lang_code`),
  ADD KEY `lang_code` (`lang_code`);

--
-- Індекси таблиці `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Індекси таблиці `service_subcategories`
--
ALTER TABLE `service_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `block_id` (`block_id`,`lang_code`),
  ADD KEY `lang_code` (`lang_code`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `content_blocks`
--
ALTER TABLE `content_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `seo_metadata`
--
ALTER TABLE `seo_metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблиці `service_subcategories`
--
ALTER TABLE `service_subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблиці `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблиці `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `seo_metadata`
--
ALTER TABLE `seo_metadata`
  ADD CONSTRAINT `seo_metadata_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seo_metadata_ibfk_2` FOREIGN KEY (`lang_code`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `service_subcategories` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `service_subcategories`
--
ALTER TABLE `service_subcategories`
  ADD CONSTRAINT `service_subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `translations_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `content_blocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `translations_ibfk_2` FOREIGN KEY (`lang_code`) REFERENCES `languages` (`code`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
