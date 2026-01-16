<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'captains_coin_shop');
define('DB_USER', 'root');
define('DB_PASS', '');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
$base = rtrim(str_replace('index.php', '', $script), '/');
define('BASE_URL', $protocol . '://' . $host . $base . '/index.php');
