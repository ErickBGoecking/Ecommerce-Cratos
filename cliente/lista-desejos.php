<?php 
include_once("dados.php");

$info = dados();
?>

<div class="container-fluid pt-5 d-flex flex-column gap-3">
    <h3>Lista de Desejos</h3>

    <div class="d-flex flex-column flex-md-row flex-md-wrap gap-3">
        <?php 
            $x = 0;
            while($x < 3){ $x++;
                foreach($info as $compra){

                ?>
        <div class="card border border-0 shadow-sm col-md-2" id="<?php echo $compra['idCompra'] . $x; ?>">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" aria-label="Close" onclick="fecharItem(<?php echo $compra['idCompra'] . $x; ?>)"></button>
                </div>
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column v-100 gap-2 gap-md-0 ">
                        <div class="p-2 d-flex justify-content-center align-items-center">
                            <img src="../img/<?php echo $compra['fotoProduto'] ?>" alt=""
                                style="width:80px; height:80px;">
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
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-secondary"><span class="mdi mdi-eye-outline pe-3"></span>ver mais</button>
                    <button class="btn btn-primary"><span class="mdi mdi-cart-minus pe-3"></span>Comprar</button>
                </div>
            </div>
        </div>
        <?php }} ?>

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

    <script>
        function fecharItem(id){
            var div =document.getElementById(id);
            div.parentNode.removeChild(div);
        };
    </script>