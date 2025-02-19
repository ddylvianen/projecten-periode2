<?php
$dsn = 'mysql:host=db;dbname=fitforfun;charset=utf8mb4';
$user = 'user';
$password = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    echo "✅ Verbinding gelukt!";
} catch (PDOException $e) {
    echo "❌ Fout: " . $e->getMessage();
}

