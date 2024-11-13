<?php
function session_start_once() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function redirect($url) {
    header("Location: $url");
    exit();
}

?>
