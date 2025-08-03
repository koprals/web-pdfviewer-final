<?php
$host = 'z8vpra.h.filess.io';
$port = 61000;
$db   = 'epas_oncechoice';
$user = 'epas_oncechoice';
$pass = 'ec9af42aafc79b74c2571ddfe9f06921b56758c5';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}