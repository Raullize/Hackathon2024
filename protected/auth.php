<?php
session_start_once(); // Garante que a sessão está ativa

// Verifica se o usuário ou a empresa está logado
if (!isset($_SESSION['usuario']) && !isset($_SESSION['empresa'])) {
    // Se não estiver logado, redireciona para a página de login
    redirect('../public/login.php');
}
?>
