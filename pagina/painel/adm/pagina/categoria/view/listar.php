<style>
.cardCategoria:hover {
    border: gray solid 1px !important;
}
</style>
<div class="ps-3 pt-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCadastro">Nova Categoria</button>
</div>
<div class='d-flex flex-wrap p-3'>
    <?php
    $dados = listarGeral('*','categoria ORDER BY Categoria ASC');
    $x = 0;
    while($x<1){
        $x++;

    foreach($dados as $row) {
        $categoria = $row->Categoria;
        $idCategoria = $row->IdCategoria;
        $idCategoriaMascara = base64_encode($idCategoria);
        $idPai =  $row->IdPai;
        $idBotaoAcoes = stringRandomica();
        if($idPai== 0){
    ?>
    <div class="card border border-0 shadow m-1 col-2 cardCategoria" style="height:100%;">
        <div class="card-body d-flex flex-column">
            <div class="rounded d-flex justify-content-between">
                <p class="mt-1"><?php echo $categoria; ?></p>
                <div>
                    <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                        <span class="mdi mdi-dots-vertical"></span>
                    </button>
                    <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                        style="position:absolute;top:0;right:0; z-index:999;">
                        <div class="card">
                            <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                                <div>
                                    <button class="btn btn-warning"
                                        onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                        <span class="mdi mdi-close"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <a href="<?= $_PREFIXO;?>adm/categoria/editar/<?= $idCategoriaMascara;?>">
                                    <button class="btn btn-light d-flex justify-content-between"
                                        style="min-width:150px;">
                                        Editar
                                        <span class="mdi mdi-file-edit-outline"></span>
                                    </button>
                                </a>
                                <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                                    onclick="msgBoxConfirmacao('categoria,<?= $idCategoriaMascara ?>')">
                                    Deletar
                                    <span class="mdi mdi-delete-outline"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $subcategoria = listarGeral('*',"categoria WHERE IdPai = $idCategoria  ORDER BY Categoria ASC");

            if(!empty($subcategoria)){
                foreach($subcategoria as $subRow) {
                    $subCategoria = $subRow->Categoria;
                    $subIdCategoria = $subRow->IdCategoria;
                    $subIdCategoria = base64_encode($subIdCategoria);
                    $subIdPai =  $subRow->IdPai;
                    $idBotaoAcoes = stringRandomica();
            ?>

            <div class="bg-body-secondary p-2 mt-1 rounded d-flex justify-content-between cardCategoria">
                <p><?php echo $subCategoria; ?></p>
                <div>
                    <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                        <span class="mdi mdi-dots-vertical"></span>
                    </button>
                    <div style="position:relative;">
                        <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                            style="position:absolute;top:30;right:0; z-index:999;">
                            <div class="card">
                                <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                                    <div>
                                        <button class="btn btn-warning"
                                            onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                            <span class="mdi mdi-close"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <a href="<?php echo $_PREFIXO;?>adm/categoria/editar/<?= $subIdCategoria?>">
                                        <button class="btn btn-light d-flex justify-content-between"
                                            style="min-width:150px;">
                                            Editar
                                            <span class="mdi mdi-file-edit-outline"></span>
                                        </button>
                                    </a>
                                    <button class="btn btn-light d-flex justify-content-between"
                                        style="min-width:150px;" onclick="msgBoxConfirmacao('categoria_<?= $subIdCategoria ?>')">
                                        Deletar
                                        <span class="mdi mdi-delete-outline"></span>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <!-- <input type="text" value="<?php echo $idCategoria?>" class="d-none" name="categoria"> -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCadastroSubcategoria" id="btnAddSubCategoria" onclick="inputIdPai('<?= $idCategoria?>')">
            <span class="mdi mdi-plus-circle-outline"></span>
        </button>
    </div>
    <?php
            }
        }
    }
    ?>
</div>

<div aria-live="msgBox" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
    <div class="toast-container top-50 start-50 translate-middle p-3">
        <div id="msboxVerifica" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-light">
                <strong class="me-auto">Deletar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-light">
                Tem certeza que desaja escluir essa categoria?
                <div class="mt-2 pt-2 border-top">
                    <div class="d-flex gap-3">
                        <a href="" id="btnConfirma"><button class="btn btn-danger btn-sm">Sim</button></a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="toast">Não</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once('modalcadastro.php');?>
<?php include_once('modalcadastrosubcategoria.php');?>

<script>

function menuAcoes(status, idObjeto) {
    let varMenuAcoes = document.getElementById(idObjeto)

    if (status) {
        let todosMenusAcoes = document.querySelectorAll('.botaoAcoes')
        todosMenusAcoes.forEach((elemento) => {
            elemento.classList.add("d-none");
        });
        varMenuAcoes.classList.remove("d-none");
    } else {
        varMenuAcoes.classList.add("d-none");
    }
}

function msgBoxConfirmacao($id) {
    const btnConfirma = document.getElementById('btnConfirma')
    btnConfirma.href = "categoria/delete/" + $id

    const toastMsboxVerificar = document.getElementById('msboxVerifica')
    const toast = bootstrap.Toast.getOrCreateInstance(toastMsboxVerificar)
    toast.show()
}
</script>