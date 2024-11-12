<?php
require_once '../app/helpers.php';
require_once '../app/Usuario.php';

session_start_once();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (Usuario::autenticar($email, $senha)) {
        echo "Login bem-sucedido! Bem-vindo!";
    } else {
        echo "Email ou senha inválidos.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
?>
