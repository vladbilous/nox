<?php
// admin/security.php — CSRF protection and login brute-force limit for the admin panel.

function nox_csrf_valid($token) {
    return is_string($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/** Adds the hidden CSRF field to every POST form in the given HTML (used by layout.php). */
function nox_csrf_inject($html) {
    $field = '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES) . '">';
    return preg_replace_callback('/<form\b[^>]*>/i', function ($m) use ($field) {
        return preg_match('/method\s*=\s*["\']?post/i', $m[0]) ? $m[0] . $field : $m[0];
    }, $html);
}

// ---- Login attempts: max 5 failures per IP in 15 minutes ----
const NOX_LOGIN_MAX_FAILS = 5;
const NOX_LOGIN_WINDOW = 900;

function nox_login_table() {
    DB::execute("CREATE TABLE IF NOT EXISTS admin_login_attempts (
        ip VARCHAR(45) NOT NULL PRIMARY KEY,
        fails INT NOT NULL DEFAULT 0,
        last_fail INT NOT NULL DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

function nox_client_ip() {
    return substr($_SERVER['REMOTE_ADDR'] ?? 'unknown', 0, 45);
}

/** Seconds left until the next login attempt is allowed (0 = allowed now). */
function nox_login_locked() {
    nox_login_table();
    $row = DB::fetch("SELECT fails, last_fail FROM admin_login_attempts WHERE ip = ?", [nox_client_ip()]);
    if (!$row || $row['fails'] < NOX_LOGIN_MAX_FAILS) {
        return 0;
    }
    return max(0, $row['last_fail'] + NOX_LOGIN_WINDOW - time());
}

function nox_login_failed() {
    nox_login_table();
    $now = time();
    // A failure after the window has passed starts a fresh count
    DB::execute("INSERT INTO admin_login_attempts (ip, fails, last_fail) VALUES (?, 1, ?)
        ON DUPLICATE KEY UPDATE fails = IF(last_fail < ? , 1, fails + 1), last_fail = VALUES(last_fail)",
        [nox_client_ip(), $now, $now - NOX_LOGIN_WINDOW]);
}

function nox_login_success() {
    nox_login_table();
    DB::execute("DELETE FROM admin_login_attempts WHERE ip = ?", [nox_client_ip()]);
}

/** True while the account still uses a trivial default password like "admin". */
function nox_weak_password($userId) {
    $u = DB::fetch("SELECT username, password_hash FROM users WHERE id = ?", [$userId]);
    if (!$u) return false;
    foreach (['admin', 'password', '123456', 'admin123', $u['username']] as $weak) {
        if (password_verify($weak, $u['password_hash'])) return true;
    }
    return false;
}
