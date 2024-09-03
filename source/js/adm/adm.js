var urlPrefixo = ""
function loading(status){
    const div = document.getElementById('loading')
    if(status){
        div.classList.remove('d-none')
    }else{
        div.classList.add('d-none')
    }
}

async function carregarConteudo(controle,divConteudo) {
    fetch(urlPrefixo + 'controle/controle.php', {
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
                mensagem(data.mensagem,'erro');
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
        const retorno = {
            sucesso: true
        }
        return retorno
}

async function postRetorno(controle,form) {
    controle +='/'
    var formData = new FormData(form);
    formData.append('controle', controle);

    resposta = await fetch(urlPrefixo + 'controle/controle.php', {
        method: 'POST',
        body: formData,
    })
    return resposta.json()
}


function mensagem(msg,tipo='info') {
    switch(tipo){
        case 'info':
            var liveToast = document.getElementById('liveToast');
            break;
        case 'erro':
            var liveToast = document.getElementById('liveToastErro');
            break;
        case 'confircacao':
            var liveToast = document.getElementById('liveToastConfirmacao');
            break;
    }

    var toast = new bootstrap.Toast(liveToast);
    liveToast.querySelector('.toast-body').innerText = msg;
    toast.show();
}