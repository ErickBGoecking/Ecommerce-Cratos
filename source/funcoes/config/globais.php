<?php 

$url="";
$_PREFIXO ="";
if(isset($_GET['url'])){
    $produtoGet = filter_input(INPUT_GET, $_GET['url'], FILTER_SANITIZE_STRING);
    $url = explode("/", $_GET['url']);

    foreach($url as $barra){
        $_PREFIXO.="../";
    }
}