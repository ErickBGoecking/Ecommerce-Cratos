<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Paginação com PHP e PDO</title>
<script>
// Função para carregar os dados da página selecionada
function carregarDados(pagina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'carregar_dados.php?pagina=' + pagina, true);
    xhr.onload = function() {
        if (this.status == 200) {
            document.getElementById('conteudo').innerHTML = this.responseText;
            criarBotoesPaginacao(pagina);
        }
    }
    xhr.send();
}

// Função para criar os botões de paginação
function criarBotoesPaginacao(paginaAtual) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'total_paginas.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            var totalPaginas = parseInt(this.responseText);
            var botoes = '';
            for (var i = 1; i <= totalPaginas; i++) {
                botoes += '<button onclick="carregarDados(' + i + ')">' + (i === paginaAtual ? '<b>Página ' + i + '</b>' : 'Página ' + i) + '</button> ';
            }
            document.getElementById('paginacao').innerHTML = botoes;
        }
    }
    xhr.send();
}

window.onload = function() {
    carregarDados(1); // Carrega a primeira página ao iniciar
};
</script>
</head>
<body>
<div id="conteudo">
    <!-- Os dados paginados serão exibidos aqui -->
</div>
<div id="paginacao">
    <!-- Os botões de paginação serão exibidos aqui -->
</div>
</body>
</html>
