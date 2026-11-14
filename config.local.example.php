<?php
// Copy this file to config.local.php and fill in the SMTP data. config.local.php is NOT committed to git.
//
// Gmail: turn on 2-Step Verification, then create an App Password at
// https://myaccount.google.com/apppasswords and paste the 16 characters below (spaces are fine).
return [
    'mail' => [
        'smtp_user' => 'your.address@gmail.com',
        'smtp_pass' => 'xxxx xxxx xxxx xxxx',
    ],
];
