<?php
session_start();
session_unset();
session_destroy();

header("Location: /hackathon2024/");
exit;
?>
