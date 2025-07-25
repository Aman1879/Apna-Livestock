<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'livestock_management');
define('DB_USER', 'root');      // Replace with your DB user
define('DB_PASS', '');          // Replace with your DB password

function getDBConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
