<?php 

session_start();


if (!isset($_SESSION['usuario']) && !isset($_SESSION['empresa'])) {
    header("Location: ../public/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/ajudar.css" />
    <link rel="stylesheet" href="../assets/globals.css" />
    <title>Deps</title>

    <!-- Final da Imagem de fundo com frase de destaque -->
  </head>

  <body>
    <header>
      <!-- Topo com frase -->
      <div class="topo-header">
        <h3>Juntos pela reconstrução da nossa comunidade</h3>
      </div>

      <!-- Logo e navegação -->
      <div class="navegacao-header">
        <div class="logo">
          <img src="../assets/imgs/logo.png" alt="Logo RenovaRS" />
        </div>
        <div class="icone-empresa">
          <i class="fas fa-briefcase"></i>
        </div>
        <div class="botoes-header">
          <a href="../routes/logout.php"><button class="btn-header">Sair e Deslogar</button></a>
        </div>
      </div>
    </header>
    <div class="main">
      <div class="left">
        <form action="../routes/processarAjuda.php" method="post">
          <h4 class="cardtittle">No que você pode ajudar?</h4>
          <p class="subtitle">Muito obrigado pela sua colaboração</p>
          <br />

          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required />
          </div>

          <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
              <option value="dinheiro">Dinheiro</option>
              <option value="material">Material</option>
              <option value="local">Local</option>
              <option value="mao_de_obra">Mão de obra</option>
              <option value="outro">Outro</option>
            </select>
          </div>

          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" placeholder="Digite seu email" required />
          </div>

          <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="categoria"></textarea>
          </div>

          <button type="submit">Enviar</button>
        </form>
      </div>

      <div class="right">
        <h2 class="cardtittle">Precisam de ajuda</h2>
        <div id="cards-container"></div>

        </div>
      </div>
    </div>
    <script src="../assets/js/mostrarLista.js"></script>
  </body>
</html>
