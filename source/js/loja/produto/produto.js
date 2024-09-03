const radios = document.querySelectorAll('#produto-variacao input[type="radio"]');

function getSelectedRadios() {
    let selectedIds = [];
    let dataProduto = null;

    radios.forEach((radio) => {
        if (radio.checked) {
            selectedIds.push(radio.getAttribute('data-id'));
            dataProduto = radio.getAttribute('data-prod');
        }
    });

    if (selectedIds.length > 0) {
        selectedIds = [...new Set(selectedIds)];
        return {
            selectedIds: selectedIds.join(', '),
            dataProduto: dataProduto
        };
    } else {
        return null;
    }
}
async function enviarIdVariacao() {
    const selectedData = getSelectedRadios();
    if (selectedData) {
        const {selectedIds, dataProduto} = selectedData;
        const form=document.createElement('form');
        const retorno = await postRetorno('loja/produto/produtovariacao/'+selectedIds+'/'+dataProduto,form)
        console.log(retorno.id);  // Remove this line before deploying the code to avoid console.log() in production.
        if (retorno){
            window.location.href = `${retorno.id}`;
        }
    }
}
// function enviarIdVariacao() {
//     const selectedData = getSelectedRadios();
//     if (selectedData) {
//         const {selectedIds, dataProduto} = selectedData;
//         fetch('../../../pagina/loja/pagina/produto/produtoVariacao.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded',
//             },
//             body: 'variacao=' + encodeURIComponent(selectedIds) + '&prod=' + encodeURIComponent(dataProduto)
//         })
//             .then(response => response.text())
//             .then(data => {
//                 console.log(data);
//                 window.location.href = `https://cratos.prod/loja/produto/${data.trim()}`;
//             })
//             .catch(error => console.error('Erro na requisição:', error));
//     }
// }
radios.forEach((radio) => {
    radio.addEventListener('click', function () {
        enviarIdVariacao();
    });
});

document.querySelector('.add-to-cart-btn').addEventListener('click', function (e) {
    e.preventDefault();
    enviarIdVariacao();
});