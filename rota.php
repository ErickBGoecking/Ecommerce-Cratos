<link rel="stylesheet" href="css/breadcrumb.css" />
<?php

if($url){
    switch($url[0]){
        case 'produto':       
            include_once('./pagina/produto.php');
            break;
        default:
            include_once('./pagina/conteudoIndex.php');
            break;
    }
}else{
    include_once('./pagina/conteudoIndex.php');
}