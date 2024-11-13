<?php
session_start();

// Verifica se a empresa está logada
if (!isset($_SESSION['empresa_id'])) {
    echo "Você precisa estar logado para cadastrar a doação.";
    exit();
}

// Coleta os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];

// ID da empresa logada
$empresaId = $_SESSION['empresa_id'];

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
    // Inicializa o campo 'doacoes' caso não exista
    if (!isset($empresaEncontrada['doacoes'])) {
        $empresaEncontrada['doacoes'] = [];
    }

    // Cria a nova doação com os dados recebidos
    $doacao = [
        'empresa_id' => $empresaId,
        'nome' => $nome,
        'email' => $email,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'categoria' => $categoria,
        'descricao' => $descricao
    ];

    // Adiciona a doação ao array 'doacoes' da empresa
    $empresaEncontrada['doacoes'][] = $doacao;

    // Grava os dados atualizados no arquivo JSON
    $jsonData = json_encode($empresas, JSON_PRETTY_PRINT);
    if (file_put_contents('../storage/empresas.json', $jsonData)) {
        echo "Doação cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a doação. Tente novamente.";
    }
} else {
    echo "Empresa não encontrada.";
}
?>
