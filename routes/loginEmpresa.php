<?php
session_start();
include('../app/Empresa.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $empresa = Empresa::autenticar($email, $senha);

    if ($empresa) {
        $_SESSION['empresa_id'] = $empresa['id'];
        $_SESSION['empresa'] = $empresa;
        echo "Login bem-sucedido! Redirecionando...";
        header("Location: ../protected/logadoEmpresa.php"); 
        exit;
    } else {
        echo "Email ou senha inválidos.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
?>
