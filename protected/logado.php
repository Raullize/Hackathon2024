<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    exit;
}


var_dump($_SESSION); // Para verificar todas as variáveis de sessão
$idUsuario = $_SESSION['usuario_id'];
$nomeUsuario = $_SESSION['usuario']['nome'];
$emailUsuario = $_SESSION['usuario']['email'];

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofereça Ajuda</title>
</head>
<body>
    <h1>Ofereça Sua Ajuda</h1>

    <form action="../routes/processarAjuda.php" method="POST">
  
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="number" id="telefone" name="telefone" required><br><br>

 
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="dinheiro">Dinheiro</option>
            <option value="material">Material</option>
            <option value="local">Local</option>
            <option value="mao_de_obra">Mão de obra</option>
            <option value="outro">Outro</option>
        </select><br><br>

    
        <label for="descricao">Descrição da Ajuda:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>

     
        <div id="outroAjuda" style="display: none;">
            <label for="outro">Especifique outro tipo de ajuda:</label>
            <input type="text" id="outro" name="outro"><br><br>
        </div>

        <button type="submit">Oferecer Ajuda</button>
    </form>

    <a href="../routes/logout.php">Logout</a> <!-- Link para logout -->

    <script>
      
        document.getElementById('categoria').addEventListener('change', function() {
            var categoria = this.value;
            if (categoria === 'outro') {
                document.getElementById('outroAjuda').style.display = 'block';
            } else {
                document.getElementById('outroAjuda').style.display = 'none';
            }
        });
    </script>
    </body>
    </html>