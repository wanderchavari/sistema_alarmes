<?php

if (file_exists(__DIR__ . '../../.env')) {
    $lines = file(__DIR__ . '../../.env');
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0 || trim($line) ==- '') {
            continue;
        }
        putenv(trim($line));
    }
}

$host = getenv('DB_HOST');
$db = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}