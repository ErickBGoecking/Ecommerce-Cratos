<head>
    <link rel="stylesheet" href="<?php echo $_PREFIXO ?>source/css/loja/produto/produto.css">
</head>
<?php
$produtoGet = $url[2];
if (isset($produtoGet)) {
    $idProdutoVariacaoGet = codificar($produtoGet, 'decodificar');
    $retornoFotoProduto = listarRegistroUnico('fotoproduto', 'foto', 'idprodutovariacao', $idProdutoVariacaoGet);
    if($retornoFotoProduto){
        $foto = $retornoFotoProduto[0]->foto;
    }else{
        $foto = 'semfoto.png';
    }

    $retornoProduto = listarRegistroUnico("produto p INNER JOIN produtovariacao pv ON pv.idproduto = p.idproduto AND p.ativo = 'A'
        INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao", 'p.idproduto, p.video, p.produto, p.descricao, 
        pv.idprodutovariacao, pv.idtipovariacao, pv.detalhe, pv.altura, pv.largura, pv.peso, pv.destaque, e.idestoque, e.qtdatual, e.qtdvendido, 
        e.vendapromocional, e.custo, e.venda, e.lote, e.vencimento', 'pv.idprodutovariacao', $idProdutoVariacaoGet);
    if ($retornoProduto) {
//        $tiposSelecionados = explode(',', $retornoProduto[0]->idtipovariacao);
        foreach ($retornoProduto as $itemProduto) {
            $idproduto = $itemProduto->idproduto;
            $idprodutovariacao = $itemProduto->idprodutovariacao;
            $idtipovariacaoBd = $itemProduto->idtipovariacao;
            $tiposSelecionados = explode(',', $idtipovariacaoBd);
            $idestoque = $itemProduto->idestoque;
            $video = $itemProduto->video;
            parse_str(parse_url($video, PHP_URL_QUERY), $queryParams);
            if (isset($queryParams['v'])) {
                $video = 'https://www.youtube.com/embed/' . $queryParams['v'];
                $videoId = isset($queryParams['v']) ? $queryParams['v'] : '';
            }
            $produto = $itemProduto->produto;
            $descricao = $itemProduto->descricao;
            $detalhes = $itemProduto->detalhe;
            $altura = $itemProduto->altura;
            $largura = $itemProduto->largura;
            $peso = $itemProduto->peso;
            $destaque = $itemProduto->destaque;
            $qtdatual = $itemProduto->qtdatual;
            $qtdvendido = $itemProduto->qtdvendido;
            $venda = $itemProduto->venda;
            $vendapromocional = $itemProduto->vendapromocional;
        }
        $totalComentario = 0;
        $totalEstrela = 0;
        $calcMediaEstrela = 0;
        $retornoComentarioPessoa = listarGeral('c.comentario, c.estrela, c.cadastro, p.Nome', "comentarioproduto c INNER JOIN pessoa p ON p.idpessoa = c.idpessoa AND p.ativo='A' WHERE c.idprodutovariacao = $idprodutovariacao");
        if ($retornoComentarioPessoa) {
            $totalComentario = count($retornoComentarioPessoa);
            foreach ($retornoComentarioPessoa as $mediaEstrela) {
                $calcMediaEstrela += $mediaEstrela->estrela;
            }
            $totalEstrela = $calcMediaEstrela / $totalComentario;
        }


        $estrelasCheias = floor($totalEstrela);
        $estrelasMeia = ($totalEstrela - $estrelasCheias) >= 0.5 ? 1 : 0;
        $estrelasVazias = 5 - ($estrelasCheias + $estrelasMeia);

        $cincoEstrelas = listarGeral('c.estrela', "comentarioproduto c WHERE c.estrela = '5' AND c.idprodutovariacao = $idprodutovariacao");
        $quatroEstrelas = listarGeral('c.estrela', "comentarioproduto c WHERE c.estrela = '4' AND c.idprodutovariacao = $idprodutovariacao");
        $tresEstrelas = listarGeral('c.estrela', "comentarioproduto c WHERE c.estrela = '3' AND c.idprodutovariacao = $idprodutovariacao");
        $doisEstrelas = listarGeral('c.estrela', "comentarioproduto c WHERE c.estrela = '2' AND c.idprodutovariacao = $idprodutovariacao");
        $umaEstrelas = listarGeral('c.estrela', "comentarioproduto c WHERE c.estrela = '1' AND c.idprodutovariacao = $idprodutovariacao");
        if($cincoEstrelas){
            $totalCincoEstrelas = count($cincoEstrelas);
        }else{
            $totalCincoEstrelas = 0;
        }
        if($quatroEstrelas){
            $totalQuatroEstrelas = count($quatroEstrelas);
        }else{
            $totalQuatroEstrelas = 0;
        }
        if($tresEstrelas){
            $totalTresEstrelas = count($tresEstrelas);
        }else{
            $totalTresEstrelas = 0;
        }
        if($doisEstrelas){
            $totalDoisEstrelas = count($doisEstrelas);
        }else{
            $totalDoisEstrelas = 0;
        }
        if($umaEstrelas){
            $totalUmaEstrelas = count($umaEstrelas);
        }else{
            $totalUmaEstrelas = 0;
        }
        $totalAvaliacoes = $totalCincoEstrelas + $totalQuatroEstrelas + $totalTresEstrelas + $totalDoisEstrelas + $totalUmaEstrelas;
        $porcentagemCincoEstrelas = $totalAvaliacoes > 0 ? ($totalCincoEstrelas / $totalAvaliacoes) * 100 : 0;
        $porcentagemQuatroEstrelas = $totalAvaliacoes > 0 ? ($totalQuatroEstrelas / $totalAvaliacoes) * 100 : 0;
        $porcentagemTresEstrelas = $totalAvaliacoes > 0 ? ($totalTresEstrelas / $totalAvaliacoes) * 100 : 0;
        $porcentagemDoisEstrelas = $totalAvaliacoes > 0 ? ($totalDoisEstrelas / $totalAvaliacoes) * 100 : 0;
        $porcentagemUmaEstrelas = $totalAvaliacoes > 0 ? ($totalUmaEstrelas / $totalAvaliacoes) * 100 : 0;
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
                    <div class="col-md-5 col-md-push-2" style="margin-bottom: -150px">
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
                                if ($video) {
                                    ?>
                                    <div class="product-preview">
                                        <iframe width="100%" height="320" src="<?php echo $video ?>"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin"
                                                allowfullscreen></iframe>
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
                                             alt="<?php echo $produto; ?>" title="<?php echo $produto; ?> aa">
                                    </div>
                                    <?php
                                }
                                if ($video) {
                                    ?>
                                    <div class="product-preview">
                                        <img class="preview-image"
                                             src="https://img.youtube.com/vi/<?php echo $videoId; ?>/0.jpg"
                                             alt="<?php echo $produto; ?>" title="<?php echo $produto; ?>">
                                        <div class="play-button"></div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="product-details" id="produto-variacao">
                            <h2 class="product-name"><?php echo $produto; ?></h2>
                            <div>
                                <div class="product-rating">
                                    <span><?php echo number_format($totalEstrela, 1); ; ?></span>
                                    <?php for ($i = 0; $i < $estrelasCheias; $i++): ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor; ?>
                                    <?php if ($estrelasMeia): ?>
                                        <i class="fa fa-star-half-o"></i>
                                    <?php endif; ?>
                                    <?php for ($i = 0; $i < $estrelasVazias; $i++): ?>
                                        <i class="fa fa-star-o"></i>
                                    <?php endfor; ?>
                                </div>
                                <a class="review-link" id="click" href="#show-avaliacao" onclick="clickalert()"><?php echo $totalComentario?> Comentário(s)</a>
                            </div>
                            <div>
                                <h3 class="product-price">R$<?php echo number_format($venda, '2', ',', '.'); ?>
                                    <del class="product-old-price">
                                        R$<?php echo number_format($vendapromocional, '2', ',', '.'); ?></del>
                                </h3>
                                <span class="product-available"><?php echo $qtdatual; ?> estoque.</span>
                            </div>
                            <p><?php echo substr("$descricao", 0, 150) . '...'; ?></p>
                            <?php
                            $produtos = listarGeralPDO('idtipovariacao', 'produtovariacao', 'idproduto = ?', [$idproduto]);
                            $variacoes = listarGeralPDO('idtipovariacao, variacao, pai', 'tipovariacao');
                            $categorias = [];
                            $variacoesOrganizadas = [];
                            foreach ($variacoes as $variacao) {
                                if ($variacao->pai == 0) {
                                    $categorias[$variacao->idtipovariacao] = $variacao->variacao;
                                    $variacoesOrganizadas[$variacao->variacao] = [];
                                }
                            }
                            foreach ($produtos as $produto) {
                                $tipos = explode(',', $produto->idtipovariacao);
                                foreach ($tipos as $tipo) {
                                    foreach ($variacoes as $variacao) {
                                        if ($variacao->idtipovariacao == $tipo && isset($categorias[$variacao->pai])) {
                                            $categoria = $categorias[$variacao->pai];
                                            if (!array_key_exists($variacao->variacao, $variacoesOrganizadas[$categoria])) {
                                                $variacoesOrganizadas[$categoria][$variacao->idtipovariacao] = $variacao->variacao;
                                            }
                                        }
                                    }
                                }
                            }
                            foreach ($variacoesOrganizadas as $categoria => $variacoes) {
                                if (!empty($variacoes)) {
                                    echo "<div><strong>$categoria:</strong></div>";
//                                    $isFirst = true;
                                    foreach ($variacoes as $idtipovariacao => $variacao) {
                                        $id = strtolower($categoria) . "_" . strtolower(str_replace(' ', '_', $variacao));
//                                        $checked = $isFirst ? 'checked' : '';
//                                        $isFirst = false;
                                        $checked = in_array($idtipovariacao, $tiposSelecionados) ? 'checked' : '';
                                        echo "<div style='display: inline-block;'>";
                                        echo "<input type='radio' class='radio-variacao' id='$id' name='$categoria' value='$variacao' data-id='$idtipovariacao' data-prod='$idproduto' $checked>";
                                        echo "<label for='$id'>$variacao (ID: $idtipovariacao)</label>";
                                        echo "</div>";
                                    }
                                    echo "<br>";
                                }
                            }
                            ?>

                            <div class="add-to-cart" style="margin-top:35px">
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

                </div>
                <div class="row" id="show-avaliacao">
                    <div class="col-md-12">
                        <div id="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tabDescricao">Descrição</a></li>
                                <li><a data-toggle="tab" href="#tabDetalhes">Detalhes</a></li>
                                <li><a data-toggle="tab" href="#tabAvaliacao" id="tabAvalaicaoShow">Avaliações
                                        (<?php echo $totalComentario; ?>)</a></li>
                                <script>

                                    function clickalert(){
                                        const tabAvalaicaoShow = document.getElementById('tabAvalaicaoShow');
                                        tabAvalaicaoShow.click();
                                    }
                                </script>
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
                                            <p><?php echo $detalhes; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabAvaliacao" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span><?php echo number_format($totalEstrela, 1); ; ?></span>
                                                    <div class="rating-stars">
                                                        <?php for ($i = 0; $i < $estrelasCheias; $i++): ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endfor; ?>
                                                        <?php if ($estrelasMeia): ?>
                                                            <i class="fa fa-star-half-o"></i>
                                                        <?php endif; ?>
                                                        <?php for ($i = 0; $i < $estrelasVazias; $i++): ?>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php endfor; ?>
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
                                                            <div style="width: <?php echo $porcentagemCincoEstrelas; ?>%;"></div>
                                                        </div>
                                                        <span class="sum"><?php echo $totalCincoEstrelas;?></span>
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
                                                            <div style="width: <?php echo $porcentagemQuatroEstrelas; ?>%;"></div>
                                                        </div>
                                                        <span class="sum"><?php echo $totalQuatroEstrelas;?></span>
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
                                                            <div style="width: <?php echo $porcentagemTresEstrelas; ?>%;"></div>
                                                        </div>
                                                        <span class="sum"><?php echo $totalTresEstrelas;?></span>
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
                                                            <div style="width: <?php echo $porcentagemDoisEstrelas; ?>%;"></div>
                                                        </div>
                                                        <span class="sum"><?php echo $totalDoisEstrelas;?></span>
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
                                                            <div style="width: <?php echo $porcentagemUmaEstrelas; ?>%;"></div>
                                                        </div>
                                                        <span class="sum"><?php echo $totalUmaEstrelas;?></span>
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
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">LISTA DE DESEJO</span></button>
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
<script src="<?php echo $_PREFIXO ?>source/js/loja/produto/produto.js"></script>

