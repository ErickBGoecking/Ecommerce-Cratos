// ------------------ ELEMENTOS HTML -----------------
const inputNomeProduto = document.getElementById('inputProduto')
const inputDescricao = document.getElementById('texto-editado')

const descricao = document.getElementById('descricao')
const detalhes = document.getElementById('inputDetalhes')

const cardPrecos = document.getElementById('cardPrecos')
const cardEstoque = document.getElementById('cardEstoque')
const cardCodigos = document.getElementById('cardCodigos')
const cardPesoDimensao = document.getElementById('cardPesoDimensao')
const btnAdiconarVariacao = document.getElementById('btnAdiconarVariacao')

const inputVideo = document.getElementById('inputVideo')
const videoDiv = document.getElementById('video')

const precoVenda = document.getElementById('estoque_venda')
const precoVendaPromocional = document.getElementById('estoque_vendapromocional')
const inputCusto = document.getElementById('estoque_custo')
const margemLucro = document.getElementById('margemLucro')

const inputEstoque1 = document.getElementById('inputEstoque')
const controleSwitch = document.getElementById('flexSwitchCheckDefault')

const btnNovoFornecedor = document.getElementById('btnNovoFornecedor')

const inputSku = document.getElementById('codigo_sku')
const inputCodigoBarras = document.getElementById("input-codigo-barras");
const codigoDeBarras = document.getElementById("barcode")

const inputPeso = document.getElementById('produtovariacao_peso')
const inputComprimento = document.getElementById('produtovariacao_comprimento')
const inputLargura = document.getElementById('produtovariacao_largura')
const inputAltura = document.getElementById('produtovariacao_altura')
           
const divListaVariacoes = document.getElementById('listaVariacoes')
const divVariacoesGeradas = document.getElementById('variacoesGeradas')

const btnGerarVariacoes = document.getElementById('btnGerarVariacoes')
const modalGeral = document.getElementById('modalGeral')
const modalGeralTitulo = document.getElementById('modalGeralTitulo')
const modalGeralConteudo = document.getElementById('modalGeralConteudo')

const ferramentasEdicaoTexto = document.getElementById('ferramentasEdicaoTexto')

const toastLiveExample = document.getElementById('liveToast')
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

var areaHoverList = document.querySelectorAll('#areaHover')


// ----------------- video ------------------
inputVideo.addEventListener('change', () => {
    if (inputVideo.value != "") {
        videoDiv.classList.remove('d-none')
        carregarVideo()
    } else {
        if (!videoDiv.classList.contains('d-none')) {
            videoDiv.classList.add('d-none')
        }
    }
})

function extrairCodigoDoVideo(link) {
    const parametroV = 'v=';
    const indiceV = link.indexOf(parametroV);
    if (indiceV !== -1) {
        const codigo = link.substring(indiceV + parametroV.length);
        return codigo;
    } else {
        return null;
    }
}

function carregarVideo() {
    const videoCode = extrairCodigoDoVideo(inputVideo.value);

    if (videoCode) {
        videoDiv.innerHTML = '';

        const iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube.com/embed/' + videoCode;
        iframe.width = '640';
        iframe.height = '360';
        iframe.allowFullscreen = true;

        videoDiv.appendChild(iframe);
    } else {
        alert('Insira um link válido do YouTube ou Vimeo.');
        iframe.src = "";
    }
}
// ---------------------DESCRICAO----------------------
const textDescricao = document.getElementById('textDescricao')
textDescricao.addEventListener('focusout',()=>{
    descricao.textContent = textDescricao.innerHTML
})
// ------------------------DETALHE--------------------------
const textDetalhe = document.getElementById('textDetalhe')
textDetalhe.addEventListener('focusout',()=>{
    detalhes.textContent = textDetalhe.innerHTML
})
// -------------------CATEGORIAS--------------------------

function addCategoria() {
    const inputSelectCategoria = document.getElementById('inputSelectCategoria');
    const listaCategoria = document.getElementById('listaCategoria');

    let categoria = inputSelectCategoria.value
    dado = categoria.split('-')

    let string = `
    <div>
        <input type="text" name="categoria" value="${dado[0]}" class="d-none" id="inputCategoria">
        <button class="btn btn-secondary d-flex gap-3">
            ${dado[1]}
            <span class="mdi mdi-delete"></span>
        </button>
    </div>
    `
    listaCategoria.innerHTML = string
}
// ------------- PREÇOS ---------------------------

function calcular() {
    if (precoVenda.value.replace(/[^0-9.]/g, '') != "" && inputCusto.value.replace(/[^0-9.]/g, '') !=
        "") {
        if (precoVendaPromocional.value.replace(/[^0-9.]/g, '') == "") {
            calculo = precoVenda.value.replace(/[^0-9.]/g, '') - inputCusto.value.replace(/[^0-9.]/g, '')
            calculo = calculo.toFixed(2)
            margemLucro.value = "R$ " + calculo
        } else {
            calculo = precoVendaPromocional.value.replace(/[^0-9.]/g, '') - inputCusto.value.replace(
                /[^0-9.]/g, '')
            calculo = calculo.toFixed(2)
            margemLucro.value = "R$ " + calculo
        }
    } else {
        margemLucro.value = "--"
    }
}
precoVenda.addEventListener('change', () => {
    precoVenda.value = precoVenda.value.replace(/[^0-9.]/g, '');
    calcular()
})
precoVenda.addEventListener('focusout', () => {
    if(precoVenda.value != ""){
        precoVenda.value = "R$ " + precoVenda.value
    }
})
precoVenda.addEventListener('focusin', () => {
    precoVenda.value = precoVenda.value.replace(/[^0-9.]/g, '');
})
precoVendaPromocional.addEventListener('change', () => {
    precoVendaPromocional.value = precoVendaPromocional.value.replace(/[^0-9.]/g, '');
    calcular()
})
precoVendaPromocional.addEventListener('focusin', () => {
    precoVendaPromocional.value = precoVendaPromocional.value.replace(/[^0-9.]/g, '');
})
precoVendaPromocional.addEventListener('focusout', () => {
    if(precoVendaPromocional.value != ""){
        precoVendaPromocional.value = "R$ " + precoVendaPromocional.value
    }
})
inputCusto.addEventListener('change', () => {
    inputCusto.value = inputCusto.value.replace(/[^0-9.]/g, '');
    calcular()

})
inputCusto.addEventListener('focusin', () => {
    inputCusto.value = inputCusto.value.replace(/[^0-9.]/g, '');
})
inputCusto.addEventListener('focusout', () => {
    if(inputCusto.value != ""){
        inputCusto.value = "R$ " + inputCusto.value
        calcular()
    }
})

// -----------------------ESTOQUE----------------------------

inputEstoque1.addEventListener('change', () => {
    inputEstoque1.value = inputEstoque1.value.replace(/\D/g, '');
})
inputEstoque.addEventListener('keydown', () => {
    inputEstoque1.value = inputEstoque1.value.replace(/\D/g, '');
})

controleSwitch.addEventListener('change', () => {
    if (controleSwitch.checked) {
        inputEstoque1.disabled = true;
        inputEstoque1.value = ""
    } else {
        inputEstoque1.disabled = false;
    }
})
// ------------------------FORNECEDOR-----------------------
async function cadastrarFornecedor(){
    const formFornecedor = document.getElementById('frmCadastrarFornecedor')
    const btnCancelarCadastro = document.getElementById('btnCancelarCadastroFornecedor')
    const $retorno = await postRetorno('adm/produtos/cadastronovofornecedor',formFornecedor)
    if($retorno.sucesso == true){
        mensagem($retorno.mensagem)
        carregarConteudo('adm/produtos/selectfornecedor/'+$retorno.id,'divSelectFornecedor')
        btnCancelarCadastro.click()
    }else{
        console.log($retorno.mensagem)
        mensagem($retorno,'erro')
    }
}

btnNovoFornecedor.addEventListener('click',()=>{
    carregarConteudo('adm/produtos/formnovofornecedor','modalGeralConteudo')
    modalGeralTitulo.innerHTML = "<h5>Adicionar Fornecedor</h5>"
})


// ------------------------codigos------------------------

inputCodigoBarras.addEventListener('change', () => {
    if (codigoDeBarras.classList.contains('d-none') && inputCodigoBarras.value != "") {
        codigoDeBarras.classList.remove('d-none')
    }

    JsBarcode("#barcode", inputCodigoBarras.value, {
        format: "code128",
        displayValue: true,
        fontSize: 24,
        lineColor: "#000",
    });
});
inputCodigoBarras.addEventListener('focusout', () => {
    if (inputCodigoBarras.value == "") {
        codigoDeBarras.classList.add('d-none')
    }
})
// ---------------PRESOS E DIMENÇÕES-------------------
inputPeso.addEventListener('change', () => {
    inputPeso.value = inputPeso.value.replace(/[^0-9.]/g, '');
})
inputPeso.addEventListener('focusin', () => {
    inputPeso.value = inputPeso.value.replace(/[^0-9.]/g, '');
})
inputPeso.addEventListener('focusout', () => {
    if (inputPeso.value != "") {
        inputPeso.value += " kg"
    }
})
inputComprimento.addEventListener('change', () => {
    inputComprimento.value = inputComprimento.value.replace(/[^0-9.]/g, '');
})
inputComprimento.addEventListener('focusin', () => {
    inputComprimento.value = inputComprimento.value.replace(/[^0-9.]/g, '');
})
inputComprimento.addEventListener('focusout', () => {
    if (inputComprimento.value != "") {
        inputComprimento.value += " cm"
    }
})
inputLargura.addEventListener('change', () => {
    inputLargura.value = inputLargura.value.replace(/[^0-9.]/g, '');
})
inputLargura.addEventListener('focusin', () => {
    inputLargura.value = inputLargura.value.replace(/[^0-9.]/g, '');
})
inputLargura.addEventListener('focusout', () => {
    if (inputLargura.value != "") {
        inputLargura.value += " cm"
    }
})
inputAltura.addEventListener('change', () => {
    inputAltura.value = inputAltura.value.replace(/[^0-9.]/g, '');
})
inputAltura.addEventListener('focusin', () => {
    inputAltura.value = inputAltura.value.replace(/[^0-9.]/g, '');
})
inputAltura.addEventListener('focusout', () => {
    if (inputAltura.value != "") {
        inputAltura.value += " cm"
    }
})

// -------------------------VARIAÇOES-------------------------

var divSubVariacoes = ""
var inputSelectVariacoes = ""
var listaVariaveis = []

function ouvindoSelecionados() {
    divSubVariacoes = document.getElementById('sub-select-variacoes')
    inputSelectVariacoes = document.getElementById('inputSelectVariacoes')

    inputSelectVariacoes.addEventListener('change', () => {
        carregarConteudo('adm/produtos/selectsubvariacoes/' +
            inputSelectVariacoes.value, 'sub-select-variacoes')
        }
    )
}

function criarBotoesVariacoes() {
    divListaVariacoes.innerHTML = ""
    divVariacoesGeradas.innerHTML = ""

    for (const titulo in listaVariaveis) {
        let svg = document.createElement('span')
        svg.classList.add('mdi')
        svg.classList.add('mdi-delete-outline')

        let btnExcluirTitulo = document.createElement('button')
        btnExcluirTitulo.classList.add('btn')
        btnExcluirTitulo.classList.add('btn-secondary')
        btnExcluirTitulo.classList.add('rounded-circle')
        // btnExcluirTitulo.classList.add('rounded-circle')
        btnExcluirTitulo.classList.add('btnTopRight')

        btnExcluirTitulo.appendChild(svg)

        let div1 = document.createElement('div')
        div1.classList.add('d-flex')
        div1.classList.add('flex-column')
        div1.classList.add('card')
        div1.classList.add('p-3')

        btnExcluirTitulo.onclick = function() {
            div1.remove()
            apagarDoArrayAtributo(titulo)
        };

        div1.appendChild(btnExcluirTitulo)


        let div2 = document.createElement('div')
        div2.classList.add('d-flex')
        div2.classList.add('flex-column')
        div2.classList.add('gap-1')

        if (listaVariaveis.hasOwnProperty(titulo)) {
            let tituloVariacao = document.createElement('h5')
            tituloVariacao.textContent = titulo
            div1.appendChild(tituloVariacao)

            listaVariaveis[titulo].forEach(sub => {
                let valor = sub.split('-')
                let div3 = document.createElement('div')
                div3.classList.add('d-flex')

                let svg2 = document.createElement('span')
                svg2.classList.add('mdi')
                svg2.classList.add('mdi-delete-outline')

                let btnExcluirSub = document.createElement('button')
                btnExcluirSub.classList.add('btn')
                btnExcluirSub.classList.add('btn-outline-secondary')
                btnExcluirSub.appendChild(svg2)

                let input = document.createElement('input')
                input.classList.add('form-control')
                input.disabled = true
                input.value = valor[2]
                input.name = valor[0] + '-' + valor[1]

                btnExcluirSub.onclick = function() {
                    apagarDoArray(valor[0], sub, div1)
                    input.remove()
                    btnExcluirSub.remove()
                };

                div3.appendChild(input)
                div3.appendChild(btnExcluirSub)
                div2.appendChild(div3)
            });
        }
        div1.appendChild(div2)
        divListaVariacoes.appendChild(div1)
    }
}

function criarArray(pesquisa) {
    const formCheckInputs = document.querySelectorAll(
        pesquisa);
    meuArray = []
    formCheckInputs.forEach((input) => {
        if (input.checked) {
            meuArray.push(input.name)
        }
    });
    titulo = meuArray[0].split('-')
    listaVariaveis[titulo[0]] = meuArray
    criarBotoesVariacoes()
}
function gerar(){
    divListaVariacoes.innerHTML = ""
    divVariacoesGeradas.innerHTML = ""
    if(btnGerarVariacoes.value == "True"){
        if(Object.keys(listaVariaveis).length == 0){ 
            mensagem('Você deve primeiro adicionar uma variação!','erro')
        }else{
            btnGerarVariacoes.value = "False"
            btnGerarVariacoes.textContent = "Remover Variações"
            gerarCombinacoes(listaVariaveis)
            listaVariaveis = []

            cardPrecos.classList.add('d-none')
            cardEstoque.classList.add('d-none')
            cardCodigos.classList.add('d-none')
            cardPesoDimensao.classList.add('d-none')
            btnAdiconarVariacao.classList.add('d-none')
        }
    }else{
        btnGerarVariacoes.value = "True"
        btnGerarVariacoes.textContent = "Gerar Variações"
        cardPrecos.classList.remove('d-none')
        cardEstoque.classList.remove('d-none')
        cardCodigos.classList.remove('d-none')
        cardPesoDimensao.classList.remove('d-none')
        btnAdiconarVariacao.classList.remove('d-none')
    }
}

function gerarCombinacoes(array, index = 0, prefixo = '',id='') {
    if (index === Object.keys(array).length) {
        if(prefixo != ""){
            criarElementos(prefixo,id)
        }
        return;
    }
    const chave = Object.keys(array)[index];
    const valores = array[chave];

    for (const valor of valores) {
        let valorSeparado = valor.split('-')
        let valorNovo = valorSeparado[0] + ': ' + valorSeparado[2]
        let valorId = valorSeparado[1]
        if (prefixo == "") {
            gerarCombinacoes(array, index + 1, `${valorNovo}`, `${valorId}`);
        } else {
            gerarCombinacoes(array, index + 1, `${prefixo} / ${valorNovo}`,`${id},${valorId}`);
        }

    }
    const variacoesDetalhe = document.querySelectorAll('.variacaoDetalhe')

    var contagem = 1
    for(const vDetalhe of variacoesDetalhe){
        const textAreaVDetalhe = document.getElementById('variavelDetalhe'+contagem)
        
        vDetalhe.addEventListener('focusout',()=>{
            textAreaVDetalhe.textContent = vDetalhe.innerHTML
        })

        contagem++
    }
       
    // ------------------FERRAMENTA EDITOR DE texto --------------------

    areaHoverList = document.querySelectorAll('#areaHover')
    areaHoverList.forEach((element) => {
        element.addEventListener('mouseover', (event) => {
            ferramentasEdicaoTexto.classList.remove('d-none');
            element.appendChild(ferramentasEdicaoTexto);
        });
        element.addEventListener('mouseout', (event) => {
            ferramentasEdicaoTexto.classList.add('d-none');
        });
    });
}
function apagarDoArrayAtributo(atributo) {
    delete listaVariaveis[atributo]
}

function apagarDoArray(titulo, valor, div) {

    let novoArray = listaVariaveis[titulo]
    for (indice in novoArray) {
        if (novoArray[indice] == valor) {
            novoArray.splice(indice, 1)
            listaVariaveis[titulo] = novoArray
            if (novoArray.length == 0) {
                apagarDoArrayAtributo(titulo)
                div.remove()
            }
        }
    }
}
numeroId=0
function exibirMais(id,div){
    let btn = document.getElementById(id)
    let divEscondida = document.getElementById(div)

    if(btn.value == "True"){
        divEscondida.style.height = "auto"
        btn.value = "False"
        btn.innerHTML = `<span class="mdi mdi-arrow-up-drop-circle-outline" style="transform:scale(1.5);"></span>`
    }else{
        divEscondida.style.height = "95px"
        btn.value = "True"
        btn.innerHTML = `<span class="mdi mdi-arrow-down-drop-circle-outline" style="transform:scale(1.5);"></span>`
    }
}
function criarElementos(topoTitulo,id) {
    numeroId ++
    let string = `
    <div class="card">
        <div class="card-header">
            Variação: <h5>${topoTitulo}</h5>
        </div>
        <div class="card-body d-flex flex-wrap gap-3 justify-content-between align-items-between" id="divMais${numeroId}" style="height:95px; overflow: hidden">
            <input type="text" name="idTipoVariacao[]" class="d-none" value="${id}">
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Estoque</label>
                <input type="text" class="form-control" name="VariacaoEstoque[]" value="${inputEstoque1.value}" placeholder="&#8734;">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Preço Venda</label>
                <input type="text" class="form-control" name="VariacaoPrecoVenda[]" value="${precoVenda.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Preço Promocional</label>
                <input type="text" class="form-control" name="VariacaoPrecoPromocional[]" value="${precoVendaPromocional.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Custo</label>
                <input type="text" class="form-control" name="VariacaoCusto[]" value="${inputCusto.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Peso</label>
                <input type="text" class="form-control" name="VariacaoPeso[]" value="${inputPeso.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Comprimento</label>
                <input type="text" class="form-control" name="VariacaoComprimento[]" value="${inputComprimento.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Largura</label>
                <input type="text" class="form-control" name="VariacaoLargura[]" value="${inputLargura.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Altura</label>
                <input type="text" class="form-control" name="VariacaoAltura[]" value="${inputAltura.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">SKU</label>
                <input type="text" class="form-control" name="VariacaoSku[]" value="${inputSku.value}">
            </div>
            <div class="d-flex flex-column flex-fill">
                <label for="" class="form-label">Código de Barras</label>
                <input type="text" class="form-control" name="VariacaoCodigoBarras[]" value="${inputCodigoBarras.value}">
            </div>

        </div>
        
        <Button type="button" class="btn btn-primary rounded-circle p-1 pt-0 pb-0 d-flex gap-2" id="btn${numeroId}"
            value="True"
            style="position:absolute; bottom:-15px; right:50%;"
            onclick="exibirMais('btn${numeroId}','divMais${numeroId}')">
            <span class="mdi mdi-arrow-down-drop-circle-outline" style="transform:scale(1.5);"></span>
        </Button>
    </div>
    `;

    divVariacoesGeradas.innerHTML += string

    var divAreaHover = document.createElement('div')
    divAreaHover.style.position = 'relative'
    divAreaHover.style.width = '100%'
    divAreaHover.setAttribute('id','areaHover')

    var tituloLabel = document.createElement('label')
    tituloLabel.classList.add('form-label')
    tituloLabel.innerText = 'Detalhes'

    var textoInput = document.createElement('div')
    textoInput.setAttribute('id','text-input'+numeroId)
    textoInput.classList.add('border')
    textoInput.classList.add('rounded')
    textoInput.classList.add('variacaoDetalhe')
    textoInput.classList.add('p-3')
    textoInput.setAttribute('contenteditable','true')
    textoInput.style.height = '250px'
    textoInput.style.overflowY = 'scroll'
    textoInput.innerHTML = textDetalhe.innerHTML

    var inputTextoArea = document.createElement('textarea')
    inputTextoArea.name = 'variavelDetalhe[]'
    inputTextoArea.classList.add('d-none')
    inputTextoArea.setAttribute('id','variavelDetalhe'+numeroId)
    inputTextoArea.textContent = textDetalhe.innerHTML
    
    divAreaHover.appendChild(tituloLabel)
    divAreaHover.appendChild(textoInput)

    var divConteudo = document.getElementById('divMais'+numeroId)
    divConteudo.appendChild(divAreaHover)
    divConteudo.appendChild(inputTextoArea)
}
// -----------CADASTRAR PRODUTO -------------------

async function cadastrarProduto(){
    var form = document.getElementById('formularioProduto')

    const produto = await postRetorno('adm/produtos/cadastrarproduto',form)
    
    if(produto.sucesso){
        mensagem(produto.mensagem)
        
    }else{
        mensagem(produto.mensagem,erro)
    }

}