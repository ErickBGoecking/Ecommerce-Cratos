<?php
include_once('../source/funcoes/funcoes.php');

$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$controle = explode('/',$controle);

$caminho = str_replace(' ',"",$controle[0]);

switch ($caminho) {
    case'adm':
        include_once 'adm/adm-controle.php';
        break;
    case'loja':
        include_once 'loja/loja-controle.php';
        break;
    default:
        break;
}

// ----------------------------------------------