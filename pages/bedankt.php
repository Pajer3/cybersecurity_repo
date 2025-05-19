<?php
// filepath: pages/bedankt.php
session_start();
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/classes/ContactValidator.php';

$name = $_SESSION['name'] ?? '';
$email = $_SESSION['email'] ?? '';
$message = $_SESSION['message'] ?? '';
// Clear session data after displaying
session_unset();
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bedankt!</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
    <h1>Bedankt voor je bericht!</h1>
    <div class="form-group">
        <strong>Naam:</strong> <?= ContactValidator::sanitizeOutput($name) ?><br>
        <strong>E-mail:</strong> <?= ContactValidator::sanitizeOutput($email) ?><br>
        <strong>Bericht:</strong><br>
        <div style="white-space: pre-line; background: #f7fbff; border-radius: 8px; padding: 10px; margin-top: 5px; border: 1px solid #66a6ff;">
            <?= ContactValidator::sanitizeOutput($message) ?>
        </div>
    </div>
    <a href="../index.php">Nog een bericht sturen</a>
</body>
</html>
