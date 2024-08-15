<?php 
include_once('./config/constantes.php');
include_once('./config/conexao.php');
include_once('./func/func.php');
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


function stringRandomica(){
    $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $stringEmbaralhada = str_shuffle($caracteres);

    return $stringEmbaralhada;
}
?>
</style>

<div class='d-flex flex-wrap'>
    <?php
    $dados = listarGeral('*','categoria ORDER BY Categoria ASC');
    $x = 0;
    while($x<1){
        $x++;

    foreach($dados as $row) {
        $categoria = $row->Categoria;
        $idCategoria = $row->IdCategoria;
        $idPai =  $row->IdPai;
        $idBotaoAcoes = stringRandomica();
        if($idPai== 0){
    ?>
    <div class="card border border-0 shadow m-1 col-2" style="height:100%;">
        <div class="card-body d-flex flex-column">
            <div class="rounded d-flex justify-content-between">
                <p class="mt-1"><?php echo $categoria; ?></p>
                <div>
                    <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                        <span class="mdi mdi-dots-vertical"></span>
                    </button>
                    <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                        style="position:absolute;top:30px;left:30px; z-index:999;">
                        <div class="card">
                            <div class="d-flex justify-content-end p-2">
                                <div>
                                    <button class="btn btn-light"
                                        onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                        <span class="mdi mdi-close"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!-- <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;">
                                    Duplicar
                                    <span class="mdi mdi-content-copy"></span>
                                </button> -->
                                <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                                    data-bs-toggle="modal" data-bs-target="#modalAlt"
                                    onclick="altCategoriaOnclick('<?php echo $idCategoria?>','<?php echo $categoria?>')">
                                    Editar
                                    <span class="mdi mdi-file-edit-outline"></span>
                                </button>
                                <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                                    onclick="excGeral2(<?php echo $idCategoria ?>,'categoriaExc','btnExcluir','listarCategorias','1')">
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
                    $subIdPai =  $subRow->IdPai;
                    $idBotaoAcoes = stringRandomica();
            ?>

            <div class="bg-body-secondary p-2 mt-1 rounded d-flex justify-content-between">
                <p><?php echo $subCategoria; ?></p>
                <div>
                    <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                        <span class="mdi mdi-dots-vertical"></span>
                    </button>
                    <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                        style="position:absolute;top:0;left:0; z-index:999;">
                        <div class="card">
                            <div class="d-flex justify-content-end p-2">
                                <div>
                                    <button class="btn btn-light"
                                        onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                        <span class="mdi mdi-close"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!-- <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;">
                                    Duplicar
                                    <span class="mdi mdi-content-copy"></span>
                                </button> -->
                                <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                                    data-bs-toggle="modal" data-bs-target="#modalAlt"
                                    onclick="altCategoriaOnclick('<?php echo $subIdCategoria?>','<?php echo $subCategoria?>')">
                                    Editar
                                    <span class="mdi mdi-file-edit-outline"></span>
                                </button>
                                <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                                    onclick="excGeral2(<?php echo $subIdCategoria ?>,'categoriaExc','btnExcluir','listarCategorias','1')">
                                    Deletar
                                    <span class="mdi mdi-delete-outline"></span>
                                </button>
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
        <button class="btn" data-bs-toggle="modal" data-bs-target="#modalAddSub"
            onclick="addSubCategoriaOnclick(<?php echo $idCategoria?>)">
            <span class="mdi mdi-plus-circle-outline"></span>
        </button>
    </div>
    <?php
            }
        }
    }
    ?>
</div>