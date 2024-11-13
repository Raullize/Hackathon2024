<?php
session_start_once(); 
if (!isset($_SESSION['usuario']) && !isset($_SESSION['empresa'])) {
    redirect('../public/login.php');
}
?>
