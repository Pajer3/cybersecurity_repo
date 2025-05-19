<?php
function validate_name($name) {
    return !empty(trim($name));
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
