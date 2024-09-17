<?php
$listaBannerCentral = listarGeral('Img, Titulo, Texto, DataFinal', "banner WHERE NOW() BETWEEN DataInicial AND DataFinal AND Tipo = 'Central' AND Ativo = 'A' ORDER BY Idbanner DESC");
if ($listaBannerCentral) {
    foreach ($listaBannerCentral as $itemBannerCentral) {
    $ImgCentral = $itemBannerCentral->Img;
    $TituloCentral = $itemBannerCentral->Titulo;
    $TextoCentral = $itemBannerCentral->Texto;
    $DataFinalCentral = $itemBannerCentral->DataFinal;
    }
    $dataExpiracaoBanner = $DataFinalCentral;
    ?>
    <div id="hot-deal" class="section" style="background-image: url('./img/banner/<?php echo $ImgCentral;?>')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3 id="days">00</h3>
                                    <span>Dias</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3 id="hours">00</h3>
                                    <span>Horas</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3 id="minutes">00</h3>
                                    <span>Minutos</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3 id="seconds">00</h3>
                                    <span>Segundos</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase"><?php echo $TituloCentral;?></h2>
                        <p><?php echo $TextoCentral;?></p>
                        <a class="primary-btn cta-btn" href="#">Compre agora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Defina a data de término da promoção (ano, mês-1, dia, hora, minuto, segundo)
        var countDownDate = new Date("<?php echo $dataExpiracaoBanner;?>").getTime();

        // Atualize a contagem regressiva a cada 1 segundo
        var countdownfunction = setInterval(function () {

            // Pegue a data e a hora atuais
            var now = new Date().getTime();

            // Encontre a diferença entre agora e a data de término
            var distance = countDownDate - now;

            // Calcule o tempo para dias, horas, minutos e segundos
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Exiba o resultado nos elementos com id correspondente
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            // Se a contagem terminar, exiba uma mensagem ou faça algo
            if (distance < 0) {
                clearInterval(countdownfunction);
                document.querySelector(".hot-deal").innerHTML = "<h2>Promoção Encerrada!</h2>";
            }
        }, 1000);
    </script>
    <?php
}
?>