<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/nouislider.min.css" />
    <link rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/style.css" />
    <link rel="stylesheet" href="<?php echo $_PREFIXO?>old/css/slide.css">
</head>
<?php

if(isset($url[1])){
    switch($url[1]){
        case 'produto':
            include_once('pagina/loja/pagina/produto/produto.php');
            break;
        default:
            include_once('pagina/loja/pagina/conteudoloja.php');
            break;
    }
}else{
    include_once('pagina/loja/pagina/conteudoloja.php');
}
?>

<script src="<?php echo $_PREFIXO?>source/bibliotecas/jquery/jquery.min.js"></script>
<script src="<?php echo $_PREFIXO?>source/bibliotecas/bootstrap-3/bootstrap.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/slick.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/nouislider.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/jquery.zoom.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/main.js"></script>