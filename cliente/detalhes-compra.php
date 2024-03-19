<?php 
include_once("cabecalho.php");
include_once("dados.php");

$db = db();
$compra = $db[$_GET['idCompra']];

?>


<body class="bg-body-tertiary">

    <div class="d-flex flex-column flex-md-row">

        <?php include_once('barraLateral.php');?>

        <div class="conteúdo col-md-10 bg-body-secondary" style="min-height: 100vh;">
            <div class="container-fluid pt-5 d-flex flex-md-row flex-column  gap-3">
                <div class="container">
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
                <div class="container">
                    <div class="p-3 col-md-6 d-flex flex-column">
                        <strong>Detalhes Compra</strong>
                        <p><?php echo $compra['dataCompra'] ?>  |  # <?php echo $compra['idCompra'] ?></p>
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

            </div>
        </div>
    </div>
</body>

</html>