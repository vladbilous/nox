<?php
session_start();
header('Content-Type: application/json');

require __DIR__ . '/config.php';
require __DIR__ . '/DB.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Rate limiting (simple session based)
if (!isset($_SESSION['last_submit'])) {
    $_SESSION['last_submit'] = 0;
}
if (time() - $_SESSION['last_submit'] < 30) {
    echo json_encode(['success' => false, 'message' => 'Зачекайте 30 секунд перед наступною відправкою.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Honeypot check
    if (!empty($_POST['website_url_hp'])) {
        echo json_encode(['success' => true, 'message' => 'success']); // fake success for bots
        exit;
    }

    $name = strip_tags(trim($_POST['userName'] ?? ''));
    $phone = strip_tags(trim($_POST['userPhone'] ?? ''));
    $email = filter_var(trim($_POST['userEmail'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST['userMessage'] ?? ''));
    $rodo = isset($_POST['rodo_consent']) ? 1 : 0;
    $lang = $_POST['lang'] ?? 'pl';

    if (empty($name) || empty($phone) || empty($email) || !$rodo) {
        echo json_encode(['success' => false, 'message' => 'Будь ласка, заповніть всі обов\'язкові поля та погодьтесь з RODO.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Невірний формат email.']);
        exit;
    }

    try {
        // Save to DB
        DB::execute("INSERT INTO contacts (name, phone, email, message) VALUES (?, ?, ?, ?)", [$name, $phone, $email, $message]);
        
        // Send Email
        $mail = new PHPMailer(true);
        $mailConfig = require __DIR__ . '/config.php';
        $mc = $mailConfig['mail'];

        // Server settings
        $mail->isSMTP();
        $mail->Host       = $mc['smtp_host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $mc['smtp_user'];
        $mail->Password   = $mc['smtp_pass'];
        $mail->SMTPSecure = $mc['smtp_secure'];
        $mail->Port       = $mc['smtp_port'];
        $mail->CharSet    = 'UTF-8';

        // Recipients
        $mail->setFrom($mc['smtp_user'], 'Salon Site');
        $mail->addAddress($mc['admin_email']);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Нова заявка з сайту Salon";
        $mail->Body    = "<b>Ім'я:</b> $name<br><b>Телефон:</b> $phone<br><b>Email:</b> $email<br><b>Повідомлення:</b><br>" . nl2br($message);

        $mail->send();
        
        $_SESSION['last_submit'] = time();

        // Translations for success msg
        $successMsgs = [
            'pl' => 'Dziękujemy! Skontaktujemy się z Tobą wkrótce.',
            'uk' => 'Дякуємо! Ми зв\'яжемося з вами найближчим часом.',
            'ru' => 'Спасибо! Мы свяжемся с вами в ближайшее время.',
            'en' => 'Thank you! We will contact you soon.'
        ];
        
        echo json_encode(['success' => true, 'message' => $successMsgs[$lang] ?? $successMsgs['pl']]);
    } catch (Exception $e) {
        // Log error silently and show generic message to user
        echo json_encode(['success' => false, 'message' => 'Помилка відправки. Спробуйте ще раз або зв\'яжіться з нами напряму.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
