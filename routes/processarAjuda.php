<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
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

    $usuarioId = $_SESSION['usuario_id'];

    // Carrega os usuários do arquivo JSON
    $usuarios = [];
    if (file_exists('../storage/usuarios.json')) {
        $json = file_get_contents('../storage/usuarios.json');
        $usuarios = json_decode($json, true);
    } else {
        echo "Arquivo de usuários não encontrado.";
        exit();
    }

    // Verifica se o usuário existe no array
    $usuarioEncontrado = null;
    foreach ($usuarios as &$usuario) {
        if ($usuario['id'] == $usuarioId) {
            $usuarioEncontrado = &$usuario; // Referência para modificar o array
            break;
        }
    }

    if ($usuarioEncontrado) {
        // Inicializa o campo 'ajudas' caso não exista
        if (!isset($usuarioEncontrado['ajudas'])) {
            $usuarioEncontrado['ajudas'] = [];
        }

        // Cria a nova ajuda
        $ajuda = [
            'usuario_id' => $usuarioId,
            'nome' => $nome,
            'telefone' => $telefone,
            'categoria' => ($categoria === 'outro' && !empty($outro)) ? $outro : $categoria,
            'descricao' => $descricao
        ];

        // Adiciona a ajuda ao usuário
        $usuarioEncontrado['ajudas'][] = $ajuda;

        // Grava os dados atualizados no arquivo JSON
        $jsonData = json_encode($usuarios, JSON_PRETTY_PRINT);
        if (file_put_contents('../storage/usuarios.json', $jsonData)) {
            header("Location: ../index.html"); 
            echo "Ajuda cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar a ajuda. Tente novamente.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "Método inválido. Por favor, envie o formulário.";
}
?>
