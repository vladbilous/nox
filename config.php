<?php
// config.php
return [
    'db' => [
        'host' => 'MariaDB-11.2',
        'dbname' => 'salon_cms',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
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
