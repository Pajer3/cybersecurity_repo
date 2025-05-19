<?php
// filepath: includes/classes/ContactValidator.php
class ContactValidator {
    public static function validateName($name) {
        // Only letters (including accents), spaces, and hyphens, max 100 chars
        return !empty(trim($name)) && mb_strlen($name) <= 100 && preg_match('/^[A-Za-zÀ-ÿ\s\-]+$/u', $name);
    }

    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) && mb_strlen($email) <= 255;
    }

    public static function validateMessage($message) {
        return !empty(trim($message)) && mb_strlen($message) <= 1000;
    }

    public static function sanitizeOutput($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}
