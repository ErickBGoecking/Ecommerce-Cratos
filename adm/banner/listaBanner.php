<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=banner">Banners</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="card">
    <div class="card-header">
        #Listar Banners
        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#modalBannerAdd">Cadastrar
        </button>
    </div>
    <div class="card-body">
        <?php
        $listarBanner = listarGeral('b.idbanner, b.img, b.titulo, b.datai, b.dataf, b.tipo, b.cadastro, b.alteracao, b.ativo, p.nome, p.sobrenome', 'banner b INNER JOIN pessoa p ON p.idpessoa = b.idadm ORDER BY b.idbanner DESC');
        if ($listarBanner) {
            foreach ($listarBanner as $pessoa) {
                $idbanner = $pessoa->idbanner;
                $adm = $pessoa->nome;
                $admSobrenome = $pessoa->sobrenome;
                $nomeCompleto = $adm . ' ' . $admSobrenome;
                $img = $pessoa->img;
                if (empty($img)) {
                    $img = 'sem-imagem.png';
                }
                $titulo = $pessoa->titulo;
                $datai = formatarDataHoraBr($pessoa->datai);
                $dataf = formatarDataHoraBr($pessoa->dataf);
                $tipo = $pessoa->tipo;
                $cadastro = $pessoa->cadastro;
                $alteracao = $pessoa->alteracao;
                $ativo = $pessoa->ativo;
                if ($ativo == 'A') {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Ativado. Clique para Desativar" id="btnStatus" onclick="statusGeral(' . $idbanner . ',\'bannerStatus\');"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';

                } else {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Desativado. Clique para Ativar" id="btnStatus" onclick="statusGeral(' . $idbanner . ',\'bannerStatus\');"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
                }
                ?>
                <div class="card card-lista mt-2 border border-0 shadow-sm">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
                        <div class="d-flex flex-column flex-md-row flex-fill">
                            <div class="d-flex col-md-6">
                                <img src="./banner/img/<?php echo $img; ?>" class="rounded-circle"
                                     style="width:50px;height:50px;">
                                <div class="d-flex flex-column ps-2">
                                    <div><strong>Títiulo:</strong> <?php echo $titulo ?></div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <div class=""><strong>Data Início:</strong> <?php echo $datai ?></div>
                                        <div class="ps-md-2"><strong>Data Fim:</strong> <?php echo $dataf ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column ps-2  col-md-6">
                                <div><strong>Tipo:</strong> <?php echo $tipo ?></div>
                                <div><strong>Ativo:</strong> <?php echo $btnAtivo ?></div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="d-flex flex-md-row flex-column gap-2">
                                <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page"
                                   data-bs-toggle="modal" data-bs-target="#modalBannerVerMais"
                                   title="Ver detalhes do banner"
                                   onclick="bannerVeMais(<?php echo $idbanner ?>,'bannerVerMais')"><span
                                            class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                                <a href="#" class="btn btn-sm btn-outline-primary"
                                   title="Alterar informações do Banner" data-bs-toggle="modal"
                                   data-bs-target="#modalBannerAlt"
                                   onclick="bannerDadosAlterar(<?php echo $idbanner ?>,'bannerDadosAlt');"><span
                                            class="mdi mdi-file-document-edit"></span>
                                    Alterar</a>
                                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Banner"
                                   onclick="excGeral(<?php echo $idbanner ?>,'bannerExc','btnExcluir');"><span
                                            class="mdi mdi-delete-alert"></span> Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="text-center">
                Nenhum banner para apresentar!
            </div>
            <?php
        }
        ?>
        <!--            </tbody>-->
        <!--        </table>-->
        <div class="row float-end">
            <div class="col-8">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
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
                                    <input type="file" name="img" id="iImg" style="display: none;">
                                    <label for="iImg" style="cursor: pointer;">
                                        <div id="imagemPreview">
                                            <img id="imgPreview" src="./banner/img/sem-imagem.png"
                                                 alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="iTitulo" class="form-label">Título:</label>
                                        <input type="text" class="form-control" id="iTitulo" name="titulo"
                                               aria-describedby="tituloHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="sTipo" class="form-label">Tipo:</label>
                                        <select class="form-select" aria-label="Default select example" id="sTipo"
                                                name="sTipo">
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
                                        <input type="datetime-local" class="form-control" name="dataI" id="iDataI"
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
                                        <input type="datetime-local" class="form-control" name="dataF" id="iDataF"
                                               value="<?php echo $dataFinal; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviar"
                                        onclick="addGeral('btnEnviar','frmBannerAdd','bannerAdd', 'modalBannerAdd');">
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
                            <input type="hidden" id="idBannerAlt" name="idBanner" value="">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="file" name="imgAlt" id="iImgAlt" style="display: none;">
                                    <label for="iImgAlt" style="cursor: pointer;">
                                        <div id="imagemPreviewAlt">
                                            <img id="imgPreviewAlt" src="./banner/img/sem-imagem.png"
                                                 alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="iTituloAlt" class="form-label">Título:</label>
                                        <input type="text" class="form-control" id="iTituloAlt" name="titulo"
                                               aria-describedby="tituloHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="sTipoAlt" class="form-label">Tipo:</label>
                                        <select class="form-select" aria-label="Default select example" id="sTipoAlt"
                                                name="sTipoAlt">
                                            <option value="Rotativo" selected>Rotativo</option>
                                            <option value="Central">Central</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataIAlt" class="form-label">Data Inicial:</label>
                                        <input type="datetime-local" class="form-control" name="dataIAlt"
                                               id="iDataIAlt">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataF" class="form-label">Data Final:</label>
                                        <input type="datetime-local" class="form-control" name="dataFAlt"
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
                        <img src="./banner/img/Exclusivy-660358388556a.jpeg" style="max-height: 300px;"
                             class="img-fluid rounded-start" alt="Detalhes do banner!" title="Detalhes do banner!"
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
<script src="js/scriptcrato.js"></script>
<script>
    previewImg('iImg', 'imgPreview');
    previewImg('iImgAlt', 'imgPreviewAlt');
</script>
