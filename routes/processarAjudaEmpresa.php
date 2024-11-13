<?php
session_start();

// var_dump($_SESSION['empresa']);
$empresa = $_SESSION['empresa'];
// Verifica se o usuário está logado
if (!isset($_SESSION['empresa_id'])) {
    echo "Você precisa estar logado para cadastrar a ajuda.";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $outro = $_POST['outro'] ?? '';

    $_SESSION['empresa'] = $empresa;
    $empresaId = $_SESSION['empresa_id'];
    $_SESSION['empresa_id'] = $empresa['id'];
    // Carrega as empresas do arquivo JSON
    $empresas = [];
    if (file_exists('../storage/empresas.json')) {
        $json = file_get_contents('../storage/empresas.json');
        $empresas = json_decode($json, true);
    } else {
        echo "Arquivo de empresas não encontrado.";
        exit();
    }

    // Verifica se a empresa existe no array
    $empresaEncontrada = null;
    foreach ($empresas as &$empresa) {
        if ($empresa['id'] == $empresaId) {
            $empresaEncontrada = &$empresa; // Referência para modificar o array
            break;
        }
    }

    if ($empresaEncontrada) {
        if (!isset($empresaEncontrada['id'])) {
            echo "ID da empresa não encontrado.";
            exit();
        }
        $ajuda = [
            'empresa_id' => $empresaId,
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $empresaEncontrada['email'], // Usando o email da empresa
            'categoria' => ($categoria === 'outro' && !empty($outro)) ? $outro : $categoria,
            'descricao' => $descricao
        ];
        $empresaEncontrada['ajudas'][] = $ajuda;
    
        // Grava os dados atualizados no arquivo JSON
        $jsonData = json_encode($empresas, JSON_PRETTY_PRINT);
        if (file_put_contents('../storage/empresas.json', $jsonData)) {
            echo "Ajuda cadastrada com sucesso!";
            header("Location: ../index.html"); 
            exit;
        } else {
            echo "Erro ao cadastrar a ajuda. Tente novamente.";
        }
    } else {
        echo "Empresa não encontrada.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
?>
