<?php
// filepath: process.php
require_once __DIR__ . '/includes/functions.php';

$errors = [];
$name = $_POST['naam'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['bericht'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validate_name($name)) {
        $errors[] = 'Naam mag niet leeg zijn.';
    }
    if (!validate_email($email)) {
        $errors[] = 'E-mailadres is ongeldig.';
    }
    if (!validate_message($message)) {
        $errors[] = 'Bericht mag niet leeg zijn.';
    }

    if (empty($errors)) {
        // Output validatie en redirect naar bedankpagina
        session_start();
        $_SESSION['name'] = sanitize_output($name);
        $_SESSION['email'] = sanitize_output($email);
        $_SESSION['message'] = sanitize_output($message);
        header('Location: bedankt.php');
        exit;
    }
}
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fout bij verzenden</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <h1>Fout bij verzenden</h1>
    <?php if (!empty($errors)): ?>
        <ul style="color: #d32f2f;">
            <?php foreach ($errors as $error): ?>
                <li><?= sanitize_output($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php">Terug naar het formulier</a>
</body>
</html>
