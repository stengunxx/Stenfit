<?php

$host = 'localhost';
$dbname = 'stenfit';
$username = 'bit_academy';
$password = 'bit_academy';
try {
    $pdo = new PDO("mysql:host=$host;dbname=stenfit", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>