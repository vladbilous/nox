<?php
require __DIR__ . '/../DB.php';

// 1. Create tables
DB::execute("CREATE TABLE IF NOT EXISTS service_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(255) NOT NULL,
    name_pl VARCHAR(255),
    name_uk VARCHAR(255),
    name_en VARCHAR(255),
    sort_order INT DEFAULT 0
)");

DB::execute("CREATE TABLE IF NOT EXISTS service_subcategories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name_pl VARCHAR(255),
    name_uk VARCHAR(255),
    name_en VARCHAR(255),
    sort_order INT DEFAULT 0,
    FOREIGN KEY(category_id) REFERENCES service_categories(id) ON DELETE CASCADE
)");

DB::execute("CREATE TABLE IF NOT EXISTS service_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subcategory_id INT,
    name_pl VARCHAR(255),
    name_uk VARCHAR(255),
    name_en VARCHAR(255),
    price_pl VARCHAR(255),
    price_uk VARCHAR(255),
    price_en VARCHAR(255),
    sort_order INT DEFAULT 0,
    FOREIGN KEY(subcategory_id) REFERENCES service_subcategories(id) ON DELETE CASCADE
)");

// Clear previous if any
DB::execute("DELETE FROM service_items");
DB::execute("DELETE FROM service_subcategories");
DB::execute("DELETE FROM service_categories");

// 2. Insert data
function createCat($slug, $pl, $uk, $en, $order) {
    DB::execute("INSERT INTO service_categories (slug, name_pl, name_uk, name_en, sort_order) VALUES (?, ?, ?, ?, ?)", [$slug, $pl, $uk, $en, $order]);
    return DB::getConnection()->lastInsertId();
}

function createSubcat($cat_id, $pl, $uk, $en, $order) {
    DB::execute("INSERT INTO service_subcategories (category_id, name_pl, name_uk, name_en, sort_order) VALUES (?, ?, ?, ?, ?)", [$cat_id, $pl, $uk, $en, $order]);
    return DB::getConnection()->lastInsertId();
}

function createItem($subcat_id, $pl, $uk, $en, $price, $order) {
    DB::execute("INSERT INTO service_items (subcategory_id, name_pl, name_uk, name_en, price_pl, price_uk, price_en, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$subcat_id, $pl, $uk, $en, $price, $price, $price, $order]);
}

// category nails
$cNails = createCat('nails', 'Paznokcie', 'Нігті', 'Nails', 10);
$sNails1 = createSubcat($cNails, 'Manicure', 'Манікюр', 'Manicure', 10);
createItem($sNails1, 'Manicure klasyczny', 'Класичний манікюр', 'Classic manicure', '80 zł', 10);
createItem($sNails1, 'Manicure męski', 'Чоловічий манікюр', 'Men\'s manicure', '100 zł', 20);
createItem($sNails1, 'Manicure hybrydowy', 'Покриття гель-лаком', 'Hybrid manicure', '140 zł', 30);
$sNails2 = createSubcat($cNails, 'Przedłużanie paznokci', 'Нарощування нігтів', 'Nail extensions', 20);
createItem($sNails2, 'Krótkie', 'Короткі', 'Short', '200 zł', 10);
createItem($sNails2, 'Średnie', 'Середні', 'Medium', '220 zł', 20);
createItem($sNails2, 'Długie', 'Довгі', 'Long', '250 zł', 30);

// category visage
$cVisage = createCat('visage', 'Wizaż', 'Візаж', 'Visage', 20);
$sVisage1 = createSubcat($cVisage, 'Brwi', 'Брови', 'Brows', 10);
createItem($sVisage1, 'Regulacja brwi', 'Корекція форми', 'Brow shaping', '50 zł', 10);
createItem($sVisage1, 'Farbowanie', 'Фарбування', 'Tinting', '60 zł', 20);
createItem($sVisage1, 'Laminowanie', 'Ламінування', 'Lamination', '100 zł', 30);
$sVisage2 = createSubcat($cVisage, 'Makijaż', 'Макіяж', 'Makeup', 20);
createItem($sVisage2, 'Makijaż dzienny', 'Денний макіяж', 'Day makeup', '170 zł', 10);
createItem($sVisage2, 'Makijaż wieczorowy', 'Вечірній макіяж', 'Evening makeup', '220 zł', 20);

// category eyelashes
$cEyelashes = createCat('eyelashes', 'Rzęsy', 'Вії', 'Eyelashes', 30);
$sEyelashes1 = createSubcat($cEyelashes, 'Rzęsy', 'Вії', 'Eyelashes', 10);
createItem($sEyelashes1, 'Farbowanie', 'Фарбування', 'Tinting', '50 zł', 10);
createItem($sEyelashes1, 'Laminowanie', 'Ламінування', 'Lamination', '150 zł', 20);
createItem($sEyelashes1, 'Przedłużanie 1:1', 'Нарощування 1:1', 'Extensions 1:1', '170 zł', 30);
createItem($sEyelashes1, 'Przedłużanie 2:1', 'Нарощування 2:1', 'Extensions 2:1', '180 zł', 40);

// category massage
$cMassage = createCat('massage', 'Masaż', 'Масаж', 'Massage', 40);
$sMassage1 = createSubcat($cMassage, 'Masaż klasyczny', 'Класичний масаж', 'Classic massage', 10);
createItem($sMassage1, '1 godzina', '1 година', '1 hour', '180 zł', 10);
createItem($sMassage1, '1.5 godziny', '1.5 години', '1.5 hours', '250 zł', 20);
$sMassage2 = createSubcat($cMassage, 'Masaż sportowy', 'Спортивний масаж', 'Sports massage', 20);
createItem($sMassage2, '1 godzina', '1 година', '1 hour', '220 zł', 10);
createItem($sMassage2, '1.5 godziny', '1.5 години', '1.5 hours', '290 zł', 20);

// category hair
$cHair = createCat('hair', 'Włosy', 'Волосся', 'Hair', 50);
$sHair1 = createSubcat($cHair, 'Stylizacja i Strzyżenie', 'Укладка та Стрижка', 'Styling and Haircut', 10);
createItem($sHair1, 'Strzyżenie damskie', 'Стрижка жіноча', 'Women\'s haircut', '150 zł', 10);
createItem($sHair1, 'Modelowanie', 'Укладка', 'Styling', '90 zł', 20);
createItem($sHair1, 'Loki', 'Локони', 'Curls', '140 zł', 30);
$sHair2 = createSubcat($cHair, 'Farbowanie', 'Фарбування', 'Coloring', 20);
createItem($sHair2, 'Farbowanie odrostów', 'Фарбування коренів', 'Root touch-up', '250 zł', 10);
createItem($sHair2, 'Tonowanie', 'Тонування', 'Toning', '260 zł', 20);
createItem($sHair2, 'Airtouch', 'Airtouch', 'Airtouch', '800 zł', 30);

// 3. Populate content_blocks
$blocks = [
    ['hero_title', 'text'],
    ['hero_desc', 'html'],
    ['hero_button', 'text'],
    ['hero_small_text', 'text'],
    ['about_title', 'text'],
    ['about_text_1', 'html'],
    ['about_text_2', 'html'],
    ['about_ig_link', 'text'],
    ['about_socials_title', 'text'],
    ['reviews_title', 'text'],
    ['reviews_text', 'html'],
    ['reviews_link', 'text'],
    ['gallery_title', 'text'],
    ['gallery_text_1', 'html'],
    ['gallery_text_2', 'html'],
    ['services_title', 'text'],
    ['services_desc', 'html'],
    ['contact_title', 'text'],
    ['contact_desc_1', 'html'],
    ['contact_desc_2', 'html'],
    ['form_name', 'text'],
    ['form_email', 'text'],
    ['form_message', 'text'],
    ['form_submit', 'text'],
    ['rodo_consent', 'text'],
    ['btn_book', 'text']
];

try {
    DB::execute("ALTER TABLE content_blocks ADD COLUMN type VARCHAR(50) DEFAULT 'text'");
} catch (Exception $e) {} // ignore if already exists

foreach ($blocks as $b) {
    $exists = DB::fetch("SELECT id FROM content_blocks WHERE key_name = ?", [$b[0]]);
    if (!$exists) {
        DB::execute("INSERT INTO content_blocks (key_name, type) VALUES (?, ?)", [$b[0], $b[1]]);
    }
}

echo "Migration successful.";
