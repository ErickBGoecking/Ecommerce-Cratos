
function carregarConteudo(prefixo,controle,divConteudo) {
    fetch(prefixo + 'controle/controle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'controle=' + encodeURIComponent(controle),
        })
        .then(response => response.text())
        .then(data => {
            if (data) {
                document.getElementById(divConteudo).innerHTML = data;
            } else {
                // mensagebox(data.mensagem);
                console.log(data.mensagem)
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}