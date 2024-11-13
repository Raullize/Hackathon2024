fetch('../storage/usuarios.json')
    .then(response => response.json())
    .then(data => exibirAjudas(data))
    .catch(error => console.error('Erro ao carregar o JSON:', error));

function exibirAjudas(usuarios) {
    const container = document.getElementById('ajudas-container');
    container.innerHTML = '';

    usuarios.forEach(usuario => {
        // Loop para cada ajuda dentro do usuário
        usuario.ajudas.forEach(ajuda => {
            const card = document.createElement('div');
            card.classList.add('card');

            card.innerHTML = `
                <h2>${ajuda.nome}</h2>
                <p><strong>Telefone:</strong> ${ajuda.telefone || 'N/A'}</p>
                <p><strong>Categoria:</strong> ${ajuda.categoria}</p>
                <p><strong>Descrição:</strong> ${ajuda.descricao}</p>
            `;

            container.appendChild(card);
        });
    });
}