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
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-light">
            <tr>
                <th scope="col" width="5%" class="text-center">Cod</th>
                <th scope="col" width="22%">Título</th>
                <th scope="col" width="10%" class="text-center">DataInicio</th>
                <th scope="col" width="10%" class="text-center">DataFim</th>
                <th scope="col" width="7%" class="text-center">Tipo</th>
                <th scope="col" width="14%" class="text-center">Adm</th>
                <th scope="col" width="23%" class="text-center">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $listarBanner = listarGeral('b.idbanner, b.img, b.titulo, b.datai, b.dataf, b.tipo, b.cadastro, b.alteracao, b.ativo, p.nome, p.sobrenome', 'banner b INNER JOIN pessoa p ON p.idpessoa = b.idadm');
            if ($listarBanner) {
                foreach ($listarBanner as $itemBanner) {
                    $idbanner = $itemBanner->idbanner;
                    $adm = $itemBanner->nome;
                    $admSobrenome = $itemBanner->sobrenome;
                    $nomeCompleto = $adm . ' ' . $admSobrenome;
                    $img = $itemBanner->img;
                    $titulo = $itemBanner->titulo;
                    $datai = formatarDataHoraBr($itemBanner->datai);
                    $dataf = formatarDataHoraBr($itemBanner->dataf);
                    $tipo = $itemBanner->tipo;
                    $cadastro = $itemBanner->cadastro;
                    $alteracao = $itemBanner->alteracao;
                    $ativo = $itemBanner->ativo;
                    if ($ativo == 'A') {
                        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Ativado" id="btnStatus" onclick="statusGeral('.$idbanner.',\'bannerStatus\');"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';

                    } else {
                        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Desativado"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
                    }
                ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $idbanner; ?></th>
                    <td><?php echo $titulo; ?></td>
                    <td class="text-center"><?php echo $datai; ?></td>
                    <td class="text-center"><?php echo $dataf; ?></td>
                    <td class="text-center"><?php echo $tipo; ?></td>
                    <td class="text-center"><?php echo $nomeCompleto; ?></td>
                    <td>
                        <div class="float-end">
                            <?php echo $btnAtivo; ?>
                            <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page"
                               title="Ver detalhes do banner"><span class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                            <a href="#" class="btn btn-sm btn-outline-primary"
                               title="Alterar informações do Banner"><span class="mdi mdi-file-document-edit"></span>
                                Alterar</a>
                            <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Banner"><span
                                        class="mdi mdi-delete-alert"></span> Excluir</a>
                        </div>
                    </td>
                </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <th scope="row" class="text-center" colspan="7">Nenhum banner para apresentar!</th>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
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
                                        <select class="form-select" aria-label="Default select example" id="sTipo" name="sTipo">
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
                                        <input type="datetime-local" class="form-control" name="dataI" id="iDataI" value="<?php echo $dataAtualFormatada; ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataF" class="form-label">Data Final:</label>
                                        <?php
                                        $dataAtual = date('Y-m-d H:i:s');
                                        $dataFinal = date('Y-m-d\TH:i:s', strtotime('+1 month', strtotime($dataAtual)));
                                        ?>
                                        <input type="datetime-local" class="form-control" name="dataF" id="iDataF" value="<?php echo $dataFinal; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviar">Cadastrar</button>
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
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="background-color: var(--cor-principal)">
            <strong class="me-auto">Mensagem de Sucesso</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Banner Cadastrado com sucesso!
        </div>
    </div>
</div>
<script src="js/scriptcrato.js"></script>
