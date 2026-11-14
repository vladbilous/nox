<?php
// mailer.php — e-mail notifications for contact-form leads.
// Recipients are edited in the admin panel (Пошта); SMTP credentials live in config.local.php / env vars.

require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

function nox_settings_table() {
    static $done = false;
    if (!$done) {
        DB::execute("CREATE TABLE IF NOT EXISTS settings (
            `key` VARCHAR(64) NOT NULL PRIMARY KEY,
            `value` TEXT NULL,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        $done = true;
    }
}

function nox_setting($key, $default = null) {
    nox_settings_table();
    $row = DB::fetch("SELECT `value` FROM settings WHERE `key` = ?", [$key]);
    return $row ? $row['value'] : $default;
}

function nox_set_setting($key, $value) {
    nox_settings_table();
    DB::execute("INSERT INTO settings (`key`, `value`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)", [$key, $value]);
}

function nox_mail_config() {
    $config = require __DIR__ . '/config.php';
    return $config['mail'];
}

/** Parses "a@x.com, b@y.com" (commas, semicolons, spaces, new lines) into a list of valid addresses. */
function nox_parse_emails($raw) {
    $out = [];
    foreach (preg_split('/[\s,;]+/', (string)$raw, -1, PREG_SPLIT_NO_EMPTY) as $e) {
        if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
            $out[strtolower($e)] = $e;
        }
    }
    return array_values($out);
}

/** Recipients: admin-panel setting first, config.php fallback. */
function nox_notify_emails() {
    $fromDb = nox_parse_emails(nox_setting('notify_emails', ''));
    return $fromDb ?: nox_parse_emails(nox_mail_config()['admin_email'] ?? '');
}

function nox_smtp_ready() {
    $mc = nox_mail_config();
    return !empty($mc['smtp_host']) && !empty($mc['smtp_user']) && !empty($mc['smtp_pass']);
}

/**
 * Sends an HTML e-mail to all notification recipients.
 * Returns [true, ''] on success or [false, 'reason'] on failure. Never throws.
 */
function nox_send_notification($subject, $html, $replyTo = null, $replyName = '') {
    $to = nox_notify_emails();
    if (!$to) {
        return [false, 'Не вказано e-mail для заявок.'];
    }
    if (!nox_smtp_ready()) {
        return [false, 'SMTP не налаштовано (немає логіна або пароля в config.local.php).'];
    }
    $mc = nox_mail_config();
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $mc['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $mc['smtp_user'];
        $mail->Password = $mc['smtp_pass'];
        $mail->SMTPSecure = $mc['smtp_secure'];
        $mail->Port = (int)$mc['smtp_port'];
        $mail->Timeout = 15;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($mc['from_email'] ?: $mc['smtp_user'], $mc['from_name'] ?: 'NOX Beauty Space');
        foreach ($to as $addr) {
            $mail->addAddress($addr);
        }
        if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $mail->addReplyTo($replyTo, $replyName);
        }
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html;
        $mail->AltBody = trim(html_entity_decode(strip_tags(str_replace(['<br>', '</tr>'], "\n", $html)), ENT_QUOTES, 'UTF-8'));
        $mail->send();
        return [true, ''];
    } catch (Throwable $e) {
        $reason = isset($mail) && $mail->ErrorInfo ? $mail->ErrorInfo : $e->getMessage();
        error_log('NOX mail error: ' . $reason);
        return [false, $reason];
    }
}

/** Notification about a new contact-form lead. */
function nox_send_lead(array $lead) {
    $s = fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
    $langs = ['pl' => 'Polski', 'uk' => 'Українська', 'en' => 'English'];
    $phoneHref = preg_replace('/[^\d+]/', '', $lead['phone']);
    $rows = [
        'Імʼя' => $s($lead['name']),
        'Телефон' => '<a href="tel:' . $s($phoneHref) . '">' . $s($lead['phone']) . '</a>',
        'E-mail' => '<a href="mailto:' . $s($lead['email']) . '">' . $s($lead['email']) . '</a>',
        'Мова сайту' => $s($langs[$lead['lang']] ?? $lead['lang']),
        'Повідомлення' => $lead['message'] !== '' ? nl2br($s($lead['message'])) : '<i>—</i>',
    ];
    $html = '<div style="font-family:Arial,sans-serif;font-size:15px;color:#222">'
        . '<h2 style="margin:0 0 16px;color:#9a7b2f">Нова заявка з сайту NOX Beauty Space</h2>'
        . '<table cellpadding="8" style="border-collapse:collapse">';
    foreach ($rows as $label => $value) {
        $html .= '<tr><td style="color:#777;vertical-align:top;white-space:nowrap"><b>' . $label . '</b></td><td>' . $value . '</td></tr>';
    }
    $html .= '</table><p style="color:#999;font-size:12px;margin-top:20px">Заявка також збережена в адмінці → Заявки. '
        . 'Щоб відповісти клієнту, просто натисніть «Відповісти».</p></div>';

    return nox_send_notification('Нова заявка з сайту: ' . $lead['name'], $html, $lead['email'], $lead['name']);
}
