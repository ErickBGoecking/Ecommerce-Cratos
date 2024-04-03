<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=cargoTipo">Tipo de Cargo</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="card">
    <div class="card-header">
        #Listar Tipos de Cargo
        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#modalTipoCargoAdd">Cadastrar
        </button>
    </div>
    <div class="card-body">
        <?php
        $listarTipoCargo = listarGeral('IdCargoTipo, TipoCargo, Cadastro, Alteracao, Ativo', 'cargotipo ORDER BY IdCargoTipo DESC');
        if ($listarTipoCargo) {
            foreach ($listarTipoCargo as $itemTipoCargo) {
                $idCargoTipo = $itemTipoCargo->IdCargoTipo;
                $tipoCargo = $itemTipoCargo->TipoCargo;
                $Cadastro = formatarDataHoraBr($itemTipoCargo->Cadastro);
                $Alteracao = formatarDataHoraBr($itemTipoCargo->Alteracao);
                $Ativo = $itemTipoCargo->Ativo;
                if ($Ativo == 'A') {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Tipo de Cargo Ativado. Clique para Desativar" id="btnStatus" onclick="statusGeral(' . $idCargoTipo . ',\'cargoTipoStatus\');"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';

                } else {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Tipo de Cargo Desativado. Clique para Ativar" id="btnStatus" onclick="statusGeral(' . $idCargoTipo . ',\'cargoTipoStatus\');"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
                }
                ?>
                <div class="card card-lista mt-2 border border-0 shadow-sm">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
                        <div class="d-flex flex-column flex-md-row flex-fill">
                            <div class="d-flex col-md-6">
                                <div class="d-flex flex-column ps-2">
                                    <div><strong>Tipo Cargo:</strong> <?php echo $tipoCargo ?></div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <div class=""><strong>Cadastro:</strong> <?php echo $Cadastro ?></div>
                                        <div class="ps-md-2"><strong>Alteração:</strong> <?php echo $Alteracao ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column ps-2  col-md-6">
                                <div><strong>Ativo:</strong> <?php echo $btnAtivo ?></div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="d-flex flex-md-row flex-column gap-2">
                                <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page"
                                   data-bs-toggle="modal" data-bs-target="#modalCargoTipoVerMais"
                                   title="Ver detalhes do tipo de cargo"
                                   onclick="cargoTipoVeMais(<?php echo $idCargoTipo ?>,'cargoTipoVerMais')"><span
                                            class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                                <a href="#" class="btn btn-sm btn-outline-primary"
                                   title="Alterar informações do tipo de cargo" data-bs-toggle="modal"
                                   data-bs-target="#modalCargoTipoAlt"
                                   onclick="cargoTipoDadosAlterar(<?php echo $idCargoTipo ?>,'cargoTipoDadosAlt');"><span
                                            class="mdi mdi-file-document-edit"></span>
                                    Alterar</a>
                                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir TipoCargo"
                                   onclick="excGeral(<?php echo $idCargoTipo ?>,'cargoTipoExc','btnExcluir');"><span
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
                Nenhum Tipo Cargo para apresentar!
            </div>
            <?php
        }
        ?>

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
<div class="modal fade" id="modalTipoCargoAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Novo Tipo de Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Cadastrar
                    </div>
                    <div class="card-body">
                        <form id="frmTipoCargoAdd" name="frmTipoCargoAdd" method="post" action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="inTipoCargo" class="form-label">Tipo Cargo:</label>
                                        <input type="text" class="form-control" id="inTipoCargo" name="CargoTipo"
                                               aria-describedby="tipoCargoHelp">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviarTipoCargo"
                                        onclick="addGeral('btnEnviarTipoCargo','frmTipoCargoAdd','cargoTipoAdd', 'modalTipoCargoAdd');">
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
<div class="modal fade" id="modalCargoTipoAlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Alterar TipoCargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Alterar
                    </div>
                    <div class="card-body">
                        <form id="frmCargoTipoAlt" name="frmCargoTipoAlt" method="post" action="#">
                            <input type="hidden" id="idCargoTipoAlt" name="IdCargoTipo" value="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="inCargoTipoAlt" class="form-label">Tipo Cargo:</label>
                                        <input type="text" class="form-control" id="inCargoTipoAlt" name="TipoCargo"
                                               aria-describedby="cargoTipoHelp">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnSalvarAlt"
                                        onclick="alterarGeral('cargoTipoAlt','modalCargoTipoAlt','frmCargoTipoAlt');">
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

<div class="modal fade" id="modalCargoTipoVerMais" tabindex="-1" aria-labelledby="modalCargoTipoVerMais" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="h1ModalTipoCargoVerMais">#Detalhes do Tipo de Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="card-body">
                            <h5 class="card-title"><span id="iCargoTipoTitulo"></span></h5>
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