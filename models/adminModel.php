<?php
require_once __DIR__ . '/../config/db.php';

function findAdmin($username) {
    global $conn;
    $u   = $conn->real_escape_string($username);
    $res = $conn->query("SELECT * FROM admins WHERE username='$u' LIMIT 1");
    return ($res && $res->num_rows > 0) ? $res->fetch_assoc() : null;
}

function verifyAdminPassword($plaintext, $hash) {
    return password_verify($plaintext, $hash);
}