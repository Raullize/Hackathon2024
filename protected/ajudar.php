<?php 

session_start();

if (!isset($_SESSION['usuario'])) {
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
          <button class="btn-header">Sair e Deslogar</button>
        </div>
      </div>
    </header>
    <div class="main">
      <div class="left">
        <form action="#" method="post">
          <h4 class="cardtittle">Formulário de Cadastro para enviar ajuda</h4>
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
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required />
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
          <p class="cardtext">Rua Violeta, Bairro Roxo, N°123</p>
          <p class="cardtext">docepadaria@gmail.com</p>
          <p class="cardtext">Devido a incessante queda de lux perdemos 2 fornos elétricos e um freezer com embutidos, pedimos uma geladeira reserva até a nossa ser consertada.</p>
        </div>
        <div class="card">
          <img src="../assets/imgs/empresa.jpg" alt="Imagem do Card 2" />
          <h3>Ferragem do Prego:</h3>
          <p class="cardtext">Rua Vermelho, Bairro Laranja, N°123</p>
          <p class="cardtext">ferragemprego@gmail.com</p>
          <p class="cardtext">Fomos completamente inundados devido a localização da ferragem, pedimos ajuda em mão de obra para limparmos o local e preparar a reabertura. </p>
        </div>
        <div class="card">
          <img src="../assets/imgs/empresa.jpg" alt="Imagem do Card 2" />
          <h3>Restaurante América:</h3>
          <p class="cardtext">Rua Azul, Bairro Ciano, N°123</p>
          <p class="cardtext">Americafood@gmail.com</p>
          <p class="cardtext">Os ventos fortes danificaram extremamente o telhado do local, se possivel gostariamos de materiais e mão de obra para reparo do mesmo para não perdermos mais nada. </p>
        </div>

        </div>
      </div>
    </div>
  </body>
</html>
