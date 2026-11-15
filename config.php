<?php
// config.php
$config = [
    'db' => [
        'host' => getenv('DB_HOST') ?: 'MariaDB-11.2',
        'dbname' => getenv('DB_NAME') ?: 'salon_cms',
        'user' => getenv('DB_USER') ?: 'root',
        'password' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
        'charset' => 'utf8mb4'
    ],
    // Public site settings (SEO, analytics). Fill these in before going live.
    'site' => [
        // Main address of the site without a trailing slash, e.g. 'https://noxbeauty.pl'.
        // Used for canonical links, hreflang and sitemap. Empty = taken from the request (dev only).
        'url' => getenv('SITE_URL') ?: '',
        // Salon phone in international format, e.g. '+48 500 000 000'. Shown on the site and in Google data.
        'phone' => getenv('SITE_PHONE') ?: '+48 666 623 396', // salon phone (confirmed)
        // Google Analytics 4 measurement ID, e.g. 'G-XXXXXXXXXX'. Loaded only after cookie consent.
        'ga4_id' => getenv('GA4_ID') ?: '',
        // Google Ads conversion ID, e.g. 'AW-123456789' (optional).
        'gads_id' => getenv('GADS_ID') ?: '',
        // Verification codes (content="..." of the meta tag) from Google Search Console / Bing Webmaster Tools.
        'google_verification' => getenv('GOOGLE_VERIFICATION') ?: '',
        'bing_verification' => getenv('BING_VERIFICATION') ?: '',
    ],
    // Legal details of the business (required in Poland: UŚUDE art. 5 — name, address, e-mail;
    // Prawo przedsiębiorców art. 20 — NIP). Shown in the footer, privacy policy, cookie policy and terms.
    // Copy them exactly from CEIDG (sole trader) or KRS (company).
    'company' => [
        // Full legal name, e.g. 'Anna Kowalska NOX Beauty Space' (CEIDG) or 'NOX Beauty Sp. z o.o.' (KRS)
        'legal_name' => getenv('COMPANY_NAME') ?: '',
        // Registered address if different from the salon address (empty = salon address)
        'address' => getenv('COMPANY_ADDRESS') ?: '',
        'nip' => getenv('COMPANY_NIP') ?: '',
        'regon' => getenv('COMPANY_REGON') ?: '',
        // Only for companies registered in KRS, e.g. '0000123456'
        'krs' => getenv('COMPANY_KRS') ?: '',
        // Public contact e-mail of the salon (shown on the site; also for privacy requests)
        'email' => getenv('COMPANY_EMAIL') ?: '',
    ],
    // E-mail notifications for contact-form leads.
    // Who receives leads is set in the admin panel (Пошта); admin_email is only the fallback.
    // SMTP secrets do NOT go here — put them in config.local.php (not in git) or env vars.
    'mail' => [
        'admin_email' => getenv('MAIL_TO') ?: 'vladbilous17@gmail.com',
        'smtp_host' => getenv('SMTP_HOST') ?: 'smtp.gmail.com',
        'smtp_port' => getenv('SMTP_PORT') ?: 587,
        'smtp_secure' => getenv('SMTP_SECURE') ?: 'tls',
        'smtp_user' => getenv('SMTP_USER') ?: '',
        'smtp_pass' => getenv('SMTP_PASS') ?: '',
        'from_email' => getenv('MAIL_FROM') ?: '', // empty = smtp_user
        'from_name' => 'NOX Beauty Space — сайт',
    ]
];

// Local overrides (SMTP password etc.) — config.local.php is git-ignored.
$local = __DIR__ . '/config.local.php';
if (is_file($local)) {
    $config = array_replace_recursive($config, require $local);
}
return $config;
