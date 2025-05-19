<?php
// filepath: pages/process.php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/classes/ContactValidator.php';
require_once __DIR__ . '/../includes/db.php';

$errors = [];
$name = $_POST['naam'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['bericht'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!ContactValidator::validateName($name)) {
        $errors[] = 'Naam mag niet leeg zijn en mag alleen letters, spaties en streepjes bevatten (max 100 tekens).';
    }
    if (!ContactValidator::validateEmail($email)) {
        $errors[] = 'E-mailadres is ongeldig of te lang.';
    }
    if (!ContactValidator::validateMessage($message)) {
        $errors[] = 'Bericht mag niet leeg zijn en maximaal 1000 tekens bevatten.';
    }

    if (empty($errors)) {
        // Save to database
        try {
            $pdo = getPDO();
            $stmt = $pdo->prepare('INSERT INTO contact_messages (naam, email, bericht) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $message]);
        } catch (Exception $e) {
            $errors[] = 'Er is een fout opgetreden bij het opslaan van je bericht: ' . $e->getMessage();
        }
        if (empty($errors)) {
            // Output validatie en redirect naar bedankpagina
            session_start();
            $_SESSION['name'] = ContactValidator::sanitizeOutput($name);
            $_SESSION['email'] = ContactValidator::sanitizeOutput($email);
            $_SESSION['message'] = ContactValidator::sanitizeOutput($message);
            header('Location: bedankt.php');
            exit;
        }
    }
}
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fout bij verzenden</title>
    <link rel="stylesheet" href="../assets/style/style.css">
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
    <a href="../index.php">Terug naar het formulier</a>
</body>
</html>
