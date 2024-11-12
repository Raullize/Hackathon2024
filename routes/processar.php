<?php
// Incluir as classes Usuario e Empresa
include('../app/Usuario.php');
include('../app/Empresa.php');

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica o tipo de cadastro (Usuario ou Empresa)
    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];

        // Cadastro de Usuário
        if ($tipo === 'usuario' && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cpf'])) {
            
            // Cria o objeto Usuario com os dados recebidos
            $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cpf']);
            
            // Tenta salvar o usuário
            if ($usuario->salvar()) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o usuário. Verifique o CPF.";
            }
        
        // Cadastro de Empresa
        } elseif ($tipo === 'empresa' && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cnpj']) && !empty($_POST['queroAjudar']) && !empty($_POST['precisoAjuda'])) {
            
            // Cria o objeto Empresa com os dados recebidos
            $empresa = new Empresa($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cnpj'], $_POST['queroAjudar'], $_POST['precisoAjuda']);
            
            // Tenta salvar a empresa
            if ($empresa->salvar()) {
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
?>