<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.6/JsBarcode.all.min.js"></script>
</head>

<div class="container" style="max-width:780px;">
    <h2>Novo Produto</h2>
    <div class="d-flex flex-column gap-3">
        <div class="card">
            <div class="card-body d-flex flex-column gap-2">
                <h5>Nome e descricao</h5>
                <div>
                    <label for="produto_produto" class="form-text">Nome</label>
                    <input type="text" class="form-control" name="produto_produto" id="produto_produto">
                </div>
                <div>
                    <label for="produto_descricao">Descrição</label>
                    <div class="card p-3">
                        <?php 
                    include_once('source/bibliotecas/textoEditor/texteditor.php');
                    inputTextoCopia('produto_descricao');
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex flex-column">
                <h5>Fotos</h5>
                <div class="d-flex flex-wrap gap-3 mt-3" id="SequenciaFotosProduto" style="position:relative;">
                    <button class="btn btn-secondary"
                        style="position:absolute;top:0; left:10px;z-index:1;transform:scale(0.8);margin-top:-15px;">Foto
                        Principal</button>
                    <button class="btn btn-outline-secondary" style="width:150px;height:150px;"
                        onclick="adicionarFoto()" id="btnAdd">
                        <span class="mdi mdi-plus-circle-outline"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex flex-column">
                <h5>Video</h5>
                <label for="video_video" class="form-text">Cole um link do Youtube ou do Vimeo sobre o seu
                    produto</label>
                <input type="text" class="form-control" name="video_video" id="inputVideo">
                <div class="flex-fill text-center mt-3">
                    <div id="video"></div>
                </div>
                <script>
                let inputVideo = document.getElementById('inputVideo')
                let videoDiv = document.getElementById('video')

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


                const iframe = document.createElement('iframe');
                function carregarVideo() {
                    if (inputVideo.value.includes('youtube.com') || inputVideo.value.includes('vimeo.com')) {
                        // alert('é do youtube')
                        videoDiv.innerHTML = '';

                        iframe.src = inputVideo.value;
                        iframe.width = '640';
                        iframe.height = '360';
                        iframe.allowFullscreen = true;

                        // Adiciona o iframe à div
                        videoDiv.appendChild(iframe);
                    } else {
                        alert('Insira um link válido do YouTube ou Vimeo.');
                        iframe.src = "";
                    }
                }
                </script>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>Preços</h5>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex flex-fill gap-3 col-md-5">
                        <div class="flex-fill">
                            <label for="" class="form-text">Preço de venda</label>
                            <input type="text" class="form-control flex-fill" name="estoque_venda" id="estoque_venda"
                                placeholder="R$ 0.00">
                        </div>
                        <div class="flex-fill">
                            <label for="" class="form-text">Preço promocional</label>
                            <input type="text" class="form-control flex-fill" name="estoque_vendapromocional"
                                id="estoque_vendapromocional" placeholder="R$ 0.00">
                        </div>
                    </div>
                    <div class="d-flex flex-fill gap-3 col-md-5">
                        <div class="flex-fill">
                            <label for="" class="form-text">Custo</label>
                            <input type="text" class="form-control flex-fill" name="estoque_custo" id="estoque_custo"
                                placeholder="R$ 0.00">
                        </div>
                        <div class="flex-fill">
                            <label for="" class="form-text">Margem de lucro</label>
                            <input type="text" class="form-control flex-fill" id="margemLucro" placeholder="--"
                                disabled>
                        </div>
                    </div>
                    <script>
                    let precoVenda = document.getElementById('estoque_venda')
                    let precoVendaPromocional = document.getElementById('estoque_vendapromocional')
                    let custo = document.getElementById('estoque_custo')
                    let margemLucro = document.getElementById('margemLucro')

                    function calcular() {
                        if (precoVenda.value.replace(/[^0-9.]/g, '') != "" && custo.value.replace(/[^0-9.]/g, '') !=
                            "") {
                            if (precoVendaPromocional.value.replace(/[^0-9.]/g, '') == "") {
                                calculo = precoVenda.value.replace(/[^0-9.]/g, '') - custo.value.replace(/[^0-9.]/g, '')
                                calculo = calculo.toFixed(2)
                                margemLucro.value = "R$ " + calculo
                            } else {
                                calculo = precoVendaPromocional.value.replace(/[^0-9.]/g, '') - custo.value.replace(
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
                        if (precoVenda.value != "") {
                            precoVenda.value = "R$ " + precoVenda.value
                        }
                        calcular()
                    })
                    precoVenda.addEventListener('focusin', () => {
                        precoVenda.value = precoVenda.value.replace(/[^0-9.]/g, '');
                    })
                    precoVendaPromocional.addEventListener('change', () => {
                        precoVendaPromocional.value = precoVendaPromocional.value.replace(/[^0-9.]/g, '');
                        if (precoVendaPromocional.value != "") {
                            precoVendaPromocional.value = "R$ " + precoVendaPromocional.value
                        }
                        calcular()
                    })
                    precoVendaPromocional.addEventListener('focusin', () => {
                        precoVendaPromocional.value = precoVendaPromocional.value.replace(/[^0-9.]/g, '');
                    })
                    custo.addEventListener('change', () => {
                        custo.value = custo.value.replace(/[^0-9.]/g, '');

                        if (custo.value != "") {
                            custo.value = "R$ " + custo.value
                        }
                        calcular()

                    })
                    custo.addEventListener('focusin', () => {
                        custo.value = custo.value.replace(/[^0-9.]/g, '');
                    })
                    custo.addEventListener('focusout', () => {
                        calcular()
                    })
                    </script>
                </div>
            </div>
        </div>

        <div class="card">
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
                        <script>
                        let inputEstoque = document.getElementById('inputEstoque')
                        let controleSwitch = document.getElementById('flexSwitchCheckDefault')

                        inputEstoque.addEventListener('change', () => {
                            inputEstoque.value = inputEstoque.value.replace(/\D/g, '');
                        })

                        controleSwitch.addEventListener('change', () => {
                            if (controleSwitch.checked) {
                                inputEstoque.disabled = true;
                                inputEstoque.value = ""
                            } else {
                                inputEstoque.disabled = false;
                            }
                        })
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex flex-column gap-2">
                <h5>Códigos</h5>
                <div>
                    <label for="codigo_sku" class="form-text">SKU</label>
                    <input type="text" class="form-control" name="codigo_sku" id="codigo_sku">
                    <div id="codigo_sku_help" class="form-text">
                        SKU é um código que você cria internamente para ter o controle dos seus produtos com variações.
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
                <script>
                let inputCodigoBarras = document.getElementById("input-codigo-barras");
                let codigoDeBarras = document.getElementById("barcode")
                inputCodigoBarras.addEventListener('keydown', () => {
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
                window.onload = (event) => {
                    input.value = "";
                };
                </script>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex flex-column gap-2">
                <h5>Peso e dimensões</h5>
                <p>Usaremos esses dados para calcular o custo de envio de seus produtos.</p>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex flex-fill gap-3 col-md-5">
                        <div class="flex-fill ">
                            <label for="produtovariacao_peso" class="form-text">Peso</label>
                            <input type="text" class="form-control" name="produtovariacao_peso"
                                id="produtovariacao_peso" placeholder="0.000 Kg">
                        </div>
                        <div class="flex-fill ">
                            <label for="produtovariacao_comprimento" class="form-text">Comprimento</label>
                            <input type="text" class="form-control" name="produtovariacao_comprimento"
                                id="produtovariacao_comprimento" placeholder="0 cm">
                        </div>
                    </div>
                    <div class="d-flex flex-fill gap-3 col-md-5">
                        <div class="flex-fill ">
                            <label for="produtovariacao_largura" class="form-text">Largura</label>
                            <input type="text" class="form-control" name="produtovariacao_largura"
                                id="produtovariacao_largura" placeholder="0 cm">
                        </div>
                        <div class="flex-fill ">
                            <label for="produtovariacao_altura" class="form-text">Altura</label>
                            <input type="text" class="form-control" name="produtovariacao_altura"
                                id="produtovariacao_altura" placeholder="0 cm">
                        </div>
                    </div>
                </div>
            </div>
            <script>
            let inputPeso = document.getElementById('produtovariacao_peso')
            let inputComprimento = document.getElementById('produtovariacao_comprimento')
            let inputLargura = document.getElementById('produtovariacao_largura')
            let inputAltura = document.getElementById('produtovariacao_altura')

            inputPeso.addEventListener('change', () => {
                inputPeso.value = inputPeso.value.replace(/[^0-9.]/g, '');
                inputPeso.value += " kg"
            })
            inputComprimento.addEventListener('change', () => {
                inputComprimento.value = inputComprimento.value.replace(/[^0-9.]/g, '');
                inputComprimento.value += " cm"
            })
            inputLargura.addEventListener('change', () => {
                inputLargura.value = inputLargura.value.replace(/[^0-9.]/g, '');
                inputLargura.value += " cm"
            })
            inputAltura.addEventListener('change', () => {
                inputAltura.value = inputAltura.value.replace(/[^0-9.]/g, '');
                inputAltura.value += " cm"
            })
            </script>
        </div>

        <div class="card">
            <div class="card-body d-flex flex-column gap-2">
                <h5>Variações</h5>
                <p>Combine diferentes propriedades do seu produto. Exemplo: cor + tamanho.</p>
                <div>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="mdi mdi-plus-circle-outline"></span>
                        <span class="px-2">Adicionar variações</span>
                    </button>
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nova Variação</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="select-variacoes">
                            </div>
                        </div>
                        <script>
                        carregarConteudo('<?= $_PREFIXO?>', 'adm/produtos/selectvariacoes', 'select-variacoes')
                        </script>
                        </script>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                            <button type="button" class="btn btn-primary">Criar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?= $_PREFIXO?>source/js/adm/produtos/addfotos.js"></script>