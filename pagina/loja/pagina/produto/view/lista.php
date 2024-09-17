<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Produtos mais vistos!</h3>
                    <!--
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div>
                    -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php
                        $listaProduto = listarGeral('p.idproduto, p.idcategoria, fp.foto, p.produto, p.descricao, pv.idprodutovariacao, e.venda, e.vendapromocional, c.Categoria', "produto p INNER JOIN produtovariacao pv  ON pv.idproduto = p.idproduto INNER JOIN categoria c ON c.IdCategoria = p.idcategoria INNER JOIN estoque e  ON e.idprodutovariacao = pv.idprodutovariacao INNER JOIN fotoproduto fp  ON pv.idprodutovariacao = fp.idprodutovariacao WHERE p.ativo = 'A' GROUP BY p.idproduto ORDER BY p.idproduto DESC LIMIT 12");
                        if ($listaProduto) {
                            $contador = 0;
                            foreach ($listaProduto as $itemProduto) {
                                $contador++;
                                $idprodutovariacao = $itemProduto->idprodutovariacao;
                                $idproduto = $itemProduto->idproduto;
                                $produto = $itemProduto->produto;
                                $categoriaProduto = $itemProduto->Categoria;
                                $foto = $itemProduto->foto;
                                $descricao = $itemProduto->descricao;
                                $venda = $itemProduto->venda ? number_format($itemProduto->venda, '2', ',', '.') : '00.00';
                                $vendaPromocional = $itemProduto->vendapromocional ? number_format($itemProduto->vendapromocional, '2', ',', '.') : '00.00';

                                if ($contador % 6 == 1) {
                                    $navId = ceil($contador / 6);
                                    ?>
                                    <div id="tab<?php echo $navId; ?>" class="tab-pane <?php echo $contador == 1 ? 'active' : ''; ?>">
                                    <div class="section-title">
                                        <div class="section-nav">
                                            <div id="slick-nav-<?php echo $navId; ?>" class="products-slick-nav"></div>
                                        </div>
                                    </div>
                                    <div class="products-slick" data-nav="#slick-nav-<?php echo $navId; ?>">
                                    <?php
                                }
                                ?>
                                <div class="product">
                                    <div class="product-img">
                                        <img src="<?php echo $_PREFIXO ?>img/produto/<?php echo $foto; ?>"
                                             alt="<?php echo $produto; ?>"
                                             title="<?php echo $produto; ?>">
                                        <div class="product-label">
                                            <span class="sale">-50%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?php echo $categoriaProduto;?></p>
                                        <h3 class="product-name"><a href="#"><?php echo $produto; ?></a></h3>
                                        <h4 class="product-price">R$ <?php echo $venda; ?>
                                            <del class="product-old-price">R$ <?php echo $vendaPromocional; ?></del>
                                        </h4>
                                        <div class="product-rating">
                                            <?php
                                            $avaliacaoEstrelas = listarGeral('c.estrela', "comentarioproduto c WHERE c.idprodutovariacao = $idprodutovariacao");
                                            $qtdEstrelas = 0;
                                            if (!empty($avaliacaoEstrelas)) {
                                                $qtdEstrelas = $avaliacaoEstrelas[0]->estrela;
                                            }
                                            for ($i = 1; $i <= $qtdEstrelas; $i++) {
                                                echo "<i class='fa fa-star'></i>";
                                            }
                                            ?>
                                            <?php
                                            for ($i = $qtdEstrelas + 1; $i <= 5; $i++) {
                                                echo "<i class='fa fa-star-o'></i>";
                                            }
                                            ?>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">Lista de desejos</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">Comparar</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver Mais</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="loja/produto/<?php echo codificar($idprodutovariacao, 'codificar'); ?>"
                                           class="add-to-cart-btn-link"><i class="fa fa-shopping-cart"></i>
                                            Adicionar</a>
                                    </div>
                                </div>
                                <?php
                                if ($contador % 6 == 0 || $contador == count($listaProduto)) {
                                    ?>
                                    </div>
                                    <div id="slick-nav-<?php echo $navId; ?>" class="products-slick-nav"></div>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
