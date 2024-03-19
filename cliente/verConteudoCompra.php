<?php 
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$idCompra = 'compra'.$dados['idCompra'];
include_once("dados.php");

$db = db();
$compra = $db[$idCompra];

?>

<div class="d-flex flex-md-row flex-column  gap-3 ">
    <div class="col-md-8">
        <div class="card border border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <p><?php echo $compra['produto'] ?></p>
                <img src="../img/<?php echo $compra['fotoProduto'] ?>" alt="" style="width:100px; height:100px;">
            </div>
        </div>

        <div class="card border border-0 shadow-sm mt-3">
            <div class="card-body">
                <strong><?php echo $compra['status'] ?></strong>
                <h3><?php echo $compra['dataEntrega'] ?></h3>
                <p>Entregamos na <?php echo $compra['enderecoEntrega'] ?></p>
                <div class="border-top d-flex flex-column">
                    <button class="btn btn-primary">Comprar Novamente</button>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 col-md-4 d-flex flex-column">
        <strong>Detalhes Compra</strong>
        <p><?php echo $compra['dataCompra'] ?> | # <?php echo $compra['idCompra'] ?></p>
        <div class="d-flex justify-content-between border-top pt-3">
            <p>Produto</p>
            <p>R$ <?php echo $compra['valorProduto'] ?></p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Frete</p>
            <p><?php echo $compra['valorFrete'] ?></p>
        </div>
        <div class="d-flex justify-content-between border-top pt-3">
            <p><strong>Total</strong></p>
            <p><strong>R$ <?php echo $compra['valorTotal'] ?></strong></p>
        </div>
    </div>

</div>