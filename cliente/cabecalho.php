<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro - HTML Ecommerce Template</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/> -->
    <link type="text/css" rel="stylesheet" href="../css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css"
          href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
        html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        #top-header {
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: #1E1F29;
        }
        .header-links li {
            display: inline-block;
            margin-right: 15px;
            font-size: 12px;
        }
        .pull-left {
            float: left !important;
        }
        .header-links li a {
            color: #FFF;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        user agent stylesheet
        a:-webkit-any-link {
            color: -webkit-link;
            cursor: pointer;
            text-decoration: underline;
        }

        /* .header-links li a:hover {
            color: #D10024;
        } */
        li {
            text-align: -webkit-match-parent;
        }
        ul, ol {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        ul {
            list-style-type: disc;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            color: #333;
        }
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }

        .header-search {
            padding: 15px 0px;
        }
        .header-search form .input {
            width: calc(100% - 260px);
            margin-right: -4px;
        }
        .header-search form .input-select {
            margin-right: -4px;
            border-radius: 40px 0px 0px 40px;
        }
        .input-select {
            padding: 0px 15px;
            background: #FFF;
            border: 1px solid #E4E7ED;
            height: 40px;
        }
        .header-search form {
            position: relative;
        }
        .header-search form .input-select {
            margin-right: -4px;
            border-radius: 40px 0px 0px 40px;
        }
        .input-select {
            padding: 0px 15px;
            background: #FFF;
            border: 1px solid #E4E7ED;
            height: 40px;
        }
        .header-search form .search-btn {
            height: 40px;
            width: 100px;
            /* background: #D10024; */
            color: #FFF;
            font-weight: 700;
            border: none;
            border-radius: 0px 40px 40px 0px;
        }
        .input {
            height: 40px;
            padding: 0px 15px;
            border: 1px solid #E4E7ED;
            background-color: #FFF;
            width: 100%;
        }
        .header-links li i {
            /* color: #D10024; */
            margin-right: 5px;
        }
        a {
            color: #2B2D42;
            font-weight: 500;
            -webkit-transition: 0.2s color;
            transition: 0.2s color;
        }
        .fa {
            display: inline-block;
            font: normal normal normal 14px / 1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .header-ctn {
            float: right;
            padding: 15px 0px;
        }

        .header-ctn>div {
            display: inline-block;
        }

        .header-ctn>div+div {
            margin-left: 15px;
        }

        .header-ctn>div>a {
            display: block;
            position: relative;
            width: 90px;
            text-align: center;
            color: #FFF;
        }

        .header-ctn>div>a>i {
            display: block;
            font-size: 18px;
        }

        .header-ctn>div>a>span {
            font-size: 12px;
        }

        .header-ctn>div>a>.qty {
            position: absolute;
            right: 15px;
            top: -10px;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            border-radius: 50%;
            font-size: 10px;
            color: #FFF;
            /* background-color: #D10024; */
        }

        .header-ctn .menu-toggle {
            display: none;
        }

        .cart-dropdown {
            position: absolute;
            width: 300px;
            background: #FFF;
            padding: 15px;
            -webkit-box-shadow: 0px 0px 0px 2px #E4E7ED;
            box-shadow: 0px 0px 0px 2px #E4E7ED;
            z-index: 99;
            right: 0;
            opacity: 0;
            visibility: hidden;
        }

        .dropdown.open>.cart-dropdown {
            opacity: 1;
            visibility: visible;
        }

        .cart-dropdown .cart-list {
            max-height: 180px;
            overflow-y: scroll;
            margin-bottom: 15px;
        }

        .cart-dropdown .cart-list .product-widget {
            padding: 0px;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .cart-dropdown .cart-list .product-widget:last-child {
            margin-bottom: 0px;
        }

        .cart-dropdown .cart-list .product-widget .product-img {
            left: 0px;
            top: 0px;
        }

        .cart-dropdown .cart-list .product-widget .product-body .product-price {
            color: #2B2D42;
        }

        .cart-dropdown .cart-btns {
            margin: 0px -17px -17px;
        }

        .cart-dropdown .cart-btns>a {
            display: inline-block;
            width: calc(50% - 0px);
            padding: 12px;
            /* background-color: #D10024; */
            color: #FFF;
            text-align: center;
            font-weight: 700;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .cart-dropdown .cart-btns>a:first-child {
            margin-right: -4px;
            background-color: #1e1f29;
        }

        .cart-dropdown .cart-btns>a:hover {
            opacity: 0.9;
        }

        .cart-dropdown .cart-summary {
            border-top: 1px solid #E4E7ED;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .fa-heart-o:before {
            content: "\f08a";
        }
        .fa-shopping-cart:before {
            content: "\f07a";
        }
        .header-ctn>div+div {
            margin-left: 15px;
        }
        .header-ctn li.nav-toggle {
            display: none;
        }
        @media only screen and (max-width: 991px) {
            .header-ctn .menu-toggle {
                display: inline-block;
            }
        }

        /*#header {*/
        /*    padding-top: 15px;*/
        /*    padding-bottom: 15px;*/
        /*    background-color: #15161D;*/
        /*}*/
    </style>






<body>
<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
            </ul>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="../img/logo1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
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
                                    <a href="#">View Cart</a>
                                    <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
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
<!-- <nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Início</a></li>
                <li><a href="#">Whey Protein</a></li>
                <li><a href="#">Creatina</a></li>
                <li><a href="#">Pre-Treinos</a></li>
                <li><a href="#">Hipercalóricos</a></li>
                <li><a href="#">Emagrecedores</a></li>
                <li><a href="#">Naturais</a></li>
            </ul>
        </div>
    </div>
</nav> -->

<script src="../js/jquery.min.js"></script>
<!-- <script src="../js/bootstrap.min.js"></script> -->
<script src="../js/slick.min.js"></script>
<script src="../js/nouislider.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


