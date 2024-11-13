<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {

    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Ajuda</title>
</head>
<body>

<h2>Cadastro de Ajuda</h2>

<form action="processarAjuda.php" method="POST">
    <label for="categoria">Categoria:</label><br>
    <input type="radio" name="categoria" value="dinheiro"> Dinheiro<br>
    <input type="radio" name="categoria" value="material"> Material<br>
    <input type="radio" name="categoria" value="local"> Local<br>
    <input type="radio" name="categoria" value="maodeobra"> Mão de Obra<br>
    <input type="radio" name="categoria" value="outro"> Outro<br>

    <div id="outro" style="display:none;">
        <label for="outro">Informe a categoria:</label><br>
        <input type="text" name="outro"><br>
    </div>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" required></textarea><br>

    <button type="submit">Cadastrar Ajuda</button>
</form>

<script>

document.querySelectorAll('input[name="categoria"]').forEach(function(input) {
    input.addEventListener('change', function() {
        if (this.value === 'outro') {
            document.getElementById('outro').style.display = 'block';
        } else {
            document.getElementById('outro').style.display = 'none';
        }
    });
});
</script>

</body>
</html>
