<?php
session_start();

if (!isset($_SESSION['empresa'])) {
    header("Location: ../routes/loginEmpresa.php");
    exit;
}

$nomeEmpresa = $_SESSION['empresa']['nome'];
$emailEmpresa = $_SESSION['empresa']['email'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área da Empresa</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($nomeEmpresa); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($emailEmpresa); ?></p>
    <p><a href="../routes/logout.php">Sair</a></p>
</body>
</html>

