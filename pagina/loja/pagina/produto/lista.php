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
                        $listaProduto = listarGeral('idproduto, idcategoria, foto, produto, descricao', "produto WHERE ativo = 'A' ORDER BY idproduto DESC LIMIT 12");
                        if ($listaProduto) {
                            $contador = 0;
                            foreach ($listaProduto as $itemProduto) {
                                $contador++;
                                $idproduto = $itemProduto->idproduto;
                                $produto = $itemProduto->produto;
                                $foto = $itemProduto->foto;
                                $descricao = $itemProduto->descricao;
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
                                        <img src="<?php echo $_PREFIXO ?>img/produto/<?php echo $foto; ?>" alt="<?php echo $produto; ?>"
                                             title="<?php echo $produto; ?>">
                                        <div class="product-label">
                                            <span class="sale">-50%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Categorias</p>
                                        <h3 class="product-name"><a href="#"><?php echo $produto; ?></a></h3>
                                        <h4 class="product-price">R$980.00
                                            <del class="product-old-price">R$990.00</del>
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
                                                        class="tooltipp">Lista de desejos</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">Comparar</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">Ver Mais</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="loja/produto/<?php echo codificar($idproduto,'codificar');?>" class="add-to-cart-btn-link"><i class="fa fa-shopping-cart"></i>
                                            Adicionar
                                        </a>
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
