<?php
function validate_name($name) {
    // Only letters (including accents), spaces, and hyphens, max 100 chars
    return !empty(trim($name)) && mb_strlen($name) <= 100 && preg_match('/^[A-Za-zÀ-ÿ\s\-]+$/u', $name);
}

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_message($message) {
    return !empty(trim($message));
}

function sanitize_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
