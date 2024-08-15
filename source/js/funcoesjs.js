function carregarPagina(div,pagina) {
    fetch(pagina)
        .then(response => response.text())
        .then(data => {
            // Insere o conteúdo da página na div com ID "conteudo"
            document.getElementById(div).innerHTML = data;
        })
        .catch(error => {
            console.error('Erro ao carregar a página:', error);
        });
}
function mensagem(data){
    console.log(data)
}

function enviardados(controle,id) {
    // alert('tá aqui')
    fetch('../../controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&id=' + encodeURIComponent(id),
    })
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                mensagem(data.mensagem);
                setTimeout(2000);
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}