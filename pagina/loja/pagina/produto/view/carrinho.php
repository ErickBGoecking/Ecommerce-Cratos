<head>
    <link rel="stylesheet" href="<?php echo $_PREFIXO ?>source/css/loja/produto/cesta-carrinho.css">
</head>
<?php
//unset($_SESSION['carrinho']);
//if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
//    echo "<h2>Itens no Carrinho:</h2>";
//    echo "<ul>";
//    foreach ($_SESSION['carrinho'] as $idProdutoVariacao => $quantidade) {
//        echo "<li>Produto ID: $idProdutoVariacao - Quantidade: $quantidade</li>";
//    }
//    echo "</ul>";
//} else {
//    echo "<p>Seu carrinho está vazio.</p>";
//}
?>
<?php
//$retornoToken = gerarTokenCorreiosNovo();
//echo $retornoToken;
$retornoToken = 'eyJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE3MjYyNTY3NjEsImlzcyI6InRva2VuLXNlcnZpY2UiLCJleHAiOjE3MjYzNDMxNjEsImp0aSI6IjAzMjc1NWUwLWFjYTUtNGU3ZS1iNDhmLTA3MjMxMjE3N2MzMSIsImFtYmllbnRlIjoiUFJPRFVDQU8iLCJwZmwiOiJQSiIsImlwIjoiMTg2LjI0OC4yMTIuMiwgMTkyLjE2OC4xLjEzMiIsImNhdCI6IkJ6MCIsImNhcnRhby1wb3N0YWdlbSI6eyJjb250cmF0byI6Ijk5MTI2MTA2OTkiLCJudW1lcm8iOiIwMDc3NzgzODMyIiwiZHIiOjIwLCJhcGkiOlsyNywzNCwzNSwzNiwzNyw0MSw3Niw3OCw4MCw4Myw4Nyw5Myw1NjYsNTg2LDU4N119LCJpZCI6IjQ3NDY3OTYyMDAwMTE5IiwiY25waiI6IjQ3NDY3OTYyMDAwMTE5In0.qy2jfQML3WxmLpNLIEOjsIPqlkestKcYc87moH6sDARCIN_M95rLawzg6B6FQ2LBUmUwUC6hLFFY6KE857t3UMxBQ_I0YZqWltcB-OkMkh5LTF1Nhej61JNQSt3WY9-kbB-SICBIooxN9ObbcrvXIuNh6DP8cN4qaP1zCj4e6AFfE0RL4vuiH0bi-s0LQJqwncZkWwm49U0UYA4LyNTf7GHxII34zZ1oCdBgUZsiJDBPwKT2Sd8G2kcpVCBQq0ipbu1QwHYdrc_2fmuO9lGc3y2uiqKdNXTeAerAal7PVYMmsMkmu6szRub3IfX_yR_nMRfF1D-dqc7DAxLwYgHcTw';
$cepCliente = '35030160';
$endereco = enderecoCorreiosCep($retornoToken, $cepCliente);
print_r($endereco);

//upGeral($tabela, $campos, $values, $condicao="");

?>
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Loja</a></li>
                    <li class="active">Carrinho</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="billing-details">
                    <div class="section-title">
                        <h4 class="title">Minha cesta</h4>
                    </div>
                </div>
                <div class="header-cesta">
                    <h5>Produto</h5>
                    <h5>Qtd</h5>
                    <h5>Preço</h5>
                </div>
                <?php
                //unset($_SESSION['carrinho']);
                if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                    $totalTodosProdutos = 0;
                    foreach ($_SESSION['carrinho'] as $idProdutoVariacao => $quantidade) {
                        $retornoVariacao = listarRegistroUnico('produtovariacao pv INNER JOIN produto p ON p.idproduto = pv.idproduto INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao AND e.ativo="A"', 'pv.idproduto, pv.idtipovariacao, p.produto, p.descricao, e.vendapromocional', 'pv.idprodutovariacao', "$idProdutoVariacao");
                        if ($retornoVariacao) {
                            foreach ($retornoVariacao as $itemVariacao) {
                                $idproduto = $itemVariacao->idproduto;
                                $idtipovariacao = $itemVariacao->idtipovariacao;
                                $produto = $itemVariacao->produto;
                                $descricao = $itemVariacao->descricao;
                                if ($itemVariacao->vendapromocional) {
                                    $valorVendaPromocional = $itemVariacao->vendapromocional;
                                } else {
                                    $valorVendaPromocional = '00.00';
                                }
                                $valorQuantidade = ($quantidade * $valorVendaPromocional);
                                $totalTodosProdutos += $valorQuantidade;
                                $totalValorproduto = number_format($valorQuantidade, '2', ',', '.');
                                $variacoes = explode(',', $idtipovariacao);
                                $descricaoVariações = [];
                                foreach ($variacoes as $idVariacao) {
                                    $retornoTipoVariacao = listarRegistroUnico('tipovariacao', 'idtipovariacao, pai, variacao', 'idtipovariacao', "$idVariacao");
                                    if ($retornoTipoVariacao) {
                                        foreach ($retornoTipoVariacao as $itemTipo) {
                                            $descricaoVariações[] = $itemTipo->variacao;
                                        }
                                    }
                                }
                                ?>
                                <div class="product">
                                    <?php
                                    $retornoFotoProduto = listarGeral('foto', "fotoproduto WHERE idprodutovariacao='$idProdutoVariacao' AND ativo = 'A'");
                                    if ($retornoFotoProduto) {
                                        foreach ($retornoFotoProduto as $itemFotoProduto) {
                                            $fotoProdutoVariacao = $itemFotoProduto->foto;
                                            if (empty($fotoProdutoVariacao)) {
                                                $fotoProdutoVariacao = 'semfoto.png';
                                            }
                                        }
                                    } else {
                                        $fotoProdutoVariacao = 'semfoto.png';
                                    }
                                    echo "<img src='$_PREFIXO/img/produto/$fotoProdutoVariacao' width='80px' alt='$produto' title='$produto'>";
                                    ?>
                                    <div class="captionCratos">
                                        <h3><?php echo $produto; ?></h3>
                                        <p><?php echo implode(', ', $descricaoVariações); ?></p>
                                        <div style="margin-top:10px;">
                                            <p>Vendido e entregue por Cratos Nutrition</p>
                                        </div>
                                    </div>
                                    <div class="details-wrapper">
                                        <div class="qty-label">
                                            Qtd:
                                            <div class="input-number">
                                                <input type="number" id="quantidade_<?php echo $idProdutoVariacao; ?>" class="qtd-input" value="<?php echo $quantidade; ?>" data-id="<?php echo $idProdutoVariacao; ?>">
                                                <span class="qty-up qtdmais"
                                                      data-id="<?php echo $idProdutoVariacao; ?>">+</span>
                                                <span class="qty-down qtdmenos"
                                                      data-id="<?php echo $idProdutoVariacao; ?>">-</span>
                                            </div>
                                            <span class="text-center-cratos remover"
                                                  data-id="<?php echo $idProdutoVariacao; ?>">remover</span>
                                        </div>
                                        <div class="product-details">
                                            <h3 class="product-price"
                                                style="font-size: 15px!important; margin-top:30px;">
                                                R$ <?php echo $totalValorproduto; ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<div class='text-center' style='margin-top:25px'><p>Seu carrinho está vazio.</p></div>";
                        }
                    }
                    echo "<div class='text-right' style='margin-top:25px'><a href='$_PREFIXO'><i class='fa fa-exchange'></i> continuar comprando</a></div>";
                } else {
                    echo "<div class='text-center' style='margin-top:25px'><p>Seu carrinho está vazio.</p></div>";
                }
                ?>

            </div>
            <div class="col-md-3 order-details">
                <div class="section-title text-center">
                    <h5 class="title">Resumo do pedido</h5>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Produto(s)</strong></div>
                        <div><strong>Total</strong></div>
                    </div>
                    <div class="order-products">
                        <div class="order-col">
                            <div>3</div>
                            <div>R$ <?php echo number_format($totalTodosProdutos, '2', ',', '.') ?></div>
                        </div>
                    </div>
                    <div class="order-col">
                        <div>Frete</div>
                        <div>
                            <strong>
                                <?php
                                $frete = '19.80';
                                echo number_format($frete, '2', ',', '.');
                                ?>
                            </strong>
                        </div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong
                                    class="order-total">R$ <?php echo number_format(($totalTodosProdutos + $frete), '2', ',', '.') ?></strong>
                        </div>
                    </div>
                </div>
                <a href="#" class="primary-btn order-submit">Continuar</a>
            </div>
            <div class="col-md-3 order-details" style="margin-top:20px; font-size: 12px">
                <p>Calcule frete e prazo:</p>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="CEP:">
                            <span class="input-group-btn">
                                <button class="btn primary-btn" type="button">OK</button>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h5 style="margin-top:15px; color:var(--cor-principal-escuro);"><span>SEDEX R$ 19,80</span></h5>
                        <h6 style="margin-top:15px; color:var(--cor-text-secondary)"><span>receber em até 1 Dia útil</span></h6>
                        <p>Rua Acácias, Cidade Nova-Governador Valadares - MG | 35063000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $_PREFIXO ?>source/js/loja/produto/produto.js"></script>