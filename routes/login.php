<?php
session_start();
include '../app/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET['email'] ?? '';
    $senha = $_GET['senha'] ?? '';

    if (Usuario::autenticar($email, $senha)) {
        $_SESSION['usuario_id'] = $usuario['id'];
        echo "Login bem-sucedido! Bem-vindo!";
        header("Location: ../protected/logado.php"); 
    } else {
        echo "Email ou senha inválidos.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
?>
