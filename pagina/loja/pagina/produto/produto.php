<?php
$produtoGet = $url[2];
if (isset($produtoGet)) {
    $idProduto = codificar($produtoGet, 'decodificar');
    $retornoProduto = listarRegistroUnico("produto p INNER JOIN produtovariacao pv ON pv.idproduto = p.idproduto AND p.ativo = 'A'
        INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao", 'p.idproduto, p.foto, p.produto, p.descricao, 
        pv.idprodutovariacao, pv.detalhe as descricaoVariacao, pv.altura, pv.largura, pv.peso, pv.destaque, e.idestoque, e.qtdatual, e.qtdvendido, 
        e.vendaPrevia, e.custo, e.venda, e.lote, e.vencimento', 'p.idproduto', $idProduto);
    if ($retornoProduto) {
        foreach ($retornoProduto as $itemProduto) {
            $idproduto = $itemProduto->idproduto;
            $idprodutovariacao = $itemProduto->idprodutovariacao;
            $idestoque = $itemProduto->idestoque;
            $foto = $itemProduto->foto;
            $produto = $itemProduto->produto;
            $descricao = $itemProduto->descricao;
            $descricaoVariacao = $itemProduto->descricaoVariacao;
            $altura = $itemProduto->altura;
            $largura = $itemProduto->largura;
            $peso = $itemProduto->peso;
            $destaque = $itemProduto->destaque;
            $qtdatual = $itemProduto->qtdatual;
            $qtdvendido = $itemProduto->qtdvendido;
            $venda = $itemProduto->venda;
            $vendaPrevia = $itemProduto->vendaPrevia;
            if (empty($foto)) {
                $foto = 'sem-imagem.jpg';
            }
        }
        ?>
        <div id="breadcrumb" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb-tree">
                            <li><a href="#">Produto</a></li>
                            <li><a href="#">Detalhes do produto</a></li>
                            <li class="active"><?php echo $produto; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">
                            <div class="product-preview">
                                <img src="<?php echo $_PREFIXO ?>img/produto/<?php echo $foto; ?>"
                                     alt="<?php echo $produto; ?>" title="<?php echo $produto; ?>">
                            </div>
                            <?php
                            $retornoFotoProduto = listarGeral('foto', "fotoproduto WHERE idprodutovariacao='$idprodutovariacao' AND ativo = 'A'");
                            if ($retornoFotoProduto) {
                                foreach ($retornoFotoProduto as $itemFotoProduto) {
                                    $fotoProdutoVariacao = $itemFotoProduto->foto;
                                    if (empty($fotoProdutoVariacao)) {
                                        $fotoProdutoVariacao = 'sem-imagem.jpg';
                                    }
                                    ?>
                                    <div class="product-preview">
                                        <img src="<?php echo $_PREFIXO ?>img/produto/<?php echo $fotoProdutoVariacao; ?>"
                                             alt="<?php echo $produto; ?>" title="<?php echo $produto; ?>">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                            <div class="product-preview">
                                <img src="<?php echo $_PREFIXO ?>img/produto/<?php echo $foto; ?>"
                                     alt="<?php echo $produto; ?>" title="<?php echo $produto; ?>">
                            </div>
                            <?php
                            if ($retornoFotoProduto) {
                                foreach ($retornoFotoProduto as $itemFotoProduto) {
                                    $fotoProdutoVariacao = $itemFotoProduto->foto;
                                    if (empty($fotoProdutoVariacao)) {
                                        $fotoProdutoVariacao = 'sem-imagem.jpg';
                                    }
                                    ?>
                                    <div class="product-preview">
                                        <img src="<?php echo $_PREFIXO ?>img/produto/<?php echo $fotoProdutoVariacao; ?>"
                                             alt="<?php echo $produto; ?>" title="<?php echo $produto; ?>">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $produto; ?></h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <a class="review-link" href="#">10 Comentários | Adicionar comentário</a>
                            </div>
                            <div>
                                <h3 class="product-price">R$<?php echo number_format($venda, '2', ',', '.'); ?>
                                    <del class="product-old-price">
                                        R$<?php echo number_format($vendaPrevia, '2', ',', '.'); ?></del>
                                </h3>
                                <span class="product-available"><?php echo $qtdatual; ?> estoque.</span>
                            </div>
                            <p><?php echo substr("$descricao", 0, 150) . '...'; ?></p>
                            <div class="product-options">
                                <label>
                                    Tam:
                                    <select class="input-select">
                                        <option value="0">G</option>
                                    </select>
                                </label>
                                <label>
                                    Cor:
                                    <select class="input-select-cor" width="150px">
                                        <option value="0">Vermelho</option>
                                    </select>
                                </label>
                            </div>
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Qtd:
                                    <div class="input-number">
                                        <input type="number" value="1">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ADICIONAR</button>
                            </div>
                            <ul class="product-btns">
                                <li><a href="#"><i class="fa fa-heart-o"></i> LISTA DE DESEJO</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> COMPARAR</a></li>
                            </ul>
                            <ul class="product-links">
                                <li>Categoria:</li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                            <ul class="product-links" style="margin-top:22px!important">
                                <li>Compartilhar:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $totalComentario = 0;
                    $totalEstrela = 0;
                    $calcMediaEstrela = 0;
                    $retornoComentarioPessoa = listarGeral('c.comentario, c.estrela, c.cadastro, p.Nome', "comentarioproduto c INNER JOIN pessoa p ON p.idpessoa = c.idpessoa AND p.ativo='A' WHERE c.idprodutovariacao = $idprodutovariacao");
                    if($retornoComentarioPessoa){
                        $totalComentario = count($retornoComentarioPessoa);
                        foreach($retornoComentarioPessoa as $mediaEstrela){
                            $calcMediaEstrela += $mediaEstrela->estrela;
                        }
                        $totalEstrela = $calcMediaEstrela/$totalComentario;
                    }
                    ?>
                    <div class="col-md-12">
                        <div id="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tabDescricao">Descrição</a></li>
                                <li><a data-toggle="tab" href="#tabDetalhes">Detalhes</a></li>
                                <li><a data-toggle="tab" href="#tabAvaliacao">Avaliações (<?php echo $totalComentario;?>)</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tabDescricao" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?php echo $descricao; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabDetalhes" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?php echo $descricaoVariacao; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabAvaliacao" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span><?php echo $totalEstrela;?></span>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <ul class="rating">
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 80%;"></div>
                                                        </div>
                                                        <span class="sum">3</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 60%;"></div>
                                                        </div>
                                                        <span class="sum">2</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if ($retornoComentarioPessoa) {
                                                ?>
                                                <div id="reviews">
                                                    <ul class="reviews">
                                                        <?php
                                                        foreach ($retornoComentarioPessoa as $itemComentario) {
                                                            $pessoaComentario = $itemComentario->Nome;
                                                            $comentario = $itemComentario->comentario;
                                                            $cadastroComentario = date('d-m-Y H:i:s', strtotime($itemComentario->cadastro));
                                                            $estrela = $itemComentario->estrela;
                                                            ?>
                                                            <li>
                                                                <div class="review-heading">
                                                                    <h5 class="name"><?php echo $pessoaComentario; ?></h5>
                                                                    <p class="date"><?php echo $cadastroComentario ?></p>
                                                                    <div class="review-rating">
                                                                        <?php
                                                                        for ($i = 0; $i < 5; $i++) {
                                                                            if ($i < $estrela) {
                                                                                echo "<i class='fa fa-star'></i>";
                                                                            } else {
                                                                                echo "<i class='fa fa-star-o empty'></i>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="review-body">
                                                                    <p><?php echo $comentario; ?></p>
                                                                </div>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    <ul class="reviews-pagination">
                                                        <li class="active">1</li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#">4</a></li>
                                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                                    </ul>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="review-body text-center" style="margin-top: 85px;">
                                                    <p>Produto ainda não foi comentado!</p>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form">
                                                    <input class="input" type="text" placeholder="Nome">
                                                    <input class="input" type="email" placeholder="Email">
                                                    <textarea class="input" placeholder="Mensagem"></textarea>
                                                    <div class="input-rating">
                                                        <span>Sua avaliação: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5"
                                                                   type="radio"><label
                                                                    for="star5"></label>
                                                            <input id="star4" name="rating" value="4"
                                                                   type="radio"><label
                                                                    for="star4"></label>
                                                            <input id="star3" name="rating" value="3"
                                                                   type="radio"><label
                                                                    for="star3"></label>
                                                            <input id="star2" name="rating" value="2"
                                                                   type="radio"><label
                                                                    for="star2"></label>
                                                            <input id="star1" name="rating" value="1"
                                                                   type="radio"><label
                                                                    for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <button class="primary-btn">Enviar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Produtos Relacionados</h3>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="<?php echo $_PREFIXO ?>img/produto/product01.jpg" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-Categoria">Categoria</p>
                        <h3 class="product-name"><a href="#">NOME PRODUTO</a></h3>
                        <h4 class="product-price">R$980.00
                            <del class="product-old-price">R$990.00</del>
                        </h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">LISTA DE DESEJO</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                        class="tooltipp">COMPARAR</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">VER MAIS</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ADICIONAR</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="<?php echo $_PREFIXO ?>img/produto/product02.png" alt="">
                        <div class="product-label">
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-Categoria">Categoria</p>
                        <h3 class="product-name"><a href="#">Luciano NOME PRODUTO</a></h3>
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
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">LISTA DE DESEJO</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                        class="tooltipp">COMPARAR</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">VER MAIS</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ADICIONAR</button>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm visible-xs"></div>
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="<?php echo $_PREFIXO ?>img/produto/product03.png" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-Categoria">Categoria</p>
                        <h3 class="product-name"><a href="#">NOME PRODUTO</a></h3>
                        <h4 class="product-price">R$980.00
                            <del class="product-old-price">R$990.00</del>
                        </h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">LISTA DE DESEJO</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                        class="tooltipp">COMPARAR</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">VER MAIS</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ADICIONAR</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="<?php echo $_PREFIXO ?>img/produto/product04.png" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-Categoria">Categoria</p>
                        <h3 class="product-name"><a href="#">NOME PRODUTO</a></h3>
                        <h4 class="product-price">R$980.00
                            <del class="product-old-price">R$990.00</del>
                        </h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">LISTA DE DESEJO</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                        class="tooltipp">COMPARAR</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">VER MAIS</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ADICIONAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>