<style>
.btnTopRight {
    position: absolute;
    top: 0;
    right: 0;
    margin-top: -15px;
    margin-right: -15px;
    transform: scale(0.8);
}
</style>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.6/JsBarcode.all.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= $_PREFIXO?>source/bibliotecas/textoeditor/css/style.css" />
</head>

<form action="<?= $_PREFIXO?>pagina/painel/pagina/produtos/acoes/cadastrarproduto.php" method="post" id="formularioProduto" enctype="multipart/form-data">
    <div class="container" style="max-width:780px;" id="conteudoInputs">
        <h2>Novo Produto</h2>
        <div class="d-flex flex-column gap-3 mb-0">
            <div class="card">
                <div class="card-body d-flex flex-column gap-2">
                    <h5>Nome e descricao</h5>
                    <div>
                        <label for="produto_produto" class="form-text">Nome</label>
                        <input type="text" class="form-control" name="produto" id="inputProduto">
                    </div>
                    <div>
                        <label for="produto_descricao">Descrição</label>
                        <div class="card p-3">
                            <div>
                                <div class="container">
                                    <div class="options">
                                        <!-- Text Format -->
                                        <button type="button" id="bold" class="option-button format buttonEditor">
                                            <i class="fa-solid fa-bold"></i>
                                        </button>
                                        <button type="button" id="italic" class="option-button format buttonEditor">
                                            <i class="fa-solid fa-italic"></i>
                                        </button>
                                        <button type="button" id="underline" class="option-button format buttonEditor">
                                            <i class="fa-solid fa-underline"></i>
                                        </button>
                                        <button type="button" id="strikethrough"
                                            class="option-button format buttonEditor">
                                            <i class="fa-solid fa-strikethrough"></i>
                                        </button>
                                        <button type="button" id="superscript"
                                            class="option-button script buttonEditor">
                                            <i class="fa-solid fa-superscript"></i>
                                        </button>
                                        <button type="button" id="subscript" class="option-button script buttonEditor">
                                            <i class="fa-solid fa-subscript"></i>
                                        </button>
                                        <!-- List -->
                                        <button type="button" id="insertOrderedList" class="option-button buttonEditor">
                                            <div class="fa-solid fa-list-ol"></div>
                                        </button>
                                        <button type="button" id="insertUnorderedList"
                                            class="option-button buttonEditor">
                                            <i class="fa-solid fa-list"></i>
                                        </button>
                                        <!-- Undo/Redo -->
                                        <button type="button" id="undo" class="option-button buttonEditor">
                                            <i class="fa-solid fa-rotate-left"></i>
                                        </button>
                                        <button type="button" id="redo" class="option-button buttonEditor">
                                            <i class="fa-solid fa-rotate-right"></i>
                                        </button>
                                        <!-- Link -->
                                        <button type="button" id="createLink" class="adv-option-button buttonEditor">
                                            <i class="fa fa-link"></i>
                                        </button>
                                        <button type="button" id="unlink" class="option-button buttonEditor">
                                            <i class="fa fa-unlink"></i>
                                        </button>
                                        <!-- Alignment -->
                                        <button type="button" id="justifyLeft" class="option-button align buttonEditor">
                                            <i class="fa-solid fa-align-left"></i>
                                        </button>
                                        <button type="button" id="justifyCenter"
                                            class="option-button align buttonEditor">
                                            <i class="fa-solid fa-align-center"></i>
                                        </button>
                                        <button type="button" id="justifyRight"
                                            class="option-button align buttonEditor">
                                            <i class="fa-solid fa-align-right"></i>
                                        </button>
                                        <button type="button" id="justifyFull" class="option-button align buttonEditor">
                                            <i class="fa-solid fa-align-justify"></i>
                                        </button>
                                        <button type="button" id="indent" class="option-button spacing buttonEditor">
                                            <i class="fa-solid fa-indent"></i>
                                        </button>
                                        <button type="button" id="outdent" class="option-button spacing buttonEditor">
                                            <i class="fa-solid fa-outdent"></i>
                                        </button>
                                        <!-- Headings -->
                                        <select id="formatBlock" class="adv-option-button">
                                            <option value="H1">H1</option>
                                            <option value="H2">H2</option>
                                            <option value="H3">H3</option>
                                            <option value="H4">H4</option>
                                            <option value="H5">H5</option>
                                            <option value="H6">H6</option>
                                        </select>
                                        <!-- Font -->
                                        <select id="fontName" class="adv-option-button"></select>
                                        <select id="fontSize" class="adv-option-button"></select>
                                        <!-- Color -->
                                        <div class="input-wrapper">
                                            <input type="color" id="foreColor" class="adv-option-button" />
                                            <label for="foreColor">Font Color</label>
                                        </div>
                                        <div class="input-wrapper">
                                            <input type="color" id="backColor" class="adv-option-button" />
                                            <label for="backColor">Highlight Color</label>
                                        </div>
                                    </div>
                                    <div id="text-input" contenteditable="true"
                                        style="max-height:250px; overflow-y:scroll;"></div>
                                </div>

                                <script src="<?= $_PREFIXO?>source/bibliotecas/textoeditor/js/script.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h5>Fotos</h5>
                    <div class="d-flex flex-wrap gap-3 mt-3" id="SequenciaFotosProduto" style="position:relative;">
                        <button type="button" class="btn btn-secondary"
                            style="position:absolute;top:0; left:10px;z-index:1;transform:scale(0.8);margin-top:-15px;">Foto
                            Principal</button>
                        <button type="button" class="btn btn-outline-secondary" style="width:150px;height:150px;"
                            onclick="adicionarFoto()" id="btnAdd">
                            <span class="mdi mdi-plus-circle-outline"></span>
                        </button>
                    </div>
                </div>
                <script src="<?= $_PREFIXO?>source/js/adm/produtos/addfotos.js"></script>
            </div>

            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h5>Video</h5>
                    <label for="video_video" class="form-text">Cole um link do Youtube ou do Vimeo sobre o seu
                        produto</label>
                    <input type="text" class="form-control" name="video" id="inputVideo">
                    <div class="flex-fill text-center mt-3">
                        <div id="video"></div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body d-flex flex-column gap-2">
                    <h5>Categoria</h5>
                    <div class="d-flex flex-wrap gap-3" id="listaCategoria"></div>
                    <div>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#modalAdiconarCategoria" id="btnAdiconarCategoria"
                            onclick="visualizarCategorias()">
                            <span class="mdi mdi-plus-circle-outline"></span>
                            <span class="px-2">Adicionar categoria</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="card" id="cardPrecos">
                <div class="card-body">
                    <h5>Preços</h5>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="d-flex flex-fill gap-3 col-md-5">
                            <div class="flex-fill">
                                <label for="" class="form-text">Preço de venda</label>
                                <input type="text" class="form-control flex-fill" name="venda"
                                    id="estoque_venda" placeholder="R$ 0.00">
                            </div>
                            <div class="flex-fill">
                                <label for="" class="form-text">Preço promocional</label>
                                <input type="text" class="form-control flex-fill" name="vendaPromocional"
                                    id="estoque_vendapromocional" placeholder="R$ 0.00">
                            </div>
                        </div>
                        <div class="d-flex flex-fill gap-3 col-md-5">
                            <div class="flex-fill">
                                <label for="" class="form-text">Custo</label>
                                <input type="text" class="form-control flex-fill" name="custo"
                                    id="estoque_custo" placeholder="R$ 0.00">
                            </div>
                            <div class="flex-fill">
                                <label for="" class="form-text">Margem de lucro</label>
                                <input type="text" class="form-control flex-fill" id="margemLucro" placeholder="--"
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="cardEstoque">
                <div class="card-body d-flex flex-column">
                    <h5>Estoque</h5>
                    <label for="estoque_estoque" class="form-text">Quantidade</label>
                    <div class="d-flex gap-3">
                        <input type="text" class="form-control" name="estoque_estoque" id="inputEstoque" disabled
                            placeholder="&#8734;">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Infinito</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="cardCodigos">
                <div class="card-body d-flex flex-column gap-2">
                    <h5>Códigos</h5>
                    <div>
                        <label for="codigo_sku" class="form-text">SKU</label>
                        <input type="text" class="form-control" name="codigo_sku" id="codigo_sku">
                        <div id="codigo_sku_help" class="form-text">
                            SKU é um código que você cria internamente para ter o controle dos seus produtos com
                            variações.
                        </div>
                    </div>
                    <div>
                        <label for="codigo_barras">Codigo de Barras</label>
                        <input tipe="text" name="codigo_barras" class="form-control" id="input-codigo-barras"></input>
                        <div id="codigo_sku_help" class="form-text">
                            O código de barras é composto por 13 números e serve para identificar um produto.
                        </div>
                        <div class="text-center">
                            <svg id="barcode" class="d-none"></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="cardPesoDimensao">
                <div class="card-body d-flex flex-column gap-2">
                    <h5>Peso e dimensões</h5>
                    <p>Usaremos esses dados para calcular o custo de envio de seus produtos.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="d-flex flex-fill gap-3 col-md-5">
                            <div class="flex-fill ">
                                <label for="produtovariacao_peso" class="form-text">Peso</label>
                                <input type="text" class="form-control" name="peso"
                                    id="produtovariacao_peso" placeholder="0.000 Kg">
                            </div>
                            <div class="flex-fill ">
                                <label for="produtovariacao_comprimento" class="form-text">Comprimento</label>
                                <input type="text" class="form-control" name="comprimento"
                                    id="produtovariacao_comprimento" placeholder="0 cm">
                            </div>
                        </div>
                        <div class="d-flex flex-fill gap-3 col-md-5">
                            <div class="flex-fill ">
                                <label for="produtovariacao_largura" class="form-text">Largura</label>
                                <input type="text" class="form-control" name="largura"
                                    id="produtovariacao_largura" placeholder="0 cm">
                            </div>
                            <div class="flex-fill ">
                                <label for="produtovariacao_altura" class="form-text">Altura</label>
                                <input type="text" class="form-control" name="altura"
                                    id="produtovariacao_altura" placeholder="0 cm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex flex-column gap-2">
                    <h5>Variações</h5>
                    <p>Combine diferentes propriedades do seu produto. Exemplo: cor + tamanho.</p>
                    <div class="d-flex flex-wrap gap-3" id="listaVariacoes"></div>
                    <div>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" id="btnAdiconarVariacao" onclick="ouvindoSelecionados()">
                            <span class="mdi mdi-plus-circle-outline"></span>
                            <span class="px-2">Adicionar variações</span>
                        </button>
                    </div>
                    <button type="button" class="btn btn-light border" id="btnGerarVariacoes" value="True"
                        onclick="gerar()">Gerar
                        Variações</button>
                </div>
            </div>

            <div id="variacoesGeradas" class=" d-flex flex-column gap-3">
            </div>

            <div class="d-flex justify-content-end gap-3 mb-4 ">
                <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Salvar Produto</button>
                <!-- <button type="button" class="btn btn-primary" onclick="cadastrarProduto()">Salvar Produto</button> -->
            </div>
        </div>
    </div>
    </div>
</form>



<div class="modal fade" id="modalAdiconarCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Nova Categoria</h1>
                <button type="button" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="select-categorias">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="button" type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    onclick="addCategoria()">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nova Variação</h1>
                <button type="button" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="select-variacoes">
                </div>
                <div id="sub-select-variacoes" class="p-2">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="button" type="button" class="btn btn-primary"
                    onclick="criarArray('#sub-select-variacoes .form-check-input')">Criar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?=$_PREFIXO?>source/js/adm/produtos/pg-cadastro.js"></script>
<script>
carregarConteudo('adm/produtos/selectvariacoes', 'select-variacoes')
carregarConteudo('adm/produtos/selectcategorias', 'select-categorias')
</script>