<?php
$listaBanner = listarGeral('Img, Titulo', "banner WHERE NOW() BETWEEN DataInicial AND DataFinal AND Tipo = 'Rotativo' AND Ativo = 'A' ORDER BY Idbanner DESC");
if ($listaBanner) {
    $contadorPassador = 0;
    $contadorImg = 0;
    ?>
    <div id="bannerCarrossel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            foreach ($listaBanner as $itemBanner) {
                if ($contadorPassador == 0) {
                    echo "<li data-target='#bannerCarrossel' data-slide-to='$contadorPassador' class='active'></li>";
                } else {
                    echo "<li data-target='#bannerCarrossel' data-slide-to='$contadorPassador'></li>";
                }
                $contadorPassador++;
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            foreach ($listaBanner as $itemBanner) {
                $Img = $itemBanner->Img;
                $Titulo = $itemBanner->Titulo;
                if ($contadorImg == 0) {
                    echo "<div class='item active'><img src='img/banner/$Img' alt='$Titulo' title='$Titulo' style='width:100%;'></div>";
                } else {
                    echo "<div class='item'><img src='img/banner/$Img' alt='$Titulo' title='$Titulo' style='width:100%;'></div>";
                }
                $contadorImg++;
            }
            ?>
        </div>
        <a class="left carousel-control" href="#bannerCarrossel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#bannerCarrossel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <?php
}
?>