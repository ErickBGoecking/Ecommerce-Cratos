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
        case'bannerAdd':
            include_once 'banner/bannerAdd.php';
            break;
        case'bannerStatus':
            include_once 'banner/bannerStatus.php';
            break;
        case'bannerExc':
            include_once 'banner/bannerExc.php';
            break;
        case'bannerVerMais':
            include_once 'banner/bannerVerMais.php';
            break;
        case'bannerDadosAlt':
            include_once 'banner/bannerVerMais.php';
            break;
        case'bannerAlt':
            include_once 'banner/bannerAlt.php';
            break;
        case'generoAdd':
            include_once 'genero/generoAdd.php';
            break;
        case'generoStatus':
            include_once 'genero/generoStatus.php';
            break;
        case'generoExc':
            include_once 'genero/generoExc.php';
            break;
        case'generoVerMais':
            include_once 'genero/generoVerMais.php';
            break;
        case'generoDadosAlt':
            include_once 'genero/generoVerMais.php';
            break;
        case'generoAlt':
            include_once 'genero/generoAlt.php';
            break;
        case'cargoTipoAdd':
            include_once 'cargo/cargoTipoAdd.php';
            break;
        case'cartoTipoStatus':
            include_once 'cargo/cartoTipoStatus.php';
            break;
        case'cargoTipoExc':
            include_once 'cargo/cargoTipoExc.php';
            break;
        case'cargoTipoVerMais':
            include_once 'cargo/cargoTipoVerMais.php';
            break;
        case'cargoTipoDadosAlt':
            include_once 'cargo/cargoTipoVerMais.php';
            break;
        case'cargoTipoAlt':
            include_once 'cargo/cargoTipoDadosAlt.php';
            break;
        default:
            echo 'Padrão alterar';
    }
} else {
    echo 'Pagina inexistente!!!';
}
?>