<?php 
include_once("cabecalho.php");
include_once("dados.php");

$info = dados();
?>

<div class="container-fluid pt-5 d-flex flex-column gap-3">
    <h3>Lista de Desejos</h3>

    <?php 
                foreach($info as $compra){

                ?>
    <div class="card border border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row v-100 gap-2 gap-md-0 ">
                <div class="p-2 d-flex justify-content-center align-items-center">
                    <img src="../img/<?php echo $compra['fotoProduto'] ?>" alt="" style="width:80px; height:80px;">
                </div>
                <div class="flex-fill p-2 d-flex flex-column justify-content-center">
                    <h5><?php echo $compra['produto'] ?></h5>
                </div>
                <div class="d-flex flex-column justify-content-center px-md-5">
                    <p>de <del>R$ 450,99</del></p>
                    <div class="d-flex">
                        <p>Por</p>
                        <h5>R$ <?php echo $compra['valorProduto'] ?></h5>
                    </div>
                </div>
                <div class="d-flex flex-column gap-2 p-2 justify-content-center">
                    <button class="btn btn-primary">Comprar</button>
                    <button class="btn btn-light">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

</div>
<div class="modal fade" id="modalVerMais" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Compra Efetuada</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-body-tertiary">
                <div id="conteudoModal"></div>
            </div>
        </div>
    </div>
</div>