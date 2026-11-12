<?php
// send_form.php — contact form endpoint: validates, stores the lead in DB, notifies by e-mail.
session_start();
header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/DB.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$lang = in_array($_POST['lang'] ?? '', ['pl', 'uk', 'en']) ? $_POST['lang'] : 'pl';

$messages = [
    'wait' => [
        'pl' => 'Odczekaj 30 sekund przed kolejną wiadomością.',
        'uk' => 'Зачекайте 30 секунд перед наступним повідомленням.',
        'en' => 'Please wait 30 seconds before sending another message.',
    ],
    'required' => [
        'pl' => 'Uzupełnij wymagane pola i zaznacz zgodę RODO.',
        'uk' => 'Заповніть обов’язкові поля та погодьтеся з RODO.',
        'en' => 'Please fill in the required fields and accept the GDPR consent.',
    ],
    'email' => [
        'pl' => 'Nieprawidłowy adres e-mail.',
        'uk' => 'Невірний формат e-mail.',
        'en' => 'Invalid email address.',
    ],
    'success' => [
        'pl' => 'Dziękujemy! Odpowiemy najszybciej, jak to możliwe.',
        'uk' => 'Дякуємо! Ми відповімо якнайшвидше.',
        'en' => 'Thank you! We will get back to you shortly.',
    ],
    'error' => [
        'pl' => 'Nie udało się wysłać wiadomości. Napisz do nas na Instagramie.',
        'uk' => 'Не вдалося надіслати повідомлення. Напишіть нам в Instagram.',
        'en' => 'We could not send your message. Please message us on Instagram.',
    ],
];

function respond($success, $message) {
    echo json_encode(['success' => $success, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request');
}

// Honeypot: pretend success for bots
if (!empty($_POST['website_url_hp'])) {
    respond(true, $messages['success'][$lang]);
}

// Simple session-based rate limit
if (time() - ($_SESSION['last_submit'] ?? 0) < 30) {
    respond(false, $messages['wait'][$lang]);
}

$name = mb_substr(strip_tags(trim($_POST['userName'] ?? '')), 0, 100);
$phone = mb_substr(strip_tags(trim($_POST['userPhone'] ?? '')), 0, 30);
$email = mb_substr(trim($_POST['userEmail'] ?? ''), 0, 100);
$message = mb_substr(strip_tags(trim($_POST['userMessage'] ?? '')), 0, 2000);
$rodo = !empty($_POST['rodo_consent']);

if ($name === '' || $phone === '' || $email === '' || !$rodo) {
    respond(false, $messages['required'][$lang]);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, $messages['email'][$lang]);
}

// 1) Store the lead — it is visible in the admin panel even if e-mail delivery fails
try {
    DB::execute("INSERT INTO contacts (name, phone, email, message) VALUES (?, ?, ?, ?)", [$name, $phone, $email, $message]);
} catch (Throwable $e) {
    error_log('Contact form DB error: ' . $e->getMessage());
    respond(false, $messages['error'][$lang]);
}
$_SESSION['last_submit'] = time();

// 2) Notify by e-mail (skipped while SMTP is not configured)
$config = require __DIR__ . '/config.php';
$mc = $config['mail'];
if (!empty($mc['smtp_pass']) && $mc['smtp_pass'] !== 'your_app_password') {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $mc['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $mc['smtp_user'];
        $mail->Password = $mc['smtp_pass'];
        $mail->SMTPSecure = $mc['smtp_secure'];
        $mail->Port = $mc['smtp_port'];
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($mc['smtp_user'], 'NOX Beauty Space — strona');
        $mail->addAddress($mc['admin_email']);
        $mail->addReplyTo($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Nowa wiadomość ze strony NOX Beauty Space';
        $safe = fn($v) => htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
        $mail->Body = "<b>Imię:</b> {$safe($name)}<br><b>Telefon:</b> {$safe($phone)}<br><b>E-mail:</b> {$safe($email)}<br><b>Język:</b> {$lang}<br><b>Wiadomość:</b><br>" . nl2br($safe($message));
        $mail->send();
    } catch (Exception $e) {
        error_log('Contact form mail error: ' . $e->getMessage());
    }
}

respond(true, $messages['success'][$lang]);
