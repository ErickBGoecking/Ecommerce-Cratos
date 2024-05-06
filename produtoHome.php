<?php
$retornoProduto = listarGeral('p.idproduto, p.foto, p.produto, p.descricao, pv.idprodutovariacao, pv.altura, pv.largura, 
pv.peso, pv.destaque, e.idestoque, e.qtdatual, e.qtdvendido, e.vendaPrevia, e.custo, e.venda, e.lote, e.vencimento',
    "produto p INNER JOIN produtovariacao pv ON pv.idproduto = p.idproduto INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao 
    WHERE e.ativo='A' ORDER BY e.idestoque DESC");
if ($retornoProduto) {
    foreach ($retornoProduto as $itemProduto) {
        $idproduto=$itemProduto->idproduto;
        $foto=$itemProduto->foto;
        $produto=$itemProduto->produto;
        $descricao=$itemProduto->descricao;
        $idprodutovariacao=$itemProduto->idprodutovariacao;
        $altura=$itemProduto->altura;
        $largura=$itemProduto->largura;
        $peso=$itemProduto->peso;
        $destaque=$itemProduto->destaque;
        $idestoque=$itemProduto->idestoque;
        $qtdatual=$itemProduto->qtdatual;
        $qtdvendido=$itemProduto->qtdvendido;
        $vendaPrevia=$itemProduto->vendaPrevia;
        $custo=$itemProduto->custo;
        $venda=$itemProduto->venda;
        $lote=$itemProduto->lote;
        $vencimento=$itemProduto->vencimento;
        ?>
        <div class="product">
            <div class="product-img">
                <img src="./img/product01.jpg" alt="">
                <div class="product-label">
                    <span class="sale">-30%</span>
                    <span class="new">NEW</span>
                </div>
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#"><?php echo $produto;?></a></h3>
                <h4 class="product-price">$980.00
                    <del class="product-old-price">$990.00</del>
                </h4>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                class="tooltipp">add to wishlist</span>
                    </button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                class="tooltipp">add to compare</span>
                    </button>
                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                    </button>
                </div>
            </div>
            <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Adicionar</button>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="product">
        <div class="product-body">
            <h5 class="product-name">Nenhum produto cadastrado.</h5>
        </div>
    </div>
    <?php
}
?>