<?php 

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/loginEmpresa.php");
    exit;
}

?>
<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/receberAjuda.css" />
    <link rel="stylesheet" href="../assets/globals.css" />
    <title>Deps</title>

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
          <button class="btn-header">Sair e Deslogar</button>
        </div>
      </div>
    </header>
    <!-- Final da Imagem de fundo com frase de destaque -->
  </head>

  <body>
    <div class="main">
      <div class="left">
        <form action="../routes/necessito.php" method="post">
          <h4 class="cardtittle">Formulário de Cadastro</h4>
          <p class="subtitle">Todos reunidos para ajudar a sociedade</p>
          <br />

          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required />
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required />
          </div>

          <div class="form-group">
            <label for="endereco">Endereco:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereco" required />
          </div>

          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" placeholder="Digite seu telefone" required />
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
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="categoria"></textarea>
          </div>

          <button type="submit">Enviar</button>
        </form>
      </div>

      <div class="right">
        <h2 class="cardtittle">Precisam de ajuda</h2>
        <div class="card">
          <img src="../assets/imgs/empresa.jpg" alt="Imagem do Card 1" />
          <h3>Padaria Doce:</h3>
          <p></p>
          <p></p>
        </div>
        <div class="card">
          <img src="../assets/imgs/empresa.jpg" alt="Imagem do Card 2" />
          <h3>Charqueadas - RS:</h3>
          <p class="cardtext">situação critica.</p>
        </div>
        <div class="card">
          <img src="../assets/imgs/empresa.jpg" alt="Imagem do Card 2" />
          <h3>Charqueadas - RS:</h3>
          <p class="cardtext">situação critica.</p>
        </div>

        </div>
      </div>
    </div>
  </body>
</html>
