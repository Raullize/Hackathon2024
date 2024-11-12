<?php
// Start session only if not already started
function session_start_once() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Redirect function to simplify redirects
function redirect($url) {
    header("Location: $url");
    exit();
}

// Authentication and session functions can also go here if needed
?>
