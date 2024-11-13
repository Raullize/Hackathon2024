<?php

include('../app/Usuario.php');
include('../app/Empresa.php');

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];

        if ($tipo === 'usuario' && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone']) && !empty($_POST['cpf'])) {

            $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['cpf']);

            if ($usuario->salvar()) {
                header("Location: ../public/login.php");
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o usuário. Verifique o CPF.";
            }
        } elseif ($tipo === 'empresa' && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone']) && !empty($_POST['cnpj']) && !empty($_POST['endereco']) && !empty($_POST['queroAjudar']) && !empty($_POST['precisoAjuda'])) {

            $empresa = new Empresa($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['cnpj'], $_POST['endereco'], $_POST['queroAjudar'], $_POST['precisoAjuda']);

            if ($empresa->salvar()) {
                header("Location: ../public/login.php");
                echo "Empresa cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar a empresa. Verifique o CNPJ.";
            }
        } else {
            echo "Todos os campos são obrigatórios.";
        }
    } else {
        echo "Tipo de cadastro não especificado.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
