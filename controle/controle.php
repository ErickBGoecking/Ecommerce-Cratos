<?php
include_once('../source/funcoes/funcoes.php');

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$controleId = filter_input(INPUT_POST, 'controleId', FILTER_SANITIZE_NUMBER_INT);
$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);

$controle = explode('/',$controle);

if (isset($controle) && !empty($controle[0])) {
    switch ($controle[0]) {
        case'adm':
            include_once 'adm/adm-controle.php';
            break;
                     
        default:
            echo 'Padrão alterar';
    }
} else {
    echo 'Pagina inexistente!!!';
}