var paginacao = 1;
var filtro = "";

function configuraElementos(){
    const inputsGeral = document.querySelectorAll('#inputsEdicaoEstoque .form-control');
    const inputEstoqueEdicao = document.querySelectorAll('#inputsEdicaoEstoque .input-edicao');
    const inputPrecoEdicao = document.querySelectorAll('#inputsEdicaoEstoque .input-preco');
    const inputPrecoPromoEdicao = document.querySelectorAll('#inputsEdicaoEstoque .input-precoPromo');
    const btnAtivo = document.querySelectorAll('#inputsEdicaoEstoque .btnAtivo')
    const btnDelete = document.querySelectorAll('.btnDelete')

    btnAtivo.forEach((botao)=>{
        botao.addEventListener('click',async(event)=>{
            const idProduto = event.target.value
            let form = document.createElement('form')
            const retorno = await postRetorno('adm/produtos/alterarativo/'+idProduto,form) 
            
            if(retorno.sucesso){    
                if(event.target.classList.contains('text-danger')){
                    var conteudo = '<span class="mdi mdi-lock-check"></span> Ativo';
                    event.target.classList.remove('btn-outline-danger')
                    event.target.classList.add('btn-outline-success')
                    event.target.classList.remove('text-danger')
                    event.target.classList.add('text-success')
                    event.target.innerHTML = conteudo
                }else{
                    var conteudo = '<span class="mdi mdi-lock-open-check"></span> Desativado';
                    event.target.classList.add('btn-outline-danger')
                    event.target.classList.add('text-danger')
                    event.target.classList.remove('text-success')
                    event.target.innerHTML = conteudo
                }
                // mensagem(retorno.mensagem)    
            }else{
                mensagem(retorno.mensagem,'erro')
            }
        })
    })
    
    inputsGeral.forEach((input) => {
        input.addEventListener('change', async (event) => {
            const form = document.createElement('form')
            const idprodutovariacao = event.target.getAttribute('id')
            const nameInput = event.target.getAttribute('name')
            const valor = event.target.value
            const retorno = await postRetorno(`adm/produtos/alterarestoque/${nameInput}/${idprodutovariacao}/${valor}`,form)
            if(retorno){
                mensagem(retorno.mensagem)
                event.target.classList.add('bg-success-subtle')
                event.target.classList.add('border-success')
            }else{
                mensagem(retorno.mensagem,'erro')
                event.target.classList.add('bg-danger-subtle')
                event.target.classList.add('border-danger')
            }
        });
    });
    
    inputEstoqueEdicao.forEach((input) => {
        input.addEventListener('change', (event) => {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        });
    });
    
    inputPrecoEdicao.forEach((input) => {
        input.addEventListener('change', (event) => {
            event.target.value = event.target.value.replace(/[^0-9.]/g, '');
            event.target.value = 'R$ ' + event.target.value;
        });
        input.addEventListener('focusin', (event) => {
            event.target.value = event.target.value.replace(/[^0-9.]/g, '');
        });
        input.addEventListener('focusout', (event) => {
            event.target.value = event.target.value.replace(/[^0-9.]/g, '');
            event.target.value = 'R$ ' + event.target.value;
        });
    });
    
    inputPrecoPromoEdicao.forEach((input) => {
        input.addEventListener('change', (event) => {
            event.target.value = event.target.value.replace(/[^0-9.]/g, '');
            event.target.value = 'R$ ' + event.target.value;
        });
        input.addEventListener('focusin', (event) => {
            event.target.value = event.target.value.replace(/[^0-9.]/g, '');
        });
        input.addEventListener('focusout', (event) => {
            event.target.value = event.target.value.replace(/[^0-9.]/g, '');
            event.target.value = 'R$ ' + event.target.value;
        });
    });
    
    btnDelete.forEach((btn)=>{
        btn.addEventListener('click',async(event)=>{
            var idproduto = event.target.value
            var form = document.createElement('form')
            const resultado = await postRetorno('adm/produtos/deleteproduto/'+idproduto,form)
            if(resultado.sucesso){
                var cardproduto = document.getElementById('cardproduto'+idproduto)
                cardproduto.remove()
                mensagem(resultado.mensagem)
            }else{
                mensagem(resultado.mensagem,'erro')
            }
        });
    });
}

async function listar(){
    var conteudo = await carregarConteudo(`adm/produtos/listar/${paginacao}/${filtro}`,'conteudoLista')
    if(conteudo.sucesso){
        setTimeout(function() {configuraElementos();}, 500);
    }
}

listar()
const inputBusca = document.getElementById('inputBusca');

async function buscar(){
    // alert('teste');
    const busca =inputBusca.value
    var conteudo = await carregarConteudo(`adm/produtos/busca/${busca}/${paginacao}/${filtro}`,'conteudoLista')
    if(conteudo.sucesso){
        setTimeout(function() {configuraElementos();}, 500);
    }
}
const boxBuscaRapida = document.getElementById('boxBuscaRapida')
const boxBuscaRapidaConteudo = document.getElementById('boxBuscaRapidaConteudo')

inputBusca.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    buscar()
    if (!boxBuscaRapida.classList.contains('d-none')) {
        boxBuscaRapida.classList.add('d-none');
    }
  }
});
inputBusca.addEventListener('keyup', () => {
    var qtdCaracteres = inputBusca.value;
    if (qtdCaracteres.length >= 3) {
        if (boxBuscaRapida.classList.contains('d-none')) {
            boxBuscaRapida.classList.remove('d-none');
        }
        const busca =inputBusca.value
        var conteudo = carregarConteudo(`adm/produtos/buscarapida/${busca}/${paginacao}/${filtro}`,'boxBuscaRapidaConteudo')
        if(conteudo.sucesso){
            setTimeout(function() {configuraElementos();}, 500);
        }
    }else{
        if (!boxBuscaRapida.classList.contains('d-none')) {
            boxBuscaRapida.classList.add('d-none');
            boxBuscaRapidaConteudo.innerHTML = ""
        }
    }
});
inputBusca.addEventListener('focusin',()=>{
    var qtdCaracteres = inputBusca.value;
    if (qtdCaracteres.length >= 3) {
        if (boxBuscaRapida.classList.contains('d-none')) {
            boxBuscaRapida.classList.remove('d-none');
        }
    }else{
        if (!boxBuscaRapida.classList.contains('d-none')) {
            boxBuscaRapida.classList.add('d-none');
            boxBuscaRapidaConteudo.innerHTML = ""
        }
    }
})

document.addEventListener('click', (event) => {
    if (!boxBuscaRapida.contains(event.target) && !inputBusca.contains(event.target)) {
        if (!boxBuscaRapida.classList.contains('d-none')) {
            boxBuscaRapida.classList.add('d-none');
        }
    }
});