<?php
// config.php
return [
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
    'mail' => [
        'admin_email' => 'vladbilous17@gmail.com',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_user' => 'vladbilous17@gmail.com',
        'smtp_pass' => 'your_app_password', // to be filled by user
        'smtp_secure' => 'tls',
    ]
];
