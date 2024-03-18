<?php
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$controleId = filter_input(INPUT_POST, 'controleId', FILTER_SANITIZE_NUMBER_INT);
$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);

if (isset($acao) && !empty($acao)) {
    switch ($acao) {
        case'login':
            include_once 'login.php';
            break;
    }
}
if (isset($controle) && !empty($controle)) {
    switch ($controle) {
        case'login':
            include_once 'logar.php';
            break;

        default:
            echo 'Padrão alterar';
    }
} else {
    echo 'Pagina inexistente!!!';
}
?>