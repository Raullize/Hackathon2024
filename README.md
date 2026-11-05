<h1 align="center"> RenovaRS </h1>

<p align="center">
  Plataforma de economia circular para apoiar a recuperação de microempreendedores afetados por enchentes no Rio Grande do Sul.
</p>

<p align="center">
  <img src="https://img.shields.io/static/v1?label=STATUS&message=ARQUIVADO&color=lightgrey&style=for-the-badge"/>
  <img src="https://img.shields.io/badge/8%C2%AA%20CharCode-2024-6A0DAD?style=for-the-badge"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"/>
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
</p>

## Descrição

O **RenovaRS** é um protótipo de plataforma colaborativa de economia circular voltado a microempreendedores locais impactados pelas enchentes no Rio Grande do Sul. A proposta é permitir que empreendedores cadastrem suas necessidades e que empresas, ONGs e membros da comunidade ofereçam doações, ferramentas, espaços temporários ou apoio voluntário.

O projeto foi construído em PHP com persistência em arquivos JSON, sem banco de dados relacional.

## Contexto do Evento

| Campo | Informação |
|---|---|
| Evento | 8ª CharCode — Hackathon |
| Instituição | IFSul Câmpus Charqueadas |
| Data | 12 e 13 de novembro de 2024 |
| Local | Charqueadas, RS |
| Formato | Hackathon presencial de 24 horas |
| Tema/desafio | Apoiar a recuperação econômica e social de comunidades afetadas por enchentes |
| Equipe | 3 integrantes |

## Funcionalidades

### Implementadas no protótipo

- **Cadastro de usuários:** nome, e-mail, senha, telefone e CPF.
- **Cadastro de empresas:** nome, e-mail, senha, telefone, CNPJ e endereço.
- **Login e logout:** autenticação com sessão para usuários e empresas.
- **Páginas de ajuda:** telas “Quero ajudar” e “Preciso de ajuda”.
- **Cadastro de doações e necessidades:** categorias como dinheiro, mão de obra e materiais.
- **Listagem de registros:** leitura dos dados armazenados nos arquivos JSON.
- **Persistência em JSON:** usuários e empresas ficam em `storage/usuarios.json` e `storage/empresas.json`.

### Previstas, mas não concluídas

- Banco de voluntários com cadastro de habilidades.
- Sistema de notificações automáticas.
- Integração com banco de dados relacional.
- Painel administrativo e moderação de conteúdo.

> O projeto foi desenvolvido em poucas horas e algumas funcionalidades ficaram apenas como ideia ou estrutura inicial.

## Tecnologias Utilizadas

- **PHP** para as rotas, modelos e sessões
- **HTML5, CSS3 e JavaScript** para a interface
- **JSON** como armazenamento local de dados
- **Font Awesome** para ícones
- **Apache** (XAMPP) para execução local

## Demonstração

Não há vídeo ou GIF de demonstração registrado para este projeto. O protótipo pode ser executado localmente seguindo as instruções abaixo.

## Como Executar o Projeto

### Pré-requisitos

- PHP 8.0 ou superior
- Apache com suporte a PHP (XAMPP, WAMP ou similar)
- Permissão de escrita na pasta `storage/`

### Instalação

1. **Clone o repositório**

   ```bash
   git clone https://github.com/Raullize/Hackathon2024.git hackathon2024
   cd hackathon2024
   ```

2. **Coloque o projeto no servidor**

   Copie a pasta `hackathon2024` para `htdocs/` (XAMPP) e inicie o Apache.

3. **Verifique a pasta de dados**

   Os arquivos `storage/usuarios.json` e `storage/empresas.json` precisam existir e ter permissão de escrita. Eles já acompanham o repositório com dados de exemplo.

4. **Acesse a aplicação**

   Abra [http://localhost/hackathon2024](http://localhost/hackathon2024) no navegador.

> O nome da pasta deve ser `hackathon2024`, pois uma das rotas de login redireciona para `/hackathon2024/`. Se preferir usar o servidor embutido do PHP, execute `php -S localhost:8000` na raiz e ajuste os redirecionamentos.

### Dados de exemplo

Os arquivos JSON podem conter registros de teste criados durante o evento. Não utilize dados pessoais reais nesses arquivos.

## Estrutura do Projeto

```text
Hackathon2024/
├── app/                   Modelos de usuário e empresa
├── assets/                CSS, JavaScript e imagens
├── protected/             Páginas autenticadas (ajuda e necessidades)
├── public/                Login e cadastro
├── routes/                Rotas e processamento de formulários
├── storage/               Persistência em JSON
└── index.html             Página inicial
```

## Documentação

- [Página inicial](./index.html)
- [Modelos de usuário e empresa](./app/)
- [Rotas PHP](./routes/)
- [Páginas autenticadas](./protected/)
- [Armazenamento JSON](./storage/)

## Limitações e Status

- Projeto **arquivado**: foi um protótipo de hackathon e não tem manutenção prevista.
- A persistência é feita em arquivos JSON, sem banco de dados relacional.
- Não há sistema de notificações nem banco de voluntários implementados.
- Não há testes automatizados.
- O código possui redirecionamentos e caminhos pensados para execução no XAMPP.

## Contribuindo

Este é um projeto histórico de hackathon. Contribuições não são esperadas, mas você pode abrir uma issue ou enviar um pull request caso encontre algum problema.

1. Faça um fork do projeto.
2. Crie uma branch: `git checkout -b minha-melhoria`.
3. Commit suas mudanças: `git commit -m 'Minha melhoria'`.
4. Envie para o seu fork: `git push origin minha-melhoria`.
5. Abra um pull request.

## Contribuidores

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/Raullize" title="Perfil no GitHub">
        <img src="https://github.com/Raullize.png" width="100px" alt="Foto de Raul Lize Teixeira no GitHub"/><br>
        <sub><b>Raul Lize Teixeira</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/MiguelLewandowski" title="Perfil no GitHub">
        <img src="https://github.com/MiguelLewandowski.png" width="100px" alt="Foto de Miguel Leonardo Strapazon Lewandowski no GitHub"/><br>
        <sub><b>Miguel Leonardo Strapazon Lewandowski</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/Kaio-LSilveira" title="Perfil no GitHub">
        <img src="https://github.com/Kaio-LSilveira.png" width="100px" alt="Foto de Kaio Leote Silveira no GitHub"/><br>
        <sub><b>Kaio Leote Silveira</b></sub>
      </a>
    </td>
  </tr>
</table>

## Licença

Este projeto foi desenvolvido para fins educacionais durante a 8ª CharCode. Não há uma licença definida no repositório; entre em contato com os autores antes de reutilizar o código.
