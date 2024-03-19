<?php 
include_once("cabecalho.php");
include_once("dados.php");

$info = dados();

?>
<div class="container-fluid pt-5 d-flex flex-column gap-3">
    <h3>Carrinho de Compras</h3>
    <div class="d-flex flex-column flex-md-row gap-3">

        <div class="col-md-8">
            <div class="card border border-0 shadow-sm">
                <div class="card-body d-flex flex-column gap-3">
                    <h5>Carrinho</h5>
                    <?php foreach($info as $compra){ ?>

                    <div class="d-flex flex-column flex-md-row border-top">
                        <div class="p-2 d-flex justify-content-center align-items-center col-md-1">
                            <img src="../img/<?php echo $compra['fotoProduto'] ?>" alt=""
                                style="width:80px; height:80px;">
                        </div>
                        <div class="d-flex flex-column col-md-7 justify-content-center">
                            <h5><?php echo $compra['produto'] ?></h5>
                            <div class="d-flex flex-column flex-md-row gap-3">
                                <button class="btn btn-light">Excluir</button>
                                <button class="btn btn-light">Comprar</button>
                            </div>
                        </div>
                        <div class="d-flex flex-column col-md-2 justify-content-center gap-2 mt-md-0 mt-3">
                            <div class="border rounded-2 d-flex justify-content-between align-items-center">
                                <button class="btn btn-light"
                                    onclick="incrementarValor('local<?php echo $compra['idCompra']?>','sub')">-</button>
                                <div id="local<?php echo $compra['idCompra']?>">1</div>
                                <button class="btn btn-light"
                                    onclick="incrementarValor('local<?php echo $compra['idCompra']?>','soma')">+</button>
                            </div>
                            <p>100 Disponíveis</p>
                        </div>
                        <div class="d-flex flex-column col-md-2 justify-content-center text-end">
                            <p>de <del class="text-danger">412,<span
                                        style="font-size:smaller;margin-top:-5px;">95</span></del>
                            </p>
                            <h5><strong>R$ <?php echo $compra['valorProduto'] ?></strong></h5>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class=" d-flex flex-column">

                <div class="card border border-0 shadow-sm">
                    <div class="card-body d-flex flex-column gap-3">
                        <h5>Resumo da Compra</h5>
                        <div class="border-top"></div>
                        <div class="d-flex justify-content-between mt-3">
                            <p>Produtos (3)</p>
                            <p>R$ 381,49</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Frete</p>
                            <p class="text-success">Grátis</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5><strong>Total</strong></h5>
                            <h5><strong>R$ 381,49</strong></h5>
                        </div>
                        <button class="btn btn-primary mt-3">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function incrementarValor(idLocal, operacao) {
    var elemento = document.getElementById(idLocal);

    if (operacao == "soma") {
        var valor = parseInt(elemento.textContent) + 1;
        elemento.innerText = valor;
    } else {
        var valor = parseInt(elemento.textContent) - 1;
        if (valor >= 1) {
            elemento.innerText = valor;
        }
    }
}
</script>

</div>