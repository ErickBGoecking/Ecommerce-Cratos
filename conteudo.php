<?php
include_once("source/funcoes/funcoes.php");

if(isset($url[0])){
    switch($url[0]){
        case 'adm':
            include_once('pagina/painel/adm/painel.php');
            break;
        case 'loja':
            include_once('pagina/loja/index.php');
            break;
    }
}else{
    include_once('pagina/loja/index.php');
}