<?php
$listaParceiro = listarGeral('img, titulo', "parceiro WHERE NOW() BETWEEN datainicial AND datafinal AND ativo = 'A' ORDER BY idparceiro DESC");
if ($listaParceiro) {
    ?>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Parceiros</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="carousel-rotate" data-devicetype="desktop" data-carouselType="2"
                             data-carouselSpeed="80">
                            <div class="wrapper carousel-content" style="animation: marquee 80s linear infinite;">
                                <div class="slide-1"
                                     style=" -webkit-animation: swap 80s linear infinite;animation: swap 80s linear infinite;">
                                    <ul>
                                        <?php
                                        foreach ($listaParceiro as $itemParceiro) {
                                            $imgParceiro = $itemParceiro->img;
                                            $tituloParceiro = $itemParceiro->titulo;
                                            ?>
                                            <li>
                                                <div>
                                                    <img src="<?= $_PREFIXO ?>img/parceiro/<?php echo $imgParceiro;?>" alt="<?php echo $tituloParceiro;?>"
                                                         title="<?php echo $tituloParceiro;?>"/>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
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
?>