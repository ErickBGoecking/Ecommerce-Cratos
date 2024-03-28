<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=genero">Generos</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="card">
    <div class="card-header">
        #Listar Gênero
        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#modalGeneroAdd">Cadastrar
        </button>
    </div>
    <div class="card-body">
        <?php
        $listarGenero = listarGeral('idgenero, genero, cadastro, alteracao, ativo', 'genero ORDER BY idgenero DESC');
        if ($listarGenero) {
            foreach ($listarGenero as $itemGenero) {
                $idGenero = $itemGenero->idgenero;
                $genero = $itemGenero->genero;
                $cadastro = formatarDataHoraBr($itemGenero->cadastro);
                $alteracao = formatarDataHoraBr($itemGenero->alteracao);
                $ativo = $itemGenero->ativo;
                if ($ativo == 'A') {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Genero Ativado. Clique para Desativar" id="btnStatus" onclick="statusGeral(' . $idGenero . ',\'generoStatus\');"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';

                } else {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Genero Desativado. Clique para Ativar" id="btnStatus" onclick="statusGeral(' . $idGenero . ',\'generoStatus\');"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
                }
                ?>
                <div class="card card-lista mt-2 border border-0 shadow-sm">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
                        <div class="d-flex flex-column flex-md-row flex-fill">
                            <div class="d-flex col-md-6">
                                <div class="d-flex flex-column ps-2">
                                    <div><strong>Gênero:</strong> <?php echo $genero ?></div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <div class=""><strong>Cadastro:</strong> <?php echo $cadastro ?></div>
                                        <div class="ps-md-2"><strong>Alteração:</strong> <?php echo $alteracao ?></div>
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
                                   data-bs-toggle="modal" data-bs-target="#modalGeneroVerMais"
                                   title="Ver detalhes do genero"
                                   onclick="generoVeMais(<?php echo $idGenero ?>,'generoVerMais')"><span
                                            class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                                <a href="#" class="btn btn-sm btn-outline-primary"
                                   title="Alterar informações do Genero" data-bs-toggle="modal"
                                   data-bs-target="#modalGeneroAlt"
                                   onclick="generoDadosAlterar(<?php echo $idGenero ?>,'generoDadosAlt');"><span
                                            class="mdi mdi-file-document-edit"></span>
                                    Alterar</a>
                                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Genero"
                                   onclick="excGeral(<?php echo $idGenero ?>,'generoExc','btnExcluir');"><span
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
                Nenhum genero para apresentar!
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
<div class="modal fade" id="modalGeneroAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Novo Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Cadastrar
                    </div>
                    <div class="card-body">
                        <form id="frmGeneroAdd" name="frmGeneroAdd" method="post" action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="inGenero" class="form-label">Gênero:</label>
                                        <input type="text" class="form-control" id="inGenero" name="genero"
                                               aria-describedby="generoHelp">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviarGenero"
                                        onclick="addGeral('btnEnviarGenero','frmGeneroAdd','generoAdd', 'modalGeneroAdd');">
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
<div class="modal fade" id="modalGeneroAlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Alterar Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Alterar
                    </div>
                    <div class="card-body">
                        <form id="frmGeneroAlt" name="frmGeneroAlt" method="post" action="#">
                            <input type="hidden" id="idGeneroAlt" name="generoAlt" value="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="inGeneroAlt" class="form-label">Gênero:</label>
                                        <input type="text" class="form-control" id="inGeneroAlt" name="genero"
                                               aria-describedby="generoHelp">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnSalvarAlt"
                                        onclick="alterarGeral('generoAlt','modalGeneroAlt','frmGeneroAlt');">
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

<div class="modal fade" id="modalGeneroVerMais" tabindex="-1" aria-labelledby="modalGeneroVerMais" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="h1ModalGeneroVerMais">#Detalhes do Genero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="card-body">
                            <h5 class="card-title"><span id="iGeneroTitulo"></span></h5>
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