<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=cratosbd', 'root', '010203');

// Definir o número de itens por página
$itens_por_pagina = 10;

// Pegar o número da página atual
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$start = ($pagina_atual - 1) * $itens_por_pagina;

// Buscar os itens do banco de dados
$stmt = $pdo->prepare("SELECT * FROM pessoa LIMIT :start, :itens");
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':itens', $itens_por_pagina, PDO::PARAM_INT);
$stmt->execute();
$itens = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calcular o total de páginas
$total_itens = $pdo->query("SELECT COUNT(*) FROM pessoa")->fetchColumn();
$total_paginas = ceil($total_itens / $itens_por_pagina);

// Passar os dados para o JavaScript via JSON
echo json_encode([
    'itens' => $itens,
    'total_paginas' => $total_paginas
]);
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const conteudo = document.getElementById('conteudo');
    const paginacao = document.getElementById('paginacao');

    function carregarPagina(pagina) {
        fetch('caminho_para_seu_script_php.php?pagina=' + pagina)
            .then(response => response.json())
            .then(data => {
                // Limpar o conteúdo atual
                conteudo.innerHTML = '';

                // Adicionar os novos itens ao conteúdo
                data.itens.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item.seu_campo; // Substitua pelo campo desejado
                    conteudo.appendChild(div);
                });

                // Atualizar a paginação
                paginacao.innerHTML = '';
                for (let i = 1; i <= data.total_paginas; i++) {
                    const botao = document.createElement('button');
                    botao.textContent = i;
                    botao.addEventListener('click', () => carregarPagina(i));
                    paginacao.appendChild(botao);
                }
            });
    }

    // Carregar a primeira página
    carregarPagina(1);
});

</script>