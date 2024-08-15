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
        case'listaBanner':
            include_once 'banner/lista.php';
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
        case'cargoTipoStatus':
            include_once 'cargo/cargoTipoStatus.php';
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
        case'listarUsuario':
            include_once 'user/lista.php';
            break;
        case'usuarioAdd':
            include_once 'user/usuarioAdd.php';
            break;
        case'usuarioVerMais':
            include_once 'user/usuarioVerMais.php';
            break;
        case'usuarioExc':
            include_once 'user/usuarioExc.php';
            break;
        case'usuarioDadosAlt':
            include_once 'user/usuarioVerMais.php';
            break;
        case'usuarioAlt':
            include_once 'user/usuarioAlt.php';
            break;
        case'usuarioStatus':
            include_once 'user/usuarioStatus.php';
            break;
        case'listarCategorias':
            include_once 'categorias/lista.php';
            break;
        case'categoriaAdd':
            include_once 'categorias/add.php';
            break;
        case'categoriaExc':
            include_once 'categorias/exc.php';
            break;
        case'categoriaAlt':
            include_once 'categorias/alt.php';
            break;
        case'listarProduto':
            include_once 'produto/lista.php';
            break;
        case'produtoAdd':
            include_once 'produto/add_auto.php';
            break;
        case'produtoExc':
            include_once 'produto/produtoExc.php';
            break; 
            
    
        default:
            echo 'Padrão alterar';
    }
} else {
    echo 'Pagina inexistente!!!';
}
?>