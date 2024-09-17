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
        const form = document.createElement('form');
        const retorno = await postRetorno('loja/produto/produtovariacao/' + selectedIds + '/' + dataProduto, form)
        console.log(retorno.id);
        if (retorno) {
            window.location.href = `${retorno.id}`;
        }
    }
}

radios.forEach((radio) => {
    radio.addEventListener('click', function () {
        enviarIdVariacao();
    });
});


async function adicionarCarrinho(variacao) {
    const quantidade = document.getElementById('quantidade').value;
    const form = document.createElement('form');
    const retorno = await postRetorno('loja/produto/addCarrinho/' + variacao + '/' + quantidade, form)
    if (retorno.sucesso) {
        mensagemToast('Sucesso!', 'Produto inserido no carrinho!', 'success', 'toast-top-right')
    } else {
        mensagemToast('Algo deu errado!', retorno.mensagem, 'error', 'toast-top-right')
    }
    setTimeout(() => {
        window.location.reload();
    }, 1500);
}

async function atualizarQuantidade(variacao, operacao) {
    const form = document.createElement('form');
    const retorno = await postRetorno('loja/produto/upQtdCarrinho/' + variacao + '/' + operacao, form)
    // if (retorno.sucesso) {
    //     mensagemToast('Sucesso!', retorno.mensagem, 'success', 'toast-top-right')
    // } else {
    //     mensagemToast('Algo deu errado!', retorno.mensagem, 'error', 'toast-top-right')
    // }
    window.location.reload();
}

function upQtdDelProd(classe,operacao){
    document.querySelectorAll(classe).forEach(button => {
        button.addEventListener('click', function () {
            let idProdutoVariacao = this.getAttribute('data-id');
            atualizarQuantidade(idProdutoVariacao, operacao);
        });
    });
}
upQtdDelProd('.qtdmais','up')
upQtdDelProd('.qtdmenos','down')
upQtdDelProd('.remover','del')

document.querySelectorAll('.qtd-input').forEach(input => {
    input.addEventListener('change', function () {
        let idProdutoVariacao = this.getAttribute('data-id');
        let novaQuantidade = this.value;
        if (novaQuantidade < 1) {
            novaQuantidade = 1;
            this.value = 1;
        }
        atualizarQuantidade(idProdutoVariacao, novaQuantidade);
    });
});