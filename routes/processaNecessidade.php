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
    // Inicializa o campo 'necessidades' caso não exista
    if (!isset($empresaEncontrada['necessidades'])) {
        $empresaEncontrada['necessidades'] = [];
    }

    // Processamento da imagem
    $imagemCaminho = ''; // Inicializa a variável para o caminho da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Informações do arquivo
        $imagemNome = $_FILES['imagem']['name'];
        $imagemTmp = $_FILES['imagem']['tmp_name'];
        $imagemTipo = $_FILES['imagem']['type'];
        $imagemTamanho = $_FILES['imagem']['size'];

        // Diretório de destino para armazenar a imagem
        $diretorioDestino = '../uploads/';
        
        // Verifica se o diretório existe, caso contrário, cria-o
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        // Validações (exemplo: apenas imagens JPEG, PNG ou GIF com no máximo 5MB)
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        $tamanhoMaximo = 5 * 1024 * 1024; // 5MB

        if (in_array($imagemTipo, $tiposPermitidos) && $imagemTamanho <= $tamanhoMaximo) {
            // Cria um nome único para a imagem para evitar sobrescrita
            $imagemNomeUnico = uniqid() . '-' . basename($imagemNome);
            $imagemCaminho = $diretorioDestino . $imagemNomeUnico;

            // Move a imagem para o diretório de destino
            if (move_uploaded_file($imagemTmp, $imagemCaminho)) {
                // A imagem foi carregada com sucesso
                echo "Imagem carregada com sucesso.";
            } else {
                echo "Erro ao carregar a imagem. Tente novamente.";
                exit();
            }
        } else {
            echo "A imagem não é válida ou ultrapassou o tamanho máximo permitido.";
            exit();
        }
    }

    // Cria a nova necessidade com os dados recebidos, incluindo o caminho da imagem
    $necessidade = [
        'empresa_id' => $empresaId,
        'nome' => $nome,
        'email' => $email,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'categoria' => $categoria,
        'descricao' => $descricao,
        'imagem' => $imagemCaminho // Inclui o caminho da imagem na necessidade
    ];

    // Adiciona a nova necessidade no array 'necessidades' da empresa
    $empresaEncontrada['necessidades'][] = $necessidade;

    // Grava os dados atualizados no arquivo JSON
    $jsonData = json_encode($empresas, JSON_PRETTY_PRINT);
    if (file_put_contents('../storage/empresas.json', $jsonData)) {
        echo "Necessidade cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a necessidade. Tente novamente.";
    }
} else {
    echo "Empresa não encontrada.";
}