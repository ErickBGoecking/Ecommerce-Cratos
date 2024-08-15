<?php
include_once 'adm/config/constantes.php';
include_once 'adm/config/conexao.php';
include_once 'adm/func/func.php';

$url="";
$_PREFIXO ="";
if(isset($_GET['url'])){
    $produtoGet = filter_input(INPUT_GET, $_GET['url'], FILTER_SANITIZE_STRING);
    $url = explode("/", $_GET['url']);

    foreach($url as $barra){
        $_PREFIXO.="../";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cratos Nutrition</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>css/nouislider.min.css"/>
    <link rel="stylesheet" href="<?php echo $_PREFIXO?>/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>css/style.css"/>
    <link rel="stylesheet" href="<?php echo $_PREFIXO?>css/slide.css">

</head>
<body>

<header>
    <div id="top-header">
        <div class="container">
            <!-- <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul> -->
            <ul class="header-links pull-right">
                <!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
                <li><a href="#"><i class="fa fa-user-o"></i> Meu Acesso</a></li>
            </ul>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="<?php echo $_PREFIXO?>img/logo1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">Categorias</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="O que você procura?">
                            <button class="search-btn">Procurar</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Favoritos</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Meu Carrinho</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="<?php echo $_PREFIXO?>img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="<?php echo $_PREFIXO?>img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">Meu Carrinho</a>
                                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- MENU -->
<?php include_once('pagina/navbar.php') ?>

<!-- MENU -->
<!-- <nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Início</a></li>
                <li><a href="#">Whey Protein</a></li>
                <li><a href="#">Top 20</a></li>
                <li><a href="#">Marcas</a></li>
                <li><a href="#">Kits</a></li>
                <li><a href="#">Objetivos</a></li>
                <li><a href="#">Combos</a></li>
                <li><a href="#">Clube Cratos</a></li>

            </ul>
        </div>
    </div>
</nav> -->

<!-- CARROUSEL INICIO -->
<!-- <div class="container"> CARROUSEL RETIRADO DA CLASSE -->


<?php include_once('rota.php') ?>



<!-- RODAPÉ -->
<footer id="footer">
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-xs-6">
                    <div class="footer">
                        <img src="<?php echo $_PREFIXO?>img/logo2.png" alt="" width="75%">
                        <!-- <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul> -->
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Cratos Nutrition</h3>
                        <p>Nutrição | Saúde | Bem-estar | Qualidade de Vida</p><br>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>R. Israel Pinheiro, 1900 - São Pedro,
                                    Governador Valadares, MG, Brazil</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>033 99812-8528</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>cratosnutrition@hotmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Informações</h3>
                        <ul class="footer-links">
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Fale Conosco</a></li>
                            <li><a href="#">Política de Privacidade</a></li>
                            <li><a href="#">Meios de Pagamentos e Fretes</a></li>
                            <li><a href="#">Política de Trocas e Devoluções</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categorias</h3>
                        <ul class="footer-links">
                            <li><a href="#">Proteínas</a></li>
                            <li><a href="#">Carboidratos</a></li>
                            <li><a href="#">Pré-Treino</a></li>
                            <li><a href="#">Vitaminas</a></li>
                            <li><a href="#">Aminoácidos</a></li>
                            <li><a href="#">Outros</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <!-- <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div id="bottom-footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Cratos Nutrition | Todos os direitos reservados | Desenvolvido por Exclusivy Soluções Web</a>
							</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo $_PREFIXO?>js/jquery.min.js"></script>
<script src="<?php echo $_PREFIXO?>js/bootstrap.min.js"></script>
<script src="<?php echo $_PREFIXO?>js/slick.min.js"></script>
<script src="<?php echo $_PREFIXO?>js/nouislider.min.js"></script>
<script src="<?php echo $_PREFIXO?>js/jquery.zoom.min.js"></script>
<script src="<?php echo $_PREFIXO?>js/main.js"></script>
<!-- <script src="js/slide.js"></script> -->

</body>
</html>
