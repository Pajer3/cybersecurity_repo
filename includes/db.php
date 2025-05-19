<?php
// filepath: includes/db.php
function getPDO() {
    $host = 'db'; // use 'db' for Docker, '127.0.0.1' with port 3307 for local
    $db   = 'contactform';
    $user = 'user';
    $pass = 'userpassword';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    return new PDO($dsn, $user, $pass, $options);
}
