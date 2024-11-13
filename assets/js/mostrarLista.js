fetch('../storage/empresas.json')
    .then(response => response.json())
    .then(data => exibirCards(data))
    .catch(error => console.error('Erro ao carregar o JSON:', error));

function exibirCards(empresas) {
    const container = document.getElementById('cards-container');
    container.innerHTML = '';

    empresas.forEach(empresa => {
        // Loop para cada necessidade dentro da empresa
        empresa.necessidades.forEach(necessidade => {
            const card = document.createElement('div');
            card.classList.add('card');

            card.innerHTML = `
                <h2>${necessidade.nome}</h2>
                <p><strong>Email:</strong> ${necessidade.email}</p>
                <p><strong>Telefone:</strong> ${necessidade.telefone}</p>
                <p><strong>Endereço:</strong> ${necessidade.endereco}</p>
                <p><strong>Categoria:</strong> ${necessidade.categoria}</p>
                <p><strong>Descrição:</strong> ${necessidade.descricao}</p>
            `;

            container.appendChild(card);
        });
    });
}