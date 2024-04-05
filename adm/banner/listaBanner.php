<div id="conteudo">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="?pagina=banner">Banners</a></li>
            <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
        </ol>
    </nav>
</div>

<div class="modal fade" id="modalBannerAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Novo Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Cadastrar
                    </div>
                    <div class="card-body">
                        <form id="frmBannerAdd" name="frmBannerAdd" method="post" action="#">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="file" name="Img" id="iImg" style="display: none;">
                                    <label for="iImg" style="cursor: pointer;">
                                        <div id="imagemPreview">
                                            <Img id="imgPreview" src="./banner/Img/sem-imagem.png"
                                                 alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="iTitulo" class="form-label">Título:</label>
                                        <input type="text" class="form-control" id="iTitulo" name="Titulo"
                                               aria-describedby="tituloHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="sTipo" class="form-label">Tipo:</label>
                                        <select class="form-select" aria-label="Default select example" id="sTipo"
                                                name="Tipo">
                                            <option value="Rotativo" selected>Rotativo</option>
                                            <option value="Central">Central</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataI" class="form-label">Data Inicial:</label>
                                        <?php
                                        $dataAtualFormatada = date('Y-m-d\TH:i:s');
                                        ?>
                                        <input type="datetime-local" class="form-control" name="DataInicial" id="iDataI"
                                               value="<?php echo $dataAtualFormatada; ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataF" class="form-label">Data Final:</label>
                                        <?php
                                        $dataAtual = date('Y-m-d H:i:s');
                                        $dataFinal = date('Y-m-d\TH:i:s', strtotime('+1 month', strtotime($dataAtual)));
                                        ?>
                                        <input type="datetime-local" class="form-control" name="DataFinal" id="iDataF"
                                               value="<?php echo $dataFinal; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviar">
                                        Cadastrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-md-center">
                <?php echo formatarDataExtenso() ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalBannerAlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Alterar Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Alterar
                    </div>
                    <div class="card-body">
                        <form id="frmBannerAlt" name="frmBannerAlt" method="post" action="#">
                            <input type="hidden" id="idBannerAlt" name="IdBanner" value="">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="file" name="Img" id="iImgAlt" style="display: none;">
                                    <label for="iImgAlt" style="cursor: pointer;">
                                        <div id="imagemPreviewAlt">
                                            <Img id="imgPreviewAlt" src="./banner/Img/sem-imagem.png"
                                                 alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="iTituloAlt" class="form-label">Título:</label>
                                        <input type="text" class="form-control" id="iTituloAlt" name="Titulo"
                                               aria-describedby="tituloHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="sTipoAlt" class="form-label">Tipo:</label>
                                        <select class="form-select" aria-label="Default select example" id="sTipoAlt"
                                                name="Tipo">
                                            <option value="Rotativo" selected>Rotativo</option>
                                            <option value="Central">Central</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataIAlt" class="form-label">Data Inicial:</label>
                                        <input type="datetime-local" class="form-control" name="DataInicial"
                                               id="iDataIAlt">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataF" class="form-label">Data Final:</label>
                                        <input type="datetime-local" class="form-control" name="DataFinal"
                                               id="iDataFAlt">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnSalvarAlt"
                                        onclick="alterarGeral('bannerAlt','modalBannerAlt','frmBannerAlt');">
                                    Salvar Alterações
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-md-center">
                <?php echo formatarDataExtenso() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBannerVerMais" tabindex="-1" aria-labelledby="modalBannerVerMais" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="h1ModalBannerVerMais">#Detalhes do Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card mb-3">
                    <div class="row g-0">
                        <Img src="./banner/Img/sem-imagem.png" style="max-height: 300px;"
                             class="Img-fluid rounded-start" alt="Detalhes do banner!" title="Detalhes do banner!"
                             id="imgBanner">
                        <div class="card-body">
                            <h5 class="card-title"><span id="iBannerTitulo"></span></h5>
                            <p class=" d-flex flex-md-row flex-column gap-2"><span
                                        class="mdi mdi-calendar"></span><strong>Data Início:</strong> <span
                                        id="iDataInicio"></span></p>
                            <p class="card-text d-flex flex-md-row flex-column gap-2"><span
                                        class="mdi mdi-calendar"></span><strong>Data Fim:</strong> <span
                                        id="iDataFim"></span></p>
                            <p class="card-text"><span class="mdi mdi-account-check"></span><strong>Adm: </strong><span
                                        id="iAdm"></span></p>
                            <p class="card-text"><span class="mdi mdi-calendar"></span><strong>Cadastro: </strong><span
                                        id="iCadastro"></span></p>
                            <p class="card-text"><span class="mdi mdi-calendar"></span><strong>Alteração: </strong><span
                                        id="iAlteracao"></span></p>
                            <p class="card-text"><span class="mdi mdi-lock-open-check"></span><strong>Estatus:</strong>
                                <span id="iEstatus"></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-md-center">
                <?php echo formatarDataExtenso() ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'mensagem.php';
?>
<script src="js/usuario.js"></script>
<script src="js/scriptcrato.js"></script>
<script>
    previewImg('iImg', 'imgPreview');
    previewImg('iImgAlt', 'imgPreviewAlt');
</script>
<script>
    window.onload = function () {
        carregarDadosPaginacao('listaBanner', 1)
    };

    function configurarOnclickBotoes(controle, pagina) {
        if (document.getElementById('btnSalvarAlt')) {
            document.getElementById('btnSalvarAlt').onclick = function () {
                alterarGeral2('usuarioAlt', 'modalUsuarioAlt', 'frmUsuarioAlt', controle, pagina)
            }
        }
        if (document.getElementById('btnEnviar')) {
            document.getElementById('btnEnviar').onclick = function () {
                addGeral2('frmBannerAdd', 'bannerAdd', 'modalBannerAdd', controle, pagina)
            }
        }
        if (document.getElementById('iImg')) {
            previewImg('iImg', 'imgPreview')
        }
        if (document.getElementById('iImgAlt')) {
            previewImg('iImgAlt', 'imgPreviewAlt')
        }
    }
</script>