var urlPrefixo = ""
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
function clickalert(){
    const tabAvalaicaoShow = document.getElementById('tabAvalaicaoShow');
    tabAvalaicaoShow.click();
}