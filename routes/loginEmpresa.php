<?php
session_start();
include('../app/Empresa.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (Empresa::autenticar($email, $senha)) {
        echo "Login bem-sucedido! Redirecionando...";
        header("Location: ../protected/dashboard.php"); 
        exit;
    } else {
        echo "Email ou senha inválidos.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
?>
