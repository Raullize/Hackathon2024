<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="../assets/loginCadastro.css">
</head>
<body>
    <div class="form-container">
        <h2>Login de Usuário</h2>
        <a href="loginEmpresa.php">Sou empresa</a>
        <form action="../routes/login.php" method="GET">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="../index.html" class="btn-voltar">Voltar</a>
    </div>
</body>
</html>
