async function carregarProdutos(filtro = {}) {
  try {
    // Define a URL de acordo com o filtro (categoria ou marca)
    let url = '../app/controller/getProduto.php';
    if (filtro.categoria) url += `?categoria=${filtro.categoria}`;
    else if (filtro.marca) url += `?marca=${filtro.marca}`;

    // Faz a requisição ao PHP
    const resposta = await fetch(url);
    const produtos = await resposta.json();

    const container = document.getElementById('produtos');
    container.innerHTML = ''; // limpa a div antes de inserir os novos produtos

    // Caso não tenha produtos
    if (!produtos || produtos.length === 0) {
      container.innerHTML = `
        <div class="col-12 text-center text-light">
          <p>Nenhum produto encontrado.</p>
        </div>`;
      return;
    }

    // Adiciona row com colunas responsivas
    const row = document.createElement('div');
    row.classList.add('row', 'row-cols-1', 'row-cols-md-3', 'g-4');

    produtos.forEach(p => {
      const col = document.createElement('div');
      col.classList.add('col');

      col.innerHTML = `
  <div class="card h-100 bg-transparent text-light">
    <img src="${p.imagem || '../public/img/default.jpg'}" 
         class="card-img-top" 
         alt="${p.nome}" 
         style="width: 100%; height: 200px; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">${p.nome}</h5>
      <p class="card-text">${p.descricao || '-'}</p>
      <p class="card-text"><strong>Preço:</strong> R$ ${parseFloat(p.preco).toFixed(2)}</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Estoque: ${p.quantidade}</small>
    </div>
  </div>
`;


      row.appendChild(col);
    });

    container.appendChild(row);

  } catch (erro) {
    console.error('Erro ao carregar produtos:', erro);
  }
}

// Carregar todos os produtos automaticamente ao abrir a página
document.addEventListener('DOMContentLoaded', () => {
  carregarProdutos();
});
