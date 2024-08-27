<?php
include_once("source/funcoes/funcoes.php");

if(isset($url[0])){
    switch($url[0]){
        case 'adm':
            include_once('pagina/painel/index.php');
            break;
        default:
            include_once('pagina/loja/index.php');
            break;
        case 'teste':
            include_once('pagina/teste/index.php');
            break;
        }
    }else{
    include_once('pagina/loja/index.php');
}