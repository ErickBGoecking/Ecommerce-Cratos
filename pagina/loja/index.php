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

if(isset($url[0])){
    switch($url[0]){
        case 'produto':
            include_once('pagina/loja/pagina/produto.php');
            break;
        case 'banner':
            include_once('pagina/loja/pagina/banner.php');
            break;
        default:
            // include_once('pagina/loja/index.php');
            break;
    }
}
?>

<script src="<?php echo $_PREFIXO?>old/js/jquery.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/bootstrap.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/slick.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/nouislider.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/jquery.zoom.min.js"></script>
<script src="<?php echo $_PREFIXO?>old/js/main.js"></script>