<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


define('PRODUCTS_FILE', __DIR__ . '/products.json');
define('ORDERS_FILE', __DIR__ . '/orders.json');
define('USERS_FILE', __DIR__ . '/users.json'); // <-- ÖNEMLİ SATIR
define('UPLOAD_DIR', __DIR__ . '/uploads/');

// Birden fazla admin kullanıcı:
$ADMINS = [
    ['user' => 'Nisa', 'pass' => '1234'],
    ['user' => 'Hatice', 'pass' => '5678'],
];
