<?php
include_once 'source/funcoes/config/conexao.php';
include_once 'source/funcoes/crud/crud.php';
?>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<!--    <link type="text/css" rel="stylesheet" href="--><?php //echo $_PREFIXO ?><!--source/bibliotecas/bootstrap-3/css/bootstrap.min.css"/>-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO ?>source/fonts/font-awesome.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO ?>source/bibliotecas/slick/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO ?>source/bibliotecas/slick/css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO ?>source/bibliotecas/nouislider/css/nouislider.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO ?>source/css/padrao.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO ?>source/css/style.css"/>
    <link rel="stylesheet" href="<?php echo $_PREFIXO ?>source/bibliotecas/slide/slide.css">
    <link href="<?php echo $_PREFIXO ?>source/bibliotecas/toast/css/toast.style.css" rel="stylesheet">
</head>
<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
if (isset($url[1])) {
    switch ($url[1]) {
        case 'produto':
            include_once('pagina/loja/pagina/produto/view/produto.php');
            break;
        case'carrinho':
            include_once 'pagina/loja/pagina/produto/view/carrinho.php';
            break;

    }
} else {
    include_once('pagina/loja/conteudoloja.php');
}
include_once 'layout/newsletter.php';
include_once 'layout/footer.php';
?>
<script src="<?php echo $_PREFIXO ?>source/bibliotecas/jquery/jquery.min.js"></script>
<script src="<?php echo $_PREFIXO ?>source/bibliotecas/bootstrap-3/js/bootstrap.min.js"></script>
<script src="<?php echo $_PREFIXO ?>source/bibliotecas/slick/js/slick.min.js"></script>
<script src="<?php echo $_PREFIXO ?>source/bibliotecas/novislider/js/nouislider.min.js"></script>
<script src="<?php echo $_PREFIXO ?>source/bibliotecas/jquery/jquery.zoom.min.js"></script>
<script src="<?php echo $_PREFIXO ?>source/js/loja/main.js"></script>
<script src="<?php echo $_PREFIXO ?>source/js/loja/loja.js"></script>
<script src="<?php echo $_PREFIXO ?>source/bibliotecas/toast/js/toast.script.js"></script>
<script src="<?php echo $_PREFIXO ?>source/js/loja/mensagemToast.js"></script>
<script>
    urlPrefixo = '<?php echo $_PREFIXO ;?>'
</script>